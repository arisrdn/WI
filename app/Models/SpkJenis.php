<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpkJenis extends Model
{
    //
    public function spk()
    {
        return $this->hasMany(Spk::class,'spk_jenis_id');
    }
}
