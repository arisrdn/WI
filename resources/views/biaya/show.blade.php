@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Biaya - {{$spk->no_spk}}</h5>
                        <div class="ibox-tools">
                            @if(count($spk->detailHarga) <= 0 )
                                @else
                            <button type="button" class="btn btn-warning" id="clik">edit</button>
                            @endif
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
                        @if(count($spk->detailHarga) <= 0 )
                        <form action="{{route('biaya.store')}}" method="post">
                            @csrf() @method('post')
                            {{--<input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">--}}
                            {{--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
                            <table class="table table-striped table-bordered " style="width:100%">
                                <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Kode Toko</th>
                                    <th>Nama Toko</th>
                                    <th>satuan</th>
                                    <th>harga</th>
                                    <th>qty</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($spk->spkItem2 as $key=>$data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->toko->kode_toko}} </td>
                                        <td>{{$data->toko->nama_toko}} </td>
                                        <td><input class="form-control" style="font-size:11pt;width:100%" type="text" name="biaya[{{$key}}][satuan]" value="paket" >
                                        </td>
                                        <td>
                                            <input type="hidden" name="biaya[{{$key}}][spk_item]" value="{{$data->id}}">
                                            <input type="hidden" name="biaya[{{$key}}][spk_id]" value="{{$data->spk->id}}">
                                            <input class="form-control" style="font-size:11pt;width:100%" type="text" name="biaya[{{$key}}][harga]"></td>
                                        <td><input class="form-control" style="font-size:11pt;width:100%" type="text" name="biaya[{{$key}}][jumlah]"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-lg-12">
                                <div class="col-lg-4 col-lg-offset-4">
                                <button type="submit" class="btn btn-success btn-block">simpan</button>
                                </div>
                            </div>
                        </form>

                            @else
                            <form action="{{route('biaya.update',$spk->id)}}" method="post">
                                @csrf() @method('put')
                                {{--<input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">--}}
                                {{--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter>--}}
                                <table class="table table-striped table-bordered " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th width="4%">#</th>
                                        <th>Kode Toko</th>
                                        <th>Nama Toko</th>
                                        <th>satuan</th>
                                        <th>harga</th>
                                        <th>qty</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($spk->spkItem2 as $ke=>$dat)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$dat->toko->kode_toko}} </td>
                                            <td>{{$dat->toko->nama_toko}} </td>
                                            <td><input readonly class="form-control edit" style="font-size:11pt;width:100%" type="text" name="biaya[{{$ke}}][satuan]" value="@if($dat->detailHarga){{$dat->detailHarga->satuan}}@else paket @endif">
                                            </td>
                                            <td>
                                                <input type="hidden" name="biaya[{{$ke}}][spk_item]" value="{{$dat->id}}">
                                                <input type="hidden" name="biaya[{{$ke}}][spk_id]" value="{{$dat->spk->id}}">
                                                <input readonly class="form-control edit" style="font-size:11pt;width:100%" type="text" name="biaya[{{$ke}}][harga]" value="@if($dat->detailHarga){{$dat->detailHarga->harga}}@endif"></td>
                                            <td><input readonly class="form-control edit" style="font-size:11pt;width:100%" type="text" name="biaya[{{$ke}}][jumlah]" value="@if($dat->detailHarga){{$dat->detailHarga->jumlah}}@endif"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-lg-offset-4">
                                        <button type="submit" class="btn btn-success btn-block simpan hide">simpan</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                        </div>
                    </div>
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