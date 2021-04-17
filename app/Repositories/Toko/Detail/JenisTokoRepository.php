<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 27-Jun-18
 * Time: 11:58 PM
 */

namespace App\Repositories\Toko\Detail;


use App\Models\JenisToko;

class JenisTokoRepository implements JenisTokoInterface
{
    /**
     * @var JenisToko
     */
    private $jenisToko;

    public function __construct(JenisToko $jenisToko)
    {
        $this->jenisToko = $jenisToko;
    }


    public function getAll()
    {
        return $this->jenisToko->all();
    }

    public function getDetail($id)
    {
        return $this->jenisToko->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $simpan= new JenisToko();
        $simpan->id_jenis=$data['id_jenis'];
        $simpan->nama=$data['nama'];
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
}