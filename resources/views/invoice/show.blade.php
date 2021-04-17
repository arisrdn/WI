@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Invoice SPK No: {{$spk->no_spk}}</h5>
                        <div class="ibox-tools">
                            <a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">Buat Invoice</a>
                        </div>
                    </div>
                    {{--<div class="ibox-content">--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<h2></h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="ibox-content">
                    <div class="row">
                            <table class="table table-striped table-bordered " style="width:100%">
                                <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>No Invoice</th>
                                    <th>Cabang</th>
                                    <th>tanggal</th>
                                    <th>status</th>
                                    <th>percent</th>
                                    <th>aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($spk->invoice as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->no_invoice}} </td>
                                        <td>{{$spk->branch->nama_toko}} </td>
                                        <td>{{$data->id}}{{date('d-m-Y',strtotime($data->created_at))}}</td>
                                        <td>
                                        @if($data->status <= 0)
                                                <form action="{{route('inv.konfirmasi',22)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="spk_id" value="{{$spk->id}}">
                                                    <input type="hidden" name="inv_id" value="ok">
                                                    <button type="submit" class="btn btn-default btn-xs">Konfirmasi</button>
                                                </form>
                                            @else
                                            <span class="badge badge-primary">
                                                <i class="fa fa-check succes"></i>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            @php $pr=$data->persen/100*$harga @endphp
                                            {{rupiah($pr,3)}}&nbsp;&nbsp;&nbsp;({{$data->persen}} %)
                                        </td>
                                        <td>
                                            <a href="{{route('inv.show',1)}}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-book"></i></a>
                                            <a href="{{route('invoice.edit',$data->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-lg-12">
                                <div class="col-lg-4 col-lg-offset-4">
                                </div>
                            </div>
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
                    <h4 class="modal-title">Buat Invoice</h4>
                    <small class="font-bold"></small>
                </div>
                <form class="form-horizontal" method="post" action="{{route('invoice.store')}}">
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <input type="hidden" value="{{$spk->id}}" name="spk_id">
                        <div class="form-group"><label class="col-lg-2 control-label">Inv No</label>
                            <div class="col-lg-6"><input type="text" readonly class="form-control" value="{{$noinvoice}}" name="no_invoice" required>
                            </div>
                            <div class="col-lg-4"><input type="text" readonly class="form-control" VALUE="{{date('d.m.Y')}}" name="tanggal" required>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label"></label>
                            <div class="col-lg-10">
                                <div class="" id="">
                                    <div class=" input-group" id="">
                                        <span class="input-group-addon"> ppn </span>
                                        <input type="number" class="input-sm form-control" name="ppn" required/>
                                        <span class="input-group-addon"> bayar % </span>
                                        <input type="number" class="input-sm form-control" required placeholder="" name="persen" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">U.N</label>
                            <div class="col-lg-10">
                                <input name="untuk" class="form-control" placeholder="kepada ..">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Ket.</label>
                            <div class="col-lg-10">
                                <textarea name="keterangan" id="" rows="2" class="form-control" placeholder="keterangan pembayaran"></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Alamat</label>
                            <div class="col-lg-10">
                                <textarea name="alamat" id="" rows="2" placeholder="alamat tujuan" class="form-control"></textarea>
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