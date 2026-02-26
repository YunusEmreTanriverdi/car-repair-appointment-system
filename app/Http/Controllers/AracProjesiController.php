<?php

namespace App\Http\Controllers;
use App\Models\AracProjesiModel;

use Illuminate\Http\Request;

class AracPRojesiController extends Controller
{
    public function create(){
        
        return view('aracProjesi_view');
    }

    public function store(Request $request){
        $request->validate([
            'adSoyad'=>'required|string|max:255', // required - Alanın doldurulması zorunlu
            'marka'=>'required|string|max:255',
            'model'=>'required|string|max:255',
            'yil'=>'required|string|max:255',

            // Eğer validation kuralları sağlanmazsa, Laravel otomatik olarak hata mesajlarıyla birlikte
            // kullanıcyı önceki sayfaya yönlendirir
        ]);

       AracProjesiModel::create($request->only(['adSoyad','marka','model','yil'])); // Veritabanına kayıt işlemi.
       //Toplam anlamı: "AracProjesiModel'i kullanarak veritabanında yeni bir kayıt oluştur ve bu kaydı oluştururken
       // kullanıcıdan gelen verilerden SADECE adSoyad, marka, model ve yil alanlarını kullan."

       return redirect()->back()->with('success', 'Araç bilgisi kaydedildi!'); 
       // Kullanıcıyı bir önceki bulunduğu sayfaya yönlendir ve bu yönlendirmeye
       // 'Araç bilgisi kaydedildi!' mesajını başarı mesajı olarak ekle."

       //request->only( → "...kullanıcıdan gelen veriden sadece..."

       // redirect()->back() - Kullanıcıyı bir önceki sayfaya yönlendirir

    }
}
