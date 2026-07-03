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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable()->unique();

            $table->text('short_description');
            $table->longText('description');

            $table->string('category');
            $table->string('stack')->nullable();

            $table->unsignedInteger('price');
            $table->unsignedTinyInteger('discount_percentage')->nullable();

            $table->boolean('is_active')->default(true);

            $table->string('preview_url')->nullable();
            $table->string('download_path');

            $table->enum('delivery_type', ['file', 'github_repo', 'external_link'])->default('file');

            $table->string('thumbnail_image');
            $table->json('images'); // array untuk 3-6 gambar screenshot

            $table->unsignedInteger('sales_count')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

