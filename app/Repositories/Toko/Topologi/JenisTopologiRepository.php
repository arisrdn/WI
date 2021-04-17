<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 27-Jun-18
 * Time: 11:54 PM
 */

namespace App\Repositories\Toko\Topologi;


use App\Models\JenisTopologi;

class JenisTopologiRepository implements JenisTopologiInterface
{
    /**
     * @var JenisTopologi
     */
    private $jenisTopologi;

    public function __construct(JenisTopologi $jenisTopologi)
    {
        $this->jenisTopologi = $jenisTopologi;
    }

    public function getAll()
    {
        return $this->jenisTopologi->all();
    }

    public function getDetail($id)
    {
        return $this->jenisTopologi->find($id);
    }

    public function store(array $data)
    {
        $simpan= new JenisTopologi();
        $simpan->id=$data['id'];
        $simpan->nama=$data['nama'];
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
        $su->id=$data['id'];
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