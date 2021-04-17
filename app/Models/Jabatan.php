<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    //
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
    public $incrementing = false;


    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'jabatan_id');
    }

    public function moduleAccess()
    {
        return $this->hasMany(ModuleAkses::class, 'jabatan_id');
    }
}
