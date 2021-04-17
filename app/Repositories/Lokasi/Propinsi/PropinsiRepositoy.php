<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 20.57
 */

namespace App\Repositories\Lokasi\Propinsi;


use App\Models\Lokasi\Propinsi;

class PropinsiRepositoy implements PropinsiRepositoyInterface
{
    /**
     * @var Propinsi
     */
    private $propinsi;

    /**
     * PropinsiRepositoy constructor.
     * @param Propinsi $propinsi
     */
    public function __construct(Propinsi $propinsi)
    {
        $this->propinsi = $propinsi;
    }

    public function getPropinsiAll()
    {
        return $this->propinsi->get();
    }

    public function getPropinsi($id)
    {
        $propinsi = $this->propinsi->find($id);
        return $propinsi;
    }
}