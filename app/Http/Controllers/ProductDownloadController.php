<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductDownloadController extends Controller
{
    public function showForm()
    {
        return view('products.download');
    }

    public function resolve(Request $request)
    {
        $validated = $request->validate([
            'unique_code' => ['required', 'string', 'size:6'],
        ]);

        $payment = Payment::query()
            ->with('product')
            ->where('unique_code', $validated['unique_code'])
            ->where('status', 'approved')
            ->first();

        if (! $payment || ! $payment->product) {
            return back()->withErrors(['unique_code' => 'Kode tidak valid atau belum disetujui.'])->withInput();
        }

        // Create a fresh 1-time token each time user resolves code.
        $token = $payment->setNewOneTimeDownloadToken();

        return redirect()->route('download.one-time', ['token' => $token]);
    }

    public function download(string $token)
    {
        $hash = hash('sha256', $token);

        $payment = Payment::query()
            ->with('product')
            ->where('download_token_hash', $hash)
            ->where('status', 'approved')
            ->first();

        if (! $payment || ! $payment->product) {
            abort(403);
        }

        if (! empty($payment->download_token_used_at)) {
            return back()->withErrors(['unique_code' => 'Kode unduhan sudah digunakan. Silakan input kode unik lagi.']);
        }

        $payment->download_token_used_at = now();
        $payment->save();

        $product = $payment->product;

        // download_path assumed stored for Storage disk (private), treat as relative path.
        $path = ltrim((string) $product->download_path, '/');

        if ($product->delivery_type == 'file') {
            // download_path bersifat private, jadi download via disk "private".
            // pastikan config/filesystems.php memiliki disk private.
            return Storage::disk('private')->download($path, $product->name.'.zip');
        } else {
            return redirect()->to($product->download_path);
        }
    }
}
