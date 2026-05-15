<section id="services" class="service-section">
    <div class="container">
        <h2 class="section-heading" data-aos="fade-up">Layanan Pembuatan Website</h2>
        <p style="text-align: center; color: #64748b; font-size: 1.1rem; margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto;"
            data-aos="fade-up" data-aos-delay="100">
            Kami menawarkan paket website berkualitas profesional sesuai dengan kebutuhan bisnis Anda
        </p>

        <div class="row g-4">
            <!-- Starter Package -->
            @foreach ($packages as $package)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card"
                        style="{{ $package['highlight'] ? 'border-color: #197c93; box-shadow: 0 15px 30px -10px rgba(25, 124, 147, 0.15);' : '' }}">
                        <span class="service-badge"
                            style="{{ $package['highlight'] ? 'background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);' : '' }}">{{ $package['tagline'] }}</span>
                        <h3 class="service-title">{{ $package['name'] }}</h3>
                        <div class="service-price-wrapper">
                            <div class="service-price-original">
                                <span style="text-decoration: line-through;">{{ $package['price'] }}</span>
                                <span class="service-discount-badge" style="text-decoration: none;">Hemat 10%</span>
                            </div>
                            <div class="service-price">{{ $package['discounted_price'] }}</div>
                            <div class="service-price-note">/tahun</div>
                        </div>
                        <div class="service-timeline">
                            <i class="bi bi-clock-history"></i> Pengerjaan: {{ $package['timeline'] }}
                        </div>
                        <div class="service-domains">
                            <div class="service-domains-title">
                                <i class="bi bi-globe"></i> Domain Gratis Tahun Pertama
                            </div>
                            <div class="service-domains-list">
                                @foreach ($package['domains'] as $domain)
                                    <span class="domain-tag">{{ $domain }}</span>
                                @endforeach
                            </div>
                        </div>
                        <p class="service-description">
                            {{ $package['description'] }}
                        </p>
                        <ul class="service-features">
                            @foreach ($package['features'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach

                        </ul>
                        <a href="#contact" class="service-btn">Pesan Sekarang</a>
                    </div>
                </div>
            @endforeach

            <!-- Advance Package -->
            {{-- <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card"
                    style="border-color: #197c93; box-shadow: 0 15px 30px -10px rgba(25, 124, 147, 0.15);">
                    <span class="service-badge"
                        style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">Rekomendasi
                        Populer</span>
                    <h3 class="service-title">Advance</h3>
                    <div class="service-price-wrapper">
                        <div class="service-price-original">
                            <span style="text-decoration: line-through;">Rp 1.000.000</span>
                            <span class="service-discount-badge">Hemat 20%</span>
                        </div>
                        <div class="service-price">Rp 800.000</div>
                        <div class="service-price-note">/tahun</div>
                    </div>
                    <div class="service-timeline">
                        <i class="bi bi-clock-history"></i> Pengerjaan: 2-4 minggu
                    </div>
                    <div class="service-domains">
                        <div class="service-domains-title">
                            <i class="bi bi-globe"></i> Domain Gratis Tahun Pertama
                        </div>
                        <div class="service-domains-list">
                            <span class="domain-tag">.com</span>
                            <span class="domain-tag">.id</span>
                            <span class="domain-tag">.web.id</span>
                            <span class="domain-tag">.my.id</span>
                            <span class="domain-tag">.biz.id</span>
                            <span class="domain-tag">.co.id</span>
                        </div>
                    </div>
                    <p class="service-description">
                        Solusi lengkap untuk company profile profesional dengan multiple halaman dan fitur yang lebih
                        comprehensive.
                    </p>
                    <ul class="service-features">
                        <li>5 Halaman (Home, About, Services, Blog, Contact)</li>
                        <li>Responsive & Modern Design</li>
                        <li>SEO Optimization</li>
                        <li>Blog/News Section</li>
                        <li>Contact Form & Inquiry System</li>
                        <li>Admin Panel Dasar</li>
                        <li>Free Domain + Hosting 1 Tahun</li>
                        <li>SSL Certificate + Email Hosting</li>
                        <li>3x Revision Gratis</li>
                    </ul>
                    <a href="#contact" class="service-btn">Pesan Sekarang</a>
                </div>
            </div> --}}

            <!-- Custom Package -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <span class="service-badge">Flexible</span>
                    <h3 class="service-title">Custom</h3>
                    <div class="service-price-wrapper">
                        <div class="service-price">Hubungi Kami</div>
                        <div class="service-price-note">Dapatkan quote sesuai kebutuhan</div>
                    </div>
                    <div class="service-timeline">
                        <i class="bi bi-clock-history"></i> Pengerjaan: Fleksibel sesuai scope
                    </div>
                    <div class="service-domains">
                        <div class="service-domains-title">
                            <i class="bi bi-globe"></i> Domain Gratis Tahun Pertama
                        </div>
                        <div class="service-domains-list">
                            <span class="domain-tag">Lebih Banyak Pilihan Ekstensi</span>
                        </div>
                    </div>
                    <p class="service-description">
                        Paket yang dapat disesuaikan sepenuhnya dengan kebutuhan unik dan spesifik bisnis Anda.
                        Diskusikan kebutuhan Anda dengan tim expert kami.
                    </p>
                    <ul class="service-features">
                        <li>Halaman Unlimited</li>
                        <li>Fitur Custom Sesuai Kebutuhan</li>
                        <li>E-Commerce / Toko Online</li>
                        <li>Database Integration</li>
                        <li>Advanced Security & Performance</li>
                        <li>Unlimited Revision</li>
                        <li>Free Domain + Hosting / Server 1 Tahun</li>
                        <li>SSL Certificate + Email Hosting</li>
                        <li>Dedicated Support & Maintenance</li>
                    </ul>
                    <a href="#contact" class="service-btn service-btn-secondary">Konsultasi Gratis</a>
                </div>
            </div>
        </div>
    </div>
</section>
