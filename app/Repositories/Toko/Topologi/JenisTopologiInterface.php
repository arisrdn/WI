<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 27-Jun-18
 * Time: 11:53 PM
 */

namespace App\Repositories\Toko\Topologi;


interface JenisTopologiInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
}