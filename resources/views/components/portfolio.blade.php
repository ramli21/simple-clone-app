{{-- Portfolio Section (slider-like, 3 per view) --}}
<section class="portfolio-section py-5">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-heading mb-2">Portfolio</h2>
            <p class="text-muted mb-0">Proyek yang dibangun untuk menghasilkan dampak nyata</p>
        </div>

        <div class="portfolio-carousel" data-carousel>
            <div class="portfolio-viewport">
                <div class="portfolio-track" data-track>
                    @php
                        $portfolios = \App\Models\Portfolio::query()
                            ->where('published', true)
                            ->latest()
                            ->get(['name', 'category', 'image', 'link', 'story', 'highlights']);
                    @endphp

                    @foreach ($portfolios as $p)
                        <article class="portfolio-card" data-item data-aos="fade-up"
                            data-delay="{{ $loop->index * 100 }}">
                            <div class="portfolio-image-wrapper">
                                <img class="portfolio-image" src="{{ Storage::url($p['image']) }}"
                                    alt="{{ $p['name'] }}">
                                <div class="portfolio-overlay">
                                    <a class="portfolio-link" href="{{ $p['link'] }}" target="_blank"
                                        rel="noopener">Open</a>
                                    <button type="button" class="portfolio-detail-btn" data-open-detail
                                        data-name="{{ $p['name'] }}" data-category="{{ $p['category'] }}"
                                        data-story="{{ $p['story'] }}"
                                        data-highlights="{{ implode('||', $p['highlights']) }}"
                                        aria-label="Lihat detail {{ $p['name'] }}">
                                        Detail
                                    </button>
                                </div>
                            </div>

                            <div class="portfolio-meta mt-3">
                                <h3 class="portfolio-title">{{ $p['name'] }}</h3>
                                <p class="portfolio-category mb-0">{{ $p['category'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="portfolio-controls d-flex justify-content-center gap-3 mt-4" data-controls>
                <button type="button" class="btn btn-outline-primary btn-sm" data-prev aria-label="Previous">←</button>
                <div class="portfolio-dots" data-dots aria-hidden="true"></div>
                <button type="button" class="btn btn-outline-primary btn-sm" data-next aria-label="Next">→</button>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="portfolioDetailModal" tabindex="-1" aria-labelledby="portfolioDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="portfolioDetailModalLabel">Portfolio Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <span class="badge bg-primary" id="portfolioDetailCategory">Category</span>
                    </div>
                    <h3 class="portfolio-detail-name" id="portfolioDetailName">Name</h3>
                    <p class="text-muted" id="portfolioDetailStory"></p>
                    <div class="mt-3">
                        <h6 class="fw-bold">Highlights</h6>
                        <ul id="portfolioDetailHighlights" class="mb-0"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        .portfolio-section {
            background: #ffffff;
        }

        .section-heading {
            font-size: 2rem;
            font-weight: 900;
            color: #0f172a;
        }

        .text-muted {
            color: #64748b !important;
        }

        .portfolio-carousel {
            max-width: 1200px;
            margin: 0 auto;
        }

        .portfolio-viewport {
            overflow: hidden;
        }

        .portfolio-track {
            display: flex;
            gap: 18px;
            will-change: transform;
            transition: transform 450ms ease;
        }

        .portfolio-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            min-width: calc((100% - 36px) / 3);
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.04);
        }

        .portfolio-image-wrapper {
            position: relative;
            height: 190px;
            background: #f1f5f9;
        }

        .portfolio-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.35s ease;
        }

        .portfolio-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.0) 30%, rgba(15, 23, 42, 0.7) 100%);
            opacity: 0;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding: 14px;
            gap: 10px;
            transition: opacity 0.25s ease;
        }

        .portfolio-card:hover .portfolio-image {
            transform: scale(1.05);
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-link {
            color: #fff;
            text-decoration: none;
            font-weight: 800;
            background: rgba(25, 124, 147, 0.9);
            padding: 8px 12px;
            border-radius: 10px;
            font-size: 0.9rem;
        }

        .portfolio-detail-btn {
            border: 1px solid rgba(255, 255, 255, 0.85);
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 800;
        }

        .portfolio-detail-btn:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .portfolio-meta {
            padding: 16px;
        }

        .portfolio-title {
            font-size: 1.15rem;
            font-weight: 900;
            color: #0f172a;
            margin: 0;
        }

        .portfolio-category {
            font-weight: 700;
            color: #197c93;
            margin-top: 6px;
        }

        @media (max-width: 991px) {
            .portfolio-card {
                min-width: calc((100% - 18px) / 2);
            }
        }

        @media (max-width: 575px) {
            .portfolio-card {
                min-width: 100%;
            }
        }

        .portfolio-dots {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .portfolio-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #cbd5e1;
            border: none;
            cursor: pointer;
        }

        .portfolio-dot.active {
            background: #197c93;
        }

        .portfolio-detail-name {
            font-weight: 1000;
            color: #0f172a;
        }
    </style>
@endpush

@push('scripts')
    <script>
        (function() {
            const root = document.querySelector('[data-carousel]');
            if (!root) return;

            const track = root.querySelector('[data-track]');
            const items = Array.from(root.querySelectorAll('[data-item]'));
            const prevBtn = root.querySelector('[data-prev]');
            const nextBtn = root.querySelector('[data-next]');
            const dotsWrap = root.querySelector('[data-dots]');

            const modalEl = document.getElementById('portfolioDetailModal');
            const modal = modalEl ? new bootstrap.Modal(modalEl) : null;

            const updateLayout = () => {
                const vw = window.innerWidth;
                let perView = 3;
                if (vw <= 575) perView = 1;
                else if (vw <= 991) perView = 2;

                const step = perView;
                const total = items.length;
                const pages = Math.max(1, Math.ceil(total / step));

                // store on function scope via closure vars
                root._portfolioPerView = perView;
                root._portfolioPages = pages;

                // clamp current index
                root._portfolioIndex = Math.min(root._portfolioIndex ?? 0, pages - 1);

                // dots
                if (dotsWrap) {
                    dotsWrap.innerHTML = '';
                    for (let i = 0; i < pages; i++) {
                        const b = document.createElement('button');
                        b.type = 'button';
                        b.className = 'portfolio-dot' + (i === root._portfolioIndex ? ' active' : '');
                        b.setAttribute('data-dot', i);
                        b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                        b.addEventListener('click', () => {
                            root._portfolioIndex = i;
                            goTo(root._portfolioIndex, true);
                        });
                        dotsWrap.appendChild(b);
                    }
                }

                goTo(root._portfolioIndex, false);
            };

            const getCardWidth = () => {
                const first = items[0];
                if (!first) return 0;
                return first.getBoundingClientRect().width;
            };

            const goTo = (pageIndex, animate) => {
                const perView = root._portfolioPerView ?? 3;
                const cardWidth = getCardWidth();
                if (!cardWidth) return;

                const gap = parseFloat(getComputedStyle(track).gap || 18);
                const offset = pageIndex * (perView * cardWidth + gap * (perView - 1));

                if (!animate) {
                    track.style.transition = 'none';
                    track.style.transform = 'translateX(' + (-offset) + 'px)';
                    track.getBoundingClientRect();
                    track.style.transition = 'transform 450ms ease';
                } else {
                    track.style.transform = 'translateX(' + (-offset) + 'px)';
                }

                // update dots
                if (dotsWrap) {
                    const dots = Array.from(dotsWrap.querySelectorAll('.portfolio-dot'));
                    dots.forEach((d, i) => {
                        if (i === pageIndex) d.classList.add('active');
                        else d.classList.remove('active');
                    });
                }
            };

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    const pages = root._portfolioPages ?? 1;
                    root._portfolioIndex = Math.max(0, (root._portfolioIndex ?? 0) - 1);
                    root._portfolioIndex = Math.min(root._portfolioIndex, pages - 1);
                    goTo(root._portfolioIndex, true);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    const pages = root._portfolioPages ?? 1;
                    root._portfolioIndex = Math.min(pages - 1, (root._portfolioIndex ?? 0) + 1);
                    goTo(root._portfolioIndex, true);
                });
            }

            window.addEventListener('resize', updateLayout);

            // Detail modal open
            const buttons = Array.from(document.querySelectorAll('[data-open-detail]'));
            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const name = btn.getAttribute('data-name') || '';
                    const category = btn.getAttribute('data-category') || '';
                    const story = btn.getAttribute('data-story') || '';
                    const highlightsRaw = btn.getAttribute('data-highlights') || '';
                    const highlights = highlightsRaw ? highlightsRaw.split('||') : [];

                    const nameEl = document.getElementById('portfolioDetailName');
                    const catEl = document.getElementById('portfolioDetailCategory');
                    const storyEl = document.getElementById('portfolioDetailStory');
                    const listEl = document.getElementById('portfolioDetailHighlights');

                    if (nameEl) nameEl.textContent = name;
                    if (catEl) catEl.textContent = category;
                    if (storyEl) storyEl.textContent = story;
                    if (listEl) {
                        listEl.innerHTML = '';
                        highlights.forEach(h => {
                            const li = document.createElement('li');
                            li.textContent = h;
                            li.className = 'text-muted mb-1';
                            listEl.appendChild(li);
                        });
                    }

                    if (modal) modal.show();
                });
            });

            updateLayout();
        })();
    </script>
@endpush
