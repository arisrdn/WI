<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 16-Jul-18
 * Time: 9:12 AM
 */

namespace App\Repositories\Laporan\Mtc;


interface MtcItemInterface
{
    public function store($id, array $item);
    public function getDetail($id);
    public function destroy($id);
}