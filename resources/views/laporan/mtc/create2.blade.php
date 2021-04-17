@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Buat Laporan <small>Membuat laporan maintenance</small></h5>
                        <div class="ibox-tools">
                            {{--back--}}
                            <a href="{{url()->previous()}}" class="btn btn-primary " {{--}data-toggle="modal" data-target="#modalBuat"--}}>Kembali</a>
                        </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <form action="{{route('pemeliharaan.store')}}" method="post" enctype='multipart/form-data'>
                                    {{method_field('post')}}
                                    {{csrf_field()}}
                                    <input type="hidden" name="lap_id" value="{{$laporan->id}}">
                                    <div class="col col-lg-12 form-horizontal" style="border:2px">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">No SPK</label>
                                            <div class="col-sm-3">
                                                <input type="text"  class="form form-control" value="{{$laporan->spkItem->spk->no_spk}}" readonly></div>
                                            <label class="col-sm-1 col-md-offset-2 control-label">Priode</label>
                                            <div class="col-sm-3"> <input type="text" readonly value="{{$laporan->priode}}" class="form form-control"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Foto Toko</label>
                                            <div class="col-sm-3">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
                                                <span class="fileinput-exists">Ganti</span><input type="file" name="toko_img" accept="image/*"/></span>
                                                    <span class="fileinput-filename"></span>
                                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 col-md-offset-2 control-label">Scan</label>
                                            <div class="col-sm-3">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
                                                <span class="fileinput-exists">Ganti</span><input type="file" name="scan_img" accept="image/*"/></span>
                                                    <span class="fileinput-filename"></span>
                                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <div class=" activity-header" fundingActivityHeader="" style="padding: 10px 0 0 0;border:none">
                                        <div class="col-lg-12 col-md-12">
                                            <input type="button" class="btn btn-primary btnAdd" value="Tambah Item">
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <table class="table table-striped table-bordered dataTables" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    <th>Kode Lokasi(Branch/Toko)</th>
                                                    <th>Nama Lokasi (Branch/Toko)</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i=1; @endphp
                                                @foreach($laporan->mtcDetail as $data)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$data->kode_toko}} </td>
                                                        <td>{{$data->nama_toko}}</td>
                                                        <td>
                                                            <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{action('SpkItemController@destroy',[$laporan->id,$data->id])}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                                <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                                </i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-footer clear-both center row-spacing">
                                <button type="submit" class="btn btn-success" >Simpan</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Preview Photo -->

@endsection
@section('css')
    <link href="{{asset('css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <style>
        #iTemplate {
            display: none;
        }
    </style>
@endsection
@section('scripts')
    <script src='{{asset("js/plugins/jasny/jasny-bootstrap.min.js")}}'></script>
    <script>

    </script>
@endsection


@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data SPK  - {{$laporan->no_spk}}</h5>
                        <div class="ibox-tools">
                            {{--<a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">tambah toko Baru</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form class="form-inline" method="POST" action="{{route('spk-item.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="col col-lg-12 form-horizontal" style="border:2px">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">No SPK</label>
                                        <div class="col-sm-3">
                                            <input type="text"  class="form form-control" value="{{$laporan->spkItem->spk->no_spk}}" readonly></div>
                                        <label class="col-sm-1 col-md-offset-2 control-label">Priode</label>
                                        <div class="col-sm-3"> <input type="text" readonly value="{{$laporan->priode}}" class="form form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Foto Toko</label>
                                        <div class="col-sm-3">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
                                                <span class="fileinput-exists">Ganti</span><input type="file" name="toko_img" accept="image/*"/></span>
                                                <span class="fileinput-filename"></span>
                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                            </div>
                                        </div>
                                        <label class="col-sm-1 col-md-offset-2 control-label">Scan</label>
                                        <div class="col-sm-3">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
                                                <span class="fileinput-exists">Ganti</span><input type="file" name="scan_img" accept="image/*"/></span>
                                                <span class="fileinput-filename"></span>
                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{--<input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">--}}
                            {{--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
                            <table class="table table-striped table-bordered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Kode Lokasi(Branch/Toko)</th>
                                    <th>Nama Lokasi (Branch/Toko)</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($laporan->mtcDetail as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->kode_toko}} </td>
                                        <td>{{$data->nama_toko}}</td>
                                        <td>
                                            <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{action('SpkItemController@destroy',[$laporan->id,$data->id])}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                </i>
                                            </a>
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
