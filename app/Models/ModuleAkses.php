<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleAkses extends Model
{
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
    const MODEL_NAME = 'Module Access';

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id','id');
    }

    public function employeeRole()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
}
