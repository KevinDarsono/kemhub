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
        Schema::create('kendaraan_angkutan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id_input')->nullable();
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

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('perusahaan_id')->references('id')->on('perusahaan');
            // $table->foreign('jenis_angkutan_id')->references('id')->on('jenis_angkutan');
            // $table->foreign('trayek_id')->references('id')->on('trayek');
            // $table->foreign('rute_trayek_id')->references('id')->on('rute_trayek');
            // $table->foreign('jenis_layanan_id')->references('id')->on('jenis_layanan');
            // $table->foreign('kendaraan_id')->references('id')->on('kendaraan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kendaraan_angkutan', function (Blueprint $table) {
            //
        });
    }
};
