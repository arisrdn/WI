<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 8:45 PM
 */

namespace App\Repositories\Toko\Spk;

use App\Models\SpkItem;

class SpkItemRepository implements SpkItemInterface
{
    /**
     * @var SpkItem
     */
    private $spkItem;

    /**
     * @var Spk
     */


    public function __construct(SpkItem $spkItem)
    {

        $this->spkItem = $spkItem;
    }

    public function getAll()
    {
        return $this->spkItem->all();
    }

    public function getDetail($id)
    {
        return $this->spkItem->find($id);
    }

    public function store(array $data)
    {
        $simpan= new SpkItem();
        $simpan->spk_id=$data['spk_id'];
        $simpan->toko_id=$data['toko_id'];
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
        $su->id_jenis=$data['id_jenis'];
        $su->nama=$data['nama'];
        $su->save();
        return $su;
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $data=$this->getDetail($id);
        $data->delete();
        return $data;
    }
    public function hapus($spk_id,$toko_id)
    {
        // TODO: Implement destroy() method.

        $flight = $this->spkItem->where('spk_id', $spk_id)->where('toko_id', $toko_id);
        $flight->delete();
        return $flight;
    }
}