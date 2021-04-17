<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    public function spkItem()
    {
        return $this->hasMany(SpkItem::class,'toko_id');
    }
    public function spkItem2()
    {
        return $this->hasMany(SpkItem::class,'toko_id');
    }
    public function toko()
    {
        return $this->hasMany(Toko::class,'coverage_area');
    }
    public function branch()
    {
        return $this->belongsTo(Toko::class,'coverage_area','id');
    }
    public function spkbranch()
    {
        return $this->hasMany(Spk::class,'branch_id');
    }
}

//
//<div class="form-group">
//                                        <label class="col-sm-1 control-label">Normal</label>
//                                        <div class="col-sm-3">
//                                            <input type="text"  class="form form-control" value="{{$laporan->spkItem->spk->no_spk}}" readonly></div>
//                                        <label class="col-sm-1 col-md-offset-2 control-label">Normal</label>
//                                        <div class="col-sm-3"> <input type="text" readonly value="{{$laporan->priode}}" class="form form-control"></div>
//                                    </div>
//                                    <div class="form-group">
//                                        <label class="col-sm-1 control-label">Foto Toko</label>
//                                        <div class="col-sm-3">
//                                            <div class="fileinput fileinput-new" data-provides="fileinput">
//                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
//                                                <span class="fileinput-exists">Ganti</span><input type="file" name="toko_img" accept="image/*"/></span>
//                                                <span class="fileinput-filename"></span>
//                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
//                                            </div>
//                                        </div>
//                                        <label class="col-sm-1 col-md-offset-2 control-label">Scan</label>
//                                        <div class="col-sm-3">
//                                            <div class="fileinput fileinput-new" data-provides="fileinput">
//                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
//                                                <span class="fileinput-exists">Ganti</span><input type="file" name="scan_img" accept="image/*"/></span>
//                                                <span class="fileinput-filename"></span>
//                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
//                                            </div>
//                                            <input type="file" name="scan_i" accept="image/*"/>
//                                        </div>
//                                    </div>