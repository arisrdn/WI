@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Modul manajemen</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jabatan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($roleTitles as $id => $isi)
                                    <tr class="gradeX" onclick="window.location='{{route('manajemen-modul.show',$id)}}';" style="cursor: pointer">
                                        <td>{{$i++}}</td>
                                        <td>{{$isi}}</td>
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

@endsection
@section('scripts')
    @parent
    <script>
        // $(document).ready(function ($) {
        //     $('.click').click(function () {
        //         window.location=this.data('href');
        //     })
        // })
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

            });
        });

    </script>
    <script>
        $('.btnDelete2').click(function () {
            id = $(this).data('id');
           console.log(id);
            $('.formDelete').attr('action',id);
        });
        $('.btnYes2').click(function () {
            $('.formDelete').submit();
        });

    </script>
@endsection