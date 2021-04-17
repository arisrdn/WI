<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 22.15
 */

namespace App\Repositories\Lokasi;


use App\Repositories\Lokasi\Kecamatan\KecamatanRepositoryInterface;
use App\Repositories\Lokasi\Desa\DesaRepositoryInterface;
use App\Repositories\Lokasi\Kota\KotaRepositoryInterface;
use App\Repositories\Lokasi\Propinsi\PropinsiRepositoyInterface;

class LokasiService implements LokasiServiceInterface
{
    /**
     * @var PropinsiRepositoyInterface
     */
    private $propinsiRepositoy;
    /**
     * @var KotaRepositoryInterface
     */
    private $kotaRepository;
    /**
     * @var KecamatanRepositoryInterface
     */
    private $kecamatanRepository;
    /**
     * @var DesaRepositoryInterface
     */
    private $desaRepository;

    /**
     * LokasiRepositori constructor.
     */
    public function __construct(
        PropinsiRepositoyInterface $propinsiRepositoy,
        KotaRepositoryInterface $kotaRepository,
        KecamatanRepositoryInterface $kecamatanRepository,
        DesaRepositoryInterface $desaRepository
    )
    {
        $this->propinsiRepositoy = $propinsiRepositoy;
        $this->kotaRepository = $kotaRepository;
        $this->kecamatanRepository = $kecamatanRepository;
        $this->desaRepository = $desaRepository;
    }

    public function getPropinsiAll()
    {
        return $this->propinsiRepositoy->getPropinsiAll();
    }

    public function getKotaAll($propinsiID = null)
    {
        return $this->kotaRepository->getKotaAll($propinsiID);
    }

    public function getKecamatanAll($kotaID = null)
    {
        return $this->kecamatanRepository->getKecamatanAll($kotaID);
    }

    public function getDesaAll($kecamatanID = null)
    {
        return $this->desaRepository->getDesaAll($kecamatanID);
    }
}