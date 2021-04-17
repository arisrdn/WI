@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Branch Alfamart</h5>
                        <div class="ibox-tools">
                            <a href="{{route('pegawai.create')}}" class="btn btn-primary " {{--}data-toggle="modal" data-target="#modalBuat"--}}>Tambah Pegawai</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <div class="scrollable">
                            <table class="table table-striped table-bordered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th width="22%">Nama</th>
                                    <th width="20%">Nomor Pegawai</th>
                                    <th width="15%">Jabatan</th>
                                    <th width="18%">Tanggal Mulai</th>
                                    <th width="9%">Status</th>
                                    <th width="12%" style="text-align: center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($pegawai) <= 0)
                                    <tr>
                                        <td colspan="8" class="center">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                @else
                                    <?php $i =1;
                                    ?>
                                    @foreach($pegawai as $employee)
                                        <tr class="tr-hovered">
                                            <td> {{  $i++ }} </td>
                                            <td> {{ $employee->nama }} </td>
                                            <td> {{ $employee->nik }} </td>
                                            <td> {{ ucfirst($employee->jabatan->nama) }} </td>
                                            <td> {{ date("d F Y", strtotime($employee->mulai_bekerja)) }} </td>
                                            <td> @if ($employee->is_active == '1') {{ "Aktif" }} @else {{ "Tidak Aktif" }} @endif </td>
                                            <td class="center" width="">
                                                {{--<a href="{{ route('pegawai.show', $employee->id) }}" class="btn btn-xs btn-outline btn-primary">--}}
                                                    {{--<i class="fa fa-folder" aria-hidden="true"></i>--}}
                                                {{--</a>--}}
                                                <a href="{{ route('pegawai.edit', $employee->id) }}" class="btn btn-xs btn-outline btn-warning">
                                                    <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                                </a>
                                                <a class="btnDelete btn btn-xs btn-outline btn-danger " data-id="{{$employee->id}}" href="" data-toggle='modal' data-target='#konfirmasi'>
                                                    <i class="glyphicon glyphicon-trash">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            </div>
                        </div>
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
