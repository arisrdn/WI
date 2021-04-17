<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 27-Jun-18
 * Time: 11:56 PM
 */

namespace App\Repositories\Toko\Topologi;


use App\Models\Topologi;

class TopologiRepository implements TopologiInterface
{
    /**
     * @var Topologi
     */
    private $topologi;

    public function __construct(Topologi $topologi)
    {
        $this->topologi = $topologi;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->topologi->all();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->topologi->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $simpan= new Topologi();
        $simpan->id=$data['id'];
        $simpan->nama=$data['nama'];
        $simpan->namxxxa=$data;
        $simpan->save();
        return $simpan;
    }


    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
        $su->id_jabatan=$data['id'];
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
}