<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('musteriler', function (Blueprint $table) {
            $table->id();
            $table->string('ad_soyad');
            $table->unsignedBigInteger('marka_id');
            $table->unsignedBigInteger('model_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('marka_id')->references('id')->on('arac_markalari')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('arac_modelleri')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('musteriler');
    }
};
