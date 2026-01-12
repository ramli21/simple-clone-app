@extends('layouts.app')

@push('metadata')
    <title>Solusi Digital Enterprise | Fullstack Developer</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
    <link href="{{ asset('vendors/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div id="app">
        @include('home.components.navbar')

        <!-- A. Hero Section -->
        <section id="home" class="position-relative text-white d-flex align-items-center"
            style="background-color: #0f172a; padding-top: 80px;height:50vh;">

            <div class="container position-relative z-1">
                <div class="row justify-content-center text-center reveal active">
                    <div class="col-lg-10">
                        <span
                            class="badge bg-primary bg-opacity-50 border border-primary text-primary bg-opacity-10 text-white-50 mb-4 px-3 py-2 rounded-pill"
                            data-aos="fade-up">
                            AkhriTech Solution
                        </span>
                        <h1 class="display-5 fw-bold mb-4 lh-sm" data-aos="fade-up" data-aos-delay="300">
                            Pilihan Tema Website Modern <br>
                            <span class="text-info">Website Profesional & Sistem Terintegrasi.</span>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section -->
        <section id="templates" class="portfolio">

            <!-- Section Title -->
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="text-center mb-5 reveal">
                            <h2 class="fw-bold display-6">Templates</h2>
                            <p class="text-secondary">Pilih dari berbagai template profesional yang siap pakai — mulai dari
                                portofolio, company
                                profile, hingga toko online. Desain bisa disesuaikan dengan kebutuhan dan identitas brand
                                kamu</p>
                        </div>

                    </div>
                </div>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($template_filters as $key => $item)
                            <li data-filter="{{ $item['data-filter'] }}">{{ $item['name'] }}</li>
                        @endforeach
                    </ul><!-- End Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($templates as $key => $item)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $item['filter-class'] }}">
                                <img src="{{ $item['img'] }}" class="img-fluid" alt="{{ $item['name'] }}">
                                <div class="portfolio-info">
                                    <h4>{{ $item['name'] }}</h4>
                                    <h6>Code : {{ $item['code'] }}</h6>
                                    <p>{{ $item['snippet'] }}</p>
                                    <a href="{{ $item['img'] }}" title="{{ $item['name'] }}"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="javascript::void(0)" data-title="({{ $item['code'] }}) {{ $item['name'] }}"
                                        data-url="{{ $item['preview_url'] }}" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div><!-- End Item -->
                        @endforeach
                    </div><!-- End Container -->
                </div>
            </div>
        </section><!-- /Section -->

        @include('home.components.footer')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="modal-title" class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="preview-iframe" src="" frameborder="0" style="width: 100%;height:88vh;"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('document').ready(function() {
            aosInit();

            const myModalEl = new bootstrap.Modal('#myModal', {
                keyboard: false
            })

            $('.details-link').on('click', function() {
                // console.log("On Clicke", $(this).data('url'));
                $("#preview-iframe").attr('src', $(this).data('url'));
                $("#modal-title").text($(this).data('title'));

                myModalEl.show()
            })

            const myModal = document.getElementById('myModal')
            myModal.addEventListener('hidden.bs.modal', event => {
                $("#preview-iframe").attr('src', "");
                $("#modal-title").text("The Title");
            })

        })
    </script>
@endpush
