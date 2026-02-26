<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AracProjesiModel extends Model
{
    protected $table = 'araclar';   // Modelin hangi veritabanı tablosuyla ilişkilendirileceğini belirler.
    protected $fillable=['adSoyad','marka','model','yil'];
}
