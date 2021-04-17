@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit SPK ({{$spk->no_spk}})</h5>
                        <div class="ibox-tools">
                            <a href="{{route('spk.index')}}" class="btn btn-primary ">kembali</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="post" action="{{route('spk.update',$spk->id)}}">
                            <div class="modal-body">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="form-group"><label class="col-lg-3 control-label">No spk</label>
                                    <div class="col-lg-9"><input type="text" placeholder="Masukan No Spk" class="form-control" name="no_spk" required value="{{$spk->no_spk}}">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">Jenis SPK</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-b" name="jenis_spk">
                                            <option value="">-Pilih-</option>
                                            @foreach($jenisSpk as $jenis)
                                                <option value="{{$jenis->id}}" @if($jenis->id==$spk->spk_jenis_id) selected @endif>{{$jenis->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">Cabang</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-b" name="branch">
                                            <option value="">-Pilih-</option>
                                            @foreach($branch as $cabang)
                                                <option value="{{$cabang->id}}" @if($cabang->id==$spk->branch_id) selected @endif>{{$cabang->nama_toko}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-3 control-label">Tanggal</label>
                                    <div class="col-lg-9">
                                        <div class="" id="data_5">
                                            <div class="input-daterange input-group" id=" datepicker">
                                                <input type="text" class="input-sm form-control" name="tgl_mulai" required value="{{$spk->tgl_mulai}}"/>
                                                <span class="input-group-addon"> sampai </span>
                                                <input type="text" class="input-sm form-control" name="tgl_akhir" value="{{$spk->tgl_akhir}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <!-- Page-Level Scripts -->

@endsection