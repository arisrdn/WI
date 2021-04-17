@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Laporan  - {{$spk->no_spk}}</h5>
                        <div class="ibox-tools">
                            {{--<a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">tambah toko Baru</a>--}}
                        </div>
                    </div>
                    {{--<div class="ibox-content">--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<h2></h2>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    <div class="ibox-content">
                    <div class="row">
                            {{--<input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">--}}
                            {{--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
                            <table class="table table-striped table-bordered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Kode Toko</th>
                                    <th>Nama Toko</th>
                                    <th>Laporan tahap 1</th>
                                    <th>Laporan Tahap 2</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($spk->spkItem2 as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->toko->kode_toko}} </td>
                                        <td>{{$data->toko->nama_toko}} </td>
                                        <td>
                                            @if(count($data->laporanMTC) == 0)
                                                <form action="{{route('store2',$data->id)}}" method="post">
                                                    @csrf @method('post')
                                                    <input type="hidden" name="spk_item" value="{{$data->id}}">
                                                    <input type="hidden" name="priode" value="1">
                                                    <button type="submit" class="btn btn-primary btn-sm">Buat Laporan</button>
                                                </form>
                                            @elseif(count($data->laporanMTC) >= 1)
                                                <a href="{{route('show.mtc',[$data->id,1])}}" class="btn btn-success btn-sm">Lihat</a>
                                            @endif
                                        </td>
                                        <td>@if(count($data->laporanMTC) == 1)
                                                <form action="{{route('store2',$data->id)}}" method="post">
                                                    @csrf @method('post')
                                                    <input type="hidden" name="spk_item" value="{{$data->id}}">
                                                    <input type="hidden" name="priode" value="2">
                                                    <button type="submit" class="btn btn-primary btn-sm">Buat Laporan</button>
                                                </form>
                                            @elseif(count($data->laporanMTC) == 2)
                                                <a href="{{route('show.mtc',[$data->id,2])}}" class="btn btn-success btn-sm">Lihat</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal BUAT --}}
    <div class="modal inmodal" id="modalBuat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Tambah Toko</h4>
                    <small class="font-bold"></small>
                </div>
                <form class="form-horizontal" method="POST" action="{{route('spk-item.store')}}" accept-charset="UTF-8">
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <input type="hidden" name="jenis_toko" value="2">
                        <input type="hidden" name="area" value="{{$spk->branch->id}}">
                        <input type="hidden" name="spk_id" value="{{$spk->id}}">
                        <input type="hidden" name="a" value="new">
                        <div class="form-group"><label class="col-lg-3 control-label">Nama Toko</label>
                            <div class="col-lg-9">
                                <input type="text" placeholder="masukan nama toko" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Kode Toko</label>
                            <div class="col-lg-9">
                                <input type="text" placeholder="masukan kode toko" class="form-control" name="kode_toko" required>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">PIC</label>
                            <div class="col-lg-9">
                                <input type="text" placeholder="masukan pic toko" class="form-control" name="pic">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Tlp</label>
                            <div class="col-lg-9">
                                <input type="number" placeholder="masukan no Tlp" class="form-control" name="tlp">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-9">
                                <textarea name="alamat" rows="2" placeholder="masukan Alamat branch" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Koordinat</label>
                            <div class="col-lg-5">
                                <input type="text" placeholder="Lat" class="form-control" name="lat">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" placeholder="Lng" class="form-control" name="lng">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form method="POST" action="{{url('/')}}" accept-charset="UTF-8" class="formDelete2 half-width right">
        {{csrf_field()}}
        {{method_field('delete')}}
    </form>
    <div class="modal inmodal" id="konfirmasi2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h6 class="modal-title">Apakah anda yakin ?</h6>
                    <div style="margin-top:15px">
                        <input type="button" class="btn btn-primary btnYes2" value="Ya">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <!-- Page-Level Scripts -->
    <script>
        $('#data_5 .input-daterange').datepicker({
            format:'yyyy-mm-dd',
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
        var id = null;
        $('.btnDelete2').click(function () {
            id = $(this).data('id');
            $('.formDelete2').attr('action', id);
        });
        $('.btnYes2').click(function () {
            $('.formDelete2').submit();
        });

        $('.chosen-select').chosen();


    </script>
@endsection