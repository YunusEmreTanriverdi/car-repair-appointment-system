<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPmusteriler extends Model
{
    use HasFactory;

    protected $table = 'musteriler';

    protected $fillable = [
        'ad_soyad',
        'marka_id',
        'model_id',
        'ad_normalized',
    ];

    // İlişkiler
    public function marka()
    {
        return $this->belongsTo(StajProjesiMarkalarModel::class, 'marka_id');
    }

    public function model()
    {
        return $this->belongsTo(StajProjesiModellerModel::class, 'model_id');
    }

    // Türkçe karakter normalize fonksiyonu
    public static function normalizeName(string $name): string
    {
        $map = [
            'Ç' => 'c', 'ç' => 'c',
            'Ğ' => 'g', 'ğ' => 'g',
            'İ' => 'i', 'I' => 'i',
            'Ö' => 'o', 'ö' => 'o',
            'Ş' => 's', 'ş' => 's',
            'Ü' => 'u', 'ü' => 'u',
        ];
        return strtolower(strtr($name, $map));
    }

    // ad_soyad set edilince otomatik normalize kolonunu doldurur
    public function setAdSoyadAttribute($value)
    {
        $this->attributes['ad_soyad'] = $value;
        $this->attributes['ad_normalized'] = self::normalizeName($value);
    }
}
