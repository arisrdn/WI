<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 21.31
 */

namespace App\Repositories\Lokasi\Kota;


use App\Models\Lokasi\Kota;

class KotaRepository implements KotaRepositoryInterface
{
    /**
     * @var Kota
     */
    private $kota;

    /**
     * KotaRepository constructor.
     */
    public function __construct(Kota $kota)
    {
        $this->kota = $kota;
    }

    public function getKotaAll($propinsiID = null)
    {
        $kota = null;
        if (!$propinsiID)
            $kota= $this->kota->get();
        else
            $kota = $this->kota
                ->where('propinsi_id', $propinsiID)
                ->get();
        return $kota;

    }

    public function getKota($id)
    {
        $kota = $this->kota->find($id);
        return $kota;

    }
}