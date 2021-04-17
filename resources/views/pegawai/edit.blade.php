@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Jabatan</h5>
                    </div>
                    <div class="ibox-content">
                            <form action="{{route('pegawai.update',$pegawai->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="no-lf-padding">
                                    <div class="col-md-4 col-xs-12 col-left" style="text-align: center;">
                                        <div class=" employee">
                                            <div class="">
                                        <span>
                                            @if($pegawai->path_foto_person)
                                                <img src="{{ asset($pegawai->path_foto_person)}}" style="text-align:center" id="photo" alt="photo" width="130">
                                            @else
                                                <img src="{{ asset('/assets/img/image_not_found.jpg')}}" style="text-align:center" id="photo" alt="photo" width="130">
                                            @endif
                                        </span>
                                            </div>
                                        </div>
                                        <div class="fileUpload btn btn-outline btn-primary" style="margin-bottom: 1px;">
                                            <span>Ubah Foto<span style="color:red"></span></span>
                                            <input id="image" type="file" class="upload personal-photo" data-msg-required="Foto harus diisi" name="foto_personal" accept="image/*"/>
                                        </div>
                                        <div id="errorPersonal" style="margin-left: -10px;"></div>
                                    </div>
                                    <div class="col col-md-8 col-xs-12 col-right">
                                        <div class="ibox-content" style="border-style: none; text-align: left">
                                            <div class="form-group"><label class="col-sm-3 control-label">Nama<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control required" data-msg-required="Nama harus diisi" name="nama" value="{{$pegawai->nama}}" aria-required="true" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Jenis Kelamin<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    @php $lk=""; $p="" ;
                                                    if($pegawai->role_id == 1){$lk="checked";}else{$p="checked";}
                                                    @endphp
                                                        <label class="radio-inline">
                                                            <input type="radio"class="gender required" data-msg-required="Jenis kelamin harus dipilih" {{$lk}}  name="jenis_kelamin" value="1" >Pria</label>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio"class="gender required" data-msg-required="Jenis kelamin harus dipilih" {{$p}} name="jenis_kelamin" value="2" >Wanita</label>
                                                        </label>
                                                    <div id="errorGender"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Jabatan<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control required selectpicker" data-live-search="true"  data-container="body" data-msg-required="Jabatan harus dipilih" name="jabatan" aria-required="true" id="jabatan">
                                                        @foreach($jabatan as  $role)
                                                            <option value="{{$role->id}}" @if ($role->id == $pegawai->role_id) selected="selected" @endif>{{$role->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">No Pegawai</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="nik" value="{{$pegawai->nik}}" aria-required="true" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Nomor HP<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control required" data-msg-required="Nomor HP harus diisi" maxlength="12" minlength="10" data-msg-maxlength="Nomor HP harus maksimal 12 karakter" data-msg-minlength="Nomor HP harus minimal 10 karakter" name="no_hp" value="{{$pegawai->no_hp}}" aria-required="true" type="number">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Tempat Lahir<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control required" data-msg-required="Tempat lahir harus diisi" name="tempat_lahir" value="{{$pegawai->tempat_lahir}}" aria-required="true" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Tanggal Lahir<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group date">
                                                        <input class="form-control required datepicker birthdate hasDatepicker" data-msg-required="Tanggal lahir harus diisi" id="birth_date" name="tanggal_lahir" value="{{$pegawai->tanggal_lahir}}" aria-required="true" type="text">
                                                        <span style="border-top-right-radius: 8px; border-bottom-right-radius: 8px;" class="input-group-addon" id="birthdate">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group"><label class="col-sm-3 control-label">Alamat<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control required" data-msg-required="Alamat harus diisi" name="alamat"  rows="5" aria-required="true">{{$pegawai->alamat}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">CV<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input id="cv" type="file" class="upload required" data-msg-required="CV harus diisi" name="cv"/>
                                                    @if($pegawai->cv)
                                                        <a href="{{asset($pegawai->cv)}}">lihat</a>
                                                    @else
                                                        cv tidak ada
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-footer center clear-both row-spacing">
                                    <button type="submit" class="btn btn-success btn-simpan">Simpan</button>
                                </div>
                            </form>

                    </div>
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
    @parent
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