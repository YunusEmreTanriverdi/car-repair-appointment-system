<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tamir_turleri', function (Blueprint $table) {
            $table->id();
            $table->string('ad'); // Örn: Motor, Kaporta, Elektrik
            $table->timestamps();
            
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('tamir_turleri');
    }
};
