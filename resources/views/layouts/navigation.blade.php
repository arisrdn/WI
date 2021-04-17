<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                @if(Auth::check())
                    <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle"
                             @if(Auth::user()->path_foto_person)
                             src="{{asset(Auth::user()->path_foto_person)}}"
                             @else
                             src="{{asset('assets/img/image_not_found.jpg')}}"
                             @endif
                             style="width: 80px;height: 80px"
                        />
                         </span>
                        <a  href="{{route('ganti-sandi')}}">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->nama}}</strong>
                            </span> <span class="text-muted text-xs block">Ganti Sandi </span>
                        </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{route('ganti-sandi')}}">Ganti password</a></li>
                            {{--<li><a href="mailbox.html">Mailbox</a></li>--}}
                            <li class="divider"></li>
                            <li><a href="{{url('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                @endif
                {{--<div class="dropdown profile-element">--}}
                    {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
                        {{--<span class="clear">--}}
                            {{--<span class="block m-t-xs">--}}
                                {{--<strong class="font-bold">Example user</strong>--}}
                            {{--</span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>--}}
                        {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu animated fadeInRight m-t-xs">--}}
                        {{--<li><a href="#">Logout</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                <div class="logo-element">
                    <i class=""> <img src="{{asset('img/wi.png')}}" class="img-circle" width="30px"></i>
                </div>
            </li>
            {{--<li class="--}}{{-- isActiveRoute('main') --}}{{--">--}}
                {{--<a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Main view</span></a>--}}
            {{--</li>--}}
            {{--<li class="--}}{{-- isActiveRoute('minor') --}}{{-- active">--}}
                {{--<a href="{{ url('/minor') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Minor view</span> </a>--}}
            {{--</li>--}}
            @if(Session::get('modules'))
            <?php $modules = Session::get('modules') ?>
            @foreach(Session::get('modules') as $module)
                @if($module->parent_id == null)
                    @if($module->is_menu == 1)
                        <li class="{{ Request::is($module->url) ? 'active' : '' }}
                        {{--                        @if(preg_match('/'.$module->url.'/',url()->full()))active @endif --}}
                        @if(strpos(url()->full(),url($module->url) ) !== false && url($module->url)!=url('/'))active @endif
                                ">
                            {{--@can('access-module',$module->url)--}}
                            <a href="{{ url($module->url) }}">
                                <i class="{{$module->icon_url}}"></i>
                                <span class="nav-label">{{$module->module}}</span>
                            </a>
                            {{--@endcan--}}
                        </li>
                    @elseif($module->is_menu == 0)
                        <?php $class = "";?>
                        @foreach($module->children as $child)
                            <?php $url = $child->url?>
                            @if(Request::is($url))
                                <?php $class = 'active';?>
                            @endif
                        @endforeach
                        <li class="{{ Request::is($module->url) ? 'active' : $class }}">
                            <a href="#">
                                <i class="{{$module->icon_url}}"></i>
                                <span class="nav-label">{{$module->module}}</span> <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                @foreach($module->children as $child)
                                    {{--@can('access-module', $child->url)--}}
                                    @if(Request::is('*/persetujuan'))
                                        <li class="{{  Request::is($child->url) ? 'active' : ''}}">
                                            <a href="{{ url($child->url) }}">{{$child->module}}</a>
                                        </li>
                                    @else
                                        <li class="{{  Request::is($child->url) || Request::is($child->url.'/*') ? 'active' : ''}}">
                                            <a href="{{ url($child->url) }}">
                                                <i class="fa fa-angle-double-right"></i>
                                                {{$child->module}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif

                @endif
            @endforeach
            @endif

        </ul>

    </div>
</nav>
