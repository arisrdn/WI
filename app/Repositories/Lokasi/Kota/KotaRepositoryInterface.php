<?php

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 21.28
 */

namespace App\Repositories\Lokasi\Kota;

interface KotaRepositoryInterface
{
    public function getKotaAll($propinsiID = null);

    public function getKota($id);
}