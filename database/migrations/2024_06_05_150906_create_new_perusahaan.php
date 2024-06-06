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
        // Schema::dropIfExists('perusahaan');

        Schema::create('perusahaan_v2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_perusahaan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('nib_perusahaan')->nullable();
            $table->string('pimpinan')->nullable();
            $table->string('jenis_pelayanan', 50)->nullable();
            $table->integer('jumlah_kendaraan')->nullable();
            $table->string('no_npwp_perusahaan')->nullable();
            $table->string('tlp_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->text('alamat_perusahaan')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('provinsi_id', 100)->nullable();
            $table->string('nama_kota_kabupaten')->nullable();
            $table->string('kota_kabupaten_id', 100)->nullable();
            $table->string('no_siup')->nullable();
            $table->dateTime('tgl_exp_siup')->nullable();
            $table->string('no_tdp')->nullable();
            $table->dateTime('tgl_terbit_tdp')->nullable();
            $table->string('no_domisili')->nullable();
            $table->dateTime('tgl_exp_domisili')->nullable();
            $table->string('no_akta_pendirian')->nullable();
            $table->dateTime('tgl_akta_pendirian')->nullable();
            $table->string('no_akta_perubahan')->nullable();
            $table->dateTime('tgl_akta_perubahan')->nullable();
            $table->string('no_kumham_perubahan')->nullable();
            $table->dateTime('tgl_registrasi_sistem')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_v2');
    }
};
