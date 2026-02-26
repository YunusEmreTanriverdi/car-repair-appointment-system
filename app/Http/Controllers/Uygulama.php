<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Uygulama extends Controller
{
  public function site()
  {
    $degisken["data1"]="MERHABA PHP TÜRKİYE"; // değişken tanımlarken dizi olarak tanımlamak zorundayız.
    $degisken["data2"]="İlk uygulamama hoşgeldin dostum."; // html içinde kullanmak isteyince {{$data2}} şeklinde yazmak yeterli.
    
    return view('uygulama',$degisken); // burada $degisken yazmazsak hata alırız çok önemli.
    // return 
  }
}
