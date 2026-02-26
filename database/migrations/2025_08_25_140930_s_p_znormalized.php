<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('musteriler', function (Blueprint $table) {

                    $table->string('ad_normalized')->unique()->after('ad_soyad');

        });
    }

    public function down(): void
    {
        Schema::table('musteriler', function (Blueprint $table) {

            $table->dropColumn('ad_normalized');
        });
    }
};