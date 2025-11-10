<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 20)->unique();
            $table->date('tanggal');

            // Relasi ke tabel pelanggans (One to Many)
            $table->foreignId('pelanggan_id')
                  ->constrained('pelanggans')
                  ->onDelete('cascade');

            $table->decimal('total_harga', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
