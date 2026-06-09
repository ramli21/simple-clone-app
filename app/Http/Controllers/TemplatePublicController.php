<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WebTemplate;
use App\Models\Payment;
use Illuminate\Http\Request;

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

        if (!$template) {
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
            'whatsapp_number' => $validated['whatsapp_number'],
            'sender_bank_info' => $validated['sender_bank_info'],
            'amount_paid' => (int) $validated['amount_paid'],
            'proof_image' => $storedPath,
            'status' => 'pending',
            'unique_code' => $uniqueCode,
        ]);


        return response()->json([
            'ok' => true,
            'payment_id' => $payment->id,
        ]);
    }
}

