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
        Schema::create('m_kendaraan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('provinsi_id', 30)->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('kota_id', 30)->nullable();
            $table->string('nama_kota')->nullable();
            $table->string('no_srut')->nullable();
            $table->date('tgl_srut')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->integer('tahun_rakit')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->string('daya_motor')->nullable();
            $table->string('berat_kosong')->nullable();
            $table->string('panjang_kendaraan')->nullable();
            $table->string('lebar_kendaraan')->nullable();
            $table->string('tinggi_kendaraan')->nullable();
            $table->string('julur_depan')->nullable();
            $table->string('sumbu')->nullable();
            $table->string('jarak_sumbu1_2')->nullable();
            $table->string('jarak_sumbu2_3')->nullable();
            $table->string('jarak_sumbu3_4')->nullable();
            $table->string('panjang_bak_atau_tangki')->nullable();
            $table->string('lebar_bak_atau_tangki')->nullable();
            $table->string('jbb')->nullable();
            $table->string('jbkb')->nullable();
            $table->string('jbi')->nullable();
            $table->string('jbki')->nullable();
            $table->string('daya_angkut_orang')->nullable();
            $table->string('daya_angkut_kg')->nullable();
            $table->string('kelas_jalan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_kendaraan');
    }
};
