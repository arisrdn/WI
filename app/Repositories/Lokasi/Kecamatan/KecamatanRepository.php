<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 21.56
 */

namespace App\Repositories\Lokasi\Kecamatan;


use App\Models\Lokasi\Kecamatan;

class KecamatanRepository implements KecamatanRepositoryInterface
{
    /**
     * @var Kecamatan
     */
    private $kecamatan;

    /**
     * KecamatanRepository constructor.
     */
    public function __construct(Kecamatan $kecamatan)
    {
        $this->kecamatan = $kecamatan;
    }

    public function getKecamatanAll($kotaID = null)
    {
        $kecamatans = null;
        if (!$kotaID)
            $kecamatans = $this->kecamatan->get();
        else
            $kecamatans = $this->kecamatan
                ->where('kota_id', $kotaID)
                ->get();
        return $kecamatans;
    }

    public function getKecamatan($id)
    {
        $kecamatan = $this->kecamatan->find($id);
        return $kecamatan;
    }
}