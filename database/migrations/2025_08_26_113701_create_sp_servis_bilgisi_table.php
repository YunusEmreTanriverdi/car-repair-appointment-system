<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sp_servis_bilgisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('musteri_id');
            $table->unsignedBigInteger('marka_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('tamir_turu_id');
            $table->unsignedBigInteger('tamir_yeri_id');
            $table->date('tarih');
            $table->time('saat');
            $table->text('aciklama')->nullable();
            $table->timestamps();

            $table->foreign('musteri_id')->references('id')->on('musteriler')->onDelete('cascade');
            $table->foreign('marka_id')->references('id')->on('arac_markalari');
            $table->foreign('model_id')->references('id')->on('arac_modelleri');
            $table->foreign('tamir_turu_id')->references('id')->on('tamir_turleri');
            $table->foreign('tamir_yeri_id')->references('id')->on('tamir_yerleri');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sp_servis_bilgisi');
    }
};

