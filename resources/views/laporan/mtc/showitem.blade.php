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
                                    <div class="col col-lg-6 form-horizontal" style="border:2px">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">No SPK</label>
                                            <div class="col-sm-4">
                                                <input type="text"  class="form form-control" value="{{$laporan->spkItem->spk->no_spk}}" readonly></div>
                                            <label class="col-sm-2 col-md-offset-1 control-label">Priode</label>
                                            <div class="col-sm-3"> <input type="text" readonly value="{{$laporan->priode}}" class="form form-control"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Foto Toko</label>
                                            <div class="col-sm-3">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>
                                                <span class="fileinput-exists">Ganti</span><input type="file" name="toko_img" accept="image/*"/></span>
                                                    <span class="fileinput-filename"></span>
                                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-md-offset-2 control-label">Scan</label>
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
                                    <div col-lg-4 style="float: right">
                                        {{--<a class="btn btn-lg btn-primary"><i class="fa fa-print"> Print</i></a>--}}
                                        <button type="button" class="btn btn-warning" id="#print"  onclick="PrintMe('divid')">
                                            <i class="fa fa-print"> Print</i>
                                            {{--<input type="button" name="btnprint" value="Print" onclick="PrintMe('divid')"/>--}}
                                        </button>
                                        {{--<a class="btn btn-lg btn-warning"><i class="fa fa-print"> Lihat</i></a>--}}
                                        {{--<a class="btn btn-lg btn-success"><i class="fa fa-save"> Save</i></a>--}}
                                    </div>
                                </form>
                                {{--<div class="hr-line-dashed"></div>--}}
                                   <div class=" activity-header" fundingActivityHeader="" style="padding: 10px 0 0 0;border:none">
                                    <div class="col-lg-12 col-md-12">
                                        <form action="{{route('show.store',[$laporan->spkItem->id,$laporan->priode])}}" method="post" enctype='multipart/form-data'>
                                            {{method_field('post')}}
                                            {{csrf_field()}}
                                            <input type="hidden" name="lap_id" value="{{$laporan->id}}">
                                            <div class="col col-lg-12 form-horizontal" style="border:2px">
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="col-sm-1 control-label">keterangan</label>--}}
                                                    {{--<div class="col-sm-3">--}}
                                                        {{--<input type="text"  class="form form-control" value="{{$laporan->spkItem->spk->no_spk}}"></div>--}}
                                                    {{--<label class="col-sm-1  control-label">foto sebelum</label>--}}
                                                    {{--<div class="col-sm-2">--}}
                                                        {{--<div class="fileinput fileinput-new" data-provides="fileinput">--}}
                                                        {{--<span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>--}}
                                                        {{--<span class="fileinput-exists">Ganti</span><input type="file" class="sesudah" accept="image/*"/></span>--}}
                                                            {{--<span class="fileinput-filename"></span>--}}
                                                            {{--<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<label class="col-sm-1  control-label">Sesudah</label>--}}
                                                    {{--<div class="col-sm-2">--}}
                                                        {{--<div class="fileinput fileinput-new" data-provides="fileinput">--}}
                                                        {{--<span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto</span>--}}
                                                        {{--<span class="fileinput-exists">Ganti</span><input type="file" class="sesudah" accept="image/*"/></span>--}}
                                                            {{--<span class="fileinput-filename"></span>--}}
                                                            {{--<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <table class="table table-bordered" style="margin-top: 10px">
                                                    <tr >
                                                        <td>
                                                            <input class="form-control nama" style="font-size:11pt;width:100%" type="text" name="nama" placeholder="keterangan"></td>
                                                        <td>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto sebelum</span>
                                                <span class="fileinput-exists">Ganti</span><input type="file"  class="sebelum" name="sebelum" accept="image/*"/></span>
                                                                <span class="fileinput-filename"></span>
                                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih foto sesudah</span>
                                                        <span class="fileinput-exists">Ganti</span><input type="file" name="sesudah" class="sesudah" accept="image/*"/></span>
                                                                <span class="fileinput-filename"></span>
                                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                            </div>
                                                        </td>
                                                        <td width="5%">
                                                            <div class="center">
                                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-footer clear-both center row-spacing">
                            <table class="table table-striped table-bordered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>keterangan</th>
                                    <th>Sebelum</th>
                                    <th>Sesudah</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($laporan->mtcDetail as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->keterangan}} </td>
                                        <td><a href="{{asset($data->sebelum)}}" target="_blank">lihat foto sebelum</a></td>
                                        <td><a href="{{asset($data->sesudah)}}" target="_blank">lihat foto sesudah</a></td>
                                        <td>
                                            <form action="{{route('show.destroy',[$laporan->spkItem->id,$laporan->priode])}}" method="post" enctype='multipart/form-data'>
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <button type="submit" class="btn btn-outline btn-danger btn-xs">
                                                <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'"></i>
                                                </button>
                                            </form>
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


        {{--<div id="konten" style="visibility: hidden;">--}}
            <div class="modal inmodal" id="kon" tabindex="-1" role="dialog" aria-hidden="true">
            <div id="divid">

            <table style="width: 483.8pt; border-collapse: collapse; border: none;" width="645">
                <tbody>
                <tr style="height: 209.75pt;">
                    <td style="width: 133px; padding: 0in 5.4pt; height: 209px;" width="128">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                    <td style="width: 403px; padding: 0in 5.4pt; height: 209px;" colspan="3" width="415">
                        <p style="text-align: center;"><span style="font-size: 14.0pt; line-height: 115%; font-family: 'Californian FB',serif;">LAPORAN PEKERJAAN</span></p>
                        <p style="text-align: center;"><span style="font-size: 14.0pt; line-height: 115%; font-family: 'Californian FB',serif;">MAINTAINANCE&nbsp; TOKO ALFAMART</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">LOKASI: {{strtoupper($laporan->spkItem->toko->nama_toko).' - '.strtoupper($laporan->spkItem->toko->branch->nama_toko)}}</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Californian FB',serif;">O</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Californian FB',serif;">&nbsp;</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Californian FB',serif;">L</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Californian FB',serif;">&nbsp;</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Californian FB',serif;">E</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Californian FB',serif;">&nbsp;</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Californian FB',serif;">H</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                    <td style="width: 110px; padding: 0in 5.4pt; height: 209px;" width="102">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                </tr>
                <tr style="height: .9in;">
                    <td style="width: 133px; padding: 0in 5.4pt; height: 10px;" width="128">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                    <td style="width: 403px; padding: 0in 5.4pt; height: 10px;" colspan="3" width="415">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                    <td style="width: 110px; padding: 0in 5.4pt; height: 10px;" width="102">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                </tr>
                <tr style="height: 3.3in;">
                    <td style="width: 133px; padding: 0in 5.4pt; height: 3px;" width="128">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                    <td style="width: 403px; padding: 0in 5.4pt; height: 3px; text-align: left;" colspan="3" width="415"><img style="display: block; margin-left: auto; margin-right: auto;" src="{{asset($laporan->toko)}}" alt="" width="244" height="326" /></td>
                    <td style="width: 110px; padding: 0in 5.4pt; height: 3px;" width="102">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                    </td>
                </tr>
                <tr style="height: 58.7pt;">
                    <td style="width: 153px; padding: 0in 5.4pt; height: 52px;" colspan="2" width="149"><img style="float: right;" src="{{asset('img/lap/wi.jpg')}}" alt="" width="108" height="104" /></td>
                    <td style="width: 322px; padding: 0in 5.4pt; height: 52px;" width="331">
                        <p style="margin-bottom: 0.0001pt; line-height: normal; text-align: center;"><span style="font-size: 14.0pt;">supported by</span></p>
                        <p style="margin-bottom: 0.0001pt; line-height: normal; text-align: center;"><span style="font-size: 26.0pt;">WIRELESSINDO</span></p>
                        <p style="margin-bottom: 0.0001pt; line-height: normal; text-align: center;"><a href="http://www.wirelessindo.co.id"><strong><span style="font-size: 14.0pt; font-family: 'GPBase Font';">www.wirelessindo.co.id</span></strong></a></p>
                    </td>
                    <td style="width: 171px; padding: 0in 5.4pt; height: 52px;" colspan="2" width="166"><img style="float: left;" src="{{asset('img/lap/alfa.jpg')}}" alt="" width="143" height="95" /></td>
                </tr>
                <tr style="height: 22.0pt;">
                    <td style="width: 646px; padding: 0in 5.4pt; height: 22px;" colspan="5" width="645">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
                    </td>
                </tr>
                <tr style="height: 26.35pt;">
                    <td style="width: 646px; padding: 0in 5.4pt; height: 26px;" colspan="5" width="645">
                        <p><strong><span style="font-family: 'Californian FB',serif;">{{strtoupper($laporan->spkItem->toko->nama_toko)}}</span></strong></p>
                    </td>
                </tr>
                <tr style="height: 611.5pt;">
                    <td style="width: 646px; padding: 0in 5.4pt; height: 611px;" colspan="5" width="645"><img style="display: block; margin-left: auto; margin-right: auto;" src="{{asset($laporan->scan_form)}}" alt="" width="600" height="829" /></td>
                </tr>
                <tr style="height: 26.5pt;">
                    <td style="width: 646px; padding: 0in 5.4pt; height: 26px;" colspan="5" width="645">
                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-family: 'Californian FB',serif;">&nbsp;</span></strong></p>
                    </td>
                </tr>
                <tr style="height: 22.0pt;">
                    <td style="width: 646px; padding: 0in 5.4pt; height: 22px;" colspan="5" width="645">
                        <p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-family: 'Californian FB',serif;"></span></strong></p>
                    </td>
                </tr>
                <tr style="height: 22.0pt;">
                    <td style="width: 646px; padding: 0in 5.4pt; height: 22px;" colspan="5" width="645">
                        <p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-family: 'Californian FB',serif;">LAPORAN PEKERJAAN</span></strong></p>
                    </td>
                </tr>
                @foreach($laporan->mtcDetail as $data)
                <tr style="height: 233.5pt;">
                    <td style="width: 646px; padding: 0in 5.4pt; height: 232px;" colspan="5" width="645">
                        <table style="width: 472.5pt; border-collapse: collapse; border: none;" width="630">
                            <tbody>
                            <tr style="height: 12.55pt;">
                                <td style="width: 472.5pt; padding: 0in 5.4pt; height: 10px;" colspan="3" width="630">
                                    <p><strong><span style="font-family: 'Californian FB',serif;">&nbsp;</span></strong></p>
                                </td>
                            </tr>
                            <tr style="height: 235.3pt;">
                                <td style="width: 180.7pt; padding: 0in 5.4pt; height: 235px;" width="241"><img style="display: block; margin-left: auto; margin-right: auto;" src="{{asset($data->sebelum)}}" alt="" width="170" height="234" /></td>
                                <td style="width: 104pt; padding: 0in 5.4pt; height: 235px; text-align: center;" width="139">&nbsp;</td>
                                <td style="width: 187.8pt; padding: 0in 5.4pt; height: 235px;" width="250"><img style="display: block; margin-left: auto; margin-right: auto;" src="{{asset($data->sesudah)}}" alt="" width="170" height="234" /></td>
                            </tr>
                            <tr style="height: 47px;">
                                <td style="width: 180.7pt; padding: 0in 5.4pt; height: 47px;" width="241">
                                    <p style="text-align: center;"><strong><span style="font-family: 'Californian FB',serif;">sebelum</span></strong></p>
                                </td>
                                <td style="width: 104pt; padding: 0in 5.4pt; height: 47px;" width="139">
                                    <p><strong><span style="font-family: 'Californian FB',serif;">&nbsp;</span></strong></p>
                                </td>
                                <td style="width: 187.8pt; padding: 0in 5.4pt; height: 47px;" width="250">
                                    <p style="margin-bottom: 5.0pt; text-align: center;"><span style="font-size: 10.0pt; line-height: 115%;">Sesudah</span></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
                <tr style="height: 18px;">
                    <td style="border: none; height: 18px; width: 133px;" width="128">&nbsp;</td>
                    <td style="border: none; height: 18px; width: 20px;" width="20">&nbsp;</td>
                    <td style="border: none; height: 18px; width: 322px;" width="331">&nbsp;</td>
                    <td style="border: none; height: 18px; width: 61px;" width="64">&nbsp;</td>
                    <td style="border: none; height: 18px; width: 110px;" width="102">&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <p style="tab-stops: 410.25pt;">&nbsp;</p>
        </div>
    </div>

@endsection
@section('css')
    <link href="{{asset('css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <style>
    </style>
@endsection
@section('scripts')
    <script src='{{asset("js/plugins/jasny/jasny-bootstrap.min.js")}}'></script>
    <script language="javascript">
        function PrintMe(DivID) {
            var disp_setting="toolbar=yes,location=no,";
            disp_setting+="directories=yes,menubar=yes,";
            disp_setting+="scrollbars=yes,width=650, height=800, left=100, top=25";
            var content_vlue = document.getElementById(DivID).innerHTML;
            var docprint=window.open("","",disp_setting);
            docprint.document.open();
            // docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
            // docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
            docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
            docprint.document.write('<head><title></title>');
            docprint.document.write('<style type="text/css">body{ margin:0px;');
            docprint.document.write('font-family:verdana,Arial;color:#000;');
            docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
            docprint.document.write('a{color:#000;text-decoration:none;} </style>');
            docprint.document.write('</head><body onLoad="self.print()"><center>');
            docprint.document.write(content_vlue);
            docprint.document.write('</center></body></html>');
            docprint.document.close();
            docprint.focus();
        }
    </script>

@endsection
