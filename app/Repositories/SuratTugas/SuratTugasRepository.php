<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 19-Jul-18
 * Time: 6:27 AM
 */

namespace App\Repositories\SuratTugas;


use App\Models\SuratTugas;
use Carbon\Carbon;

class SuratTugasRepository implements SuratTugasInterface
{
    /**
         * @var SuratTugas
     */
    private $suratTugas;

    public function __construct(SuratTugas $suratTugas)
    {
        $this->suratTugas = $suratTugas;
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->suratTugas->all();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->suratTugas->find($id);
    }

    public function store(array $data)
    {
//        dd((string)Uuid::uuid4());
        // TODO: Implement store() method.
        $simpan= new SuratTugas();
        $simpan->spk_id=$data['spk_id'];
        $simpan->pegawai_id=$data['pegawai_id'];
        $simpan->no_st=$data['no_st'];
        $simpan->kegiatan=$data['kegiatan'];
        $simpan->tanggal_1=$data['tanggal_1'];
        if($data['tanggal_2'] != null){
            $simpan->tanggal_2=$data['tanggal_2'];
        }else{
            $simpan->tanggal_2=date('Y-m-d',strtotime(null));

        }
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $simpan= $this->getDetail($id);
        $simpan->spk_id=$data['spk_id'];
        $simpan->pegawai_id=$data['pegawai_id'];
        $simpan->tanggal_1=$data['tanggal_1'];
        if($data['tanggal_2'] != null){
            $simpan->tanggal_2=$data['tanggal_2'];
        }
        $simpan->save();
        return $simpan;
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $data=$this->getDetail($id);
        $data->delete();
        return $data;
    }

    public function getNo()
    {
        $tahun=Carbon::now()->format('Y');
        $hari=Carbon::now()->format('d');
        $array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $bulan = $array_bulan[date('n')];
        $noawal= '/ST/W-INDO/'.$bulan.'/'.$tahun;
        $nomax=$this->suratTugas->where('no_st', 'like', '%'.$noawal )->max('no_st');
        $jum=strlen($noawal);
        if ($nomax == '') {
            $no_urut = '0001'.$noawal;
        } else {
            $jum = substr($nomax,0,-$jum);
            $jum++;
            if($jum <= 9) {
                $no_urut = '000' . $jum.$noawal;
            } elseif ($jum <= 99) {
                $no_urut = '00' . $jum.$noawal;
            } elseif ($jum <= 999) {
                $no_urut = '0' . $jum.$noawal;
            } elseif ($jum <= 9999) {
                $no_urut = $jum.$noawal;
            } else {
                die("Nomor urut melebih batas");
            }
        }
//        dd($no_urut);
        return $no_urut;
    }
}