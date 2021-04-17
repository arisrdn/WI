<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 22.14
 */

namespace App\Repositories\Lokasi;


interface LokasiServiceInterface
{
    public function getPropinsiAll();

    public function getKotaAll($propinsiID = null);

    public function getKecamatanAll($kotaID = null);

    public function getDesaAll($kecamatanID = null);

}