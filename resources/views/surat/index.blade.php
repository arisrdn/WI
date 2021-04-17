@extends('layouts.app')

@section('title', config('data.T.st'))

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Surat Tugas </h5>
                        <div class="ibox-tools">
                            <a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">Buat Surat</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{--<input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">--}}
                            {{--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
                            <table class="table table-striped table-bordered table-hovered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th width="15%">No Surat</th>
                                    <th>Kegiatan</th>
                                    <th>Petugas</th>
                                    <th width="20%">Tanggal</th>
                                    <th>aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($surat as $st)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$st->no_st}}</td>
                                        <td>{{$st->kegiatan}}</td>
                                        <td>{{$st->pegawai->nama}}</td>
                                        <td>
                                            @if($st->tanggal_2 != null)
                                                {{$st->pegawai->tanggal_1}} s/d {{$st->pegawai->tanggal_1}}
                                            @else
                                                {{$st->pegawai->tanggal_1}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('surat-tugas.show',$st->id)}}" class="btn btn-success btn-xs"><i class="fa fa-folder-open-o"></i> </a>
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
    {{--Modal BUAT --}}
    <div class="modal inmodal" id="modalBuat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Buat Surat Tugas</h4>
                    <small class="font-bold"></small>
                </div>
                <form class="form-horizontal" method="post" action="{{route('surat-tugas.store')}}">
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="form-group"><label class="col-lg-2 control-label">Inv No</label>
                            <div class="col-lg-10"><input type="text" readonly class="form-control" value="{{$no}}" name="no_st" required>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Tgl</label>
                            <div class="col-lg-10">
                                <div class="" id="data_5">
                                    <div class="input-daterange input-group" id=" datepicker">
                                        <input type="text" class="input-sm form-control" name="tanggal_1" required/>
                                        <span class="input-group-addon"> sampai </span>
                                        <input type="text" class="input-sm form-control" name="tanggal_2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Spk</label>
                            <div class="col-lg-10">
                                <select class="form-control m-b" name="spk_id">
                                    <option value="">-Pilih-</option>
                                    @foreach($spk as $sp)
                                        <option value="{{$sp->id}}">{{$sp->no_spk}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Pegawai</label>
                            <div class="col-lg-10">
                                <select class="form-control m-b" name="pegawai_id">
                                    <option value="">-Pilih-</option>
                                    @foreach($pegawai as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Kegiatan</label>
                            <div class="col-lg-10">
                                <textarea name="kegiatan" id="" rows="2" class="form-control" placeholder="kegiatan yang di tugaskans"></textarea>
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