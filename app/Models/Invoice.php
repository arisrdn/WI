<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function spk()
    {
        return $this->belongsTo(Spk::class, 'spk_id');
    }
}
