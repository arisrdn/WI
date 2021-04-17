@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Invoice No:{{$invoice->no_invoice}}</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                       <div class="row">
                           <div class="col col-lg12">

                           <button type="button" class="btn btn-block btn-warning" id="#print"  onclick="PrintMe('divid')">
                               <i class="fa fa-print"> Print</i>
                               {{--<input type="button" name="btnprint" value="Print" onclick="PrintMe('divid')"/>--}}
                           </button>
                               {{--<button type="button" class="btn btn-block btn-primary">--}}
                                   {{--<i class="fa fa-pdf"> Simpan</i>--}}
                               {{--</button>--}}
                               {{--<button id="konvert">Generate PDF</button>--}}
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div id="divid">
                        <div id="konten">
                            <table style="width: 558.1pt; border-collapse: collapse; margin-left: 6.75pt; margin-right: 6.75pt;" width="100%">
                                <tbody>
                                <tr style="height: 209.75pt;">
                                    <td style="width: 133px; padding: 0in 5.4pt; height: 209px;" width="128">
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 403px; padding: 0in 5.4pt; height: 209px;" colspan="3" width="415">
                                        <p style="text-align: center;"><span style="font-size: 14.0pt; line-height: 115%; font-family: 'Californian FB',serif;">LAPORAN PEKERJAAN</span></p>
                                        <p style="text-align: center;"><span style="font-size: 14.0pt; line-height: 115%; font-family: 'Californian FB',serif;">MAINTAINANCE&nbsp; TOKO ALFAMART</span></p>
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">LOKASI: ALTERNATIF SENTUL - BOGOR</span></p>
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
                                    <td style="width: 403px; padding: 0in 5.4pt; height: 3px; text-align: left;" colspan="3" width="415"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://127.0.0.1:8000/img/lap/toko.jpg" alt="" width="278" height="371" /></td>
                                    <td style="width: 110px; padding: 0in 5.4pt; height: 3px;" width="102">
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 58.7pt;">
                                    <td style="width: 153px; padding: 0in 5.4pt; height: 58px;" colspan="2" width="149"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://127.0.0.1:8000/img/lap/wi.jpg" alt="" width="122" height="117" /></td>
                                    <td style="width: 322px; padding: 0in 5.4pt; height: 58px;" width="331">
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">supported by</span></p>
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 26.0pt;">WIRELESSINDO</span></p>
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><a href="http://www.wirelessindo.co.id"><strong><span style="font-size: 14.0pt; font-family: 'GPBase Font';">www.wirelessindo.co.id</span></strong></a></p>
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 171px; padding: 0in 5.4pt; height: 58px;" colspan="2" width="166"><img src="http://127.0.0.1:8000/img/lap/alfa.jpg" alt="" width="157" height="104" /></td>
                                </tr>
                                <tr style="height: 22.0pt;">
                                    <td style="width: 646px; padding: 0in 5.4pt; height: 22px;" colspan="5" width="645">
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 14.0pt;">&nbsp;</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 26.35pt;">
                                    <td style="width: 646px; padding: 0in 5.4pt; height: 26px;" colspan="5" width="645">
                                        <p><strong><span style="font-family: 'Californian FB',serif;">ALFAMART ALTERNATIF SENTUL</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 611.5pt;">
                                    <td style="width: 646px; padding: 0in 5.4pt; height: 611px;" colspan="5" width="645"><img src="http://127.0.0.1:8000/img/lap/scan.jpg" alt="" width="600" height="829" /></td>
                                </tr>
                                <tr style="height: 26.5pt;">
                                    <td style="width: 646px; padding: 0in 5.4pt; height: 26px;" colspan="5" width="645">
                                        <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-family: 'Californian FB',serif;">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 22.0pt;">
                                    <td style="width: 646px; padding: 0in 5.4pt; height: 22px;" colspan="5" width="645">
                                        <p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-family: 'Californian FB',serif;">LAPORAN PEKERJAAN</span></strong></p>
                                    </td>
                                </tr>
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
                                                <td style="width: 180.7pt; padding: 0in 5.4pt; height: 235px;" width="241"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://127.0.0.1:8000/img/lap/sblm.jpg" alt="" width="170" height="234" /></td>
                                                <td style="width: 104pt; padding: 0in 5.4pt; height: 235px; text-align: center;" width="139">&nbsp;</td>
                                                <td style="width: 187.8pt; padding: 0in 5.4pt; height: 235px;" width="250"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://127.0.0.1:8000/img/lap/sblm.jpg" alt="" width="170" height="234" /></td>
                                            </tr>
                                            <tr style="height: 47px;">
                                                <td style="width: 180.7pt; padding: 0in 5.4pt; height: 47px;" width="241">
                                                    <p style="text-align: center;"><strong><span style="font-family: 'Californian FB',serif;">sebelum</span></strong></p>
                                                </td>
                                                <td style="width: 104pt; padding: 0in 5.4pt; height: 47px;" width="139">
                                                    <p><strong><span style="font-family: 'Californian FB',serif;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 187.8pt; padding: 0in 5.4pt; height: 47px;" width="250">
                                                    <p style="margin-bottom: 5.0pt; text-align: center;"><span style="font-size: 10.0pt; line-height: 115%;">Sesudah Maintainance</span></p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="height: 18px;">
                                    <td style="border: none; height: 18px; width: 133px;" width="128">&nbsp;</td>
                                    <td style="border: none; height: 18px; width: 20px;" width="20">&nbsp;</td>
                                    <td style="border: none; height: 18px; width: 322px;" width="331">&nbsp;</td>
                                    <td style="border: none; height: 18px; width: 61px;" width="64">&nbsp;</td>
                                    <td style="border: none; height: 18px; width: 110px;" width="102">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--Modal BUAT --}}
    <div id="editor"></div>
@endsection
@section('css')

@endsection
@section('scripts')
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
    {{--<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script type="text/javascript">
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };
        $('#konvert').click(function () {
            doc.fromHTML($('#konten').html(), 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });
            doc.save('contoh-file.pdf');
        });
    </script>
@endsection