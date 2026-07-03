<?php

namespace App\Http\Controllers;

use App\Mail\TemplateDownloadLink;
use App\Models\Payment;
use App\Models\WebTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TemplatePublicController extends Controller
{
    public function index()
    {
        $templates = WebTemplate::query()
            ->where('is_active', true)
            ->orderByDesc('sales_count')
            ->get();

        $categories = WebTemplate::query()
            ->where('is_active', true)
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->filter()
            ->values();

        return view('templates.index_2', [
            'templates' => $templates,
            'categories' => $categories,
        ]);
    }

    public function show(string $slug)
    {
        $template = WebTemplate::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (! $template) {
            abort(404);
        }

        $categories = WebTemplate::query()
            ->where('is_active', true)
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->filter()
            ->values();

        return view('templates.show_2', compact('template', 'categories'));
    }

    public function confirmPayment(Request $request)
    {
        $validated = $request->validate([
            'template_id' => ['required', 'uuid', 'exists:web_templates,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'whatsapp_number' => ['required', 'string', 'max:50'],
            'sender_bank_info' => ['required', 'string', 'max:255'],
            'amount_paid' => ['required', 'integer', 'min:1'],
            'proof_image' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:4096'],
        ], [
            'proof_image.max' => 'Ukuran bukti transfer maksimal 4MB.',
        ]);

        $file = $request->file('proof_image');
        $storedPath = $file->store('proofs', 'public');

        // Generate 6-char unique code (letters + numbers) for customer portal.
        $uniqueCode = Payment::generateUniqueCode(6);

        $payment = Payment::query()->create([
            'template_id' => $validated['template_id'],
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
        ]);

        // Generate download token and send email
        $downloadToken = $payment->setNewOneTimeDownloadToken();
        Mail::to($payment->email)->send(new TemplateDownloadLink($payment, $downloadToken));

        return response()->json([
            'ok' => true,
            'payment_id' => $payment->id,
            'redirect_url' => route('templates.checkout-success', ['payment_id' => $payment->id, 'token' => $downloadToken]),
        ]);
    }

    public function claimFree(Request $request)
    {
        $validated = $request->validate([
            'template_id' => ['required', 'uuid', 'exists:web_templates,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'whatsapp_number' => ['required', 'string', 'max:50'],
        ]);

        $template = WebTemplate::findOrFail($validated['template_id']);

        if ($template->final_price > 0) {
            return response()->json(['ok' => false, 'message' => 'Template ini tidak gratis.'], 403);
        }

        $uniqueCode = Payment::generateUniqueCode(6);

        $payment = Payment::query()->create([
            'template_id' => $validated['template_id'],
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
        $template->increment('sales_count');

        return response()->json([
            'ok' => true,
            'download_url' => route('download.one-time', ['token' => $token]),
        ]);
    }

    public function checkout(string $slug)
    {
        $template = WebTemplate::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$template) {
            abort(404);
        }

        return view('templates.checkout', compact('template'));
    }

    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'template_id' => ['required', 'uuid', 'exists:web_templates,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:50'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'agree_terms' => ['required', 'accepted'],
        ]);

        $template = WebTemplate::findOrFail($validated['template_id']);

        // If template is free, claim it directly
        if ($template->final_price == 0) {
            $uniqueCode = Payment::generateUniqueCode(6);

            $payment = Payment::query()->create([
                'template_id' => $validated['template_id'],
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
            ]);

            // Generate download token
            $downloadToken = $payment->setNewOneTimeDownloadToken();
            $template->increment('sales_count');

            // Send email with download link
            Mail::to($payment->email)->send(new TemplateDownloadLink($payment, $downloadToken));

            // Redirect to success page
            return redirect()->route('templates.checkout-success', ['payment_id' => $payment->id, 'token' => $downloadToken]);
        }

        // For paid templates, redirect to payment confirmation page
        return redirect()->route('templates.payment', [
            'template_slug' => $template->slug,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'company_name' => $validated['company_name'],
        ]);
    }

    public function payment(string $template_slug, Request $request)
    {
        $template = WebTemplate::query()
            ->where('slug', $template_slug)
            ->where('is_active', true)
            ->first();

        if (!$template) {
            abort(404);
        }

        $data = [
            'name' => $request->query('name'),
            'email' => $request->query('email'),
            'phone_number' => $request->query('phone_number'),
            'company_name' => $request->query('company_name'),
        ];

        return view('templates.payment', compact('template', 'data'));
    }

    public function checkoutSuccess(string $payment_id, string $token)
    {
        $payment = Payment::query()
            ->where('id', $payment_id)
            ->first();

        if (!$payment) {
            abort(404);
        }

        return view('templates.checkout-success', [
            'payment' => $payment,
            'downloadToken' => $token,
        ]);
    }
}