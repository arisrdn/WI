@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Module Manajemmen</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                            <form class="form-inline" method="POST" action="{{route('manajemen-modul.store')}}" accept-charset="UTF-8">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <input type="hidden" name="jabatan_id" value="{{$jabatan->id}}">
                                <div class="input-group">
                                    <label class="">Pilih Menu</label>
                                    <select data-placeholder="pilih Menu..." class="chosen-select form-control" name="module_id">
                                        <option value=""></option>
                                        @foreach($moduleall as $mod)
                                            <option  value="{{$mod->id}}">{{$mod->module}}</option  >
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn"><button class="btn btn-primary btn-sm" type="submit">+</button></span>
                                </div>
                            </form>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dataTables-mo" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Module</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1;   @endphp
                                @foreach($jabatan->moduleAccess as $modu)
                                    @php $m=$modu->module_id; @endphp
{{--                                   module {{$modu->module_id?}}----}}
                                    @if($modu->module->parent_id == null)
                                        @if($modu->is_menu == 1)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td >
                                                    <i class="{{$modu->module->icon_url}}"></i>
                                                    <span class="nav-label">{{$modu->module->module}}</span>
                                                </td>
                                                <td>
                                                    <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{route('manajemen-modul.destroy',[$jabatan->id,$modu->module->id])}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                        <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                        </i>
                                                    </a>
                                                </td>
                                                </td>
                                            </tr>
                                        @elseif($modu->is_menu == 0)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    <i class="{{$modu->module->icon_url}}"></i>
                                                    <span class="nav-label">{{$modu->module->module}}</span>
                                                </td>
                                                <td>
                                                    <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{route('manajemen-modul.destroy',[$jabatan->id,$modu->module->id])}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                        <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                                @foreach($modu->module->children as $child)
{{--                                                    --{{$child->id }}=={{$modu->module->id}}--b{{$akses}}b-<br>----}}
{{--                                                    @if($child->id == $modu->module_id)--}}
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    <i class="fa fa-angle-double-right" style="margin-left:20px">{{$child->module}}</i>
                                                </td>
                                                <td>
                                                    <a class="btnDelete2 btn btn-outline btn-danger btn-xs" data-id="{{route('manajemen-modul.destroy',[$jabatan->id,$child->id])}}" href="" data-toggle='modal' data-target='#konfirmasi2'>
                                                        <i class="glyphicon glyphicon-trash" aria-hidden="true" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='grey'">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                            {{--@endif--}}
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    <form method="POST" action="{{url('/')}}" accept-charset="UTF-8" class="formDelete2 half-width right">
        {{csrf_field()}}
        {{method_field('delete')}}
    </form>
@endsection
@section('scripts')
    @parent
      <!-- Page-Level Scripts -->
    <script>
        $('#data_5 .input-daterange').datepicker({
            format:'yyyy-mm-dd',
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
        var id = null;
        $('.btnDelete2').click(function () {
            id = $(this).data('id');
            $('.formDelete2').attr('action', id);
        });
        $('.btnYes2').click(function () {
            $('.formDelete2').submit();
        });

        $('.chosen-select').chosen();
        $(document).ready(function() {
            $('.dataTables-mo').DataTable({
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
                },
                "iDisplayLength":50,
            });
        } );

    </script>
@endsection