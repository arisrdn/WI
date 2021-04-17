<?php

namespace App\Http\Controllers;

use App\Models\SpkJenis;
use App\Repositories\Toko\Spk\SpkJenisInterface;
use Illuminate\Http\Request;

class SpkJenisController extends Controller
{
    /**
     * @var SpkJenisInterface
     */
    private $spkJenis;

    public function __construct(SpkJenisInterface $spkJenis)
    {
        $this->spkJenis = $spkJenis;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $jenisSpk=$this->spkJenis->getAll();
        $data=compact('jenisSpk');
        return view('setting.spk.jenis',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //no action
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd($request);
        $this->validate($request, [
            'nama' => 'required'
        ],
            [ 'nama.required'=>'Nama harap di isi !!'
            ]);

        $data = $request->all();
        $this->spkJenis->store($data);
        return redirect()->route('spk-jenis.index')->withMessage('Data  berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpkJenis  $spkJenis
     * @return \Illuminate\Http\Response
     */
    public function show($spkJenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpkJenis  $spkJenis
     * @return \Illuminate\Http\Response
     */
    public function edit(SpkJenis $spkJenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpkJenis  $spkJenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama' => 'required'
        ],
            [ 'nama.required'=>'Nama harap di isi !!'
            ]);

        $data = $request->all();
        $this->spkJenis->update($id,$data);
        return redirect()->route('spk-jenis.index')->withMessage('Data  berhasil Di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpkJenis  $spkJenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($spkJenis)
    {
        //dd($spkJenis);
        $this->spkJenis->destroy($spkJenis);
        return redirect()->route('spk-jenis.index')->withMessage('Berhasil di Hapus');

    }
}
