<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 16-Jul-18
 * Time: 9:11 AM
 */

namespace App\Repositories\Laporan\Mtc;


interface LaporanMtcInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
}