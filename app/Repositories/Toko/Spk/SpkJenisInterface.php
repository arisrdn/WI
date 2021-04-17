<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 03-Jul-18
 * Time: 5:21 AM
 */

namespace App\Repositories\Toko\Spk;


interface SpkJenisInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
}