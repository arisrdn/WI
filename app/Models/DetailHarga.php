<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailHarga extends Model
{
    public function spkItem()
    {
        return $this->belongsTo(SpkItem::class,'spk_item_id');
    }
    public function spk()
    {
        return $this->belongsTo(Spk::class,'spk_id');
    }
}
