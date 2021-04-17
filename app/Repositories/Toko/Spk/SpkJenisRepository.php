<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 03-Jul-18
 * Time: 5:21 AM
 */

namespace App\Repositories\Toko\Spk;


use App\Models\SpkJenis;

class SpkJenisRepository implements SpkJenisInterface
{
    /**
     * @var SpkJenis
     */
    private $spkJenis;

    public function __construct(SpkJenis $spkJenis)
    {
        $this->spkJenis = $spkJenis;
    }

    public function getAll()
    {
        return $this->spkJenis->all();
    }

    public function getDetail($id)
    {
        return $this->spkJenis->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $simpan= new SpkJenis();
        $simpan->nama=$data['nama'];
        $simpan->keterangan=$data['keterangan'];
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
        $su->nama=$data['nama'];
        $su->keterangan=$data['keterangan'];
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