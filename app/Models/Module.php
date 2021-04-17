<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
    const MODEL_NAME = 'Module';

    public function parent()
    {
        return $this->belongsTo(Module::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Module::class, 'parent_id');
    }

    public function moduleAccess()
    {
        return $this->hasMany(ModuleAkses::class,'module_id','id');
    }
    public function module()
    {
        return $this->hasMany(ModuleAkses::class,'module_id','id');
    }
    public function module_akses()
    {
        return $this->hasMany(ModuleAkses::class,'module_id','id');
    }

}
