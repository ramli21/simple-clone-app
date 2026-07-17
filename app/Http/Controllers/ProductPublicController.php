<?php

namespace App\Http\Controllers;

use App\Mail\ProductDownloadLink;
use App\Models\Payment;
use App\Models\Product;
use App\Services\GoQrisService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ProductPublicController extends Controller
{
    public function index()
    {
        $products = Product::query()->where('is_active', true)->orderByDesc('sales_count')->get();

        $categories = Product::query()->where('is_active', true)->select('category')->distinct()->orderBy('category')->pluck('category')->filter()->values();

        return view('products.index_2', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function show(string $slug)
    {
        $product = Product::query()->where('slug', $slug)->where('is_active', true)->first();

        if (!$product) {
            abort(404);
        }

        $categories = Product::query()->where('is_active', true)->select('category')->distinct()->orderBy('category')->pluck('category')->filter()->values();

        return view('products.show_2', compact('product', 'categories'));
    }

    public function confirmPayment(Request $request)
    {
        $validated = $request->validate(
            [
                'payment_id' => ['nullable', 'uuid', 'exists:payments,id'],
                'product_id' => ['required', 'uuid', 'exists:products,id'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'whatsapp_number' => ['required', 'string', 'max:50'],
                'sender_bank_info' => ['required', 'string', 'max:255'],
                'amount_paid' => ['required', 'integer', 'min:1'],
                'proof_image' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:4096'],
            ],
            [
                'proof_image.max' => 'Ukuran bukti transfer maksimal 4MB.',
            ],
        );

        $file = $request->file('proof_image');
        $storedPath = $file->store('proofs', 'public');

        if (!empty($validated['payment_id'])) {
            $payment = Payment::findOrFail($validated['payment_id']);
            $payment->update([
                'sender_bank_info' => $validated['sender_bank_info'],
                'proof_image' => $storedPath,
                'status' => 'pending',
                'payment_method' => 'manual',
            ]);
        } else {
            // Generate 6-char unique code (letters + numbers) for customer portal.
            $uniqueCode = Payment::generateUniqueCode(6);

            $payment = Payment::query()->create([
                'product_id' => $validated['product_id'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $request->input('phone_number'),
                'whatsapp_number' => $validated['whatsapp_number'],
                'company_name' => $request->input('company_name'),
                'sender_bank_info' => $validated['sender_bank_info'],
                'amount_paid' => (int) $validated['amount_paid'],
                'proof_image' => $storedPath,
                'status' => 'pending',
                'unique_code' => $uniqueCode,
                'payment_method' => 'manual',
            ]);
        }

        // Generate download token and send email
        $downloadToken = $payment->setNewOneTimeDownloadToken();
        Mail::to($payment->email)->send(new ProductDownloadLink($payment, $downloadToken));

        return response()->json([
            'ok' => true,
            'payment_id' => $payment->id,
            'redirect_url' => route('products.checkout-success', ['payment_id' => $payment->id, 'token' => $downloadToken]),
        ]);
    }

    public function claimFree(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'uuid', 'exists:products,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'whatsapp_number' => ['required', 'string', 'max:50'],
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if ($product->final_price > 0) {
            return response()->json(['ok' => false, 'message' => 'Template ini tidak gratis.'], 403);
        }

        $uniqueCode = Payment::generateUniqueCode(6);

        $payment = Payment::query()->create([
            'product_id' => $validated['product_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'whatsapp_number' => $validated['whatsapp_number'],
            'sender_bank_info' => 'FREE CLAIM',
            'amount_paid' => 0,
            'proof_image' => 'free',
            'status' => 'approved', // Auto approve for free items
            'unique_code' => $uniqueCode,
        ]);

        $token = $payment->setNewOneTimeDownloadToken();

        // Increment sales count (since it's approved)
        $product->increment('sales_count');

        return response()->json([
            'ok' => true,
            'download_url' => route('download.one-time', ['token' => $token]),
        ]);
    }

    public function checkout(string $slug)
    {
        $product = Product::query()->where('slug', $slug)->where('is_active', true)->first();

        if (!$product) {
            abort(404);
        }

        return view('products.checkout', compact('product'));
    }

    public function processCheckout(Request $request, GoQrisService $goQrisService)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'uuid', 'exists:products,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:50'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'agree_terms' => ['required', 'accepted'],
            'payment_method' => ['nullable', 'string', 'in:qris,manual'],
        ]);

        $product = Product::findOrFail($validated['product_id']);

        // If template is free, claim it directly
        if ($product->final_price == 0) {
            $uniqueCode = Payment::generateUniqueCode(6);

            $payment = Payment::query()->create([
                'product_id' => $validated['product_id'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'] ?? null,
                'whatsapp_number' => $validated['phone_number'] ?? '',
                'company_name' => $validated['company_name'] ?? null,
                'sender_bank_info' => 'FREE CLAIM',
                'amount_paid' => 0,
                'proof_image' => 'free',
                'status' => 'approved',
                'unique_code' => $uniqueCode,
                'payment_method' => 'manual',
            ]);

            // Generate download token
            $downloadToken = $payment->setNewOneTimeDownloadToken();
            $product->increment('sales_count');

            // Send email with download link
            Mail::to($payment->email)->send(new ProductDownloadLink($payment, $downloadToken));

            // Redirect to success page
            return redirect()->route('products.checkout-success', ['payment_id' => $payment->id, 'token' => $downloadToken]);
        }

        // For paid templates, create payment record first based on selected payment method
        $method = $request->input('payment_method', 'qris');
        $uniqueCode = Payment::generateUniqueCode(6);
        $payment = Payment::query()->create([
            'product_id' => $product->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'] ?? null,
            'whatsapp_number' => $validated['phone_number'] ?? '',
            'company_name' => $validated['company_name'] ?? null,
            'sender_bank_info' => $method === 'qris' ? 'QRIS' : null,
            'amount_paid' => $product->final_price,
            'proof_image' => $method === 'qris' ? 'pending_qris' : null,
            'status' => 'pending',
            'unique_code' => $uniqueCode,
            'payment_method' => $method,
        ]);

        if ($method === 'qris') {
            try {
                $qrisData = $goQrisService->createQrTransaction($payment);

                Log::info('QRIS Data: ' . json_encode($qrisData));
                // return $qrisData;
                $payment->update([
                    'qris_trx_id' => $qrisData['trx_id'],
                    'qris_amount' => $qrisData['amount'],
                    'qris_unique_code' => $qrisData['unique_code'],
                    'qris_total_amount' => $qrisData['total_amount'],
                    'qris_qr_string' => $qrisData['payment_detail']['qr_string'],
                    'qris_qr_image' => $qrisData['payment_detail']['qr_image'],
                    'qris_expires_at' => now()->addMinutes(15),
                ]);
            } catch (\Exception $e) {
                Log::error('QRIS Generation failed: ' . $e->getMessage());
                // Fallback to manual bank transfer
                $payment->update([
                    'payment_method' => 'manual',
                    'sender_bank_info' => null,
                    'proof_image' => null,
                ]);
            }
        }

        return redirect()->route('products.payment', ['payment_id' => $payment->id]);
    }

    public function paymentPage(string $payment_id)
    {
        $payment = Payment::with('product')->findOrFail($payment_id);
        $product = $payment->product;

        return view('products.payment', compact('payment', 'product'));
    }

    public function checkPaymentStatus(string $payment_id, GoQrisService $goQrisService)
    {
        $payment = Payment::findOrFail($payment_id);

        if ($payment->status === 'approved') {
            $token = $payment->setNewOneTimeDownloadToken();
            return response()->json([
                'status' => 'success',
                'redirect_url' => route('products.checkout-success', [
                    'payment_id' => $payment->id,
                    'token' => $token,
                ]),
            ]);
        }

        if ($payment->payment_method === 'qris') {
            if ($payment->qris_expires_at && now()->gt($payment->qris_expires_at)) {
                return response()->json([
                    'status' => 'expired',
                    'message' => 'Masa berlaku QRIS telah habis.',
                ]);
            }

            try {
                $statusData = $goQrisService->checkQrStatus($payment->id);
                $paymentStatus = $statusData['payment_status'] ?? 'pending';

                if ($paymentStatus === 'paid') {
                    $goQrisService->handlePaymentSuccess($payment);
                    $token = $payment->setNewOneTimeDownloadToken();
                    return response()->json([
                        'status' => 'success',
                        'redirect_url' => route('products.checkout-success', [
                            'payment_id' => $payment->id,
                            'token' => $token,
                        ]),
                    ]);
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('GoQRIS polling error for payment ' . $payment->id . ': ' . $e->getMessage());
            }
        }

        return response()->json([
            'status' => 'pending',
        ]);
    }

    public function checkoutSuccess(string $payment_id, string $token)
    {
        $payment = Payment::query()->where('id', $payment_id)->first();

        if (!$payment) {
            abort(404);
        }

        return view('products.checkout-success', [
            'payment' => $payment,
            'downloadToken' => $token,
        ]);
    }
}

