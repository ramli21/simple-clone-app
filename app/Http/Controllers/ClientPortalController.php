<?php

namespace App\Http\Controllers;

use App\Models\ClientBrief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientPortalController extends Controller
{
    /**
     * Show client portal wizard form by token.
     */
    public function show(string $token)
    {
        $brief = ClientBrief::where('token', $token)->firstOrFail();
        return view('client_portal.wizard', compact('brief'));
    }

    /**
     * Save draft via AJAX or standard POST.
     */
    public function saveDraft(Request $request, string $token)
    {
        $brief = ClientBrief::where('token', $token)->firstOrFail();

        $data = $request->only([
            'client_name',
            'client_email',
            'client_phone',
            'company_name_title',
            'company_info',
            'contact_info',
            'social_media',
            'business_info',
            'website_content',
            'portfolios_projects',
            'testimonials',
            'faqs',
            'gallery_files',
            'blog_info',
            'seo_info',
            'domain_hosting',
            'email_info',
            'features_checklist',
            'design_references',
            'target_website',
            'cta_info',
            'legality_files',
            'supporting_files',
            'additional_notes',
        ]);

        // Clean & update non-null keys
        foreach ($data as $key => $val) {
            if ($val !== null) {
                $brief->{$key} = $val;
            }
        }

        $brief->progress_percentage = $brief->calculateProgressPercentage();
        $brief->save();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Draf otomatis berhasil disimpan.',
                'progress' => $brief->progress_percentage,
                'updated_at' => $brief->updated_at->diffForHumans(),
            ]);
        }

        return redirect()->back()->with('success', 'Draf berhasil disimpan.');
    }

    /**
     * Submit completed brief.
     */
    public function submit(Request $request, string $token)
    {
        $brief = ClientBrief::where('token', $token)->firstOrFail();

        $data = $request->only([
            'client_name',
            'client_email',
            'client_phone',
            'company_name_title',
            'company_info',
            'contact_info',
            'social_media',
            'business_info',
            'website_content',
            'portfolios_projects',
            'testimonials',
            'faqs',
            'gallery_files',
            'blog_info',
            'seo_info',
            'domain_hosting',
            'email_info',
            'features_checklist',
            'design_references',
            'target_website',
            'cta_info',
            'legality_files',
            'supporting_files',
            'additional_notes',
        ]);

        foreach ($data as $key => $val) {
            if ($val !== null) {
                $brief->{$key} = $val;
            }
        }

        $brief->status = 'submitted';
        $brief->submitted_at = now();
        $brief->progress_percentage = $brief->calculateProgressPercentage();
        $brief->save();

        return view('client_portal.success', compact('brief'));
    }

    /**
     * Handle single file upload for portal form (logos, documents, etc.)
     */
    public function uploadFile(Request $request, string $token)
    {
        $brief = ClientBrief::where('token', $token)->firstOrFail();

        $request->validate([
            'file' => 'required|file|max:20480', // max 20MB
            'category' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $folder = 'client_briefs/' . $brief->id . '/' . ($request->input('category', 'files'));
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        
        $path = $file->storeAs($folder, $filename, 'public');
        $url = Storage::url($path);

        return response()->json([
            'status' => 'success',
            'path' => $path,
            'url' => $url,
            'filename' => $file->getClientOriginalName(),
        ]);
    }
}
