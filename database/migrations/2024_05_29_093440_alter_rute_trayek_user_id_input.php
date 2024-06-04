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
        Schema::table('rute_trayek', function (Blueprint $table) {
            $table->uuid('user_id_input')->nullable()->after('id');
            $table->foreign('user_id_input')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rute_trayek', function (Blueprint $table) {
            $table->dropForeign(['user_id_input']);
            $table->dropColumn('user_id_input');
        });
    }
};
