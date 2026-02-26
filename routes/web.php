<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Deneme; // burada denemeyi bu şekilde dahil etmezsek hata alırız.
use App\Http\Controllers\Uygulama;
use App\Http\Controllers\Formislemleri;
use App\Http\Middleware\Formkontrol;
use App\Http\Controllers\AracPRojesiController;
use App\Http\Controllers\StajProjesiController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/baslangic', function(){return view('baslangic');})->name('web');  // get metoduyla çağırınca bu şekilde yazabiliyoruz.
// yukarıda get yerine post yazsak hata alırız. postun çağırılması farklı.
// böyle get metodu olunca direkt resources/views'e html kodlarını yazıyoruz ve böyle çağırarak çalıştırıyoruz.


Route::get("/fb/{isim}",[Deneme::class,'test']); // controller içindekileri de böyle çağırabiliyoruz.


Route::get('/form',[Formislemleri::class,'forms']); // burada class yerinde controller dosyasındaki classın onundeki isim gelmeli.
// form yazdigim yere istedigimiz ismi verebiliriz urlde o değeri girince istediğimiz sayfanın açılmasını sağlıyo.
// sondaki forms ise controllerdaki fonksiyonun adı

Route::middleware(Formkontrol::class)->post('/form-sonuc',[Formislemleri::class,'sonuc'])->name('sonuc');


Route::get('/uygulama',[Uygulama::class,'site'])->name('uygulama'); 
// yukarıda bu route'a bir isim verdik sonra bunu href içinde kullanarak linke bastığımızda bu route'a yönlendirdik.
// başka bir route'a da isim vererek ona da yonlendirebilirdik.
// ANLAŞILSIN DİYE BASLAGİC ROUTUNA YÖNLENDİRDİM. SAYFADA PHP TÜRKİYEYE LİNKİNE BASINCA YUKARIDAKİ BASLANGİC ROUTE'una gidecek.



Route::get('/araclar/create',[AracPRojesiController::class,'create']); // ön yüzdeki formun görüntülenmesini sağlayan route.
Route::post('/araclar',[AracPRojesiController::class,'store'])->name('araclar.store');
 // yukarıdaki route ise veritabanında gerçekleşen store işleminin route'u.



// STAJ PROJESİ
Route::get('/', [StajProjesiController::class, 'index'])->name('anasayfa');

// Dinamik combobox için
Route::get('/modeller/{marka_id}', [StajProjesiController::class, 'getModeller'])->name('modeller.get');
Route::get('/tamir-yerleri/{tur_id}', [StajProjesiController::class, 'getTamirYerleri'])->name('tamirYerleri.get');

// Müşteri kaydı
Route::post('/musteri-kaydet', [StajProjesiController::class, 'store'])->name('musteri.kaydet');

// Servis kaydı
Route::post('/servis-kaydet', [StajProjesiController::class, 'storeServis'])->name('servis.kaydet');

