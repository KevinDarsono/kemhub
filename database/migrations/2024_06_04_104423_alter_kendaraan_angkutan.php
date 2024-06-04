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
        Schema::table('kendaraan_angkutan', function (Blueprint $table) {
            $table->uuid('provinsi_id')->nullable()->after('kendaraan_id');
            $table->uuid('kota_id')->nullable()->after('provinsi_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kendaraan_angkutan', function (Blueprint $table) {
            $table->dropColumn('provinsi_id');
            $table->dropColumn('kota_id');
        });
    }
};
