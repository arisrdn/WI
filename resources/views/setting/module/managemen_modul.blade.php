@extends('layouts.app')

@section('css')
    <style>
        .no-margin {
            margin: 0;
        }

        .iTemplate {
            display: none;
        }
    </style>
@stop

@section('content')
    {{--{!! Breadcrumbs::render('pengaturan_managemen_modul') !!}--}}
    <h1><b>Pengaturan Manajemen Modul</b> &emsp;<span class="title-head">Menampilkan Manajemen Modul</span></h1></br>
    <div class="row">
        <div class="col col-md-12 col-xs-12">
            <div class="ibox float-e-margins">
{{--                {!! view("_partials.message")->with(compact('message', 'errors')) !!}--}}
                <div class="ibox-content no-lf-padding">
                    <div class="ibox-content border-none">
                        <form action="{{route('manajemen-modul.store')}}" class="formModuleManagement" method="post">
                        {{--{!! Form::open(['url' => 'pengaturan/manajemen-modul','class'=>'formModuleManagement','method'=>'postm']) !!}--}}
                        <div class="row" style="margin:0 0 10px -30px;">
                            <div class="col-md-12 col-xs-12">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group" >
                                        <label for="ddlRole" class="col-sm-3 control-label left">Jabatan</label>
{{--                                        {{ Form::label('', 'Jabatan', ['class' => 'col-sm-3 control-label left', 'style' => 'padding-left: 0']) }}--}}
                                        <div class="col-sm-9"  style="margin-bottom: 5px; margin-top: -7px;" style = 'padding-left: 0;border: none'>
{{--                                            {{ Form::select('module_management[role]', $roleTitles, '', ['class' => 'form-control','id'=>'ddlRole']) }}--}}
                                            <select name="jabatan"  class="form-control" id="ddlRole">
                                                {{--<option value="">-pilih-</option>--}}
                                                @foreach($roleTitles as $id => $isi)
                                                <option value="{{$id}}">{{$isi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                             <p>aaaa <span id="txtHint"></span></p>
                                <div class="col-md-6 col-xs-12">

                                    <div class="form-group right">
                                        <label class="col-sm-3 control-label left" class='col-sm-8 control-label'>Check All</label>
{{--                                        {{ Form::label('', 'Check All', ['class' => 'col-sm-8 control-label']) }}--}}
                                        <div class="col-sm-4">
                                            <div class="checkbox checkbox-success" style="margin-top: 0;">
                                                <label class=""></label><input value="" id="checkAll" type="checkbox">
{{--                                                {{ Form::checkbox('', '', '', array('id' => 'checkAll')) }}--}}
                                                {{--{{ Form::label('', '') }}--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col col-md-12 col-xs-12">
                                <table class="table table-bordered">
                                    <tr class="iTemplate">
                                        <td><label class="iTitle"></label></td>
                                        <td align="center">
                                            <div class="checkbox checkbox-success no-margin">
                                                <input type="checkbox" class="iCheckbox">
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="modal inmodal" id="simpan" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content animated bounce">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                <h6 class="modal-title">Masukkan Password Anda</h6>
                                                <input type="password" id="txtPassword"
                                                       class="form-control col-md-offset-4"
                                                       style="margin-top:20px; width:33%;">
                                                <div style="margin-top:15px">
                                                    <input type="submit" class="btn btn-primary btnSubmit"
                                                           value="Simpan">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Batal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--{!! Form::close() !!}--}}
                        </form>
                    </div>
                    <div class="ibox-footer center clear-both row-spacing">
                        <button type="button"class='btn btn-success' data-toggle='modal' data-target= '#simpan'></button>
                        {{--{{ Form::button('Simpan', ['class' => 'btn btn-success', 'data-toggle' => 'modal', 'data-target' => '#simpan']) }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        var baseURL = '<?php echo url('/') ?>';

        $('#simpan').on('shown.bs.modal', function () {
            $('#txtPassword').focus().keydown(function (e) {
                if (e.which == '13') {
                    $('form.formModuleManagement').submit();
                }
            });
        });
        $('#ddlRole').change(function () {
            $.ajax({
                type: 'GET',
                url: baseURL + '/ajax/getModule/'+$(this).val(),
                // data: {
                //     roleID: $(this).val()
                // }

                success: function (data) {
                    var modules = data.modules;
                    console.log(modules);
                    $.each(modules, function ($k, $v) {
                        var e = $('.iTemplate').clone().removeClass('iTemplate').addClass('module-data');
                        var checkbox = $('.iCheckbox', e);
                        console.log($v.is_menu);
                        $('.iTitle', e).text($v.module);
                        if ($v.module == 'Dashboard') {
                            e.hide();
                        }
                        if ($v.module.length > 0) {
                            checkbox.prop('checked', 'checked');
                        }
                        if ($v.parent_id != null) {
                            checkbox.attr('name', 'module_management[module]');//.attr('parent', i);
                            $('.iTitle', e).css('margin-left', '20px').css('font-weight', '600');
                        } else if ($v.is_menu == 1) {
                            checkbox.attr('name', 'module_management[module][' + $v.id + ']')
                        } else {
                            checkbox.parent().remove();
                        }
                        $('.iTemplate').before(e);
                    });
                }
            }).done(function () {
                checkAll($('#checkAll'), $('.iCheckbox', '.module-data'));
            });
        }).change();

        $('.btnSubmit').click(function () {
            $('<input>').attr({
                type: 'hidden',
                name: 'password'
            }).val($('#txtPassword').val()).appendTo('form');
            $('form.formModuleManagement').submit()
        });
        function checkAll($parent, $child) {
            var check = $child;

            $parent.change(function () {

                if ($parent.is(':checked')) {
                    check.prop('checked', true);
                } else {
                    check.prop('checked', false);
                }
            });

            check.change(function () {
                var allIsChecked = 0;
                $.each(check, function (k, v) {
                    if (!$(v).is(':checked')) {
                        $parent.prop('checked', false);
                        allIsChecked = 1;
                    }
                });
                if (allIsChecked == 0) {
                    $parent.prop("checked", true);
                }


            }).change();
        }
        function selectProvince() {
            $.ajax({
                type: 'GET',
                url: "{{ url('cities') }}",
                data: {
                    'provinceId': $('#province').val()
                }
            }).done(function(result) {
                clearVillage();
                clearDistrict();
                clearCity();
                $.each(result, function (i, item) {
                    $('#city').append($('<option>', {
                        value: item.id,
                        text : item.description
                    }));
                });
                $('#city').selectpicker('refresh');
            });
        }
    </script>
@endsection
