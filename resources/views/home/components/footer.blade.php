<!-- Footer -->
<footer id="contact" class="bg-dark text-white-50 pt-5 pb-3">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <img src="{{ asset('images/logo-side-white.png') }}" alt="logo-akhritech" height="40" class="mb-3" />
                <p class="small pe-5">Partner teknologi terpercaya untuk transformasi bisnis Anda.</p>
                <div class="d-flex gap-3">
                    <a href="https://www.instagram.com/akhritech" target="_blank" class="text-white"><i
                            class="bi bi-instagram fs-5"></i></a>
                    <button class="btn btn-link text-white p-0" disabled><i class="bi bi-facebook fs-5"></i></button>
                    <button class="btn btn-link text-white p-0" disabled><i class="bi bi-linkedin fs-5"></i></button>
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
                    <li><i class="bi bi-telephone me-2"></i> {{ $company->phone }}</li>
                    <li><i class="bi bi-envelope me-2"></i> {{ $company->email }}</li>
                    <li><i class="bi bi-geo-alt me-2"></i> {{ $company->address }}</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center small">
            &copy; {{ date('Y') }} AkhriTech. All rights reserved.
        </div>
    </div>
</footer>
