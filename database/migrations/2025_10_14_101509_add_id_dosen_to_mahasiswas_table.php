<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // database/migrations/xxxx_xx_xx_add_id_dosen_to_mahasiswas_table.php
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dosen')->nullable();
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
        });
    }
};
