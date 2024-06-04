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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama')->nullable();
            $table->string('nib')->nullable();
            $table->text('alamat')->nullable();
            $table->uuid('provinsi_id')->nullable();
            $table->uuid('kota_id')->nullable();
            $table->string('nama_pimpinan')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telpon_perusahaan')->nullable();
            $table->string('no_telpon_penanggung_jawab')->nullable();
            $table->string('nomor_npwp')->nullable();
            $table->uuid('jenis_angkutan_id')->nullable();
            $table->string('no_sk_izin_penyelenggaraan')->nullable();
            $table->dateTime('tanggal_sk_terbit')->nullable();
            $table->dateTime('tanggal_sk_expired')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on('provinsi');
            $table->foreign('kota_id')->references('id')->on('kota');
            $table->foreign('jenis_angkutan_id')->references('id')->on('jenis_angkutan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
