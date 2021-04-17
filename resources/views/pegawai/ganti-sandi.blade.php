@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Ganti Kata Sandi</h5>
                        <div class="ibox-tools">
                            {{--<a href="{{route('pegawai.create')}}" class="btn btn-primary " --}}{{--}data-toggle="modal" data-target="#modalBuat"--}}{{-->Tambah Pegawai</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                            <form action="{{route('ganti-sandi')}}" method="post">
                            @method('post')
                            @csrf
                                <div class="col col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kata Sandi Lama<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="oldPassword" id="" class="form-control">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kata Sandi Baru<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="newPassword" id="" class="form-control">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Konfirmasi Kata Sandi Baru<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="confirmationPassword" id="" class="form-control">
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                            <div>
                                <button type="submit" class="btn btn-success btn-simpan">Simpan</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal inmodal" id="konfirmasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h6 class="modal-title">Apakah anda yakin ?</h6>

                <div style="margin-top:15px">
                    <input type="button" class="btn btn-primary btnYes"
                           value="Ya">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{url('/')}}" accept-charset="UTF-8" class="formDelete">
    {{csrf_field()}}
    {{method_field('delete')}}
</form>

@endsection
@section('custom_css')
    <style>
        .tr-hovered:hover {
            cursor: pointer
        }
        .scrollable {
            overflow-x:auto;
        }
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

        function detail(url)
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
