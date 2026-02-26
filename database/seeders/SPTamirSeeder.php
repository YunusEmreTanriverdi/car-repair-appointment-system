<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SPTamirTurleri;
use App\Models\SPTamirYerleri;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SPTamirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // İlişkilerden dolayı oluşabilecek hataları önlemek için kontrolü devre dışı bırak
        Schema::disableForeignKeyConstraints();

        // Her çalıştırmada tabloları temizle
        SPTamirYerleri::truncate();
        SPTamirTurleri::truncate();

        // Kontrolü tekrar aktif et
        Schema::enableForeignKeyConstraints();

        // Her bir tamir türünü ve ona bağlı yerleri tanımlayan bir dizi
        $servisVerileri = [
            'Motor' => ['Motor Atölyesi 1', 'Motor Atölyesi 2'],
            'Şanzıman (vites kutusu)' => ['Şanzıman Bölümü'],
            'Fren sistemi' => ['Fren Test Alanı'],
            'Süspansiyon' => ['Süspansiyon Lifti'],
            'Direksiyon sistemi' => ['Rot-Balans Ayar Ünitesi'],
            'Soğutma sistemi' => ['Radyatör ve Klima Servisi'],
            'Araç elektrik tesisatı' => ['Elektrik Atölyesi 1'],
            'Akü, marş ve şarj sistemi' => ['Akü Test ve Değişim Noktası'],
            'Aydınlatma (farlar, stoplar)' => ['Far Ayar Cihazı'],
            'Sensörler (ABS, hava yastığı vs.)' => ['Elektronik Teşhis Ünitesi'],
            'ECU (beyin) ve yazılım' => ['Yazılım Güncelleme İstasyonu'],
            'Kaporta' => ['Kaporta Düzeltme Alanı', 'Şasi Düzeltme'],
            'Boya' => ['Boya Fırını', 'Boya Hazırlık Alanı'],
            'Cam değişimi' => ['Cam Montaj Atölyesi'],
            'Tampon, far montajı' => ['Montaj ve Demontaj Alanı'],
            'Çizik/göçük düzeltme' => ['Mini Onarım Bölümü'],
            'İç Donanım / Konfor Sistemleri' => ['Döşeme ve İç Aksam Atölyesi'],
            'Periyodik Bakım / Servis' => ['Genel Bakım Lifti 1', 'Genel Bakım Lifti 2'],
            'Lastik ve Jant İşlemleri' => ['Lastik Sökme/Takma Makinası'],
            'Diagnostik / Arıza Tespiti' => ['Arıza Tespit Cihazı Bağlantı Noktası'],
        ];

        // Diziyi döngüye alarak verileri oluştur
        foreach ($servisVerileri as $turAdi => $yerAdlari) {
            // Önce tamir türünü oluştur
            $tamirTuru = SPTamirTurleri::create(['ad' => $turAdi]);

            // Oluşturulan türe ait yerleri oluştur
            foreach ($yerAdlari as $yerAdi) {
                SPTamirYerleri::create([
                    'ad' => $yerAdi,
                    'tamir_turu_id' => $tamirTuru->id
                ]);
            }
        }
    }
}