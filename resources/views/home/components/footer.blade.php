<!-- Footer -->
<footer id="contact" class="bg-dark text-white-50 pt-5 pb-3">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <img src="{{ asset('images/logo-side-white.png') }}" alt="logo-akhritech" height="40" class="mb-3" />
                {{-- <h5 class="text-white fw-bold mb-3 d-flex align-items-center gap-2">
                            <span
                                class="bg-white text-dark rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 30px; height: 30px;">E</span> EnterpriseDev
                        </h5> --}}
                <p class="small pe-5">Partner teknologi terpercaya untuk transformasi bisnis manufaktur dan
                    pariwisata Indonesia.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="text-white fw-bold mb-3">Menu</h6>
                <ul class="list-unstyled small vstack gap-2">
                    <li><a href="#home" class="text-decoration-none text-white-50 hover-white">Home</a></li>
                    <li><a href="#solutions" class="text-decoration-none text-white-50 hover-white">Solutions</a>
                    </li>
                    <li><a href="#pricing" class="text-decoration-none text-white-50 hover-white">Pricing</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-lg-3">
                <h6 class="text-white fw-bold mb-3">Kontak</h6>
                <ul class="list-unstyled small vstack gap-2">
                    <li><i class="bi bi-telephone me-2"></i> +62 812 3456 7890</li>
                    <li><i class="bi bi-envelope me-2"></i> hello@enterprisedev.com</li>
                    <li><i class="bi bi-geo-alt me-2"></i> Jakarta Selatan</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center small">
            &copy; {{ date('Y') }} EnterpriseDev. All rights reserved.
        </div>
    </div>
</footer>
