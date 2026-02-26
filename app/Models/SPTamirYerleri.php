<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPTamirYerleri extends Model
{
    protected $table = 'tamir_yerleri';
    protected $fillable = ['ad', 'tamir_turu_id'];

    public function tur()
    {
        return $this->belongsTo(SPTamirTurleri::class, 'tamir_turu_id');
    }
}
