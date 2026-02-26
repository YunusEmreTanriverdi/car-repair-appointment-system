<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPServisBilgisi extends Model
{
    use HasFactory;

    protected $table = 'sp_servis_bilgisi';

    protected $fillable = [
        'musteri_id',
        'marka_id',
        'model_id',
        'tamir_turu_id',
        'tamir_yeri_id',
        'tarih',
        'saat',
        'aciklama'
    ];

    public function musteri()
    {
        return $this->belongsTo(SPmusteriler::class, 'musteri_id');
    }

    public function marka()
    {
        return $this->belongsTo(StajProjesiMarkalarModel::class, 'marka_id');
    }

    public function model()
    {
        return $this->belongsTo(StajProjesiModellerModel::class, 'model_id');
    }

    public function tamirTuru()
    {
        return $this->belongsTo(SPTamirTurleri::class, 'tamir_turu_id');
    }

    public function tamirYeri()
    {
        return $this->belongsTo(SPTamirYerleri::class, 'tamir_yeri_id');
    }
}
