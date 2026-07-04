<!DOCTYPE html>
<html lang="en">

<head>
    <title>AkhriTech Admin Panel</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin Produk & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Produk, Admin Dashboard, CRM, CMS, Bootstrap Admin Produk">
    <meta name="author" content="CodedThemes">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    <!-- [Favicon] icon -->
    {{-- <link rel="icon" href="{{ asset('vendors/mantis-v.1.0/images/favicon.svg') }} " type="image/x-icon"> --}}
    <!-- [Page specific CSS] start -->
    <link href="{{ asset('vendors/mantis-v.1.0/css/plugins/animate.min.css') }} " rel="stylesheet" type="text/css">
    <!-- [Page specific CSS] end -->
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('vendors/mantis-v.1.0/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('vendors/mantis-v.1.0/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('vendors/mantis-v.1.0/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('vendors/mantis-v.1.0/fonts/material.css') }}">
    <!-- [Produk CSS Files] -->
    <link rel="stylesheet" href="{{ asset('vendors/mantis-v.1.0/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('vendors/mantis-v.1.0/css/style-preset.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('vendors/mantis-v.1.0/css/landing.css') }}"> --}}

    @stack('styles')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

    <!-- [ Main Content ] start -->
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="../dashboard/index.html" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="{{ asset('images/logo-side.png') }}" class="img-fluid" alt="logo">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item">
                        <a href="{{ route('admin.dashboard') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Main Menu</label>
                        <i class="ti ti-dashboard"></i>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.company-profiles.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-settings"></i></span>
                            <span class="pc-mtext">Company Profile</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.portfolios.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-file"></i></span>
                            <span class="pc-mtext">Portfolios</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.products.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-package"></i></span>
                            <span class="pc-mtext">Products</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.payments.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-cash"></i></span>
                            <span class="pc-mtext">Payments</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.inquiries.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-message"></i></span>
                            <span class="pc-mtext">Inquiries</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label>Other</label>
                        <i class="ti ti-dashboard"></i>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.blogs.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-book"></i></span>
                            <span class="pc-mtext">Blogs</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="#" class="pc-link text-danger" onClick="submitLogout()">
                            <span class="pc-micon"><i class="ti ti-logout"></i></span>
                            <span class="pc-mtext">Logout</span>
                        </a>
                    </li>
                </ul>
                <div class="card text-center" style="position: absolute; bottom: 10px;">
                    <div class="card-body">
                        <i class="ti ti-help display-2"></i>
                        <h5 class="mt-3">Ada pertanyaan atau kendala?</h5>
                        {{-- <p></p> --}}
                        <p>Hubungi admin sekarang untuk solusi cepat.</p>
                        <a href="https://wa.me/{{ config('app.superadmin_wa') }}" target="_blank"
                            class="btn btn-success">Hubungi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="pc-header">
        <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                            aria-expanded="false">
                            {{-- <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"> --}}
                            <i class="ti ti-user me-2"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">
                                        <i class="ti ti-user fs-3"></i>
                                        {{-- <img src="../assets/images/user/avatar-2.jpg" alt="user-image" --}}
                                        {{-- class="user-avtar wid-35"> --}}
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">{{ Auth::user()->name }}</h6>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                    <a href="javascript::void();" class="pc-head-link bg-transparent"
                                        onClick="submitLogout()"><i class="ti ti-power text-danger"></i></a>

                                </div>
                            </div>
                            <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="drp-t1" data-bs-toggle="tab"
                                        data-bs-target="#drp-tab-1" type="button" role="tab"
                                        aria-controls="drp-tab-1" aria-selected="true"><i class="ti ti-user"></i>
                                        Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="drp-t2" data-bs-toggle="tab"
                                        data-bs-target="#drp-tab-2" type="button" role="tab"
                                        aria-controls="drp-tab-2" aria-selected="false"><i
                                            class="ti ti-settings"></i> Setting</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="mysrpTabContent">
                                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel"
                                    aria-labelledby="drp-t1" tabindex="0">
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-edit-circle"></i>
                                        <span>Edit Profile</span>
                                    </a>
                                    <a href="#!" class="dropdown-item" onClick="submitLogout()">
                                        <i class="ti ti-power"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                                <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2"
                                    tabindex="0">
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-help"></i>
                                        <span>Support</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                        <i class="ti ti-messages"></i>
                                        <span>Feedback</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->

    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            @yield('title-page')

            <!-- [ Main Content ] start -->
            @yield('content')
            <!-- [ Main Content ] end -->

        </div>
    </div>

    <form id="action-logout" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

    <!-- Required Js -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/mantis-v.1.0/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/mantis-v.1.0/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('vendors/mantis-v.1.0/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/mantis-v.1.0/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('vendors/mantis-v.1.0/js/pcoded.js') }}"></script>
    <script src="{{ asset('vendors/mantis-v.1.0/js/plugins/feather.min.js') }}"></script>
    <script>
        layout_change('light');
    </script>
    <script>
        change_box_container('false');
    </script>
    <script>
        layout_rtl_change('false');
    </script>
    <script>
        preset_change("preset-1");
    </script>
    <script>
        font_change("Public-Sans");
    </script>
    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener('scroll', function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
            } else if (cOst > ost) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
                document.querySelector(".navbar").classList.remove("default");
            } else {
                document.querySelector(".navbar").classList.add("default");
                document.querySelector(".navbar").classList.remove("top-nav-collapse");
            }

            if (cOst > 500) {
                document.querySelector(".pc-landing-custmizer").classList.add("active");
            } else {
                document.querySelector(".pc-landing-custmizer").classList.remove("active");
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
    </script>
    <!-- [Page Specific JS] end -->

    <script>
        function submitLogout() {
            document.getElementById('action-logout').submit()
        }
    </script>

    @stack('scripts')
</body>

</html>
