<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 21.40
 */

namespace App\Repositories\Lokasi\Desa;


interface DesaRepositoryInterface
{
    public function getDesaAll($kecamatanID = null);

    public function getDesa($id);
}