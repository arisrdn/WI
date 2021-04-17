<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Repositories\Toko\TokoServiceInterface;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * @var TokoServiceInterface
     */
    private $tokoService;

    public function __construct(TokoServiceInterface $tokoService)
    {
        $this->tokoService = $tokoService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $toko=$this->tokoService->getTokoToko();
        $data=compact('toko');
//        foreach ($toko as $a){dd($a);}
        return view('toko.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch=$this->tokoService->getTokoBranch();
        $data=compact('branch');
        return view('toko.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $spk=$this->tokoService->Tokostore($data);
        return redirect()->route('toko.index')->withMessage('Data  berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update=$this->tokoService->getToko($id);
        $branch=$this->tokoService->getTokoBranch();
        $data=compact('branch','update');
        return view('toko.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'area' => 'required',
            'kode_toko' => 'required|unique:tokos,id,'.$id
        ],
            [ 'nama.required'=>'Nama Tokos harap di isi !!',
                'area.required'=>'cabang belum di pilih !!',
                'kode_toko.unnique'=>'Nama sudah Ada !!'
            ]);
        $data=$request->all();
        $spk=$this->tokoService->Tokoupdate($id,$data);
        return redirect()->route('toko.index')->withMessage('Data  berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tokoService->Tokodestroy($id);
        return redirect()->route('toko.index')->withMessage('Data  berhasil di hapus');
    }
}
