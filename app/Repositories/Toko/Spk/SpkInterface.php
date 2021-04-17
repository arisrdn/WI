<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 8:44 PM
 */

namespace App\Repositories\Toko\Spk;


interface SpkInterface
{
    public function getWhere($id);
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);

}