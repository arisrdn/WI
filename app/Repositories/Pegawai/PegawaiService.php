<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 10-Jul-18
 * Time: 9:58 PM
 */

namespace App\Repositories\Pegawai;

use App\Repositories\Jabatan\JabatanInterface;
use App\Repositories\Upload\UploadGambarServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class PegawaiService implements PegawaiServiceInterface
{
    /**
     * @var PegawaiInterface
     */
    private $pegawai;
    /**
     * @var JabatanInterface
     */
    private $jabatan;
    /**
     * @var UploadGambarServiceInterface
     */
    private $gambarService;

    public function __construct(
        PegawaiInterface $pegawai,
        JabatanInterface $jabatan,
        UploadGambarServiceInterface $gambarService
    )
    {
        $this->pegawai = $pegawai;
        $this->jabatan = $jabatan;
        $this->gambarService = $gambarService;
    }

    public function getTotalPegawai()
    {
        return $this->pegawai->getAll();
    }

    public function getPegawai($id)
    {
        return $this->pegawai->getDetail($id);
    }

    public function getJabatan()
    {
        return $this->jabatan->getAll();
    }

    public function store(array $data)
    {
//        dd($data);
        $validator = $this->validatorStore($data);

        $response = DB::transaction(function () use ($data)
        {
//            dd($data);
            $data['id'] = (string)Uuid::uuid4();
//            dd((string) $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, $data['nama']));
            $data = $this->appendImageToData($data);
            return $this->pegawai->store($data);
        });
        return $response;
    }

    public function update($id, array $data)
    {

//        dd($data);
        $this->validatorUpdate($data);
        $pegawai=$this->getPegawai($id);
        $pathPersonalPhoto = config('data.PATH_GAMBAR.PEGAWAI.PERSONAL');
        $pathCv = config('data.PATH_GAMBAR.PEGAWAI.CV');
        if (isset($data['foto_personal']))
        {
            if(file_exists($pegawai->path_foto_person)) {
                unlink(public_path($pegawai->path_foto_person));
            }
            $data['path_foto_personal'] = $this->gambarService->uploadImage($data['foto_personal'], $id, 'personal-'.$data['nama'], $pathPersonalPhoto);
        }
        if (isset($data['cv']))
        {
            if(file_exists($pegawai->cv)) {
                unlink(public_path($pegawai->cv));
            }
            $data['path_cv'] = $this->gambarService->uploadImage($data['cv'], $id, 'CV-'.$data['nama'], $pathCv);
        }
//        $data = $this->appendImageToData($data,$id);
        return $this->pegawai->update($id,$data);
//
    }

    public function destroy($id)
    {
        $unlink=$this->pegawai->getDetail($id);
        if(file_exists($unlink->path_foto_person)) {
            unlink(public_path($unlink->path_foto_person));
        }
        return $this->pegawai->destroy($id);
    }


    public function logout()
    {
        // TODO: Implement logout() method.
    }

    public function persetujuan($id, $data)
    {
        return $this->pegawai->persetujuan($id,$data);
    }
    protected function validatorStore(array $data)
    {
        $message = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'username.required' => 'Username harus di isi',
            'password.required' => 'Password harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin belum dipilih',
            'jabatan.required' => 'Jabatan harus dipilih',
//            'no_ktp.required' => 'No KTP harus diisi',
//            'no_ktp.numeric' => 'No KTP harus berupa angka',
            'no_hp.numeric' => 'Nomor HP harus berupa angka',
//            'no_hp.regex' => 'Format nomor HP salah. Nomor HP harus dimulai dengan 08',
//            'tempat_lahir.required' => 'Tempat lahir harus diisi',
//            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
//            'pernikahan.required' => 'Status Pekawinan belum dipilih',
//            'pendidikan.required' => 'Status Pendidikan belum dipilih',
//            'cita-cita.required' => 'Cita-cita harus dipilih',
//            'desa.required' => 'Desa/kelurahan harus dipilih',
//            'alamat.required' => 'Alamat harus diisi',
            'foto_personal.required' => 'Foto diri harus diisi',
//            'foto_ktp.required' => 'Foto KTP harus diisi',
//            'foto_kk.required' => 'Foto KK harus diisi',
        ];
        return Validator::make($data, [
            "nama" => 'required',
            "email" => 'required',
            "username" => 'required',
            "password" => 'required',
            "jenis_kelamin" => 'required',
            "jabatan" => 'required',
//            "no_ktp" => 'required|digits:16',
//            "no_hp" => 'required|numeric|regex:/^08[0-9]{8,10}$/',
//            "tempat_lahir" => 'required',
//            "tanggal_lahir" => 'required|date',
//            "pernikahan" => 'required',
//            "pendidikan" => 'required',
//            "tanggal_mulai" => 'date',
//            "cita-cita" => 'required',
//            "desa" => 'required',
            "alamat" => 'required',
            "foto_personal" => 'image',
//            "foto_ktp" => 'image',
//            "foto_kk" => 'image',
            "cv" => 'required',
        ], $message)->validate();
    }

    protected function validatorUpdate(array $data)
    {
        $message = [
            'nama.required' => 'Nama harus diisi',
//?            'email.required' => 'Email harus diisi',
//            'username.required' => 'Username harus di isi',
//            'password.required' => 'Password harus diisi',
            'f.required' => 'Jenis Kelamin Belum diisi',
            'jabatan.required' => 'Jabatan harus dipilih',
//            'no_ktp.required' => 'No KTP harus diisi',
//            'no_ktp.numeric' => 'No KTP harus berupa angka',
            'no_hp.numeric' => 'Nomor HP harus berupa angka',
//            'no_hp.regex' => 'Format nomor HP salah. Nomor HP harus dimulai dengan 08',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
//            'pernikahan.required' => 'Status Pekawinan belum dipilih',
//            'pendidikan.required' => 'Status Pendidikan belum dipilih',
//            'cita-cita.required' => 'Cita-cita harus dipilih',
//            'desa.required' => 'Desa/kelurahan harus dipilih',
//            'alamat.required' => 'Alamat harus diisi',
            'foto_personal.required' => 'Foto diri harus diisi',
//            'foto_ktp.required' => 'Foto KTP harus diisi',
//            'foto_kk.required' => 'Foto KK harus diisi',
        ];
        return Validator::make($data, [
            "nama" => 'required',
            "jenis_kelamin" => 'required',
            "jabatan" => 'required',
//            "no_ktp" => 'required|digits:16',
            "no_hp" => 'required|numeric|regex:/^08[0-9]{8,10}$/',
//            "tempat_lahir" => 'required',
//            "tanggal_lahir" => 'required|date',
//            "pernikahan" => 'required',
//            "pendidikan" => 'required',
//            "tanggal_mulai" => 'date',
//            "cita-cita" => 'required',
//            "desa" => 'required',
            "alamat" => 'required',
            "foto_personal" => 'image',
//            "foto_ktp" => 'image',
//            "foto_kk" => 'image',
        ], $message)->validate();
    }

    private function validatorChangePassword(array $data)
    {
        $message = [
            'oldPassword.required' => 'Kata Sandi lama harus diisi',
            'newPassword.required' => 'Kata Sandi baru harus diisi',
            'confirmationPassword.required' => 'Konfirmasi Kata Sandi baru harus diisi',
            'confirmationPassword.same' => 'Konfirmasi Kata Sandi tidak sama'
        ];
        $validator = Validator::make($data, [
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmationPassword' => 'required|same:newPassword'
        ], $message)->validate();

        return $validator;
    }

    private function appendImageToData(array $data, $id = null)
    {
        $id = $id || $data['id'];
        $pathPersonalPhoto = config('data.PATH_GAMBAR.PEGAWAI.PERSONAL');
        $pathIdentityPhoto = config('data.PATH_GAMBAR.PEGAWAI.KTP');
        $pathFamilyCardPhoto = config('data.PATH_GAMBAR.PEGAWAI.KK');
        $pathCv = config('data.PATH_GAMBAR.PEGAWAI.CV');
        $data['path_foto_personal'] = $this->gambarService->uploadImage($data['foto_personal'], $id, 'personal-'.$data['nama'], $pathPersonalPhoto);
//        $data['path_foto_ktp'] = $this->gambarService->uploadImage($data['foto_ktp'], $id, 'identity', $pathIdentityPhoto);
//        $data['path_foto_kk'] = $this->gambarService->uploadImage($data['foto_kk'], $id, 'family', $pathFamilyCardPhoto);
        $data['path_cv'] = $this->gambarService->uploadImage($data['cv'], $id, 'CV-'.$data['nama'], $pathCv);
        return $data;
    }

    public function changePassword($data)
    {
        $validator = $this->validatorChangePassword($data);

        $oldPassword = $data['oldPassword'];
        $id = Auth::user()->id;
        $newPassword = $data['newPassword'];

        $checkOldPassword = $this->verifyCredential(null, $oldPassword);

        if ($checkOldPassword)
        {

                return $this->pegawai->changePassword($id, $newPassword);

        }

    }
    private function verifyCredential($username = null, $password)
    {
        if (!$username) {
            $username = Auth::user()->username;
        }

        if (!Auth::attempt(['username' => $username, 'password' => $password])) {
            return false;
        }
        return true;
    }

}
