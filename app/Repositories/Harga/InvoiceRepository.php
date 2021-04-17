<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 18-Jul-18
 * Time: 7:00 AM
 */

namespace App\Repositories\Harga;


use App\Models\Invoice;
use App\Models\Spk;
use Carbon\Carbon;

class InvoiceRepository implements InvoiceInterface
{
    /**
     * @var Invoice
     */
    private $invoice;
    /**
     * @var Spk
     */
    private $spk;

    public function __construct(Invoice $invoice,Spk $spk)
    {
        $this->invoice = $invoice;
        $this->spk = $spk;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->invoice->all();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return $this->invoice->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        $simpan= new Invoice();
        $simpan->no_invoice=$data['no_invoice'];
        $simpan->spk_id=$data['spk_id'];
        $simpan->keterangan=$data['keterangan'];
        $simpan->tujuan=$data['tujuan'];
        $simpan->alamat=$data['alamat'];
        $simpan->ppn=$data['ppn'];
        $simpan->persen=$data['persen'];
//        $simpan->keterangan=$data['keterangan'] || null;
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
        $simpan= $this->getDetail($id);
//        $simpan->spk_item_id=$data['no_invoice'];
//        $simpan->no_invoice=$data['no_invoice'];
        $simpan->spk_id=$data['spk_id'];
        $simpan->keterangan=$data['keterangan'];
        $simpan->tujuan=$data['tujuan'];
        $simpan->alamat=$data['alamat'];
        $simpan->ppn=$data['ppn'];
        $simpan->persen=$data['persen'];
//        $simpan->keterangan=$data['keterangan'] || null;
        $simpan->save();
        return $simpan;
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $data=$this->invoice->find($id);
        $data->delete();
        return $data;
    }

    public function konfirmasi($id)
    {$id=1;
        $simpan= $this->invoice->find($id);
        $simpan->status=$id;
        $simpan->save();
        return $simpan;
    }

    public function getNoInvoice()
    {
        $tahun=Carbon::now()->format('Y');
        $hari=Carbon::now()->format('d');
        $array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $bulan = $array_bulan[date('n')];
        $noawal= '/INV/W-INDO/'.$bulan.'/'.$tahun;
        $nomax=$this->invoice->where('no_invoice', 'like', '%'.$noawal )->max('no_invoice');
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

    public function getNominal($id)
    {
        $spk=$this->spk->find($id);
//        dd($spk->detailHarga);
        if (count($spk->detailHarga) != null) {
            foreach ($spk->detailHarga as $s => $sp) {
                $saa[] = $sp->harga * $sp->jumlah;
            }
//            dd('a');
            return $saa;
        }
        else{
            $saa=array();
//            dd('aa');
            return $saa;
        }


    }
}