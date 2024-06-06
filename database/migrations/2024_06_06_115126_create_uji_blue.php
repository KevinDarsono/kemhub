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
        Schema::create('uji_blue', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('is_requested')->default(0); // 0 = not requested, 1 = requested
            $table->boolean('is_approved')->nullable(); // null = waiting, 0 = rejected, 1 = approved
            $table->string('rfid')->nullable();
            $table->string('nouji')->nullable();
            $table->string('vcode')->nullable();
            $table->string('noken')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->dateTime('tgl_uji')->nullable();
            $table->string('keterangan_hasil_uji')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('no_srut')->nullable();
            $table->dateTime('tgl_srut')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('provinsi_id')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('kota_id')->nullable();
            $table->string('nama_kota')->nullable();
            $table->dateTime('tgl_persochip')->nullable();
            $table->dateTime('tgl_cetak_sertifikat')->nullable();
            $table->string('tahun_rakit')->nullable();
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
            $table->string('petugas_penguji')->nullable();
            $table->string('nrp_petugas_penguji')->nullable();
            $table->string('kepala_dinas')->nullable();
            $table->string('pangkat_kepala_dinas')->nullable();
            $table->string('nip_kepala_dinas')->nullable();
            $table->string('kode_pelaksana_teknis')->nullable();
            $table->string('unit_pelaksana_teknis')->nullable();
            $table->string('direktur')->nullable();
            $table->string('pangkat_direktur')->nullable();
            $table->string('nip_direktur')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uji_blue');
    }
};
