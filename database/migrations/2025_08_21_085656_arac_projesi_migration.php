<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void 
    /* up() metodu, migration dosyası çalıştırıldığında(örneğin php artisan migrate komutu verildiğinde)
    hangi işlemlerin yapılacağını tanımlar.
    Yani: Yeni tablo oluşturmak veya bir tabloya sütun eklemek gibi işlemler up() içinde tanımlanır. */
    {
        Schema::create('araclar',function(Blueprint $table){  // bu satır built in yazılması gerekiyor.
            // 'araclar' => mysqldeki tablonun adı bu.
            $table->id();
            $table->string('adSoyad');
            $table->string('marka');
            $table->string('model');
            $table->integer('yil');
            $table->timestamps();

        });
        
    }

   
    public function down(): void
    //down() metodu, yapılan işlemi geri almak için kullanılır.
    //Eğer "php artisan migrate:rollback" komutu verirsen, Laravel down() metodundaki işlemleri çalıştırır.
    {
        Schema::dropIfExists('araclar');
        //şu anlama gelir  Eğer araclar adında bir tablo varsa, onu sil Bu kod genelde down() metodunun içinde
        // kullanılır, çünkü geri alındığında tablonun silinmesi gerekir.
    }
};
