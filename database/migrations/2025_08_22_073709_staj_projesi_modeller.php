<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('arac_modelleri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marka_id')->constrained('arac_markalari')->onDelete('cascade');

            // foreignId('marka_id') => yabancı anahtar (foreign key) olarak kullanılacak marka_id adında bir sütun oluşturur.
            // Bu sütunun veri tipi, ilişkili olduğu tablonun id sütunuyla (genellikle BIGINT UNSIGNED) aynı olur.

            // constrained => Bu metot, bir önceki adımda oluşturulan marka_id sütununa bir yabancı anahtar kısıtlaması ekler.

            // onDelete => Bu metot, ilişkili ana kaydın silinmesi durumunda ne olacağını belirler.
            // 'cascade' değeri, arac_markalari tablosundan bir marka silinirse,
            // o markaya ait olan tüm modellerin de arac_modelleri tablosundan otomatik olarak silineceği anlamına gelir.
            
            $table->string('ad');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('arac_modelleri');
    }
};
