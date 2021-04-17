<?php

namespace App\Http\Controllers;

use App\Repositories\Toko\Detail\TokoInterface;
use App\Repositories\Toko\Spk\SpkInterface;
use App\Repositories\Toko\Spk\SpkJenisInterface;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    /**
     * @var SpkInterface
     */
    private $spk;
    /**
     * @var SpkJenisInterface
     */
    private $spkJenis;
    /**
     * @var TokoInterface
     */
    private $toko;


    public function __construct(SpkInterface $spk,SpkJenisInterface $spkJenis,TokoInterface $toko)
    {
        $this->spk = $spk;
        $this->spkJenis = $spkJenis;
        $this->toko = $toko;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisSpk=$this->spkJenis->getAll();
        $spk=$this->spk->getAll();
        $branch=$this->toko->getBranch();
        $data=compact('jenisSpk','spk','branch');
        return view('spk.index',$data);
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
php     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_spk' => 'required|unique:spks'
        ],
            [ 'no_spk.required'=>'No SPK harap di isi !!',
              'no_spk.unnique'=>'No SPK sudah Ada !!'
            ]);
        $data = $request->all();
        $spk=$this->spk->store($data);
        return redirect()->route('spk.show',$spk->id)->withMessage('Data  berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $spk=$this->spk->getDetail($id);
        $toko=$this->toko->getAll();
//    dd($spk);
        $data=compact('spk','toko');
        return view('spk.show',$data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisSpk=$this->spkJenis->getAll();
        $spk=$this->spk->getDetail($id);
        $branch=$this->toko->getBranch();
        $data=compact('jenisSpk','spk','branch');
        return view('spk.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'no_spk' => 'required'
        ],
            [ 'no_spk.required'=>'No SPK harap di isi !!',
//                'no_spk.unnique'=>'No SPK sudah Ada !!'
            ]);
        $data = $request->all();
        $this->spk->update($id,$data);
        return redirect()->route('spk')->withMessage('Data  berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function destroy($spk)
    {
        $this->spk->destroy($spk);
        return redirect()->route('spk.index')->withMessage('Data berhasil di hapus');
    }
}
