<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPTamirTurleri extends Model
{
    protected $table = 'tamir_turleri';
    protected $fillable = ['ad'];

     public function yerler()
    {
        return $this->hasMany(SPTamirYerleri::class, 'tamir_turu_id');
    }
}
