@extends('layouts.app')

@section('title', 'Main page')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Tambah Pegawai</h5>
                </div>
                <div class="ibox-content">

                    <form id="form" action="{{route('pegawai.store')}}" class="wizard-big" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <h1>Step 1</h1>
                        <fieldset>
                            {{--<h2>Account Information</h2>--}}
                            <div class="row form-horizontal">
                                <div class="col-md-5" style="text-align: center;" >
                                    <div class=" employee">
                                        <div class="">
                                            <span><img src="{{ asset('/img/image_not_found.jpg')}}" style="text-align:center" id="photo" alt="photo" width="130"></span>
                                        </div>
                                    </div>
                                    <div class="fileUpload btn btn-outline btn-primary" style="margin-bottom: 1px;">
                                        <span>Tambah Foto<span style="color:red">*</span></span>
                                        <input id="image" type="file" class="upload required personal-photo" data-msg-required="Foto harus diisi" name="foto_personal" accept="image/*"/>
                                    </div>
                                    <div id="errorPersonal" style="margin-left: -10px;"></div>
                                    <div class="">
                                        <div class="col-md-12 col-xs-12" style="padding: 0">
                                            <div class="col-md-12 col-xs-12">
                                                <br>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Nama<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control required" data-msg-required="Nama harus diisi" name="nama" value="{{old('nama')}}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 form-horizontal" style="border-left: 1px black dotted" >
                                    <div class="form-group"><label class="col-sm-3 control-label">Jabatan<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control required selectpicker" required data-live-search="true"  data-container="body" data-msg-required="Jabatan harus dipilih" name="jabatan" aria-required="true" id="jabatan">
                                                <option value="">-Pilih Jabatan-</option>
                                                @foreach($jabatan as $key)
                                                    <option value="{{$key->id}}">{{$key->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">E-mail<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control required" data-msg-required="Email harus diisi" name="email" value="{{old('email')}}" aria-required="true" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Username<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control required" data-msg-required="Username harus diisi" name="username" value="{{old('username')}}" aria-required="true" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Password<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" id="" class="form-control" data-msg-required="Password harus diisi" >
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Jenis Kelamin<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            {{--<label id="jenis_kelamin-error" class="error" for="jenis_kelamin" style="position: fixed;padding-left: 80px;padding-top:3px"></label>--}}

                                            <label class="radio-inline"><input type="radio"class="gender required" data-msg-required="Jenis kelamin harus dipilih"  name="jenis_kelamin" value="1" >Pria</label>
                                            <label class="radio-inline"><input type="radio"class="gender required" data-msg-required="Jenis kelamin harus dipilih"  name="jenis_kelamin" value="2" >Wanita</label>
                                            <div id="errorGender"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h1>Step 2</h1>
                        <fieldset>
                            {{--<h2>Profile Information</h2>--}}
                            <div class="row form-horizontal">
                                <div class="col-lg-8 " style=" border-right: 1px black dotted;">
                                    <div class="form-group"><label class="col-sm-3 control-label">No Pegawai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control "  name="nik" value="{{old('nik')}}" aria-required="true" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Nomor HP<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control required" data-msg-required="Nomor HP harus diisi" maxlength="13" minlength="10" data-msg-maxlength="Nomor HP harus maksimal 12 karakter" data-msg-minlength="Nomor HP harus minimal 10 karakter" name="no_hp" value="{{old('no_hp')}}" aria-required="true" type="number">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Tempat Lahir<span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control required" data-msg-required="Tempat lahir harus diisi" name="tempat_lahir" value="{{old('tempat_lahir')}}" aria-required="true" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Tanggal Lahir<span style="color: red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group date">
                                                <input class="form-control required datepicker birthdate hasDatepicker" data-msg-required="Tanggal lahir harus diisi" id="birth_date" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" aria-required="true" type="text">
                                                <span style="border-top-right-radius: 8px; border-bottom-right-radius: 8px;" class="input-group-addon" id="birthdate">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">CV<span style="color: red">*</span></label>
                                        <div class="col-sm-9">
                                            <input id="cv" type="file" class="upload required" data-msg-required="CV harus diisi" name="cv"/>
                                        </div>
                                    </div>
                                    </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Alamat<span style="color: red">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea name="alamat"  class="form-control " required rows="3" data-msg-required="CV harus diisi"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    {{--jq step--}}
    <link href="{{asset('css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
    {{--jq  bs-select --}}
    <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet">
    {{--date picker--}}
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <style>
        label#jenis_kelamin-error{
            /*position: fixed;*/
            /*padding-left: 80px;*/
            /*padding-top: 3px;*/
        }
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 7px;
        }
        .right {
            float: right;
        }
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

    </style>
@endsection
@section('scripts')
    <!-- Data picker -->
    <script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <!-- Steps -->
    <script src="{{asset('js/plugins/steps/jquery.steps.min.js')}}"></script>
    <!-- Steps -->
    <script src="{{asset('js/plugins/validate/jquery.validate.min.js')}}"></script>
    <!-- Jquery Validate -->
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                ignore: ':hidden:not(.selectpicker)',
                errorPlacement: function (error, element) {
                    if (element.hasClass('selectpicker')) {
                        element.next().after(error); // special placement for select elements
                    } else if (element.hasClass('personal-photo')) {
                        error.appendTo("div#errorPersonal");
                    } else if (element.hasClass('identity-photo')) {
                        error.appendTo("div#errorIdentity");
                    } else if (element.hasClass('family-card-photo')) {
                        error.appendTo("div#errorFamilyCard");
                    } else if (element.hasClass('started-date')) {
                        error.appendTo("div#errorStartedDate");
                    } else if (element.hasClass('birthdate')) {
                        error.appendTo("div#errorBirthDate");
                    } else if (element.hasClass('gender')) {
                        error.appendTo("div#errorGender");
                    } else {
                        // error.insertAfter(element); // default placement for everything else
                    }
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $( function() {
                $( ".datepicker" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1940:+0',
//                dateFormat: 'yy-mm-dd'
                    format: 'yyyy-mm-dd'
                });
            } );

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image_upload_preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#inputFile").change(function () {
                readURL(this);
            });


            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#photo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image").change(function(){
                readURL(this);
            });

            $("#imageIdentity").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#identityPhoto').attr('src', e.target.result);
                    };
                    $('#identityPhotoCheck').show();
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $("#imageFamilyCard").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#familyCardPhoto').attr('src', e.target.result);
                    };
                    $('#familyCardCheck').show();
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('.uploadIdentityPhoto').change(function () {
                var ext = $('.uploadIdentityPhoto').val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert('Data harus berupa gambar!');
                }
            });

            $('.uploadFamilyCardPhoto').change(function () {
                var ext = $('.uploadFamilyCardPhoto').val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert('Data harus berupa gambar!');
                }
            });
        });

        function selectProvinsi() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/') }}/setting/getKota/"+$('#provinsi').val(),
            }).done(function(result) {
                clearDesa();
                clearKecamatan();
                clearKota();
                $.each(result, function (i, item) {
                    $('#kota').append($('<option>', {
                        value: item.id,
                        text : item.deskripsi
                    }));
                });
                $('#kota').selectpicker('refresh');
            });
        }

        function selectKota() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/') }}/setting/getKecamatan/"+$('#kota').val(),
            }).done(function(result) {
                clearKecamatan();
                clearDesa();
                $.each(result, function (i, item) {
                    $('#kecamatan').append($('<option>', {
                        value: item.id,
                        text : item.deskripsi
                    }));
                });
                $('#kecamatan').selectpicker('refresh');
            });
        }

        function selectKecamatan() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/') }}/setting/getDesa/"+$('#kecamatan').val(),
            }).done(function(result) {
                clearDesa();
                $.each(result, function (i, item) {
                    $('#desa').append($('<option>', {
                        value: item.id,
                        text : item.deskripsi
                    }));
                });
                $('#desa').selectpicker('refresh');
            });
        }

        $('.btn-simpan').click(function(){
            $('#form').valid();
            $('#form').submit();
        });

        //    $('#startedDate').click(function () {
        //        $("#started_date").datepicker( "show" );
        //    });
        //
        //    $('#birthdate').click(function () {
        //        $("#birth_date").datepicker( "show" );
        //    });

    </script>
@endsection
