<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 27-Jun-18
 * Time: 11:58 PM
 */

namespace App\Repositories\Toko\Detail;


use App\Models\Toko;

class TokoRepository implements TokoInterface
{
    /**
     * @var Toko
     */
    private $toko;

    public function __construct(Toko $toko)
    {
        $this->toko = $toko;
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->toko->all();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->toko->find($id);
    }

    public function store(array $data)
    {
//        dd($data);
        // TODO: Implement store() method.
        $simpan= new Toko();
        $simpan->kode_toko=$data['kode_toko'];
        $simpan->nama_toko=$data['nama'];
        $simpan->pic=$data['pic'];
        $simpan->tlp=$data['tlp'];
        $simpan->lat=$data['lat'];
        $simpan->lng=$data['lng'];
        $simpan->alamat=$data['alamat'];
        $simpan->jenis_toko_id=$data['jenis_toko'];
        $simpan->coverage_area=$data['area'];
        $simpan->desa_id=null;
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
        $su->kode_toko=$data['kode_toko'];
        $su->nama_toko=$data['nama'];
        $su->pic=$data['pic'];
        $su->tlp=$data['tlp'];
        $su->lat=$data['lat'];
        $su->lng=$data['lng'];
        $su->alamat=$data['alamat'];
        $su->jenis_toko_id=$data['jenis_toko'];
        $su->coverage_area=$data['area'];
        $su->desa_id=null;
        $su->save();
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

    public function getBranch()
    {
        // TODO: Implement getBranch() method.
        return $this->toko->where('jenis_toko_id',1)->get();
    }

    public function getToko()
    {
        // TODO: Implement getToko() method.
        return $this->toko->where('jenis_toko_id',2)->get();

    }
}