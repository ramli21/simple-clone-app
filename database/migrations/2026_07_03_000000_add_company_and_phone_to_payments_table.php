<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Only add if columns don't already exist
        if (Schema::hasTable('payments')) {
            Schema::table('payments', function (Blueprint $table) {
                if (!Schema::hasColumn('payments', 'phone_number')) {
                    $table->string('phone_number')->nullable()->after('whatsapp_number');
                }
            });
            
            Schema::table('payments', function (Blueprint $table) {
                if (!Schema::hasColumn('payments', 'company_name')) {
                    $table->string('company_name')->nullable()->after('phone_number');
                }
            });
        }
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumnIfExists('phone_number');
            $table->dropColumnIfExists('company_name');
        });
    }
};
