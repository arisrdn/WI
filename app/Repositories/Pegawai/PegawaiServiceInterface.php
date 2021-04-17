<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 10-Jul-18
 * Time: 9:58 PM
 */

namespace App\Repositories\Pegawai;


interface PegawaiServiceInterface
{
    public function getTotalPegawai();

    public function getPegawai($id);

    public function getJabatan();

    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);

    public function changePassword($data);

    public function logout();

    public function persetujuan($id, $data);
}