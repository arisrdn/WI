<?php

namespace App\Http\Controllers;

use App\Models\LaporanMtc;
use App\Repositories\Laporan\Mtc\LaporanMtcServiceIntervace;
use App\Repositories\Laporan\Mtc\MtcItemInterface;
use App\Repositories\Toko\Spk\SpkInterface;
use App\Repositories\Toko\Spk\SpkItemInterface;
use Illuminate\Http\Request;

class LaporanMtcController extends Controller
{
    /**
     * @var LaporanMtcServiceIntervace
     */
    private $laporanMtc;
    /**
     * @var SpkInterface
     */
    private $spk;
    /**
     * @var SpkItemInterface
     */
    private $item;
    /**
     * @var MtcItemInterface
     */
    private $mtcItem;

    /**
     * LaporanMtcController constructor.
     * @param LaporanMtcServiceIntervace $laporanMtc
     * @param SpkInterface $spk
     * @param SpkItemInterface $item
     * @param MtcItemInterface $mtcItem
     */
    public function __construct(LaporanMtcServiceIntervace $laporanMtc, SpkInterface $spk, SpkItemInterface $item, MtcItemInterface $mtcItem)
    {
        $this->laporanMtc = $laporanMtc;
        $this->spk = $spk;
        $this->item = $item;
        $this->mtcItem = $mtcItem;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spk=$this->spk->getWhere('1');
        $data=compact('spk','branch');
        return view('laporan.mtc.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   $laporan=$this->laporanMtc->getDetail($id);
        if ($laporan ==null){return abort(404);}
        $parse=compact('laporan');
        return view('laporan.mtc.create',$parse);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->all();
//        dd($request);
        if($request->priode !=null){
            $store=$this->laporanMtc->storeAwal($data);
            return redirect(route('store2.create',$store->id));
        }else {
            $hasil=$this->laporanMtc->store($data);
            return redirect(route('pemeliharaan.show',$hasil->spkItem->spk->id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanMtc  $laporanMtc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spk=$this->spk->getDetail($id);
//        $toko=$this->toko->getAll();
        $data=compact('spk','toko');
        return view('laporan.mtc.show',$data);

    }

    public function showmtc($item_id,$lap)
    {
//        dd($this->item->getDetail($item_id)->laporanMTC);
        $item=$this->item->getDetail($item_id)->laporanMtc->where('priode',$lap)->pluck('id');
//        dd($item[0]);
        $laporan=$this->laporanMtc->getDetail($item[0]);
//        dd($laporan->mtcDetail);
        $data=compact('laporan');
        return view('laporan.mtc.showitem',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanMtc  $laporanMtc
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanMtc $laporanMtc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanMtc  $laporanMtc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item ,$lap)
    {
        $data=$request->all();
        $this->validate($request,[
            'nama' => 'required',
            'sebelum' => 'required',
            'sesudah' => 'required'
        ]);
        $this->laporanMtc->storeItem($request['lap_id'],$data);
        return redirect()->route('show.mtc',[$item,$lap])->withMessage('Data  berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanMtc  $laporanMtc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $item ,$lap)
    {
        $this->laporanMtc->destroyItem($request['id']);
        return redirect()->route('show.mtc',[$item,$lap])->withMessage('Data  berhasil di hapus');
    }
}
