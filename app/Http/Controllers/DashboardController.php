<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Inquiry;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function index(Request $request)
    {
        // Ambil periode dari request, default 7 hari
        $period = $request->get('period', 7);

        // --- Data untuk Kartu Ringkasan ---
        $totalInquiries = Inquiry::count();
        $newInquiries = Inquiry::where('status', 'new')->count();
        $totalServices = ServiceItem::where('is_active', true)->count();
        $contactedInquiries = Inquiry::where('status', 'contacted')->count();

        // --- Data untuk Grafik Tren ---
        $inquiryTrend = Inquiry::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', now()->subDays($period))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Siapkan data untuk grafik (label dan data)
        $chartLabels = [];
        $chartData = [];

        // Isi tanggal yang kosong dengan 0 agar grafik konsisten
        $periodRange = collect(
            now()
                ->subDays($period - 1)
                ->toPeriod(now()),
        );
        $countsByDate = $inquiryTrend->pluck('count', 'date');

        foreach ($periodRange as $date) {
            $dateStr = $date->format('Y-m-d');
            $chartLabels[] = $date->format('d M'); // Format label menjadi '01 Jan'
            $chartData[] = $countsByDate->get($dateStr, 0); // Ambil count atau 0 jika tidak ada
        }

        // --- Data untuk Tabel Aktivitas Terkini ---
        $recentInquiries = Inquiry::latest()->take(5)->get();

        return view('dashboard', compact('totalInquiries', 'newInquiries', 'totalServices', 'contactedInquiries', 'chartLabels', 'chartData', 'period', 'recentInquiries'));

        // return view('dashboard', compact('company', 'services'));
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
