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
        Schema::create('konseling_bk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_bk');
            $table->unsignedBigInteger('id_walas');
            $table->foreign('id_layanan')->references('id')->on('layanan_bk');
            $table->foreign('id_bk')->references('id')->on('gurus');
            $table->foreign('id_walas')->references('id')->on('wali_kelas');
            $table->date('tanggal_konseling');
            $table->time('jam_mulai');
            $table->string('tempat');
            $table->string('pesan');
            $table->string('status')->nullable();
            $table->string('hasil_konseling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konseling_bk');
    }
};
