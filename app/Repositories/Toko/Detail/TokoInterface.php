<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 27-Jun-18
 * Time: 11:57 PM
 */

namespace App\Repositories\Toko\Detail;


interface TokoInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
    public function getBranch();
    public function getToko();

}
