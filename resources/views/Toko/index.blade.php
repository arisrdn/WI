@extends('layouts.app')

@section('title', config('data.T.alfa'))

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Toko Alfamart</h5>
                        <div class="ibox-tools">
                            <a href="{{route('toko.create')}}" class="btn btn-primary " {{--}data-toggle="modal" data-target="#modalBuat"--}}>Tambah Toko</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dataTables" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Branch</th>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Tlp</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($toko as $cabang)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$cabang->branch['nama_toko']}}</td>
                                        <td>{{$cabang['nama_toko']}}</td>
                                        <td>{{$cabang['kode_toko']}}</td>
                                        <td>{{$cabang['tlp']}}</td>
                                        <td>
                                            {{--<a class="btn btn-outline btn-primary btn-xs" href="{{route('toko.show',$cabang->id)}}"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></a>--}}
                                            <a class="btn btn-outline btn-warning btn-xs" href="{{route('toko.edit',$cabang->id)}}"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>
                                            {{--                                        <a  href="{{ route('spk-jenis.edit', $jenis->id) }}"></a>--}}
                                            {{--                                        @if(count($) == 0)--}}
                                            <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{route('toko.destroy',$cabang->id)}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                <i class="glyphicon glyphicon-trash" aria-hidsden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                </i>
                                            </a>
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

    <form method="POST" action="{{url('/')}}" accept-charset="UTF-8" class="formDelete2 half-width right">
        {{csrf_field()}}
        {{method_field('delete')}}
    </form>
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
    {{--Modal BUAT --}}
@endsection
@section('scripts')
    @parent
    <!-- Page-Level Scripts -->
    <script>
        var id = null;
        var baseURL = '{{url('/')}}';
        $('.btnDelete2').click(function () {
            id = $(this).data('id');
            $('.formDelete2').attr('action', id);
        });
        $('.btnYes2').click(function () {
            $('.formDelete2').submit();
        });
    </script>
@endsection