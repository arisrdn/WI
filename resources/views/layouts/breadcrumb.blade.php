<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h3>@yield('judul')</h3>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url('/')}}">HOME</a>
            </li>
            @for($i = 1; $i <= count(Request::segments()); $i++)
                <li>
                    <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                        {{strtoupper(Request::segment($i))}}
                    </a>
                </li>
            @endfor
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
