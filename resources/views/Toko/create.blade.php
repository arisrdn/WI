@extends('layouts.app')

@section('title', config('data.T.alfa'))

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Toko</h5>
                        <div class="ibox-tools">
                            <a href="{{url()->previous()}}" class="btn btn-primary " {{--}data-toggle="modal" data-target="#modalBuat"--}}>Kembali</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="POST" action="{{route('toko.store')}}" accept-charset="UTF-8">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <input type="hidden" name="jenis_toko" value="2">
                            <div class="form-group"><label class="col-lg-2 control-label">Nama Toko</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="masukan nama toko" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Kode Toko</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="masukan kode toko" class="form-control" name="kode_toko" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Cabang</label>
                                <div class="col-lg-10">
                                    <select class="form-control m-b" name="area">
                                        <option value="">-Pilih-</option>
                                        @foreach($branch as $cabang)
                                            <option value="{{$cabang->id}}">{{$cabang->nama_toko}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">PIC</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="masukan pic toko" class="form-control" name="pic">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Tlp</label>
                                <div class="col-lg-10">
                                    <input type="number" placeholder="masukan no Tlp" class="form-control" name="tlp">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Alamat</label>
                                <div class="col-lg-10">
                                    <textarea name="alamat" rows="2" placeholder="masukan Alamat Toko" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Koordinat</label>
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Lat" class="form-control" name="lat">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Lng" class="form-control" name="lng">
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
