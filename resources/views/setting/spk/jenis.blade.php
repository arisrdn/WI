@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Jenis SPK</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis SPK</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($jenisSpk as $jenis)
                                <tr class="gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$jenis['nama']}}</td>
                                    <td>
                                        <a class="btn btn-outline btn-primary btn-xs" data-toggle="modal" href="#" data-target="#modal{{$jenis->id}}"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>
{{--                                        <a  href="{{ route('spk-jenis.edit', $jenis->id) }}"></a>--}}
{{--                                        @if(count($) == 0)--}}
                                            <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{$jenis->id}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                </i>
                                            </a>
                                        <form method="POST" action="{{route('spk-jenis.destroy',$jenis->id)}}" accept-charset="UTF-8" class="formDelete2 half-width right">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal inmodal" id="modal{{$jenis->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content animated flipInY">
                                            <form method="post" action="{{route('spk-jenis.update',$jenis->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Edit Data {{$jenis->nama}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-horizontal">
                                                        <div class="form-group"><label class="col-lg-3 control-label">Nama SPK</label>
                                                            <div class="col-lg-9"><input type="text" placeholder="Masukan Nama Spk" class="form-control" name="nama" required value="{{$jenis->nama}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label class="col-lg-3 control-label">Keterangan</label>
                                                            <div class="col-lg-9">
                                                                <textarea name="keterangan" cols="2" class="form-control">{{$jenis->keterangan}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Jenis SPK</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" method="post" action="{{route('spk-jenis.store')}}">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <div class="form-group"><label class="col-lg-3 control-label">Nama SPK</label>
                                <div class="col-lg-9"><input type="text" placeholder="Masukan Nama Spk" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-3 control-label">Keterangan</label>
                                <div class="col-lg-9">
                                    <textarea name="keterangan" cols="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-9">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--modals--}}
    <div class="modal inmodal" id="konfirmasi2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h6 class="modal-title">Apakah anda yakin ?</h6>
                    <div style="margin-top:15px">
                        <input type="button" class="btn btn-primary btnYes2" value="Ya">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                // pageLength: 20,
                responsive: true,
                info:false,
                "language": {
                    "lengthMenu": "Display _MENU_ Perhalaman",
                    "zeroRecords": "Tidak ada data",
                    "infoEmpty": "Data Tidak Ada",
                    "loadingRecords": "Loading...",
                    "processing":     "Sedang di proses...",
                    "search":         "<i style='padding-left: 20px'>Cari</i> ",
                    "lengthMenu":     " _MENU_ ",
                    "info":           "Menampilkan _START_ - _END_ dari _TOTAL_ ",
                    "infoFiltered":   "(pencarian dari _MAX_ )",
                },
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'Jenis SPK'},
                    {extend: 'pdf', title: 'Jenis SPK'},
                ]

            });
        });

    </script>
    <script>
        $('.btnYes2').click(function () {
            $('.formDelete2').submit();
        });
    </script>
@endsection