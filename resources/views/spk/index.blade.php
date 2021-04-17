@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data SPK</h5>
                        <div class="ibox-tools">
                            <a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">Buat SPK Baru</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{--<input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">--}}
                            {{--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
                            <table class="table table-striped table-bordered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:5%"></th>
                                    <th>cabang</th>
                                    <th>No SPK</th>
                                    <th>jenis SPK</th>
                                    <th >Tanggal Mulai</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($spk as $spk)
                                <tr @if($spk['tgl_akhir'] < \Carbon\Carbon::now()) class="warning"@endif>
                                    <td>{{$i++}}</td>
                                    <td>{{$spk->branch['nama_toko']}}</td>
                                    <td>{{$spk['no_spk']}}</td>
                                    <td>{{$spk->spkJenis['nama']}}</td>
                                    <td>{{$spk['tgl_mulai']}}</td>
                                    <td>
                                        <a class="btn btn-outline btn-primary btn-xs" href="{{route('spk.show',$spk->id)}}"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></a>
                                        <a class="btn btn-outline btn-warning btn-xs" href="{{route('spk.edit',$spk->id)}}"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>
{{--                                        <a  href="{{ route('spk-jenis.edit', $jenis->id) }}"></a>--}}
{{--                                        @if(count($) == 0)--}}
                                            <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{$spk->id}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                </i>
                                            </a>
                                    </td>
                                </tr>
                              @endforeach
                                </tbody>
                                <tfoot>
                                {{--<tr>--}}
                                    {{--<td colspan="5">--}}
                                        {{--<ul class="pagination pull-right"></ul>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                </tfoot>
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
    {{--modals--}}
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
    {{--Modal BUAT --}}
    <div class="modal inmodal" id="modalBuat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Buat SPK</h4>
                    <small class="font-bold"></small>
                </div>
                <form class="form-horizontal" method="post" action="{{route('spk.store')}}">
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="form-group"><label class="col-lg-3 control-label">No spk</label>
                            <div class="col-lg-9"><input type="text" placeholder="Masukan No Spk" class="form-control" name="no_spk" required>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Jenis SPK</label>
                            <div class="col-lg-9">
                            <select class="form-control m-b" name="jenis_spk">
                                <option value="">-Pilih-</option>
                                @foreach($jenisSpk as $jenis)
                                <option value="{{$jenis->id}}">{{$jenis->nama}}</option>
                                 @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Cabang</label>
                            <div class="col-lg-9">
                                <select class="form-control m-b" name="branch">
                                    <option value="">-Pilih-</option>
                                    @foreach($branch as $cabang)
                                        <option value="{{$cabang->id}}">{{$cabang->nama_toko}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="form-group"><label class="col-lg-3 control-label">Tanggal</label>
                                <div class="col-lg-9">
                                    <div class="" id="data_5">
                                        <div class="input-daterange input-group" id=" datepicker">
                                            <input type="text" class="input-sm form-control" name="tgl_mulai" required/>
                                            <span class="input-group-addon"> sampai </span>
                                            <input type="text" class="input-sm form-control" name="tgl_akhir" />
                                        </div>
                                    </div>
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
        var baseURL = '{{url('/')}}';
        $('.btnDelete2').click(function () {
            id = $(this).data('id');
            $('.formDelete2').attr('action', baseURL+'/spk/'+id);
        });
        $('.btnYes2').click(function () {
            $('.formDelete2').submit();
        });

    </script>
@endsection