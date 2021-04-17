@extends('layouts.app')

@section('title', config('data.t.laporan'))

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
                            <table style="width: 558.1pt; border-collapse: collapse; margin-left: 6.75pt; margin-right: 6.75pt;" width="744">
                                <tbody>
                                <tr style="height: 20.3pt;">
                                    <td style="width: 163.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 20.3pt;" colspan="5" width="218">
                                        <p><strong><span style="font-size: 16.0pt; font-family: 'Arial','sans-serif';">INVOICE</span></strong></p>
                                    </td>
                                    <td style="width: 43.15pt; padding: 0in 5.4pt 0in 5.4pt; height: 20.3pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; padding: 0in 5.4pt 0in 5.4pt; height: 20.3pt;" width="155">&nbsp;</td>
                                    <td style="width: 234.6pt; padding: 0in 5.4pt 0in 5.4pt; height: 20.3pt;" colspan="4" width="313">
                                        <p style="text-align: right;"><strong><span style="font-size: 16.0pt; font-family: 'Arial','sans-serif';">WIRELESSINDO</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 30.85pt;">
                                    <td style="width: 558.1pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 30.85pt;" colspan="11" width="744">
                                        <p style="text-align: center;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 15.05pt;">
                                    <td style="width: 62.95pt; border: none; border-left: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.05pt;" colspan="3" width="84">
                                        <p style="text-align: right;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Kepada :</span></strong></p>
                                    </td>
                                    <td style="width: 100.85pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.05pt;" colspan="2" width="134">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">{{$invoice->tujuan}}</span></strong></p>
                                    </td>
                                    <td style="width: 43.15pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.05pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.05pt;" width="155">&nbsp;</td>
                                    <td style="width: 45.0pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.05pt;" width="60">&nbsp;</td>
                                    <td style="width: 40.5pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.05pt;" width="54">
                                        <p style="text-align: right;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">No :</span></p>
                                    </td>
                                    <td style="width: 149.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.05pt;" colspan="2" width="199">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">{{$invoice->no_invoice}}</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.8pt;">
                                    <td style="width: 26.05pt; border: none; border-left: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="35">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 36.9pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" colspan="2" rowspan="2" width="49">&nbsp;</td>
                                    <td style="width: 305.55pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" colspan="5" rowspan="2" width="407">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">{{$invoice->alamat}}</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="54">
                                        <p style="text-align: right;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Tgl :&nbsp; </span></p>
                                    </td>
                                    <td style="width: 149.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" colspan="2" width="199">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">{{date('d-m-Y')}}</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 5.1pt;">
                                    <td style="width: 26.05pt; border: none; border-left: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 5.1pt;" width="35">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; padding: 0in 5.4pt 0in 5.4pt; height: 5.1pt;" width="54">&nbsp;</td>
                                    <td style="width: 149.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 5.1pt;" colspan="2" width="199">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.8pt;">
                                    <td style="width: 26.05pt; border: none; border-left: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="35">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.1pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" colspan="3" width="155">&nbsp;</td>
                                    <td style="width: 21.65pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="29">&nbsp;</td>
                                    <td style="width: 43.15pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="155">&nbsp;</td>
                                    <td style="width: 45.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="60">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 189.6pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" colspan="3" width="253">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">jatuh tempo </span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 13.55pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: solid windowtext 1.0pt; border-right: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="35">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 116.1pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" colspan="3" width="155">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 21.65pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="29">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 43.15pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="58">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 116.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="155">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 45.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="60">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 40.5pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="54">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 63.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="84">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="115">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 13.55pt;">
                                    <td style="width: 26.05pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="35">&nbsp;</td>
                                    <td style="width: 116.1pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" colspan="3" width="155">&nbsp;</td>
                                    <td style="width: 21.65pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="29">&nbsp;</td>
                                    <td style="width: 43.15pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="155">&nbsp;</td>
                                    <td style="width: 45.0pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="60">&nbsp;</td>
                                    <td style="width: 40.5pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="54">&nbsp;</td>
                                    <td style="width: 63.0pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="84">&nbsp;</td>
                                    <td style="width: 86.1pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="115">&nbsp;</td>
                                </tr>
                                <tr style="height: 13.55pt;">
                                    <td style="width: 26.05pt; border: solid windowtext 1.0pt; border-bottom: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">No</span></strong></p>
                                    </td>
                                    <td style="width: 297.45pt; border: none; border-top: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" colspan="6" width="397">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Keterangan</span></strong></p>
                                    </td>
                                    <td style="width: 45.0pt; border: solid windowtext 1.0pt; border-bottom: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="60">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Jml</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="54">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Sat</span></strong></p>
                                    </td>
                                    <td style="width: 63.0pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="84">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Harga Sat</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border: solid windowtext 1.0pt; border-left: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="115">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Total Harga</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 13.55pt;">
                                    <td style="width: 26.05pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="35">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.1pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" colspan="3" width="155">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 21.65pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="29">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 43.15pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="58">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="155">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: solid windowtext 1.0pt; border-right: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="60">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: solid windowtext 1.0pt; border-right: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="54">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 63.0pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="84">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">( Rp )</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.55pt;" width="115">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">( Rp )</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.8pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 297.45pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" colspan="6" width="397">
                                        <p><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Sesuai SPK No : {{$invoice->spk->no_spk}}</span></strong></p>
                                    </td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="60">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="54">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 63.0pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="84">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="115">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.8pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.1pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" colspan="3" width="155">&nbsp;</td>
                                    <td style="width: 21.65pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="29">&nbsp;</td>
                                    <td style="width: 43.15pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="155">&nbsp;</td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="60">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="54">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 63.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="84">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.8pt;" width="115">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 297.45pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="6" width="397">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{$invoice->keterangan}}</span></p>
                                    </td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="60">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="54">&nbsp;</td>
                                    <td style="width: 63.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.1pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="3" width="155">&nbsp;</td>
                                    <td style="width: 21.65pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="29">&nbsp;</td>
                                    <td style="width: 43.15pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="155">&nbsp;</td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="60">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="54">&nbsp;</td>
                                    <td style="width: 63.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                @php $i=1; @endphp
                                @foreach($spk->detailHarga as $item)

                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{$i++}}</span></strong></p>
                                    </td>
                                    <td style="width: 116.1pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="3" width="155">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{$item->spkItem->toko->nama_toko}}  ({{$item->spkItem->toko->kode_toko}})</span></p>
                                    </td>
                                    <td style="width: 21.65pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="29">&nbsp;</td>
                                    <td style="width: 43.15pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="155">&nbsp;</td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="60">
                                        <p style="text-align: center;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{$item->jumlah}}</span></p>
                                    </td>
                                    <td style="width: 40.5pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="54">
                                        <p style="text-align: center;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{$item->satuan}}</span></p>
                                    </td>
                                    <td style="width: 63.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">
                                        <p style="text-align: right;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif'; color: black;">{{rupiah($item->harga,3)}}</span></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p style="text-align: right;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">{{rupiah($item->jumlah*$item->harga,3)}}</span></p>
                                    </td>
                                </tr>

                              @endforeach
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.1pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="3" width="155">&nbsp;</td>
                                    <td style="width: 21.65pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="29">&nbsp;</td>
                                    <td style="width: 43.15pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="58">&nbsp;</td>
                                    <td style="width: 116.55pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="155">&nbsp;</td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="60">
                                        <p style="text-align: center;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 40.5pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="54">&nbsp;</td>
                                    <td style="width: 63.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">
                                        <p style="text-align: right;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif'; color: black;">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p style="text-align: center;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: double windowtext 2.25pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.1pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="3" width="155">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 21.65pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="29">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 43.15pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="58">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 116.55pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="155">
                                        <p><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 45.0pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: double windowtext 2.25pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="60">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; border-top: none; border-left: none; border-bottom: double windowtext 2.25pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="54">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 63.0pt; border-top: none; border-left: none; border-bottom: double windowtext 2.25pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: none; border-left: none; border-bottom: double windowtext 2.25pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p style="text-align: center;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border: solid windowtext 1.0pt; border-top: none; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 445.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="9" width="595">
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Sub Total</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{rupiah($harga,3)}}</span></strong><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';"> </span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 445.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="9" width="595">
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Bayar</span></strong><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;{{$invoice->persen}}%</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        @php $pr=$invoice->persen/100*$harga @endphp
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{rupiah($pr,3)}}</span></strong><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';"> </span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border: solid windowtext 1.0pt; border-bottom: none; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 445.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="9" width="595">
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">PPN</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        @php $pajak=$invoice->ppn/100*$pr @endphp
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{rupiah($pajak,3)}}</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 26.05pt; border: solid windowtext 1.0pt; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="35">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 445.95pt; border-top: none; border-left: none; border-bottom: double windowtext 2.25pt; border-right: solid black 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="9" width="595">
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Total</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: double windowtext 2.25pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p style="text-align: right;"><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">{{rupiah($pr+$pajak)}}</span></strong><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';"></span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 472.0pt; border: none; border-left: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="10" width="629">
                                        <p><strong><em><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Terbilang : # {{terbilang($pr+$pajak)}} #</span></em></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 48.1pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: double windowtext 2.25pt; border-right: none; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="2" width="64">
                                        <p><strong><em><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></em></strong></p>
                                    </td>
                                    <td style="width: 94.05pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="2" width="125">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 21.65pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="29">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 43.15pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="58">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 116.55pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="155">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 45.0pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="60">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 40.5pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="54">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 63.0pt; border: none; border-bottom: double windowtext 2.25pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: none; border-left: none; border-bottom: double windowtext 2.25pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 558.1pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: none; border-right: solid black 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="11" width="744">
                                        <p><strong><em><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Cara Pembayaran : Transfer ke CV Wirelessindo, BRI Bogor Rek No : 0012-01-002588-302 </span></em></strong></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 409.0pt; border: none; border-left: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="9" width="545">
                                        <p><strong><em><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Konfirmasi Pembayaran melalui email : tanti@wirelessindo.com</span></em></strong></p>
                                    </td>
                                    <td style="width: 63.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">&nbsp;</td>
                                    <td style="width: 86.1pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                </tr>
                                <tr style="height: 12.05pt;">
                                    <td style="width: 48.1pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: solid windowtext 1.0pt; border-right: none; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="2" width="64">
                                        <p><strong><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></strong></p>
                                    </td>
                                    <td style="width: 94.05pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" colspan="2" width="125">
                                        <p><strong><em><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></em></strong></p>
                                    </td>
                                    <td style="width: 21.65pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="29">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 43.15pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="58">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 116.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="155">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 45.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="60">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 40.5pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="54">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 63.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="84">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                    <td style="width: 86.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 12.05pt;" width="115">
                                        <p><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;" width="35">&nbsp;</td>
                                    <td style="border: none;" width="29">&nbsp;</td>
                                    <td style="border: none;" width="20">&nbsp;</td>
                                    <td style="border: none;" width="106">&nbsp;</td>
                                    <td style="border: none;" width="29">&nbsp;</td>
                                    <td style="border: none;" width="58">&nbsp;</td>
                                    <td style="border: none;" width="155">&nbsp;</td>
                                    <td style="border: none;" width="60">&nbsp;</td>
                                    <td style="border: none;" width="54">&nbsp;</td>
                                    <td style="border: none;" width="84">&nbsp;</td>
                                    <td style="border: none;" width="115">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                            <p>&nbsp;</p>
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