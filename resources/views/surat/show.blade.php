@extends('layouts.app')

@section('title',  config('data.T.st'))

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Surat No:{{$surat->no_surat}}</h5>
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
                                    <tr style="height: .75in;">
                                        <td style="width: 111.15pt; padding: 0in 5.4pt 0in 5.4pt; height: .75in;" colspan="3" rowspan="3" width="148"><img src="{{asset('img/wi.png')}}" alt="wi" width="148" height="148" /></td>
                                        <td style="width: 356.85pt; padding: 0in 5.4pt 0in 5.4pt; height: .75in;" colspan="5" width="476">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 36.0pt; font-family: 'Times New Roman','serif'; color: #00b0f0;">WIrelessindo</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: .25in;">
                                        <td style="width: 356.85pt; padding: 0in 5.4pt 0in 5.4pt; height: .25in;" colspan="5" width="476">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt;">Ruko Pesonanet</span><span style="font-size: 12.0pt;">&nbsp; </span><span style="font-size: 12.0pt;">Jl. Jend A. Yani No. 124 Kota Bogor Jawa Barat</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 22.5pt;">
                                        <td style="width: 356.85pt; padding: 0in 5.4pt 0in 5.4pt; height: 22.5pt;" colspan="5" width="476">
                                            <p style="margin-bottom: .0001pt; line-height: normal;">Telp/Fax. 0251-8331858</p>
                                        </td>
                                    </tr>
                                    <tr style="height: 13.5pt;">
                                        <td style="width: 6.5in; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" colspan="8" width="624">&nbsp;</td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 6.5in; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="8" width="624">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 14.0pt; font-family: 'Times New Roman','serif';">Surat Tugas</span></strong></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 6.5in; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="8" width="624">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">No : {{$surat->no_st}}</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 383.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="6" width="512">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 24.3pt;">
                                        <td style="width: 6.5in; padding: 0in 5.4pt 0in 5.4pt; height: 24.3pt;" colspan="8" width="624">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif'; color: #222222; background: #F1F1F1;">Surat Tugas Kerja ini diberikan kepada :</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Nama</span></p>
                                        </td>
                                        <td style="width: 383.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="6" width="512">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">: {{$surat->pegawai->nama}}</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Nik</span></p>
                                        </td>
                                        <td style="width: 383.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="6" width="512">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">:{{$surat->pegawai->nik}}</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Jabatan</span></p>
                                        </td>
                                        <td style="width: 383.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="6" width="512">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">:{{$surat->pegawai->jabatan->nama}}</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 19.8pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 19.8pt;" colspan="2" width="112">&nbsp;</td>
                                        <td style="width: 383.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 19.8pt;" colspan="6" width="512">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: .5in;">
                                        <td style="width: 6.5in; border: none;padding: 0in 5.4pt 0in 5.4pt; height: .5in;" colspan="8" width="624">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Terhitung mulai tanggal  {{ $surat->tanggal_1}} @if($surat->tanggal_2 != date('Y-m-d',strtotime(null))) {{$surat->tanggal_2}}@endif</span><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">saudara diberikan tugas</span><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';"> {{$surat->kegiatan}} </span><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';"> </span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 4.6pt;">
                                        <td style="width: 6.5in; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 4.6pt;" colspan="8" width="624">&nbsp; </td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 51.25pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="68">&nbsp;</td>
                                        <td style="width: 32.95pt; border: solid windowtext 1.0pt; border-left: none; background: #C9C9C9; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="44">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">#</span></strong></p>
                                        </td>
                                        <td style="width: 71.6pt; border: solid windowtext 1.0pt; border-left: none; background: #C9C9C9; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Nama Toko</span></strong></p>
                                        </td>
                                        <td style="width: 265.65pt; border: solid windowtext 1.0pt; border-left: none; background: #C9C9C9; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="354">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Alamat</span></strong></p>
                                        </td>
                                        <td style="width: 46.55pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="62">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    @php $i=1; @endphp
                                    @foreach($surat->spk->toko as $item)
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 51.25pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="68">&nbsp;</td>
                                        <td style="width: 32.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="44">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">{{$i++}}</span></p>
                                        </td>
                                        <td style="width: 71.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">{{$item->nama_toko}} ({{$item->kode_toko}})</span></p>
                                        </td>
                                        <td style="width: 265.65pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="354">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">{{$item->alamat}}</span></p>
                                        </td>
                                        <td style="width: 46.55pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="62">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 51.25pt; border: none; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="68">&nbsp;</td>
                                        <td style="width: 32.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="44">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 71.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 265.65pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="354">&nbsp;</td>
                                        <td style="width: 46.55pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="62">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 18.4pt;">
                                        <td style="width: 6.5in; padding: 0in 5.4pt 0in 5.4pt; height: 18.4pt;" colspan="8" width="624">&nbsp;</td>
                                    </tr>
                                    <tr style="height: .5in;">
                                        <td style="width: 6.5in; padding: 0in 5.4pt 0in 5.4pt; height: .5in;" colspan="8" width="624">
                                            <p><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif'; color: black;">Demikianlah surat tugas ini diberikan agar dapat dilaksanakan dengan penuh tanggung jawab.</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 13.5pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 71.6pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 107.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" width="143">
                                            <p style="text-align: center;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif'; color: black;">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 174.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" colspan="2" width="233">
                                            <p style="text-align: center;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif'; color: black;">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 30.4pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" width="41">
                                            <p style="text-align: center;"><span style="font-family: 'Times New Roman','serif'; color: black;">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 13.5pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 71.6pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 107.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" width="143">
                                            <p style="text-align: center;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif'; color: black;">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 174.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" colspan="2" width="233">
                                            <p style="text-align: center;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif'; color: black;">Bogor, {{tgl_indo(date('Y-m-d'))}}</span></p>
                                        </td>
                                        <td style="width: 30.4pt; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt;" width="41">
                                            <p style="text-align: center;"><span style="font-family: 'Times New Roman','serif'; color: black;">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 15.75pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 71.6pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 107.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="143">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 174.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" colspan="2" width="233">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">CV Wirelessindo</span></p>
                                        </td>
                                        <td style="width: 30.4pt; padding: 0in 5.4pt 0in 5.4pt; height: 15.75pt;" width="41">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 70.2pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 70.2pt;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 71.6pt; padding: 0in 5.4pt 0in 5.4pt; height: 70.2pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 107.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 70.2pt;" width="143">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 174.8pt; padding: 0in 5.4pt 0in 5.4pt; height: 70.2pt;" colspan="2" width="233">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 30.4pt; padding: 0in 5.4pt 0in 5.4pt; height: 70.2pt;" width="41">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: .25in;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: .25in;" colspan="2" width="112">
                                            <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 71.6pt; padding: 0in 5.4pt 0in 5.4pt; height: .25in;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 107.0pt; padding: 0in 5.4pt 0in 5.4pt; height: .25in;" width="143">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 174.8pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0in 5.4pt 0in 5.4pt; height: .25in;" colspan="2" width="233">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Heru Sugiarto</span></p>
                                        </td>
                                        <td style="width: 30.4pt; padding: 0in 5.4pt 0in 5.4pt; height: .25in;" width="41">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr style="height: 18.9pt;">
                                        <td style="width: 84.2pt; padding: 0in 5.4pt 0in 5.4pt; height: 18.9pt;" colspan="2" width="112">&nbsp;</td>
                                        <td style="width: 71.6pt; padding: 0in 5.4pt 0in 5.4pt; height: 18.9pt;" colspan="2" width="95">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                        <td style="width: 107.0pt; padding: 0in 5.4pt 0in 5.4pt; height: 18.9pt;" width="143">&nbsp;</td>
                                        <td style="width: 174.8pt; border: none; padding: 0in 5.4pt 0in 5.4pt; height: 18.9pt;" colspan="2" width="233">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
                                        </td>
                                        <td style="width: 30.4pt; padding: 0in 5.4pt 0in 5.4pt; height: 18.9pt;" width="41">
                                            <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;" width="68">&nbsp;</td>
                                        <td style="border: none;" width="44">&nbsp;</td>
                                        <td style="border: none;" width="36">&nbsp;</td>
                                        <td style="border: none;" width="60">&nbsp;</td>
                                        <td style="border: none;" width="143">&nbsp;</td>
                                        <td style="border: none;" width="212">&nbsp;</td>
                                        <td style="border: none;" width="22">&nbsp;</td>
                                        <td style="border: none;" width="41">&nbsp;</td>
                                    </tr>
                                    </tbody>

                                </table>

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