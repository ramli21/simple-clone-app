{{-- resources/views/components/cta-button.blade.php --}}

@props(['extraClasses' => ''])

@if ($company && $company->category === 'manufacturing')
    <a href="#contact" class="btn btn-light btn-lg {{ $extraClasses }}">Minta Penawaran Harga (RFQ)</a>
@elseif($company && $company->category === 'travel')
    <a href="#contact" class="btn btn-light btn-lg {{ $extraClasses }}">Booking Sekarang</a>
@else
    {{-- Default jika company belum diatur atau kategori tidak dikenal --}}
    <a href="#contact" class="btn btn-light btn-lg {{ $extraClasses }}">Hubungi Kami</a>
@endif
