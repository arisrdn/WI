<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    //
    public function toko()
    {
        return $this->belongsToMany(Toko::class,'spk_items');
    }

    public function spkJenis()
    {
        return $this->belongsTo(SpkJenis::class,'spk_jenis_id');
    }
        public function branch()
    {
        return $this->belongsTo(Toko::class,'branch_id');
    }
    //
    public function spkItem()
    {
        return $this->belongsToMany(Toko::class, 'spk_items');
    }
    public function spkItem2()
    {
        return $this->hasMany(SpkItem::class, 'spk_id');
    }
    public function detailHarga()
    {
        return $this->hasMany(DetailHarga::class, 'spk_id');
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'spk_id');
    }
    public function suratTugas()
    {
        return $this->hasMany(SuratTugas::class, 'spk_id');
    }

}
