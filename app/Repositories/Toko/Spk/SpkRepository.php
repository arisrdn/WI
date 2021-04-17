<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 8:45 PM
 */

namespace App\Repositories\Toko\Spk;


use App\Models\Spk;
use Carbon\Carbon;

class SpkRepository implements SpkInterface
{
    /**
     * @var SpkItem
     */
    private $item;

    public function __construct(Spk $item )
    {
        $this->item = $item;
    }
    public function getWhere($id)
    {
        return $this->item->where('spk_jenis_id', $id)->get();
    }

    public function getAll()
    {
        return $this->item->all();
    }

    public function getDetail($id)
    {
        return $this->item->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
//        dd(Carbon::now());
        $simpan= new Spk();
        $simpan->no_spk=$data['no_spk'];
        $simpan->spk_jenis_id=$data['jenis_spk'];
        $simpan->branch_id=$data['branch'];
        $simpan->status='0';
        $simpan->tgl_mulai=$data['tgl_mulai'];
        $simpan->tgl_akhir=$data['tgl_akhir'];
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $su= $this->getDetail($id);
//        $su->id=$data['id'];
        $su->no_spk=$data['no_spk'];
        $su->spk_jenis_id=$data['spk_jenis_id'];
        $su->status=$data['status'];
        $su->tgl_mulai=$data['tgl_mulai'];
        $su->tgl_akhir=$data['tgl_akhir'];
        $su->save();
        return $su;
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $data=$this->getDetail($id);
//        dd($data);
        $data->delete();
        return $data;
    }
}