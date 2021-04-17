@extends('layouts.app')

@section('title',  config('data.T.st'))

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Surat Tugas No: {{$surat->no_st}}</h5>
                        <div class="ibox-tools">
                            {{--<a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">Buat Invoice</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" method="post" action="{{route('surat-tugas.store')}}">
                            <div class="modal-body">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="form-group"><label class="col-lg-2 control-label">Inv No</label>
                                    <div class="col-lg-10"><input type="text" readonly class="form-control" value="{{$surat->no_st}}" name="no_st" required>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Tgl</label>
                                    <div class="col-lg-10">
                                        <div class="" id="data_5">
                                            <div class="input-daterange input-group" id=" datepicker">
                                                <input type="text" class="input-sm form-control" name="tanggal_1" required value="{{$surat->tanggal_1}}"/>
                                                <span class="input-group-addon"> sampai </span>
                                                <input type="text" class="input-sm form-control" name="tanggal_2" value="{{$surat->tanggal_2}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Spk</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-b" name="spk_id">
                                            <option value="">-Pilih-</option>
                                            @foreach($spk as $spk)
                                                <option value="{{$spk->id}}"@if($spk->id == $surat->spk_id) selected @endif>{{$spk->no_sk}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Pegawai</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-b" name="pegawai_id">
                                            <option value="">-Pilih-</option>
                                            @foreach($pegawai as $p)
                                                <option value="{{$p->id}}"@if($p->id == $surat->pegawai_id) selected @endif>{{$p->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Kegiatan</label>
                                    <div class="col-lg-10">
                                        <textarea name="kegiatan" id="" rows="2" class="form-control" placeholder="kegiatan yang di tugaskans">{{$surat->kegiatan}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal BUAT --}}
@endsection
@section('css')
    <style>
        .hide{
            visibility: hidden;
        }
    </style>
@endsection
@section('scripts')
    @parent
    <!-- Page-Level Scripts -->
    <script>
        $("#clik").click(function () {
            $('.edit').each(function () {
                if ($(this).attr('readonly')){
                    $(this).removeAttr('readonly');
                    $('.simpan').removeClass('hide');
                }else {
                    $(this).attr({'readonly':'readonly'});
                    $('.simpan').addClass('hide');
                }
            })
        })
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