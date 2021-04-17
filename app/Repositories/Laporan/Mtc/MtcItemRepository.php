<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 16-Jul-18
 * Time: 9:12 AM
 */

namespace App\Repositories\Laporan\Mtc;


use App\Models\MtcItem;

class MtcItemRepository implements MtcItemInterface
{
    /**
     * @var MtcItem
     */
    private $mtcItem;

    public function __construct(MtcItem $mtcItem)
    {
        $this->mtcItem = $mtcItem;
    }

    public function store($id, array $item)
    {
        $MTC = new MtcItem();
        $MTC->laporan_mtc_id = $id;
        $MTC->keterangan = $item['nama'];
        $MTC->sebelum = $item['sebelum_path'];
        $MTC->sesudah = $item['sesudah_path'];
        $MTC->save();
        return $MTC;
    }

    public function getDetail($id)
    {
        $MTC=$this->mtcItem->find($id);
        return $MTC;
    }
    public function destroy($id)
    {
        $MTC=$this->mtcItem->find($id);
        $MTC->delete();
        return $MTC;
    }

}