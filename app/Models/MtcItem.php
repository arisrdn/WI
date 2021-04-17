<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MtcItem extends Model
{
    public function laporanMtc()
    {
        return $this->belongsTo(LaporanMtc::class,'laporan_mtc_id');
    }

}
