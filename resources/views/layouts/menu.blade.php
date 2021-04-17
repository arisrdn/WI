<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                         </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
            </li>
            {{--@if(Session::get('modules'))--}}
            <?php $modules = Session::get('modules') ?>
            @foreach(Session::get('modules') as $module)
                @if($module->parent_id == null)
                    @if($module->is_menu == 1)
                        <li class="{{ Request::is($module->url) ? 'active' : '' }}">
                            {{--@can('access-module',$module->url)--}}

                            <a href="{{ url($module->url) }}">
                                <i class="{{$module->icon_url}}"></i>
                                {{--{{ Html::image(asset($module->icon_url), 'photo', ['class' => 'nav-label', 'style' => 'max-width:15px; margin-right:10px']) }}--}}
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
                                {{--{{ Html::image(asset($module->icon_url), 'photo', ['class' => 'nav-label', 'style' => 'max-width:15px; margin-right:10px']) }}--}}
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
                                    {{--@endcan--}}
                                @endforeach
                            </ul>
                        </li>
                    @endif

                @endif
            @endforeach
            {{--@endif--}}
        </ul>
    </div>
</nav>
