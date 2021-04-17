<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 28-Jun-18
 * Time: 12:02 AM
 */

namespace App\Repositories\Jabatan;
use App\Models\Jabatan;
use Ramsey\Uuid\Uuid;

class JabatanRepository implements JabatanInterface
{
    private $jabatan;

    /**
     * JabatanRepository constructor.
     * @param Jabatan $jabatan
     */
    public function __construct(Jabatan $jabatan)
    {
        $this->jabatan=$jabatan;
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->jabatan->all();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->jabatan->find($id);
    }

    public function store(array $data)
    {
//        dd((string)Uuid::uuid4());
        // TODO: Implement store() method.
        $simpan= new Jabatan();
        $simpan->id = (string)Uuid::uuid4();
        $simpan->nama=$data['nama'];
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
//        $su->id_jabatan=$data['id'] = (string)Uuid::uuid4();
        $su->nama=$data['nama'];
        $su->save();
        return $su;
    }

    public function destroy($id)
    {
//        dd($id);
        // TODO: Implement destroy() method.
        $data=$this->getDetail($id);
        $data->delete();
        return $data;
    }
}