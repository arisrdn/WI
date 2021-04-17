<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/datapicker/datepicker3.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/dataTables/datatables.min.css')!!}"/>
    <link rel="stylesheet" href="{!! asset('css/plugins/dataTables/dataTables.bootstrap.min.css')!!}"/>
    <link rel="stylesheet" href="{!! asset('css/plugins/footable/footable.core.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/chosen/bootstrap-chosen.css') !!}" />
    <!-- Toastr style -->
    <link rel="stylesheet" href="{!! asset('css/plugins/toastr/toastr.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/animate.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}" />

    @yield('css')

</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
@include('layouts.navigation')

<!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">

        <!-- Page wrapper -->
    @include('layouts.topnavbar')

    <!-- Page br -->
    @include('layouts.breadcrumb')

    <!-- Main view  -->
    @yield('content')

    <!-- Footer -->
        @include('layouts.footer')

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->
<!-- Mainly scripts -->
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/jquery-3.1.1.min.js')!!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
<script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>

<!-- Custom and plugin javascript -->
{{--  <script src="{!! asset('js/inspinia.js')!!}"></script>--}}
<script src="{!! asset('js/plugins/pace/pace.min.js')!!}"></script>
<!-- Data picker -->
<script src="{!! asset('js/plugins/datapicker/bootstrap-datepicker.js')!!}"></script>
{{--table--}}
<script src="{!! asset('js/plugins/dataTables/jquery.dataTables.min.js')!!}"></script>
{{--<script src="{!! asset('js/plugins/dataTables/datatables.min.js')!!}"></script>--}}
<script src="{!! asset('js/plugins/dataTables/dataTables.bootstrap.min.js')!!}"></script>
<script src="{!! asset('js/plugins/footable/footable.all.min.js')!!}"></script>
{{--chosen--}}
<script src="{!! asset('js/plugins/chosen/chosen.jquery.js')!!}"></script>
<!-- Toastr script -->
<script src="{!! asset('js/plugins/toastr/toastr.min.js')!!}"></script>
<script>
    @if(Session::has('message'))
    toastr.success('{!!Session::get('message')!!}'," \"Success\"",{
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-center",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    });
    {{--<div class="alert alert-block alert-success">--}}
    {{--<button type="button" class="close" data-dismiss="alert">--}}
    {{--<i class="ace-icon fa fa-times"></i>--}}
    {{--</button>--}}
    {{--{!!Session::get('message')!!}--}}
    {{--</div>--}}
    @endif

    @foreach($errors->all() as $error)

    // make it not dissappear
    toastr.error("{{ $error }}", "Error !!", {
        "timeOut": "0",
        "extendedTImeout": "0"
    });

    @endforeach
    $(document).ready(function(){
        $('.dataTables').DataTable({
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
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-center",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

</script>
@section('scripts')
@show

</body>
</html>
