<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 16-Jul-18
 * Time: 9:11 AM
 */

namespace App\Repositories\Laporan\Mtc;


use App\Models\LaporanMtc;

class laporanMtcRepository implements LaporanMtcInterface
{
    /**
     * @var LaporanMtc
     */
    private $laporanMtc;

    public function __construct(LaporanMtc $laporanMtc)
    {
        $this->laporanMtc = $laporanMtc;
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->laporanMtc->all();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->laporanMtc->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $simpan= new LaporanMtc();
        $simpan->priode=$data['priode'];
//        $simpan->tgl=$data['tgl'];
//        $simpan->scan_form=$data['scan_path'];
        $simpan->spk_item_id=$data['spk_item'];
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
        if (isset($data['toko_path']))
        {
            $su->toko=$data['toko_path'];
        }
        if (isset($data['scan_path']))
        {
            $su->scan_form=$data['scan_path'];
        }
//        $su->sok_item_id=$data['spk_item'];
        $su->save();
        return $su;
    }

    public function destroy($id)
    {
        $data=$this->getDetail($id);
        $data->delete();
        return $data;
    }
}