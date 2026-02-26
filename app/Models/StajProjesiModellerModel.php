<?php

namespace App\Models;

use App\Models\StajProjesiMarkalarModel;
use Illuminate\Database\Eloquent\Model;

class StajProjesiModellerModel extends Model
{
    protected $table = 'arac_modelleri';
    protected $fillable = ['marka_id', 'ad'];

    public function marka()
    {
        return $this->belongsTo(StajProjesiMarkalarModel::class, 'marka_id');
// "Bu model, marka_id foreign key sütununu kullanarak bir tane StajProjesiMarkalarModel (yani marka) ile ilişkilidir."

// belongsTo(...): Bu modelin, başka bir modele ait olduğunu belirtir. Yani bu modelin sahibi başka bir modeldir.
// StajProjesiMarkalarModel::class: İlişki kurulan modelin adı (yani markalar tablosunun modeli).
// 'marka_id': Bu modelde (yani içinde bu kodun olduğu modelde) bulunan foreign key sütunu. Hangi markaya ait olduğunu gösterir.
   
  }
}
