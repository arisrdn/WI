<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 8:46 PM
 */

namespace App\Repositories\Toko\Spk;


interface SpkItemInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
    public function hapus($spk_id,$toko_id);
}