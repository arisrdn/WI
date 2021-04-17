@extends('layouts.app')

@section('title', config('data.T.dc'))

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Data Branch</h5>
                        <div class="ibox-tools">
                            <a href="{{url()->previous()}}" class="btn btn-primary " {{--}data-toggle="modal" data-target="#modalBuat"--}}>Kembali</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="POST" action="{{route('branch.update',$update->id)}}" accept-charset="UTF-8">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <input type="hidden" name="jenis_toko" value="1">
                            <input type="hidden" name="area" value="">
                            <div class="form-group"><label class="col-lg-2 control-label">Nama Branch</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="masukan nama branch" class="form-control" name="nama" required value="{{$update->nama_toko}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Kode Branch</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="masukan kode Branch" class="form-control" name="kode_toko" required value="{{$update->kode_toko}}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">PIC</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="masukan pic branch" class="form-control" name="pic" value="{{$update->pic}}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Tlp</label>
                                <div class="col-lg-10">
                                    <input type="number" placeholder="masukan no Tlp" class="form-control" name="tlp" value="{{$update->tlp }}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Alamat</label>
                                <div class="col-lg-10">
                                    <textarea name="alamat" rows="2" placeholder="masukan Alamat branch" class="form-control">{{$update->alamat}}</textarea>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Koordinat</label>
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Lat" class="form-control" name="lat" value="{{$update->lat}}">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Lng" class="form-control" name="lng" value="{{$update->lng}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <button class="btn btn-warning" type="submit">Reset</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
