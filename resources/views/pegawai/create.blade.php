@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah data Pegawai</h5>
                        <div class="ibox-tools">
                            <a href="{{url()->previous()}}" class="btn btn-primary " {{--}data-toggle="modal" data-target="#modalBuat"--}}>Kembali</a>
                        </div>
                    </div>
                    <form action="{{route('pegawai.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form">
                    <div class="ibox-content">
                                    <div class=" col-md-4 col-xs-12 col-left">
                                        <div class="ibox-content" style="text-align: center; border: none; padding: 0 5px 0 3px;">
                                            <div class=" employee">
                                                <div class="">
                                                    <span><img src="{{ asset('/img/image_not_found.jpg')}}" style="text-align:center" id="photo" alt="photo" width="130"></span>
                                                </div>
                                            </div>
                                            <div class="fileUpload btn btn-outline btn-primary" style="margin-bottom: 20px;">
                                                <span>Tambah Foto<span style="color:red">*</span></span>
                                                <input id="image" type="file" class="upload required personal-photo" data-msg-required="Foto harus diisi" name="personal_photo" accept="image/*"/>
                                            </div>
                                            <div id="errorPersonal" style="margin-left: -10px;"></div>
                                            <div class="btn-group-left-side-bottom">
                                                <div class="form-group"><label class="col-sm-3 control-label">Nama<span style="color: red;">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control required" data-msg-required="Nama harus diisi" name="nama" value="{{old('nama')}}" aria-required="true" type="text">
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
                                                        <label class="radio-inline">
                                                            <input type="radio"class="gender required" data-msg-required="Jenis kelamin harus dipilih"  name="jenisKelamin" value="1" >Pria</label>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio"class="gender required" data-msg-required="Jenis kelamin harus dipilih"  name="jenisKelamin" value="2" >Wanita</label>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-8 col-xs-12 col-right">
                                        <div class="ibox-content" style="border-style: none; border-left:2px dashed; text-align: left">
                                            <div class="form-group"><label class="col-sm-3 control-label">Jabatan<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control required" data-msg-required="Jabatan harus dipilih" name="jabatan" aria-required="true">
                                                        @foreach($jabatan as $key => $jabatan)
                                                            <option value="{{$key}}">{{$jabatan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Nomor KTP<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control required length" maxlength="16" minlength="16" data-msg-required="Nomor KTP harus diisi" data-msg-maxlength="Nomor KTP harus 16 angka" data-msg-minlength="Nomor KTP harus 16 angka" name="no_ktp" value="{{old('no_ktp')}}" aria-required="true" type="number">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Nomor HP<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control required" data-msg-required="Nomor HP harus diisi" maxlength="12" minlength="10" data-msg-maxlength="Nomor HP harus maksimal 12 karakter" data-msg-minlength="Nomor HP harus minimal 10 karakter" name="no_hp" value="{{old('no_hp')}}" aria-required="true" type="number">
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
                                                    <div id="errorBirthDate"></div>
                                                </div>
                                            </div>

                                            <div class="form-group"><label class="col-sm-3 control-label">Alamat<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control required" data-msg-required="Alamat harus diisi" name="alamat" rows="2" aria-required="true">{{old('alamat')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Tanggal Mulai</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group date">
                                                        <input class="form-control required started-date datepicker hasDatepicker" data-msg-required="Tanggal mulai harus diisi" id="started_date" name="tanggal_mulai" value="" aria-required="true" type="text">
                                                        <span style="border-top-right-radius: 8px; border-bottom-right-radius: 8px;" class="input-group-addon" ,="" id="startedDate">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                                    </div>
                                                </div>
                                                <div id="errorStartedDate"></div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    <div class="ibox-footer center clear-both row-spacing">
                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Preview Photo -->
    <div class="modal inmodal" id="modalIdentityPhoto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-body modal-body-custom" style="padding:5px">
                    <label style="padding-bottom:10px">Foto KTP</label>
                    {{--<div>{{ Html::image(asset('/assets/img/rails_logo.png'), 'photo', ['style' => 'width:100%', 'id' => 'identityPhoto']) }}</div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="modalFamilyCardPhoto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-body modal-body-custom" style="padding:5px">
                    <label style="padding-bottom:10px">Foto Kartu Keluarga</label>
                    {{--<div>{{ Html::image(asset('/assets/img/rails_logo.png'), 'photo', ['style' => 'width:100%', 'id' => 'familyCardPhoto']) }}</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 7px;
        }
        .right {
            float: right;: ;
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
    <script>
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



    </script>
@endsection
