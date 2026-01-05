<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class CompanyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified company profile.
     * Kita hanya butuh satu, jadi kita langsung ambil yang pertama.
     */
    public function index()
    {
        $company = CompanyProfile::first();
        // Jika belum ada, arahkan ke halaman create
        if (!$company) {
            return redirect()->route('admin.company-profiles.create');
        }
        return view('admin.company-profile.index', compact('company'));
    }

    public function create()
    {
        return view('admin.company-profile.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:manufacturing,travel',
            'about_us' => 'nullable|string',
            'vision_mission' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'social_media' => 'nullable|array',
            'social_media_url' => 'nullable|array',
            'social_media_url.*' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $logoPath;
        }

        // Hapus key yang kosong dari social_media
        if (isset($validated['social_media'])) {
            // $validated['social_media'] = array_filter($validated['social_media']);
            $platforms = $request->input('social_media_platform', []);
            $urls = $request->input('social_media_url', []);
            $socialMedia = [];

            if (count($platforms) === count($urls)) {
                foreach ($platforms as $index => $platform) {
                    if (!empty($platform) && !empty($urls[$index])) {
                        $socialMedia[strtolower($platform)] = $urls[$index];
                    }
                }
            }
            $validated['social_media'] = $socialMedia;
        }

        $data = Arr::except($validated, ['social_media_url']);
        CompanyProfile::create($data);

        // Hapus cache agar perubahan langsung terlihat
        cache()->forget('company_profile');

        return redirect()->route('admin.company-profiles.index')->with('success', 'Company profile created successfully.');
    }

    public function edit(CompanyProfile $companyProfile)
    {
        return view('admin.company-profile.edit', compact('companyProfile'));
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:manufacturing,travel',
            'about_us' => 'nullable|string',
            'vision_mission' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'social_media' => 'nullable|array',
            'social_media_url' => 'nullable|array',
            'social_media_url.*' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle upload logo baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($companyProfile->logo) {
                Storage::disk('public')->delete($companyProfile->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $logoPath;
        }
        // dd($validated);

        // Hapus key yang kosong dari social_media
        if (isset($validated['social_media'])) {
            // $validated['social_media'] = array_filter($validated['social_media']);
            $platforms = $request->input('social_media', []);
            $urls = $request->input('social_media_url', []);
            $socialMedia = [];

            if (count($platforms) === count($urls)) {
                foreach ($platforms as $index => $platform) {
                    if (!empty($platform) && !empty($urls[$index])) {
                        $socialMedia[strtolower($platform)] = $urls[$index];
                    }
                }
            }

            $validated['social_media'] = $socialMedia;
        }

        $data = Arr::except($validated, ['social_media_url']);
        $companyProfile->update($data);

        // Hapus cache agar perubahan langsung terlihat
        cache()->forget('company_profile');

        return redirect()->route('admin.company-profiles.index')->with('success', 'Company profile updated successfully.');
    }
}

