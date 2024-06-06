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
        Schema::create('izin', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('kendaraan_id')->nullable();
            $table->string('no_uji')->nullable();
            $table->dateTime('tgl_exp_uji')->nullable();
            $table->string('no_kps')->nullable();
            $table->dateTime('tgl_terbit_kps')->nullable();
            $table->dateTime('tgl_exp_kps')->nullable();
            $table->string('no_sk')->nullable();
            $table->dateTime('tgl_terbit_sk')->nullable();
            $table->dateTime('tgl_exp_sk')->nullable();
            $table->string('no_srut')->nullable();
            $table->dateTime('tgl_srut')->nullable();
            $table->string('no_klh')->nullable();
            $table->dateTime('tgl_exp_klh')->nullable();
            $table->string('no_esdm')->nullable();
            $table->dateTime('tgl_exp_esdm')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin');
    }
};
