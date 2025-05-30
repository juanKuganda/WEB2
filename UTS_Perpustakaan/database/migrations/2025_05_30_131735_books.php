<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->unsignedBigInteger('catergory_id')->nullable();
            $table->foreign('catergory_id')->references('id')->on('catergories')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('tahun_terbit');
            $table->integer('jumlah_tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
