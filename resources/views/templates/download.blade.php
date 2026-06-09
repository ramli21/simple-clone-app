@extends('layouts.tailwind')

@section('content')
    <div class="pt-24 pb-20 hero-bg min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-xl mx-auto">
                <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Portal Download</h1>
                <p class="text-slate-600 mb-6">Masukkan kode unik 6 karakter untuk mendapatkan link download 1x.</p>

                @if ($errors->any())
                    <div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 font-bold text-sm">
                        @foreach ($errors->all() as $err)
                            <div>{{ $err }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('download.resolve') }}"
                    class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                    @csrf

                    <label class="text-sm font-bold text-slate-700">Kode Unik</label>
                    <input type="text" name="unique_code" required maxlength="6" minlength="6" placeholder="T0X61Z"
                        value="{{ old('unique_code') }}"
                        class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />

                    <p class="text-xs text-slate-500 mt-2">Gunakan kode yang Anda terima setelah pembayaran disetujui admin.
                    </p>

                    <button type="submit"
                        class="mt-5 w-full py-3.5 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors">
                        Cari Kode & Buat Link Download
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
