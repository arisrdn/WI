<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 16-Jul-18
 * Time: 9:39 AM
 */

namespace App\Repositories\Laporan\Mtc;


interface LaporanMtcServiceIntervace
{

    public function storeAwal(array $data);
    public function getDetail($id);
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
    public function storeItem($id,array $data);
    public function destroyItem($id);
}