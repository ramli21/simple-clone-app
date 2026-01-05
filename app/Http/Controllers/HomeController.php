<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Mail\InqueryForwarderMailer;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function travelHome()
    {
        $company = CompanyProfile::first();
        $services = ServiceItem::with([
            'itineraries' => function ($query) {
                $query->orderBy('created_at', 'asc');
            },
        ])
            ->where('is_active', true)
            ->orderBy('created_at', 'asc')
            ->get();

        $dataPackages = [];

        foreach ($services as $item) {
            $dataPackages[$item->title] = [
                'description' => $item->description,
                'details' => [],
            ];

            foreach ($item->itineraries as $itinerary) {
                $dataPackages[$item->title]['details'][] = $itinerary->activity_title . ' - ' . $itinerary->activity_description;
            }
        }

        // dd($dataPackages);
        return view('templates.travel.simple-one', compact('company', 'services', 'dataPackages'));
    }

    public function serviceDetail($slug)
    {
        $company = CompanyProfile::first();
        $service = ServiceItem::where('slug', $slug)->firstOrFail();

        return view('service-detail', compact('company', 'service'));
    }

    public function inquiry(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp_number' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $company = CompanyProfile::first();

        $inquiry = Inquiry::create($validated);

        if ($company->email) {
            Mail::to($company->email)->send(new InqueryForwarderMailer($inquiry));
        }

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }
}

