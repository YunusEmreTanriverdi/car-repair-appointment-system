<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tamir_yerleri', function (Blueprint $table) {
            $table->id();
            $table->string('ad'); // Örn: Motor Atölyesi, Elektrik Atölyesi
            $table->foreignId('tamir_turu_id')->constrained('tamir_turleri')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
         Schema::dropIfExists('tamir_yerleri');
    }
};
