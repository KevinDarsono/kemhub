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
        Schema::create('izin_penyelenggaraan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_pendaftaran')->nullable();
            $table->string('no_permohonan')->nullable();
            $table->string('id_perusahaan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('jenis_permohonan')->nullable();
            $table->string('jenis_layanan')->nullable();
            $table->string('jenis_angkutan')->nullable();
            $table->dateTime('tgl_permohonan')->nullable();
            $table->dateTime('tgl_pendaftaran')->nullable();
            $table->dateTime('tgl_pemeriksaan')->nullable();
            $table->dateTime('tgl_persetujuan')->nullable();
            $table->dateTime('tgl_rekomendasi')->nullable();
            $table->dateTime('tgl_cetak')->nullable();
            $table->string('no_sk')->nullable();
            $table->dateTime('tgl_terbit_sk')->nullable();
            $table->dateTime('tgl_exp_sk')->nullable();
            $table->string('status_pengajuan')->nullable();
            $table->string('status_verifikator')->nullable();
            $table->string('status_pemeriksa')->nullable();
            $table->string('status_cek_fisik')->nullable();
            $table->string('status_kasubdit')->nullable();
            $table->string('status_dirjen')->nullable();
            $table->string('status_pnbp')->nullable();
            $table->string('status_cetak')->nullable();
            $table->uuid('kendaraan_id')->nullable();
            $table->string('status_sk')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_penyelenggaraan');
    }
};
