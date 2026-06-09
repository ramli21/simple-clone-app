<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('unique_code', 6)->unique()->after('template_id');

            // For generating 1-time download links
            $table->string('download_token_hash')->nullable()->after('unique_code');
            $table->timestamp('download_token_used_at')->nullable()->after('download_token_hash');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn(['download_token_used_at', 'download_token_hash', 'unique_code']);
        });
    }
};

