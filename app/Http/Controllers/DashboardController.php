<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $company = CompanyProfile::first();
        $services = ServiceItem::where('is_active', true)->get();

        return view('dashboard', compact('company', 'services'));
    }

    public function serviceDetail($slug)
    {
        $company = CompanyProfile::first();
        $service = ServiceItem::where('slug', $slug)->firstOrFail();

        return view('service-detail', compact('company', 'service'));
    }

    public function inquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp_number' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
