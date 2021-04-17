@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Modul</th>
                                    <th>Akses</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($akses as  $ak)
                                {{$ak->id}}<br>
                                @endforeach
                                {{$modules}}
                                @foreach($modules as $modu)
                                    @foreach($modu->module as $modul2)

                                    @endforeach
                                    @if($modu->parent_id == null)
                                        @if($modu->is_menu == 1)
                                            <tr>
                                            <td >

                                                    <i class="{{$modu->icon_url}}"></i>
                                                    <span class="nav-label">{{$modu->nama}}</span>
                                            </td>
                                                <td>
                                                    <input type="checkbox" class="iCheckbox" name="module[{{$i++}}]" value="{{$modu->id}}" @if($modu->id == 1 ) checked="" @endif>
                                                </td>
                                            </tr>

                                        @elseif($modu->is_menu == 0)
                                            <?php $class = "";?>
                                            <tr>
                                               <td>
                                                     <i class="{{$modu->icon_url}}"></i>
                                                    <span class="nav-label">{{$modu->nama}}</span>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="iCheckbox" name="module[{{$i++}}]" value="{{$modu->id}}" @if($modu->id == $ak->id ) checked="" @endif>
                                                </td>
                                                    @foreach($modu->children as $a=> $child)
                                                        {{--@can('access-module', $child->url)--}}
                                                        @if(Request::is('*/persetujuan'))
                                                            {{--<li class="{{  Request::is($child->url) ? 'active' : ''}}">--}}
                                                                <a href="{{ url($child->url) }}">{{$child->nama}}</a>
                                                        @else
                                                            <tr>
                                                                <td>
{{--                                                                <a href="{{ url($child->url) }}">--}}
                                                                    <i class="fa fa-angle-double-right" style="margin-left:20px">{{$child->nama}}</i>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="iCheckbox" name="module[{{$i++}}]" value="{{$child->id}}" @if($child->id == $ak->id ) checked="" @endif>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                            {{--</li>--}}
                                            </tr>
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

@endsection
@section('scripts')
    @parent
    <script>
    </script>
@endsection