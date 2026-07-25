<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_briefs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('payment_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('token')->unique();
            
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('company_name_title')->nullable();
            
            $table->string('status')->default('draft'); // draft, submitted, in_review, in_progress, completed
            $table->integer('progress_percentage')->default(0);

            // 20 Data Structure Fields (Stored as JSON / Text)
            $table->json('company_info')->nullable();       // 1. Informasi Perusahaan
            $table->json('contact_info')->nullable();       // 2. Informasi Kontak
            $table->json('social_media')->nullable();       // 3. Media Sosial
            $table->json('business_info')->nullable();      // 4. Informasi Bisnis & Kompetitor
            $table->json('website_content')->nullable();    // 5. Konten Website (Tentang kami, layanan, produk)
            $table->json('portfolios_projects')->nullable();// 6. Portfolio / Project
            $table->json('testimonials')->nullable();       // 7. Testimoni
            $table->json('faqs')->nullable();               // 8. FAQ
            $table->json('gallery_files')->nullable();      // 9. Galeri (foto kantor, tim, produk, kegiatan, video)
            $table->json('blog_info')->nullable();          // 10. Blog
            $table->json('seo_info')->nullable();           // 11. SEO
            $table->json('domain_hosting')->nullable();     // 12. Domain & Hosting
            $table->json('email_info')->nullable();         // 13. Email Perusahaan
            $table->json('features_checklist')->nullable(); // 14. Fitur Website
            $table->json('design_references')->nullable();  // 15. Referensi Design & Warna
            $table->json('target_website')->nullable();     // 16. Target Website
            $table->json('cta_info')->nullable();           // 17. CTA
            $table->json('legality_files')->nullable();     // 18. Legalitas
            $table->json('supporting_files')->nullable();   // 19. File Pendukung
            $table->text('additional_notes')->nullable();   // 20. Catatan Tambahan

            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_briefs');
    }
};
