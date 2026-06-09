@extends('layouts.tailwind')

@section('content')
    <div class="pt-24 pb-10 hero-bg">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">Admin Payments</h1>
                    <p class="text-slate-600 mt-1 text-sm">Laporan pembeli & manajemen transaksi</p>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 p-3 rounded-xl bg-green-50 border border-green-200 text-green-800 font-bold text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-5">
                    <div class="text-slate-500 text-sm font-bold">Hari ini</div>
                    <div class="text-3xl font-extrabold text-slate-900">{{ $todayCount }}</div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 p-5">
                    <div class="text-slate-500 text-sm font-bold">Minggu ini</div>
                    <div class="text-3xl font-extrabold text-slate-900">{{ $weekCount }}</div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 p-5">
                    <div class="text-slate-500 text-sm font-bold">Bulan ini</div>
                    <div class="text-3xl font-extrabold text-slate-900">{{ $monthCount }}</div>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between flex-wrap gap-3">
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Daftar Transaksi</h2>
                        <p class="text-sm text-slate-600">Total per halaman: 15</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th class="px-4 py-3 text-left font-bold">Template</th>
                                <th class="px-4 py-3 text-left font-bold">Pembeli</th>
                                <th class="px-4 py-3 text-left font-bold">Nominal</th>
                                <th class="px-4 py-3 text-left font-bold">Status</th>
                                <th class="px-4 py-3 text-left font-bold">Waktu</th>
                                <th class="px-4 py-3 text-left font-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($payments as $payment)
                                <tr class="hover:bg-slate-50/50">
                                    <td class="px-4 py-3">
                                        <div class="font-bold text-slate-900">{{ $payment->template?->name ?? '-' }}</div>
                                        <div class="text-xs text-slate-500">{{ $payment->template?->slug ?? '' }}</div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="font-bold text-slate-900">{{ $payment->name }}</div>
                                        <div class="text-xs text-slate-500">{{ $payment->email }}</div>
                                        <div class="text-xs text-slate-500">WA: {{ $payment->whatsapp_number }}</div>
                                        <div class="text-xs text-slate-500">{{ $payment->sender_bank_info }}</div>
                                    </td>
                                    <td class="px-4 py-3 font-bold text-slate-900">
                                        Rp{{ number_format((int) $payment->amount_paid, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">
                                        @php
                                            $status = $payment->status;
                                            $badge = match ($status) {
                                                'approved' => 'bg-green-50 text-green-700 border-green-200',
                                                'rejected' => 'bg-red-50 text-red-700 border-red-200',
                                                default => 'bg-yellow-50 text-yellow-800 border-yellow-200',
                                            };
                                        @endphp
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full border {{ $badge }} font-bold text-xs">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-slate-600">
                                        {{ $payment->created_at?->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-wrap gap-2">
                                            @if ($payment->status !== 'approved')
                                                <form method="POST"
                                                    action="{{ route('admin.payments.approve', $payment) }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-3 py-2 bg-green-600 text-white rounded-xl font-bold text-xs hover:bg-green-700 transition-colors">Approve</button>
                                                </form>
                                            @endif

                                            @if ($payment->status !== 'rejected')
                                                <form method="POST"
                                                    action="{{ route('admin.payments.reject', $payment) }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-3 py-2 bg-red-600 text-white rounded-xl font-bold text-xs hover:bg-red-700 transition-colors">Reject</button>
                                                </form>
                                            @endif
                                        </div>

                                        @if ($payment->proof_image)
                                            <a href="{{ asset('storage/' . ltrim($payment->proof_image, '/')) }}"
                                                target="_blank"
                                                class="block mt-2 text-xs font-bold text-primary hover:underline">Lihat
                                                Bukti</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-10 text-center text-slate-500 font-bold">Belum ada
                                        transaksi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-5">
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
