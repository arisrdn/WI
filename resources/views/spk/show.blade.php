@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data SPK  - {{$spk->no_spk}}</h5>
                        <div class="ibox-tools">
                            {{--<a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">tambah toko Baru</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="col-lg-6">
                            <form class="form-inline" method="POST" action="{{route('spk-item.store')}}" accept-charset="UTF-8">
                                    {{csrf_field()}}
                                    {{method_field('post')}}
                                    <input type="hidden" name="area" value="{{$spk->branch->id}}">
                                    <div class="input-group">
                                <label class="">Pilih Toko</label>
                                <input type="hidden" name="spk_id" value="{{$spk->id}}">
                                <select data-placeholder="pilih toko..." class="chosen-select form-control" name="toko_id">
                                    <option value=""></option>
                                    @foreach($toko as $toko)
                                        <option  value="{{$toko->id}}">{{$toko->kode_toko}} - {{$toko->nama_toko}}</option  >
                                    @endforeach
                                </select>
                                    <span class="input-group-btn"><button class="btn btn-primary btn-sm" type="submit">+</button></span>
                                </div>
                        </form>
                        </div>
                            <a href="" class="btn btn-success " data-toggle="modal" data-target="#modalBuat">tambah toko Baru</a>

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
                                @foreach($spk->spkItem as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                            <td>{{$data->kode_toko}} </td>
                                        <td>{{$data->nama_toko}}</td>
                                        <td>
                                            <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{action('SpkItemController@destroy',[$spk->id,$data->id])}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
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