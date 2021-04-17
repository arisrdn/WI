<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 11:40 AM
 */

namespace App\Repositories\Toko;


use App\Repositories\Toko\Detail\JenisTokoInterface;
use App\Repositories\Toko\Detail\TokoInterface;
use App\Repositories\Toko\Topologi\JenisTopologiInterface;
use App\Repositories\Toko\Topologi\TopologiInterface;

class TokoService implements TokoServiceInterface
{
    /**
     * @var JenisTokoInterface
     */
    private $jenisToko;
    /**
     * @var JenisTopologiInterface
     */
    private $jenisTopologi;
    /**
     * @var TokoInterface
     */
    private $toko;
    /**
     * @var TopologiInterface
     */
    private $topologi;

    public function __construct(
        JenisTokoInterface $jenisToko,
        JenisTopologiInterface $jenisTopologi,
        TokoInterface $toko,
        TopologiInterface $topologi
    )
    {
        $this->jenisToko = $jenisToko;
        $this->jenisTopologi = $jenisTopologi;
        $this->toko = $toko;
        $this->topologi = $topologi;
    }

    public function getTokoAll()
    {
        return $this->toko->getAll();
    }

    public function getjenisTokoAll()
    {
        return $this->jenisToko->getAll();
    }

    public function getjenisTopologiAll()
    {
        return $this->jenisTopologi->getAll();
    }

    public function getTopologiAll()
    {
        return $this->topologi->getAll();
    }

    public function getToko($id)
    {
        return $this->toko->getDetail($id);
    }

    public function getjenisToko($id)
    {
        return $this->jenisToko->getDetail($id);
    }

    public function getjenisTopologi($id)
    {
        return $this->jenisTopologi->getDetail($id);
    }

    public function getTopologi($id)
    {
        return $this->topologi->getDetail($id);
    }

    public function Tokostore(array $data)
    {
        return $this->toko->store($data);
    }

    public function Tokoupdate($id, $data)
    {
        return $this->toko->update($id, $data);
    }

    public function Tokodestroy($id)
    {
        return $this->toko->destroy($id);
    }

    public function Topologistore(array $data)
    {
        return $this->topologi->store($data);
    }

    public function Topologiupdate($id, $data)
    {
        return $this->topologi->update($id,$data);
    }

    public function Topologidestroy($id)
    {
        return $this->topologi->destroy($id);
    }

    public function getTokoBranch()
    {
        // TODO: Implement getTokoBranch() method.
        return $this->toko->getBranch();
    }

    public function getTokoToko()
    {
        // TODO: Implement getTokoToko() method.
        return $this->toko->getToko();

    }
}