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
        Schema::table('payments', function (Blueprint $table) {
            // Make existing manual payment columns nullable
            $table->string('proof_image')->nullable()->change();
            $table->string('sender_bank_info')->nullable()->change();

            // Add QRIS columns
            $table->string('payment_method')->default('manual')->after('status');
            $table->string('qris_trx_id')->nullable()->after('payment_method');
            $table->unsignedInteger('qris_amount')->nullable()->after('qris_trx_id');
            $table->integer('qris_unique_code')->nullable()->after('qris_amount');
            $table->unsignedInteger('qris_total_amount')->nullable()->after('qris_unique_code');
            $table->text('qris_qr_string')->nullable()->after('qris_total_amount');
            $table->text('qris_qr_image')->nullable()->after('qris_qr_string');
            $table->timestamp('qris_expires_at')->nullable()->after('qris_qr_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Revert columns to not nullable (note: if data is already null, this might fail, but is standard revert logic)
            $table->string('proof_image')->nullable(false)->change();
            $table->string('sender_bank_info')->nullable(false)->change();

            $table->dropColumn([
                'payment_method',
                'qris_trx_id',
                'qris_amount',
                'qris_unique_code',
                'qris_total_amount',
                'qris_qr_string',
                'qris_qr_image',
                'qris_expires_at'
            ]);
        });
    }
};
