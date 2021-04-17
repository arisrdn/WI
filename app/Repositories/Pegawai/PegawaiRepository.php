<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 10-Jul-18
 * Time: 9:35 PM
 */

namespace App\Repositories\Pegawai;


use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PegawaiRepository implements PegawaiInterface
{
    /**
     * @var Pegawai
     */
    private $pegawai;

    public function __construct(Pegawai $pegawai)
    {
        $this->pegawai = $pegawai;
    }

    public function getAll()
    {
        $pegawai = $this->pegawai->all();
        return $pegawai;
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->pegawai->find($id);
    }

    public function store($data)
    {
//        dd($data);
        // TODO: Implement store() method.
        $pegawai = new Pegawai();
        $pegawai->id = $data['id'];
        $pegawai->jk_id = $data['jenis_kelamin'];
//        $pegawai->pendidikan_id = $data['pendidikan'];
//        $pegawai->pernikahan_id = $data['pernikahan'];
//        $pegawai->desa_id = $data['desa'];
        $pegawai->jabatan_id = $data['jabatan'];
        $pegawai->nama = $data['nama'];
//        $pegawai->cita_cita = $data['cita-cita'];
        $pegawai->no_hp = $data['no_hp'];
//        $pegawai->no_ktp = $data['no_ktp'];
        $pegawai->nik = $data['nik'];
//        $pegawai->mulai_bekerja = $data['tanggal_mulai'];
        $pegawai->tempat_lahir = $data['tempat_lahir'];
        $pegawai->tanggal_lahir = $data['tanggal_lahir'];
        $pegawai->email = $data['email'];
        $pegawai->username = $data['username'];
        $pegawai->password = bcrypt($data['password']);
        $pegawai->alamat = $data['alamat'];
        $pegawai->is_active = "1";
        if (isset($data['path_foto_personal']))
        {
            $pegawai->path_foto_person = $data['path_foto_personal'];
        }
        if (isset($data['path_foto_ktp']))
        {
            $pegawai->path_foto_ktp = $data['path_foto_ktp'];
        }
        if (isset($data['path_foto_kk']))
        {
            $pegawai->path_foto_kk = $data['path_foto_kk'];
        }
        if (isset($data['path_cv']))
        {
            $pegawai->cv = $data['path_cv'];
        }
        $pegawai->save();
//       dd($pegawai);
        return $pegawai;

    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $pegawai = $this->pegawai->find($id);
        $pegawai->nama = $data['nama'];
        $pegawai->jk_id = $data['jenis_kelamin'];
        $pegawai->jabatan_id = $data['jabatan'];
        $pegawai->nik = $data['nik'];
//        $pegawai->no_ktp = $data['no_ktp'];
        $pegawai->no_hp = $data['no_hp'];
        $pegawai->tempat_lahir = $data['tempat_lahir'];
        $pegawai->tanggal_lahir = $data['tanggal_lahir'];
//        $pegawai->pernikahan_id = $data['pernikahan'];
//        $pegawai->pendidikan_id = $data['pendidikan'];
//        $pegawai->cita_cita = $data['cita-cita'];
//        $pegawai->desa_id = $data['desa'];
        $pegawai->alamat = $data['alamat'];
//        $pegawai->mulai_bekerja = $data['tanggal_mulai'];

        if (isset($data['path_foto_personal']))
        {
            $pegawai->path_foto_person = $data['path_foto_personal'];
        }
        if (isset($data['path_foto_ktp']))
        {
            $pegawai->path_foto_ktp = $data['path_foto_ktp'];
        }
        if (isset($data['path_foto_kk']))
        {
            $pegawai->path_foto_kk = $data['path_foto_kk'];
        }
        if (isset($data['path_cv']))
        {
            $pegawai->cv = $data['path_cv'];
        }
        $pegawai->save();
        return $pegawai;
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $pegawai = $this->pegawai->find($id);
        $pegawai->delete();
//        dd($pegawai);
        return $pegawai;
    }
    public function gantiPassword($id, $newPassword)
    {
        $pegawai = $this->getDetail($id);
        $pegawai->password = bcrypt($newPassword);
        $pegawai->save();
    }
    public function persetujuan($id, $data)
    {
        $update=$this->pegawai($id);
        $update->alasan_disetujui_1 = $data['alasan'];
        $update->disetujui_1 = $data['persetujuan_value'];
        $update->disetujui_1_id = Auth::id();
        $update->tanggal_disetujui_1 = Carbon::now();
        $update->is_active = 1;
        $update->save();
        return $update;
    }
    public function changePassword($id, $newPassword)
    {
        $employee = $this->getDetail($id);
        $employee->password = bcrypt($newPassword);
        $employee->save();
        return $employee;
    }

}