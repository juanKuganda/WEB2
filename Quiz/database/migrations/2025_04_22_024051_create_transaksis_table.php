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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string("id_pembeli", 10);
            $table->string("id_pakaian", 10);

            // Foreign key untuk id_pembeli
            $table->foreign('id_pembeli')
                ->references('id_pembeli')
                ->on('pembeli')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            // Foreign key untuk id_pakaian
            $table->foreign('id_pakaian')
                ->references('id_pakaian')
                ->on('pakaian')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->timestamps();

            // Primary key gabungan
            $table->primary(['id_pembeli', 'id_pakaian']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
