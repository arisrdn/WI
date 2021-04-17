<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 17-Jul-18
 * Time: 10:39 PM
 */

namespace App\Repositories\Harga;


interface DetailHargaInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
    public function getNominal($id);
}