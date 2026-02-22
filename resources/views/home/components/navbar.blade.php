<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary d-flex align-items-center gap-2" href="#">
            <img src="{{ asset('images/logo-side.png') }}" height="38" />
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-3">
                <li class="nav-item"><a class="nav-link" href="/#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/#solutions">Solutions</a></li>
                <li class="nav-item"><a class="nav-link" href="/#showcase">Showcase</a></li>
                <li class="nav-item"><a class="nav-link" href="/#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home.templates') }}">Template</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blogs.index') }}">Blog</a></li>
                <li class="nav-item ms-lg-2">
                    <a href="#contact" class="btn btn-primary rounded-pill">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
