<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 21.39
 */

namespace App\Repositories\Lokasi\Kecamatan;


interface KecamatanRepositoryInterface
{
    public function getKecamatanAll($kotaID = null);

    public function getKecamatan($id);
}