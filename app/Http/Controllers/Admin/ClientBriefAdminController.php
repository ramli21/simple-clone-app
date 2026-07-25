<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientBrief;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class ClientBriefAdminController extends Controller
{
    /**
     * Display a listing of client briefs.
     */
    public function index(Request $request)
    {
        $query = ClientBrief::query()->with('payment');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('client_name', 'like', "%{$search}%")
                  ->orWhere('client_email', 'like', "%{$search}%")
                  ->orWhere('company_name_title', 'like', "%{$search}%")
                  ->orWhere('token', 'like', "%{$search}%");
            });
        }

        $briefs = $query->latest()->paginate(15);
        return view('admin.client_briefs.index', compact('briefs'));
    }

    /**
     * Show form to manually create a new client portal link.
     */
    public function create()
    {
        $payments = Payment::whereDoesntHave('brief')->latest()->take(50)->get();
        return view('admin.client_briefs.create', compact('payments'));
    }

    /**
     * Store new client portal brief instance.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:255',
            'client_phone' => 'nullable|string|max:50',
            'company_name_title' => 'nullable|string|max:255',
            'payment_id' => 'nullable|uuid',
        ]);

        $brief = ClientBrief::create([
            'token' => ClientBrief::generateToken(),
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_phone' => $request->client_phone,
            'company_name_title' => $request->company_name_title,
            'payment_id' => $request->payment_id,
            'status' => 'draft',
            'progress_percentage' => 0,
        ]);

        return redirect()->route('admin.client-briefs.show', $brief->id)
            ->with('success', 'Client Portal berhasil dibuat! Link unik: ' . route('client-portal.show', $brief->token));
    }

    /**
     * Display the specified client brief.
     */
    public function show(string $id)
    {
        $brief = ClientBrief::findOrFail($id);
        return view('admin.client_briefs.show', compact('brief'));
    }

    /**
     * Update client brief status.
     */
    public function updateStatus(Request $request, string $id)
    {
        $brief = ClientBrief::findOrFail($id);

        $request->validate([
            'status' => 'required|in:draft,submitted,in_review,in_progress,completed',
        ]);

        $brief->status = $request->status;
        $brief->save();

        return redirect()->back()->with('success', 'Status Client Brief berhasil diperbarui ke: ' . strtoupper($request->status));
    }

    /**
     * Download all asset files for a client brief in ZIP format.
     */
    public function downloadZip(string $id)
    {
        $brief = ClientBrief::findOrFail($id);
        $folderPath = storage_path('app/public/client_briefs/' . $brief->id);

        if (!file_exists($folderPath)) {
            return redirect()->back()->with('error', 'Belum ada file terunggah untuk brief ini.');
        }

        $zipFileName = 'Brief_Assets_' . Str::slug($brief->company_name_title ?? $brief->client_name ?? 'Client') . '_' . date('Ymd') . '.zip';
        $zipPath = storage_path('app/public/temp/' . $zipFileName);

        if (!file_exists(dirname($zipPath))) {
            mkdir(dirname($zipPath), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($folderPath),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($folderPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Print / Export PDF printable view of client brief.
     */
    public function exportPdf(string $id)
    {
        $brief = ClientBrief::findOrFail($id);
        return view('admin.client_briefs.export_pdf', compact('brief'));
    }

    /**
     * Delete client brief.
     */
    public function destroy(string $id)
    {
        $brief = ClientBrief::findOrFail($id);
        
        // Remove storage files if any
        Storage::disk('public')->deleteDirectory('client_briefs/' . $brief->id);

        $brief->delete();
        return redirect()->route('admin.client-briefs.index')->with('success', 'Client Brief berhasil dihapus.');
    }
}
