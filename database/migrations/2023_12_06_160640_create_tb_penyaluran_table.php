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
        Schema::create('tb_penyaluran', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penyaluran');
            $table->decimal('jumlah_bantuan', 10, 2);
            $table->unsignedBigInteger('id_penerima');
            $table->unsignedBigInteger('id_pkh');
            $table->foreign('id_penerima')->references('id_blt')->on('tb_penerima');
            $table->foreign('id_pkh')->references('id_pkh')->on('tb_pkh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_penyaluran');
    }
};
