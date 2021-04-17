<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 17-Jul-18
 * Time: 10:39 PM
 */

namespace App\Repositories\Harga;


use App\Models\DetailHarga;

class DetailHargaRepository implements DetailHargaInterface
{

    /**
     * @var DetailHarga
     */
    private $detailHarga;

    public function __construct(DetailHarga $detailHarga)
    {
        $this->detailHarga = $detailHarga;
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->detailHarga->all();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->detailHarga->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $simpan= new DetailHarga();
        $simpan->spk_item_id=$data['spk_item'];
        $simpan->spk_id=$data['spk_id'];
        $simpan->satuan=$data['satuan'];
        $simpan->harga=$data['harga'];
        $simpan->jumlah=$data['jumlah'];
//        $simpan->keterangan=$data['keterangan'] || null;
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $simpan= $this->getDetail($id);
        $simpan->spk_item_id=$data['spk_item'];
        $simpan->satuan=$data['satuan'];
        $simpan->harga=$data['harga'];
        $simpan->jumlah=$data['jumlah'];
//        $simpan->keterangan=$data['keterangan'] || null;
        $simpan->save();
        return $simpan;
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $data=$this->getDetail($id);
        $data->delete();
        return $data;
    }

    public function getNominal($id)
    {

    }
}