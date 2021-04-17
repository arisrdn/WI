<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 10-Jul-18
 * Time: 9:34 PM
 */

namespace App\Repositories\Pegawai;


interface PegawaiInterface
{
    public function getAll();
    public function getDetail($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
    public function changePassword($id, $newPassword);


}