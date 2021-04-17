<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 16-Jul-18
 * Time: 9:40 AM
 */

namespace App\Repositories\Laporan\Mtc;


use App\Repositories\Toko\Spk\SpkItemInterface;
use App\Repositories\Upload\UploadGambarService;
use Illuminate\Support\Facades\Validator;

class LaporanMtcService implements LaporanMtcServiceIntervace
{
    /**
     * @var LaporanMtcInterface
     */
    private $laporanMtc;
    /**
     * @var MtcItemInterface
     */
    private $mtcItem;
    /**
     * @var SpkItemInterface
     */
    private $spkItem;
    /**
     * @var UploadGambarService
     */
    private $gambarService;

    public function __construct(LaporanMtcInterface $laporanMtc, MtcItemInterface $mtcItem,SpkItemInterface $spkItem,UploadGambarService $gambarService)
    {
        $this->laporanMtc = $laporanMtc;
        $this->mtcItem = $mtcItem;
        $this->spkItem = $spkItem;
        $this->gambarService = $gambarService;
    }
    public function storeAwal(array $data)
    {
        return $this->laporanMtc->store(array_only($data, ['priode','spk_item']));

    }
    public function getDetail($id)
    {
        return $this->laporanMtc->getDetail($id);
    }

    public function store(array $data)
    {
//        dd('ss');
        $this->validatorStore($data);
        $data = $this->appendImageToDataToko($data);
        $data = $this->appendImageToDataScan($data);
        $lprspk= $this->laporanMtc->update($data['lap_id'],array_only($data, ['priode', 'toko_path','scan_path','spk_item']));
        foreach ($data['kegiatan'] as $kegiatan) {
            $kegiatan = $this->appendImageToDataSebelum($kegiatan,$lprspk->id);
            $kegiatan = $this->appendImageToDataSesudah($kegiatan,$lprspk->id);
            $ok=$this->mtcItem->store($lprspk->id,$kegiatan);
        }
        return $lprspk;

    }

    public function update($id, array $data)
    {
        $lp=$this->laporanMtc->getDetail($id);
        if (isset($data['toko_img']))
        {
            if(file_exists($lp->toko)) {
                unlink(public_path($lp->toko));
            }
            $data = $this->appendImageToDataToko($data);
        }
        if (isset($data['scan_img']))
        {
            if(file_exists($lp->scan_form)) {
                unlink(public_path($lp->scan_formm));
            }
            $data = $this->appendImageToDataScan($data);
        }
        $lprspk= $this->laporanMtc->update($id,array_only($data, ['toko_path','scan_path']));
//        delete templatedetail
        foreach ($lp->mtcDetail as $item) {

            $this->mtcItem->destroy($item->id);
        }
//        store dtemplatedetail
        foreach ($data['fundingTemplates'] as $fundingTemplate) {
            $this->templateDetailRepository->store2($fundingTemplate, $id);
        }
        return redirect()->route('template.index')->withMessage('Template berhasil di update');

    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    private function appendImageToDataToko(array $data, $id = null)
    {
//        dd($data['lap_id']);
        $kode=$this->getDetail($data['lap_id']);
        $kode_toko=$kode->spkItem->toko->kode_toko;
        $id = $id || $data['lap_id'];
        $pathToko = config('data.PATH_LAPORAN.MASTER.MTC').$kode_toko.'/';
        $data['toko_path'] = $this->gambarService->uploadImage($data['toko_img'], $id, 'toko-'.$kode->spkItem['priode'], $pathToko);
        return $data;
    }
    private function appendImageToDataScan(array $data, $id = null)
    {
        $kode=$this->getDetail($data['lap_id']);
        $kode_toko=$kode->spkItem->toko->kode_toko;
        $id = $id || $data['lap_id'];
        $pathScan = config('data.PATH_LAPORAN.MASTER.MTC').$kode_toko.'/';
        $data['scan_path'] = $this->gambarService->uploadImage($data['scan_img'], $id, 'scan-'.$kode->spkItem['priode'], $pathScan);
        return $data;
    }

    private function appendImageToDataSebelum(array $kegiatan, $id = null)
    {
        $kode_toko=$this->laporanMtc->getDetail($id)->spkItem->toko->kode_toko;
//        $id = $id || $kegiatan['spk_item'];
        $pathToko = config('data.PATH_LAPORAN.MASTER.MTC').$kode_toko.'/SEBELUM/';
        $kegiatan['sebelum_path'] = $this->gambarService->uploadImage($kegiatan['sebelum'], $id, 'sebelum-', $pathToko);
        return $kegiatan;
    }

    private function appendImageToDataSesudah(array $kegiatan, $id = null)
    {
        $kode_toko=$this->laporanMtc->getDetail($id)->spkItem->toko->kode_toko;
//        $id = $id || $kegiatan['spk_item'];
        $pathScan = config('data.PATH_LAPORAN.MASTER.MTC').$kode_toko.'/SESUDAH/';
        $kegiatan['sesudah_path'] = $this->gambarService->uploadImage($kegiatan['sesudah'], $id, 'sesudah-', $pathScan);
        return $kegiatan;
    }

    protected function validatorStore(array $data)
    {
        $message = [
            'scan_img.required'=>'scan harus di isi',
            'toko_img.required'=>'foto toko harus di isi',
            'kegiatan.*.nama.required' => 'Keterangan Harus di isi',
            'kegiatan.*.sebelum.required' => 'Foto Sebelum Hrus di isi',
            'kegiatan.*.sesudah.required' => 'foto sesudah harus di isi'
        ];
        return Validator::make($data, [
            'scan_img' => 'required',
            'toko_img' => 'required',
            'kegiatan.*.nama' => 'required',
            'kegiatan.*.sebelum' => 'required',
            'kegiatan.*.sesudah' => 'required',
        ],$message)->validate();
    }

    public function storeItem($id, array $data)
    {
        $kegiatan=$data;
        $kegiatan = $this->appendImageToDataSebelum($kegiatan,$id);
        $kegiatan = $this->appendImageToDataSesudah($kegiatan,$id);
        $ok=$this->mtcItem->store($id,$kegiatan);
    }

    public function destroyItem($id)
    {
        $item=$this->mtcItem->getDetail($id);
//        dd($item);
        if(file_exists($item->sebelum)) {
            unlink(public_path($item->sebelum));
        }
        if(file_exists($item->sesudah)) {
            unlink(public_path($item->sesudah));
        }
        $data = $this->mtcItem->destroy($id);
        return $data;

    }
}