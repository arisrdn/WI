<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 21.53
 */

namespace App\Repositories\Lokasi\Desa;


use App\Models\Lokasi\Desa;

class DesaRepository implements DesaRepositoryInterface
{
    /**
     * @var Desa
     */
    private $desa;

    /**
     * DesaRepository constructor.
     * @param Desa $desa
     */
    public function __construct(Desa $desa)
    {
        $this->desa = $desa;
    }

    public function getDesaAll($kecamatanID = null)
    {
        $desas = null;
        if (!$kecamatanID)
            $desas = $this->desa->get();
        else {
            $desas = $this->desa
                ->where('kecamatan_id', $kecamatanID)
                ->get();
        }
//foreach ($desas as $des){
//
//        dd($des->id);
//    }

        return $desas;
    }

    public function getDesa($id)
    {
        $desa = $this->desa->find($id);
        return $desa;
    }
}