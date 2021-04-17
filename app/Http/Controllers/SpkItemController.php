<?php

namespace App\Http\Controllers;

use App\Repositories\Toko\Detail\TokoInterface;
use App\Repositories\Toko\Spk\SpkInterface;
use App\Repositories\Toko\Spk\SpkItemInterface;
use Illuminate\Http\Request;

class SpkItemController extends Controller
{
    /**
     * @var SpkItemInterface
     */
    private $spkItem;
    /**
     * @var TokoInterface
     */
    private $toko;
    /**
     * @var SpkInterface
     */
    private $spk;

    public function __construct(SpkItemInterface $spkItem,TokoInterface $toko,SpkInterface $spk)
    {
        $this->spkItem = $spkItem;
        $this->toko = $toko;
        $this->spk = $spk;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return redirect(route('spk.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
//        $data['aaaaaaaa']='aa';
//        dd($data);
        $nama=$request->a;
        if ($nama == 'new'){
            $this->validate($request, [
                'nama' => 'required',
                'area' => 'required',
                'kode_toko' => 'required|unique:tokos'
            ],
                [ 'nama.required'=>'Nama Tokos harap di isi !!',
                    'area.required'=>'cabang belum di pilih !!',
                    'kode_toko.unnique'=>'Nama sudah Ada !!'
                ]);
            $data=$request->all();
            $tok=$this->toko->store($data);
            $store['toko_id']=$tok->id;
            $store['spk_id']=$request->spk_id;
            $this->spkItem->store($store);
            return redirect()->route('spk.show',$request->spk_id)->withMessage('Data  berhasil ditambah');
        }
        else{
            $data=$request->all();
            $spkd=$this->spk->getDetail($request->spk_id);

            foreach ($spkd->spkItem as $item){

//                printf($item->id.' - '.$request->toko_id.'<br>');
                if ($item->id == $request->toko_id){
                    return back()->withErrors(['Data Sudah Ada !!']);
//                    return redirect()->route('spk.show',$request->spk_id)->withErrors('Data  sudah ada');
                }
            }
            $this->spkItem->store($data);
            return redirect()->route('spk.show',$request->spk_id)->withMessage('Data  berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SpkItem  $spkItem
     * @return \Illuminate\Http\Response
     */
    public function show(SpkItem $spkItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SpkItem  $spkItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SpkItem $spkItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SpkItem  $spkItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpkItem $spkItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SpkItem  $spkItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($spkid,$tokoid)
    {
        $this->spkItem->hapus($spkid,$tokoid);
        return redirect()->route('spk.show',$spkid)->withMessage('Data  berhasil di hapus');
    }
}
