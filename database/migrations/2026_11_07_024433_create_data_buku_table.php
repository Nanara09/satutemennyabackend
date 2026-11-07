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
        Schema::create('data_buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_buku_id')
                  ->constrained('jenis_buku')
                  ->cascadeOnDelete();

            $table->string('judul',150);
            $table->string('penulis');
            $table->string('penerbit',100);
            $table->year('tahun_terbit');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_buku');
    }
};
