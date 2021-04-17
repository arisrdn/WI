<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 16-Jul-18
 * Time: 3:13 PM
 */

namespace App\Repositories\Laporan\Mtc;


interface MTCServiceInterface
{
    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);
}