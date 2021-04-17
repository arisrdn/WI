<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
//class Pegawai extends Model
{
    use Notifiable;
    //
    use SoftDeletes;
//    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    const MODEL_NAME = 'Pegawai';
    protected $hidden = [
        'created_at'
        , 'updated_at'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//    public function jenisKelamin()
//    {
//        return $this->belongsTo(JenisKelamin::class, 'jk_id');
//    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class,'jabatan_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//    public function desa()
//    {
//        return $this->belongsTo("App\Models\Lokasi\Desa",'desa_id');
//    }
    public function suratTugas()
    {
        return $this->hasMany(SuratTugas::class,'pegawai_id');
    }


}
