<?php

namespace App\Models;

use App\Models\StajProjesiModellerModel;
use Illuminate\Database\Eloquent\Model;

class StajProjesiMarkalarModel extends Model
{
    protected $table = 'arac_markalari'; // Ana tablo markalar
    protected $fillable = ['ad'];

    public function modeller()
    {
        return $this->hasMany(StajProjesiModellerModel::class, 'marka_id'); 
// "Bu modelin, marka_id foreign key sütunu üzerinden birden fazla StajProjesiModellerModel kaydıyla ilişkisi vardır."

// hasMany(...): Laravel’in Eloquent ORM fonksiyonu. Bu modelin, başka bir modelle bire çok ilişkisi olduğunu belirtir.
// StajProjesiModellerModel::class: İlişki kurulan modelin adı. Yani bu modelin birçok "model"i olabilir.
// 'marka_id': StajProjesiModellerModel tablosunda yer alan foreign key. Bu anahtar, hangi markaya ait olduğunu belirtir.
    
}
}
