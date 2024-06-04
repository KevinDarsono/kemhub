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
        Schema::create('approval_flow', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('ref_id')->nullable(); // id dari table yang di approve
            $table->uuid('ref_code_data')->nullable(); // table name yang di approve, DATA_AKDP, DATA_AKAP
            $table->integer('tier')->nullable();
            $table->boolean('is_approve')->nullable();
            $table->text('catatan')->nullable();
            $table->boolean('is_finish')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_flow');
    }
};
