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
        Schema::create('kendaraan_angkutan_history', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->boolean('is_approve')->nullable();
            $table->uuid('perusahaan_id')->nullable();
            $table->uuid('jenis_angkutan_id')->nullable();
            $table->uuid('trayek_id')->nullable();
            $table->uuid('rute_trayek_id')->nullable();
            $table->uuid('jenis_layanan_id')->nullable();
            $table->uuid('kendaraan_id')->nullable();
            $table->date('masa_berlaku_kps')->nullable();
            $table->date('masa_berlaku_uji_berkala')->nullable();
            $table->string('nomor_uji_berkala')->nullable();
            $table->string('nomor_srut')->nullable();
            $table->string('nomor_kartu_pengawas_kps')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan_angkutan_history');
    }
};
