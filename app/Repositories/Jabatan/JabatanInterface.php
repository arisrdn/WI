<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 28-Jun-18
 * Time: 12:02 AM
 */

namespace App\Repositories\Jabatan;


interface JabatanInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);

}