@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Profile Detail</h5>
                    </div>
                    <div>
                        <div class="ibox-content no-padding border-left-right">
                            <img alt="image" class="img-responsive" src="img/profile_big.jpg">
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong>Monica Smith</strong></h4>
                            <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                            <h5>
                                About me
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                            </p>
                            <div class="row m-t-lg">
                                <div class="col-md-4">
                                    <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"></rect><rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect><rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"></rect></svg>
                                    <h5><strong>169</strong> Posts</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon><polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                                    <h5><strong>28</strong> Following</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="bar" style="display: none;">5,3,2,-1,-3,-2,2,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="0" width="2.3" height="10"></rect><rect fill="#d7d7d7" x="3.3" y="4" width="2.3" height="6"></rect><rect fill="#1ab394" x="6.6" y="6" width="2.3" height="4"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="10" width="2.3" height="2"></rect><rect fill="#1ab394" x="13.2" y="10" width="2.3" height="6"></rect><rect fill="#d7d7d7" x="16.5" y="10" width="2.3" height="4"></rect><rect fill="#1ab394" x="19.799999999999997" y="6" width="2.3" height="4"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="4" width="2.3" height="6"></rect><rect fill="#1ab394" x="26.4" y="0" width="2.3" height="10"></rect><rect fill="#d7d7d7" x="29.7" y="6" width="2.3" height="4"></rect></svg>
                                    <h5><strong>240</strong> Followers</h5>
                                </div>
                            </div>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Branch Alfamart</h5>
                        <div class="ibox-tools">
                            <a href="{{route('pegawai.create')}}" class="btn btn-primary " {{--}data-toggle="modal" data-target="#modalBuat"--}}>Tambah Pegawai</a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="ibox-content profile-content">
                            <figure class="snip1336 ">
                                <img src="{{asset('img/wa.jpg')}}" alt="sample87" style="-webkit-filter: blur(2px);filter: blur(2px);"/>
                                <figcaption>
                                    @if($pegawai->path_foto_person)
                                        <img src="{{asset($pegawai->path_foto_person)}}" alt="foto" class="profile" />
                                    @else
                                        <img src="{{asset('/assets/img/image_not_found.jpg')}}" alt="foto" class="profile" />
                                    @endif
                                    <h2>{{$pegawai->nama}}<span>{{$pegawai->nik}}</span></h2>
                                </figcaption>
                            </figure>

                            <table class="table-custom word-wrap">
                                <tr>
                                    <td><label for="">NIK</label>
                                    <td>{{ $pegawai->nik }}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Jabatan</label></td>
                                    <td>{{ ucfirst($pegawai->jabatan->deskripsi) }}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Nomor KTP</label></td>
                                    <td>{{ $pegawai->no_ktp }}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Nomor HP</label></td>
                                    <td>{{ $pegawai->number_hp }}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Tempat Lahir</label></td>
                                    <td>{{ ucfirst($pegawai->tempat_lahir) }}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Tanggal Lahir</label></td>
                                    <td>{{ date("d F Y", strtotime($pegawai->tanggal_lahir)) }}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Alamat</label></td>
                                    <td>{{ ucfirst($pegawai->alamat) }}</td>
                                </tr>
                            </table>
                            <div class="user-button">
                                <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle = 'modal' data-target='#showKTP'><i class="fa fa-newspaper-o"></i> foto ktp</button>
                                <button type="button" class="btn btn-default btn-sm btn-block" data-toggle = 'modal' data-target='#showKK'><i class="fa fa-newspaper-o" ></i> foto kk</button>
                                @if($pegawai->path_cv)
                                    <a class="btn btn-warning btn-sm btn-block" href="{{asset($pegawai->path_cv)}}"><i class="fa fa-newspaper-o"></i> CV</a>
                                @else
                                    <a class="btn btn-warning btn-sm btn-block" onclick="cvKosong()"><i class="fa fa-newspaper-o"></i> CV</a>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom_css')
    <style>
        td a {
            display: block;
            text-transform: capitalize;
        }
        .snip1336 {
            font-family: 'Roboto', Arial, sans-serif;
            position: relative;
            float: left;
            overflow: hidden;
            margin: 10px 1%;
            /*min-width: 230px;*/
            /*max-width: 315px;*/
            width: 100%;
            /*color: #ffffff;*/
            text-align: left;
            line-height: 1.4em;
            /*background-color: #141414;*/
        }
        .snip1336 * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }
        .snip1336 img {
            width: 100%;
            vertical-align: top;
            opacity: 0.85;

        }
        .snip1336 figcaption {
            width: 100%;
            background-color: #FFFFFF;
            padding: 25px;
            /*border: dotted 1px #000000;*/
            position: relative;
        }
        .snip1336 figcaption:before {
            position: absolute;
            content: '';
            bottom: 100%;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 55px 0 0 400px;
            border-color: transparent transparent transparent #FFFFFF;
        }
        .snip1336 figcaption a {
            padding: 5px;
            border: 1px solid #ffffff;
            color: #ffffff;
            font-size: 0.7em;
            text-transform: uppercase;
            margin: 10px 0;
            display: inline-block;
            opacity: 0.65;
            width: 47%;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .snip1336 figcaption a:hover {
            opacity: 1;
        }
        .snip1336 .profile {
            border-radius: 50%;
            position: absolute;
            bottom: 100%;
            left: 25px;
            z-index: 1;
            max-width: 90px;
            opacity: 1;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        .snip1336 .follow {
            margin-right: 4%;
            border-color: #2980b9;
            color: #2980b9;
        }
        .snip1336 h2 {
            margin: 0 0 5px;
            font-weight: 300;
        }
        .snip1336 h2 span {
            display: block;
            font-size: 0.5em;
            color: #2980b9;
        }
        .snip1336 p {
            margin: 0 0 10px;
            font-size: 0.8em;
            letter-spacing: 1px;
            opacity: 0.8;
        }
        .no-border{border: none}

    </style>
@endsection
@section('custom_js')
    <script !src="">
        var id = null;
        var baseURL = '{{url('/')}}';
        $('.btnDelete').click(function () {
            id = $(this).data('id');
            $('.formDelete').attr('action', baseURL+'/pegawai/' + id);
        });
        $('.btnYes').click(function () {
            $('.formDelete').submit();
        });

        function showEmployeeDetail(url)
        {
            document.location.href = url;
        }

        $(document).ready(function() {
            $('#tabel').DataTable({
                responsive: true,
                "language": {
                    "lengthMenu": "Display _MENU_ Perhalaman",
                    "zeroRecords": "Tidak ada data",
                    "infoEmpty": "Data Tidak Ada",
                    "loadingRecords": "Loading...",
                    "processing":     "Sedang di proses...",
                    "search":         "Cari ",
                    "lengthMenu":     " _MENU_ ",
                    "info":           "Menampilkan _START_ - _END_ dari _TOTAL_ ",
                    "infoFiltered":   "(pencarian dari _MAX_ )",
                }
            });
        } );
    </script>
@endsection
