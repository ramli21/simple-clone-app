<!-- Theme Selection Section -->
<section id="themes" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Pilihan Tema Website</h2>
            <p class="section-subtitle">Pilih tema yang sesuai dengan brand Anda</p>
        </div>

        <!-- Filter and Search -->
        <div class="row mb-4" data-aos="fade-up">
            <div class="col-lg-8">
                <div class="filter-buttons d-flex flex-wrap gap-2">
                    <button class="btn btn-primary active" onclick="filterThemes('all')">
                        <i class="fas fa-th"></i> Semua Tema
                    </button>
                    <button class="btn btn-outline-primary" onclick="filterThemes('corporate')">
                        <i class="fas fa-building"></i> Corporate
                    </button>
                    <button class="btn btn-outline-primary" onclick="filterThemes('ecommerce')">
                        <i class="fas fa-shopping-cart"></i> E-Commerce
                    </button>
                    <button class="btn btn-outline-primary" onclick="filterThemes('portfolio')">
                        <i class="fas fa-briefcase"></i> Portfolio
                    </button>
                    <button class="btn btn-outline-primary" onclick="filterThemes('blog')">
                        <i class="fas fa-newspaper"></i> Blog
                    </button>
                    <button class="btn btn-outline-primary" onclick="filterThemes('landing')">
                        <i class="fas fa-rocket"></i> Landing Page
                    </button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="search-box">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" id="themeSearch"
                            placeholder="Cari tema..." onkeyup="searchThemes()">
                    </div>
                </div>
            </div>
        </div>

        <!-- Themes Grid -->
        <div class="row g-4" id="themesGrid">
            <!-- Corporate Theme 1 -->
            <div class="col-lg-4 col-md-6 theme-item" data-category="corporate" data-aos="fade-up" data-aos-delay="100">
                <div class="theme-card">
                    <div class="theme-preview">
                        <img src="https://picsum.photos/seed/corporate1/400/300" alt="Corporate Pro" class="img-fluid">
                        <div class="theme-overlay">
                            <div class="theme-actions">
                                <button class="btn btn-light btn-sm" onclick="previewTheme('corporate1')">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="selectTheme('Corporate Pro')">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
                            </div>
                        </div>
                        <div class="theme-badge">
                            <span class="badge bg-success">Populer</span>
                        </div>
                    </div>
                    <div class="theme-info">
                        <h5>Corporate Pro</h5>
                        <p class="text-muted small">Tema profesional untuk bisnis dan perusahaan</p>
                        <div class="theme-meta">
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-tag"></i> Corporate
                            </span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="theme-price mt-2">
                            <span class="fw-bold text-primary">Rp 2.500.000</span>
                            <span class="text-muted text-decoration-line-through ms-2">Rp 3.500.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- E-Commerce Theme 1 -->
            <div class="col-lg-4 col-md-6 theme-item" data-category="ecommerce" data-aos="fade-up" data-aos-delay="200">
                <div class="theme-card">
                    <div class="theme-preview">
                        <img src="https://picsum.photos/seed/ecommerce1/400/300" alt="ShopMax" class="img-fluid">
                        <div class="theme-overlay">
                            <div class="theme-actions">
                                <button class="btn btn-light btn-sm" onclick="previewTheme('ecommerce1')">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="selectTheme('ShopMax')">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
                            </div>
                        </div>
                        <div class="theme-badge">
                            <span class="badge bg-danger">Hot</span>
                        </div>
                    </div>
                    <div class="theme-info">
                        <h5>ShopMax</h5>
                        <p class="text-muted small">Tema e-commerce modern dengan fitur lengkap</p>
                        <div class="theme-meta">
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-tag"></i> E-Commerce
                            </span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                        </div>
                        <div class="theme-price mt-2">
                            <span class="fw-bold text-primary">Rp 3.000.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Portfolio Theme 1 -->
            <div class="col-lg-4 col-md-6 theme-item" data-category="portfolio" data-aos="fade-up"
                data-aos-delay="300">
                <div class="theme-card">
                    <div class="theme-preview">
                        <img src="https://picsum.photos/seed/portfolio1/400/300" alt="Portfolio Plus"
                            class="img-fluid">
                        <div class="theme-overlay">
                            <div class="theme-actions">
                                <button class="btn btn-light btn-sm" onclick="previewTheme('portfolio1')">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="selectTheme('Portfolio Plus')">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="theme-info">
                        <h5>Portfolio Plus</h5>
                        <p class="text-muted small">Tampilan portfolio yang elegan dan profesional</p>
                        <div class="theme-meta">
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-tag"></i> Portfolio
                            </span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                        <div class="theme-price mt-2">
                            <span class="fw-bold text-primary">Rp 1.500.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Theme 1 -->
            <div class="col-lg-4 col-md-6 theme-item" data-category="blog" data-aos="fade-up" data-aos-delay="400">
                <div class="theme-card">
                    <div class="theme-preview">
                        <img src="https://picsum.photos/seed/blog1/400/300" alt="BlogMaster" class="img-fluid">
                        <div class="theme-overlay">
                            <div class="theme-actions">
                                <button class="btn btn-light btn-sm" onclick="previewTheme('blog1')">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="selectTheme('BlogMaster')">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="theme-info">
                        <h5>BlogMaster</h5>
                        <p class="text-muted small">Tema blog minimalis dengan fokus pada konten</p>
                        <div class="theme-meta">
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-tag"></i> Blog
                            </span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="theme-price mt-2">
                            <span class="fw-bold text-primary">Rp 1.000.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Landing Page Theme 1 -->
            <div class="col-lg-4 col-md-6 theme-item" data-category="landing" data-aos="fade-up"
                data-aos-delay="500">
                <div class="theme-card">
                    <div class="theme-preview">
                        <img src="https://picsum.photos/seed/landing1/400/300" alt="Landing Pro" class="img-fluid">
                        <div class="theme-overlay">
                            <div class="theme-actions">
                                <button class="btn btn-light btn-sm" onclick="previewTheme('landing1')">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="selectTheme('Landing Pro')">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
                            </div>
                        </div>
                        <div class="theme-badge">
                            <span class="badge bg-info">New</span>
                        </div>
                    </div>
                    <div class="theme-info">
                        <h5>Landing Pro</h5>
                        <p class="text-muted small">Landing page konversi tinggi dengan desain modern</p>
                        <div class="theme-meta">
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-tag"></i> Landing Page
                            </span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                        <div class="theme-price mt-2">
                            <span class="fw-bold text-primary">Rp 2.000.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Corporate Theme 2 -->
            <div class="col-lg-4 col-md-6 theme-item" data-category="corporate" data-aos="fade-up"
                data-aos-delay="600">
                <div class="theme-card">
                    <div class="theme-preview">
                        <img src="https://picsum.photos/seed/corporate2/400/300" alt="Business Elite"
                            class="img-fluid">
                        <div class="theme-overlay">
                            <div class="theme-actions">
                                <button class="btn btn-light btn-sm" onclick="previewTheme('corporate2')">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="selectTheme('Business Elite')">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="theme-info">
                        <h5>Business Elite</h5>
                        <p class="text-muted small">Tema eksklusif untuk enterprise level</p>
                        <div class="theme-meta">
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-tag"></i> Corporate
                            </span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="theme-price mt-2">
                            <span class="fw-bold text-primary">Rp 4.000.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-5" data-aos="fade-up">
            <button class="btn btn-outline-primary btn-lg" onclick="loadMoreThemes()">
                <i class="fas fa-plus-circle"></i> Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>

<!-- Theme Preview Modal -->
<div class="modal fade" id="themePreviewModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient text-white"
                style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
                <h5 class="modal-title">
                    <i class="fas fa-desktop"></i> Preview Tema: <span id="previewThemeName"></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="preview-controls bg-light p-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="device-buttons">
                            <button class="btn btn-sm btn-outline-primary active" onclick="setPreviewSize('desktop')">
                                <i class="fas fa-desktop"></i> Desktop
                            </button>
                            <button class="btn btn-sm btn-outline-primary" onclick="setPreviewSize('tablet')">
                                <i class="fas fa-tablet-alt"></i> Tablet
                            </button>
                            <button class="btn btn-sm btn-outline-primary" onclick="setPreviewSize('mobile')">
                                <i class="fas fa-mobile-alt"></i> Mobile
                            </button>
                        </div>
                        <div class="preview-actions">
                            <button class="btn btn-sm btn-success" onclick="selectThemeFromPreview()">
                                <i class="fas fa-check"></i> Pilih Tema Ini
                            </button>
                            <button class="btn btn-sm btn-primary" onclick="openThemeInNewTab()">
                                <i class="fas fa-external-link-alt"></i> Buka di Tab Baru
                            </button>
                        </div>
                    </div>
                </div>
                <div class="preview-container" style="height: 600px; background: #f8f9fa;">
                    <iframe id="themePreviewFrame" src=""
                        style="width: 100%; height: 100%; border: none; transition: all 0.3s ease;">
                    </iframe>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row w-100">
                    <div class="col-md-6">
                        <h6>Fitur Utama:</h6>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-check text-success"></i> Responsive Design</li>
                            <li><i class="fas fa-check text-success"></i> SEO Optimized</li>
                            <li><i class="fas fa-check text-success"></i> Fast Loading</li>
                            <li><i class="fas fa-check text-success"></i> Cross-browser Compatible</li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="proceedToCustomization()">
                            <i class="fas fa-palette"></i> Lanjut ke Kustomisasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Theme Selection Success Modal -->
<div class="modal fade" id="themeSelectedModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                </div>
                <h4>Tema Berhasil Dipilih!</h4>
                <p class="text-muted">Tema <strong id="selectedThemeName"></strong> telah ditambahkan ke keranjang.
                </p>
                <div class="mt-4">
                    <button class="btn btn-primary" onclick="proceedToCheckout()">
                        <i class="fas fa-shopping-cart"></i> Lanjut ke Pembayaran
                    </button>
                    <button class="btn btn-outline-secondary ms-2" data-bs-dismiss="modal">
                        Pilih Tema Lain
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Theme Selection Styles */
    .theme-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .theme-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .theme-preview {
        position: relative;
        overflow: hidden;
        height: 250px;
    }

    .theme-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .theme-card:hover .theme-preview img {
        transform: scale(1.1);
    }

    .theme-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(74, 144, 226, 0.9), rgba(123, 104, 238, 0.9));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .theme-card:hover .theme-overlay {
        opacity: 1;
    }

    .theme-actions {
        display: flex;
        gap: 10px;
    }

    .theme-badge {
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .theme-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .theme-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .filter-buttons .btn {
        border-radius: 25px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }

    .filter-buttons .btn.active {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-color: transparent;
    }

    .search-box .input-group {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        border-radius: 25px;
        overflow: hidden;
    }

    .search-box .form-control {
        border: none;
    }

    .search-box .input-group-text {
        border: none;
        background: transparent;
    }

    /* Preview Modal Styles */
    .preview-controls {
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .device-buttons .btn {
        border-radius: 20px;
    }

    .preview-container iframe {
        background: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .filter-buttons {
            justify-content: center;
        }

        .filter-buttons .btn {
            font-size: 0.875rem;
            padding: 6px 15px;
        }

        .theme-actions {
            flex-direction: column;
            gap: 5px;
        }

        .theme-actions .btn {
            width: 100%;
        }
    }

    /* Animation for theme items */
    .theme-item {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Loading state */
    .loading-skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% {
            background-position: 200% 0;
        }

        100% {
            background-position: -200% 0;
        }
    }
</style>

<script>
    // Theme filtering functionality
    function filterThemes(category) {
        const items = document.querySelectorAll('.theme-item');
        const buttons = document.querySelectorAll('.filter-buttons .btn');

        // Update active button
        buttons.forEach(btn => {
            btn.classList.remove('active', 'btn-primary');
            btn.classList.add('btn-outline-primary');
        });
        event.target.classList.remove('btn-outline-primary');
        event.target.classList.add('active', 'btn-primary');

        // Filter items
        items.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 100);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    }

    // Search functionality
    function searchThemes() {
        const searchTerm = document.getElementById('themeSearch').value.toLowerCase();
        const items = document.querySelectorAll('.theme-item');

        items.forEach(item => {
            const title = item.querySelector('h5').textContent.toLowerCase();
            const description = item.querySelector('p').textContent.toLowerCase();

            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Preview theme in modal
    function previewTheme(themeId) {
        const modal = new bootstrap.Modal(document.getElementById('themePreviewModal'));
        const frame = document.getElementById('themePreviewFrame');
        const themeName = document.getElementById('previewThemeName');

        // Set theme name
        const themeNames = {
            'corporate1': 'Corporate Pro',
            'corporate2': 'Business Elite',
            'ecommerce1': 'ShopMax',
            'portfolio1': 'Portfolio Plus',
            'blog1': 'BlogMaster',
            'landing1': 'Landing Pro'
        };

        themeName.textContent = themeNames[themeId] || 'Unknown Theme';

        // Set iframe src (gunakan URL demo atau placeholder)
        frame.src = `https://picsum.photos/seed/${themeId}/1200/800`;

        // Reset to desktop view
        setPreviewSize('desktop');

        modal.show();
    }

    // Set preview size
    function setPreviewSize(size) {
        const frame = document.getElementById('themePreviewFrame');
        const buttons = document.querySelectorAll('.device-buttons .btn');

        // Update active button
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Adjust iframe size
        switch (size) {
            case 'mobile':
                frame.style.width = '375px';
                frame.style.height = '667px';
                frame.style.margin = '0 auto';
                break;
            case 'tablet':
                frame.style.width = '768px';
                frame.style.height = '1024px';
                frame.style.margin = '0 auto';
                break;
            default:
                frame.style.width = '100%';
                frame.style.height = '100%';
                frame.style.margin = '0';
        }
    }

    // Select theme
    function selectTheme(themeName) {
        document.getElementById('selectedThemeName').textContent = themeName;
        const modal = new bootstrap.Modal(document.getElementById('themeSelectedModal'));
        modal.show();
    }

    // Select theme from preview
    function selectThemeFromPreview() {
        const themeName = document.getElementById('previewThemeName').textContent;
        bootstrap.Modal.getInstance(document.getElementById('themePreviewModal')).hide();
        selectTheme(themeName);
    }

    // Open theme in new tab
    function openThemeInNewTab() {
        window.open('https://example.com/demo', '_blank');
    }

    // Proceed to customization
    function proceedToCustomization() {
        alert('Mengarahkan ke halaman kustomisasi tema...');
    }

    // Proceed to checkout
    function proceedToCheckout() {
        bootstrap.Modal.getInstance(document.getElementById('themeSelectedModal')).hide();
        alert('Mengarahkan ke halaman checkout...');
    }

    // Load more themes
    function loadMoreThemes() {
        const grid = document.getElementById('themesGrid');
        const button = event.target;

        // Show loading state
        button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memuat...';
        button.disabled = true;

        // Simulate loading
        setTimeout(() => {
            // Add new theme items (example)
            const newThemes = `
            <div class="col-lg-4 col-md-6 theme-item" data-category="ecommerce" data-aos="fade-up">
                <div class="theme-card">
                    <div class="theme-preview">
                        <img src="https://picsum.photos/seed/newtheme1/400/300" alt="New Theme" class="img-fluid">
                        <div class="theme-overlay">
                            <div class="theme-actions">
                                <button class="btn btn-light btn-sm" onclick="previewTheme('newtheme1')">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="selectTheme('New Theme')">
                                    <i class="fas fa-check"></i> Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="theme-info">
                        <h5>MarketPlace Pro</h5>
                        <p class="text-muted small">Tema marketplace multi-vendor</p>
                        <div class="theme-meta">
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-tag"></i> E-Commerce
                            </span>
                            <span class="text-warning">
                                <i class="fas fa-star"></i> 4.5
                            </span>
                        </div>
                        <div class="theme-price mt-2">
                            <span class="fw-bold text-primary">Rp 5.000.000</span>
                        </div>
                    </div>
                </div>
            </div>
        `;

            grid.insertAdjacentHTML('beforeend', newThemes);

            // Reset button
            button.innerHTML = '<i class="fas fa-plus-circle"></i> Muat Lebih Banyak';
            button.disabled = false;

            // Reinitialize AOS for new items
            AOS.refresh();
        }, 1500);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
