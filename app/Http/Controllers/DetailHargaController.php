<?php

namespace App\Http\Controllers;

use App\Models\DetailHarga;
use App\Repositories\Harga\DetailHargaRepository;
use App\Repositories\Toko\Spk\SpkInterface;
use Illuminate\Http\Request;

class DetailHargaController extends Controller
{
    /**
     * @var DetailHargaRepository
     */
    private $hargaRepository;
    /**
     * @var SpkInterface
     */
    private $spk;

    public function __construct(DetailHargaRepository $hargaRepository,SpkInterface $spk)
    {
        $this->hargaRepository = $hargaRepository;
        $this->spk = $spk;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $jumlah=0;
        $spk=$this->spk->getAll();

        foreach ($spk as $b){
            if (count($b->detailHarga) !=null){
            foreach ($b->detailHarga as $c){
             $jumlah[]=$c['jumlah'].'+'.$c['harga'];
             $harga[]=$c['harga']*$c['jumlah'];
            }}
            $jumlah=$jumlah;
        }
//        print_r($jumlah);
//return $harga;
        $data=compact('harga','spk');
        return view('biaya.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'biaya.*.satuan' => 'required',
            'biaya.*.harga' => 'required',
            'biaya.*.jumlah' => 'required'
    ],[
            'biaya.*.satuan.required' => 'biaya harus di isi',
            'biaya.*.harga.required' => 'harga harus di isi',
            'biaya.*.jumlah.required' => 'Qty harus di isi'
        ]);
        foreach ($request['biaya'] as $biaya) {

            $ok=$this->hargaRepository->store($biaya);
        }
        return redirect()->route('biaya.show',$biaya['spk_id'])->withMessage('Data  berhasil ditambah');
//        return redirect()->route('biaya.index')->withMessage('Data  berhasil ditambah');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailHarga  $detailHarga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spk=$this->spk->getDetail($id);
//        $toko=$this->toko->getAll();
        $data=compact('spk','toko');
        return view('biaya.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailHarga  $detailHarga
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailHarga $detailHarga)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailHarga  $detailHarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'biaya.*.satuan' => 'required',
            'biaya.*.harga' => 'required|numeric',
            'biaya.*.jumlah' => 'required|numeric'
        ],[
            'biaya.*.satuan.required' => 'biaya harus di isi',
            'biaya.*.harga.required' => 'harga harus di isi',
            'biaya.*.jumlah.required' => 'Qty harus di isi'
        ]);
        $spk=$this->spk->getDetail($id);
        foreach ($spk->detailHarga as $item) {

            $this->hargaRepository->destroy($item->id);
        }
        foreach ($request['biaya'] as $biaya) {
            $ok=$this->hargaRepository->store($biaya);
        }
        return redirect()->route('biaya.show',$id)->withMessage('Data  berhasil perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailHarga  $detailHarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailHarga $detailHarga)
    {
        //
    }
}
