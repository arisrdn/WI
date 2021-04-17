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
                    </div>
                    <form action="{{route('pemeliharaan.store')}}" method="post" enctype='multipart/form-data'>
                        <div class="ibox-content">
                            <div class="row">
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
                                    <div class=" activity-header" fundingActivityHeader="" style="padding: 10px 0 0 0;border:none">
                                    <div class="col-lg-12 col-md-12">
                                        <input type="button" class="btn btn-primary btnAdd" value="Tambah Item">
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <table class="table table-bordered" style="margin-top: 10px">
                                            <thead>
                                            <th width="35%">keterangan</th>
                                            <th width="30%">Sebelum</th>
                                            <th width="30%">Sesudah</th>
                                            <th width="5%">Aksi</th>
                                            </thead>
                                            <tbody>
                                            <tr id="iTemplate">
                                                <td>
                                                    <input class="form-control nama" style="font-size:11pt;width:100%" type="text"></td>
                                                <td>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
                                                <span class="fileinput-exists">Ganti</span><input type="file"  class="sebelum" accept="image/*"/></span>
                                                        <span class="fileinput-filename"></span>
                                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
                                                        <span class="fileinput-exists">Ganti</span><input type="file" class="sesudah" accept="image/*"/></span>
                                                        <span class="fileinput-filename"></span>
                                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <a class="btnDelete">
                                                            <span class="glyphicon glyphicon-minus-sign icon-add" style="font-size:30px; color: red;"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-footer clear-both center row-spacing">
                            <button type="submit" class="btn btn-success" >Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Preview Photo -->
    <div class="modal inmodal" id="modalIdentityPhoto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-body modal-body-custom" style="padding:5px">
                    <label style="padding-bottom:10px">Foto KTP</label>
                    {{--<div>{{ Html::image(asset('/assets/img/rails_logo.png'), 'photo', ['style' => 'width:100%', 'id' => 'identityPhoto']) }}</div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="modalFamilyCardPhoto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-body modal-body-custom" style="padding:5px">
                    <label style="padding-bottom:10px">Foto Kartu Keluarga</label>
                    {{--<div>{{ Html::image(asset('/assets/img/rails_logo.png'), 'photo', ['style' => 'width:100%', 'id' => 'familyCardPhoto']) }}</div>--}}
                </div>
            </div>
        </div>
    </div>
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
        var count = 0;
        $('.btnAdd').click(function () {
            var parent = $('.activity-header').has($(this));
            var table = $('table', parent);
            var e = $('tr#iTemplate', table).clone().removeAttr('id').addClass('data-loop');
            $('.nama', e).attr('name', 'kegiatan[' + (count) + '][nama]').attr('required');
            $('.sebelum', e).attr('name', 'kegiatan[' + (count) + '][sebelum]');
            $('.sesudah', e).attr('name', 'kegiatan[' + (count) + '][sesudah]');

            count++;
            $('tr#iTemplate', table).before(e);
        });
        $('body').on('click', 'a.btnDelete', function () {
            var tr = $('tr').has($(this));
            tr.remove();
            $('input.funding_nominal').change();
        });
        // $('body').on('keyup keydown change', 'input.biaya_admin', function () {
        //   var inputs = $('input.biaya_admin');
        //   var inputs1 = $('input.funding_nominal');
        //   var total = 0;
        //   var tot = 0;
        //   var total1 = 0;
        //   $.each(inputs1, function (k, v) {
        //     total += $(v).val();
        //     $.each(inputs, function (k, t) {
        //       var a = (total/100) * $(t).val();
        //       tot +=  a ;
        //     });
        //   });
        //   $('th.admin').text(tot);
        //   // $('').val(total);
        // });
    </script>
@endsection
