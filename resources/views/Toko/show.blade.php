@extends('layouts.app')

@section('title', config('data.T.alfa'))

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Detail Toko</h5>
                        <div class="ibox-tools">
                            <a href="{{route('branch.edit',$kirim->id)}}" class="btn btn-warning btn-sm btn-outline" {{--}data-toggle="modal" data-target="#modalBuat"--}}><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> Edit</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <dl>
                            <dt>Nama</dt>
                            <dd>{{$kirim->nama_toko}}</dd>
                            <dt>Kode </dt>
                            <dd>{{$kirim->kode_toko}}</dd>
                            <dt>PIC</dt>
                            <dd>{{$kirim->pic}}</dd>
                            <dt>Tlp</dt>
                            <dd>{{$kirim->tlp}}</dd>
                            <dt>Alamat</dt>
                            <dd>{{$kirim->alamat}}</dd>
                            <dt>Jumlah Toko</dt>
                            <dd>{{count($kirim->toko)}}</dd>
                            {{--<dt>Lokasi</dt>--}}
                            {{--<dd>{{$kirim->kode_toko}}</dd>--}}
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Toko</h5>
                        <div class="ibox-tools">
                            <a href="{{route('branch.create')}}" class="btn btn-primary btn-sm" {{--}data-toggle="modal" data-target="#modalBuat"--}}>Tambah Toko</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Toko</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($kirim->toko as $toko)
                                    <tr class="gradeX">
                                        <td>{{$i++}}</td>
                                        <td>{{$toko['nama_toko']}}</td>
                                        <td>
                                            <a class="btn btn-outline btn-primary btn-xs"  href="{{$toko->id}}"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>
                                            {{--                                        <a  href="{{ route('spk-jenis.edit', $toko->id) }}"></a>--}}
                                            {{--                                        @if(count($) == 0)--}}
                                            <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{route('toko.destroy',$toko->id)}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                </i>
                                            </a>
                                            <form method="POST" action="{{route('spk-jenis.destroy',$toko->id)}}" accept-charset="UTF-8" class="formDelete2 half-width right">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal inmodal" id="modal{{$toko->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated flipInY">
                                                <form method="post" action="{{route('spk-jenis.update',$toko->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title">Edit Data {{$toko->nama}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-horizontal">
                                                            <div class="form-group"><label class="col-lg-3 control-label">Nama SPK</label>
                                                                <div class="col-lg-9"><input type="text" placeholder="Masukan Nama Spk" class="form-control" name="nama" required value="{{$toko->nama}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label class="col-lg-3 control-label">Keterangan</label>
                                                                <div class="col-lg-9">
                                                                    <textarea name="keterangan" cols="2" class="form-control">{{$toko->keterangan}}</textarea>
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
@section('css')
<style>

    dl {
        margin-bottom:50px;
    }

    dl dt {
        background:#5f9be3;
        color:#fff;
        float:left;
        font-weight:bold;
        margin-right:10px;
        padding:5px;
        width:100px;
    }

    dl dd {
        margin:2px 0;
        padding:5px 0;
    }
    dt{
        text-align: right;
    }
    dt::after {
        content: " :";
    }
</style>
@endsection