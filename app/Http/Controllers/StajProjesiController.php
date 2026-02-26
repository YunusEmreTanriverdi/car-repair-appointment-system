<?php

namespace App\Http\Controllers;

use App\Models\StajProjesiMarkalarModel;
use App\Models\StajProjesiModellerModel;
use App\Models\SPmusteriler;
use App\Models\SPTamirYerleri;
use App\Models\SPTamirTurleri;
use App\Models\SPServisBilgisi;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StajProjesiController extends Controller
{
    public function index()
    {
        $markalar = StajProjesiMarkalarModel::all();
        $tamirTurleri = SPTamirTurleri::orderBy('ad')->get();
        return view('StajProjesi', compact('markalar', 'tamirTurleri'));
    }

    public function getModeller($marka_id)
    {
        $modeller = StajProjesiModellerModel::where('marka_id', $marka_id)->get();
        return response()->json($modeller);
    }

    public function getTamirYerleri($tur_id)
    {
        $yerler = SPTamirYerleri::where('tamir_turu_id', $tur_id)->get();
        return response()->json($yerler);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad_soyad' => 'required|string|max:255',
            'marka_id' => 'required|exists:arac_markalari,id',
            'model_id' => 'required|exists:arac_modelleri,id',
        ]);

        $ad_normalized = $this->normalizeName($request->ad_soyad);

        try {
            SPmusteriler::create([
                'ad_soyad' => $request->ad_soyad,
                'ad_normalized' => $ad_normalized,
                'marka_id' => $request->marka_id,
                'model_id' => $request->model_id,
            ]);

            return redirect()->back()->with('success', 'Müşteri kaydı başarılı!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'Bu müşteri zaten kayıtlı!');
            }

            return redirect()->back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyin.');
        }
    }

    public function storeServis(Request $request)
    {
        $request->validate([
            'ad_soyad' => 'required|string|max:255',
            'marka_id' => 'required|exists:arac_markalari,id',
            'model_id' => 'required|exists:arac_modelleri,id',
            'tamir_turu_id' => 'required|exists:tamir_turleri,id',
            'tamir_yeri_id' => 'required|exists:tamir_yerleri,id',
            'tarih' => 'required|date',
            'saat' => 'required',
            'servis_ile_ilgili_notlar' => 'nullable|string',
        ]);

        // **Yeni Eklenen Kısım: Doluluk Kontrolü**
        $isFull = SPServisBilgisi::where('tamir_yeri_id', $request->tamir_yeri_id)
                                ->where('tarih', $request->tarih)
                                ->where('saat', $request->saat)
                                ->exists();

        if ($isFull) {
            return redirect()->back()->with('error', 'Bu tamir yeri, seçtiğiniz tarihte ve saatte doludur. Lütfen başka bir zaman dilimi veya tamir yeri seçin.');
        }

        $ad_normalized = $this->normalizeName($request->ad_soyad);

        // Müşteri kontrolü ve oluşturma
        $musteri = SPmusteriler::where('ad_normalized', $ad_normalized)->first();

        if (!$musteri) {
            $musteri = SPmusteriler::create([
                'ad_soyad' => $request->ad_soyad,
                'ad_normalized' => $ad_normalized,
                'marka_id' => $request->marka_id,
                'model_id' => $request->model_id,
            ]);
        }

        // Servis bilgisi kaydetme
        SPServisBilgisi::create([
            'musteri_id' => $musteri->id,
            'marka_id' => $request->marka_id,
            'model_id' => $request->model_id,
            'tamir_turu_id' => $request->tamir_turu_id,
            'tamir_yeri_id' => $request->tamir_yeri_id,
            'tarih' => $request->tarih,
            'saat' => $request->saat,
            'aciklama' => $request->servis_ile_ilgili_notlar,
        ]);

        return redirect()->back()->with('success', 'Servis kaydı başarılı!');
    }

    private function normalizeName($name)
    {
        $map = [
            'Ç' => 'c', 'ç' => 'c',
            'Ğ' => 'g', 'ğ' => 'g',
            'İ' => 'i', 'I' => 'i',
            'ı' => 'i', 'i' => 'i',
            'Ö' => 'o', 'ö' => 'o',
            'Ş' => 's', 'ş' => 's',
            'Ü' => 'u', 'ü' => 'u',
        ];

        return strtolower(strtr(trim($name), $map));
    }
}