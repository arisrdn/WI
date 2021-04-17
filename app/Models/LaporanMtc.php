<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanMtc extends Model
{

    public function mtcDetail()
    {
        return $this->hasMany(MtcItem::class,'laporan_mtc_id');
    }

    public function spkItem()
    {
        return $this->belongsTo(SpkItem::class,'spk_item_id');
    }
}
