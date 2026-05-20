{{-- Testimonial Section (5 items, displayed 3 per slide) --}}
<section class="testimonial-section py-5">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-heading mb-2">What Our Clients Say</h2>
            <p class="text-muted mb-0">5 testimoni • scroll menggunakan slider (3 per tampilan)</p>
        </div>

        <div class="testimonial-carousel" data-carousel>
            <div class="testimonial-viewport">
                <div class="testimonial-track" data-track>
                    @php
                        $testimonials = [
                            [
                                'name' => 'Rina W.',
                                'location' => 'Jakarta',
                                'role' => 'Owner, Retail Business',
                                'rating' => 5,
                                'text' =>
                                    'Kerja sama sangat profesional. Proses development cepat, komunikasi jelas, dan hasilnya benar-benar sesuai kebutuhan bisnis kami.',
                            ],
                            [
                                'name' => 'Dimas A.',
                                'location' => 'Bandung',
                                'role' => 'CTO, SaaS Startup',
                                'rating' => 5,
                                'text' =>
                                    'Arsitekturnya rapi dan performanya terukur. Akhritech juga membantu deployment sampai stabil di production.',
                            ],
                            [
                                'name' => 'Sari N.',
                                'location' => 'Surabaya',
                                'role' => 'Operations Lead',
                                'rating' => 5,
                                'text' =>
                                    'Sistem yang dibangun mempermudah operasional tim kami. UI/UX bersih, dan fitur sesuai brief dari awal sampai akhir.',
                            ],
                            [
                                'name' => 'Budi S.',
                                'location' => 'Yogyakarta',
                                'role' => 'Project Manager',
                                'rating' => 5,
                                'text' =>
                                    'Deliverable tepat waktu dan kualitas kode sangat baik. Terima kasih untuk review dan rekomendasi best-practices-nya.',
                            ],
                            [
                                'name' => 'Nur K.',
                                'location' => 'Medan',
                                'role' => 'Founder, Agency',
                                'rating' => 5,
                                'text' =>
                                    'Selain build, Akhritech juga memberikan insight untuk scaling. Dokumentasinya juga jelas sehingga tim kami mudah melanjutkan.',
                            ],
                        ];
                    @endphp

                    @foreach ($testimonials as $t)
                        <article class="testimonial-card" data-item>
                            <div class="rating" aria-label="Rating {{ $t['rating'] }} dari 5">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="bi {{ $i < $t['rating'] ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                            </div>

                            <p class="testimonial-text mb-3">“{{ $t['text'] }}”</p>

                            <div class="testimonial-author d-flex align-items-center gap-3">
                                <div class="author-avatar" aria-hidden="true"></div>
                                <div>
                                    <h5 class="author-name mb-0">{{ $t['name'] }}</h5>
                                    <p class="author-meta mb-0">{{ $t['role'] }} • {{ $t['location'] }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="testimonial-controls d-flex justify-content-center gap-3 mt-4" data-controls>
                <button type="button" class="btn btn-outline-primary btn-sm" data-prev aria-label="Previous">
                    ←
                </button>
                <div class="testimonial-dots" data-dots aria-hidden="true"></div>
                <button type="button" class="btn btn-outline-primary btn-sm" data-next aria-label="Next">
                    →
                </button>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        .testimonial-section {
            background: #f8fafc;
        }

        .section-heading {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
        }

        .testimonial-carousel {
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-viewport {
            overflow: hidden;
        }

        .testimonial-track {
            display: flex;
            gap: 18px;
            will-change: transform;
            transition: transform 450ms ease;
        }

        .testimonial-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 22px;
            min-width: calc((100% - 36px) / 3);
            /* 3 per view (desktop) */
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.04);
        }

        .testimonial-card .rating {
            color: #197c93;
            font-size: 1rem;
            margin-bottom: 10px;
            display: flex;
            gap: 2px;
        }

        .testimonial-text {
            color: #334155;
            line-height: 1.8;
            font-size: 1rem;
            font-weight: 500;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 999px;
            background: radial-gradient(circle at 30% 30%, rgba(25, 124, 147, 0.25), rgba(25, 124, 147, 0.08)), #e6f7fb;
            border: 1px solid rgba(25, 124, 147, 0.25);
        }

        .author-name {
            font-weight: 800;
            color: #0f172a;
            font-size: 1rem;
        }

        .author-meta {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .testimonial-controls [data-dots] {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .testimonial-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #cbd5e1;
            border: none;
            cursor: pointer;
        }

        .testimonial-dot.active {
            background: #197c93;
        }

        @media (max-width: 991px) {
            .testimonial-card {
                min-width: calc((100% - 18px) / 2);
                /* 2 per view */
            }
        }

        @media (max-width: 575px) {
            .testimonial-card {
                min-width: 100%;
                /* 1 per view */
            }
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

            let index = 0;
            let perView = 3;
            let step = 3;
            let pages = 1;

            const updateLayout = () => {
                const vw = window.innerWidth;
                if (vw <= 575) {
                    perView = 1;
                } else if (vw <= 991) {
                    perView = 2;
                } else {
                    perView = 3;
                }

                step = perView;
                const total = items.length;
                pages = Math.max(1, Math.ceil(total / step));

                // Clamp index
                index = Math.min(index, pages - 1);

                // Build dots
                if (dotsWrap) {
                    dotsWrap.innerHTML = '';
                    for (let i = 0; i < pages; i++) {
                        const b = document.createElement('button');
                        b.type = 'button';
                        b.className = 'testimonial-dot' + (i === index ? ' active' : '');
                        b.setAttribute('data-dot', i);
                        b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                        b.addEventListener('click', () => {
                            index = i;
                            goTo(index, true);
                        });
                        dotsWrap.appendChild(b);
                    }
                }

                goTo(index, false);
            };

            const getCardWidth = () => {
                const first = items[0];
                if (!first) return 0;
                const rect = first.getBoundingClientRect();
                return rect.width;
            };

            const goTo = (pageIndex, animate) => {
                const cardWidth = getCardWidth();
                if (!cardWidth) return;

                const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || 18);
                const offset = pageIndex * (perView * cardWidth + gap * (perView - 1));

                if (!animate) {
                    track.style.transition = 'none';
                    track.style.transform = 'translateX(' + (-offset) + 'px)';
                    // force reflow then restore transition
                    track.getBoundingClientRect();
                    track.style.transition = 'transform 450ms ease';
                } else {
                    track.style.transform = 'translateX(' + (-offset) + 'px)';
                }

                // Update dots
                if (dotsWrap) {
                    const dots = Array.from(dotsWrap.querySelectorAll('.testimonial-dot'));
                    dots.forEach((d, i) => {
                        if (i === pageIndex) d.classList.add('active');
                        else d.classList.remove('active');
                    });
                }
            };

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    index = Math.max(0, index - 1);
                    goTo(index, true);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    index = Math.min(pages - 1, index + 1);
                    goTo(index, true);
                });
            }

            window.addEventListener('resize', () => updateLayout());
            updateLayout();
        })();
    </script>
@endpush
