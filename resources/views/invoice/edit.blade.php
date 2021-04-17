@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Invoice No: {{$invoice->no_invoive}}</h5>
                        <div class="ibox-tools">
                            {{--<a href="" class="btn btn-primary " data-toggle="modal" data-target="#modalBuat">Buat Invoice</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">

                            <form class="form-horizontal" method="post" action="{{route('invoice.update',$invoice->id)}}">
                                <div class="modal-body">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <input type="hidden" value="{{$invoice->spk->id}}" name="spk_id">
                                    <div class="form-group"><label class="col-lg-2 control-label">Inv No</label>
                                        <div class="col-lg-6"><input type="text" readonly class="form-control" value="{{$invoice->no_invoice}}" name="no_invoice" required>
                                        </div>
                                        <div class="col-lg-4"><input type="text" readonly class="form-control" VALUE="{{date('d.m.Y')}}" name="tanggal" required>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-10">
                                            <div class="" id="">
                                                <div class=" input-group" id="">
                                                    <span class="input-group-addon"> ppn </span>
                                                    <input type="number" class="input-sm form-control" name="ppn" required value="{{$invoice->ppn}}"/>
                                                    <span class="input-group-addon"> bayar % </span>
                                                    <input type="number" class="input-sm form-control" required placeholder="" name="persen" value="{{$invoice->persen}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">U.N</label>
                                        <div class="col-lg-10">
                                            <input name="untuk" class="form-control" placeholder="kepada .." value="{{$invoice->tujuan}}">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Ket.</label>
                                        <div class="col-lg-10">
                                            <textarea name="keterangan" id="" rows="2" class="form-control" placeholder="keterangan pembayaran">{{$invoice->keterangan}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Alamat</label>
                                        <div class="col-lg-10">
                                            <textarea name="alamat" id="" rows="2" placeholder="alamat tujuan" class="form-control">{{$invoice->alamat}}</textarea>
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