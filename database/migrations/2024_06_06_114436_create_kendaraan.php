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
        // Schema::dropIfExists('kendaraan');

        Schema::create('kendaraan_v2', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_kps')->nullable();
            $table->dateTime('tgl_terbit_kps')->nullable();
            $table->dateTime('tgl_exp_kps')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('tgl_terbit_sk')->nullable();
            $table->string('tgl_exp_sk')->nullable();
            $table->string('no_izin_penyelenggaraan')->nullable();
            $table->string('id_perusahaan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('kendaraan_id')->nullable();
            $table->string('noken')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('jenis_pelayanan')->nullable();
            $table->string('rute')->nullable();
            $table->string('kode_trayek')->nullable();
            $table->string('nama_trayek')->nullable();
            $table->string('merek')->nullable();
            $table->string('tahun')->nullable();
            $table->string('seat')->nullable();
            $table->string('barang')->nullable();
            $table->string('jbi')->nullable();
            $table->string('jbi_tempelan')->nullable();
            $table->string('tractor_head')->nullable();
            $table->string('provinsi_id')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('kota_id')->nullable();
            $table->string('nama_kota')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan_v2');
    }
};
