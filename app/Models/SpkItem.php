<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpkItem extends Model
{
    //
    public function spk()
    {
        return $this->belongsTo(Spk::class,'spk_id');
    }
    public function toko()
    {
        return $this->belongsTo(Toko::class,'toko_id');
    }
    public function laporanMtc()
    {
        return $this->hasMany(LaporanMtc::class,'spk_item_id');
    }
    public function detailHarga()
    {
        return $this->hasOne(DetailHarga::class,'spk_item_id','id');
    }
}
