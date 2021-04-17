<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use App\Repositories\Pegawai\PegawaiRepository;
use App\Repositories\SuratTugas\SuratTugasInterface;
use App\Repositories\Toko\Spk\SpkInterface;
use Illuminate\Http\Request;

class SuratTugasController extends Controller
{
    /**
     * @var SuratTugasInterface
     */
    private $suratTugas;
    /**
     * @var SpkInterface
     */
    private $spk;
    /**
     * @var PegawaiRepository
     */
    private $pegawaiRepository;

    public function __construct(SuratTugasInterface $suratTugas,SpkInterface $spk,PegawaiRepository $pegawaiRepository)
    {
        $this->suratTugas = $suratTugas;
        $this->spk = $spk;
        $this->pegawaiRepository = $pegawaiRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai=$this->pegawaiRepository->getAll();
        $surat=$this->suratTugas->getAll();
        $spk=$this->spk->getAll();
        $no=$this->suratTugas->getNo();
        $data=compact('surat','spk','pegawai','no');
        return view('surat.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai=$this->pegawaiRepository->getAll();
        $surat=$this->suratTugas->getAll();
        $spk=$this->spk->getAll();
        $no=$this->suratTugas->getNo();
        $data=compact('surat','spk','pegawai','no');
        return view('surat.create',$data);
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
            'pegawai_id' => 'required',
            'spk_id' => 'required',
        ],[
            'pegawai.required' => 'pegawai harus di pilih',
            'spk_id.required' => 'spk harus di pilih'
        ]);
        $data=$request->all();
        $hasil=$this->suratTugas->store($data);
        return redirect()->route('surat-tugas.show',$hasil['id'])->withMessage('Surat Tugas  berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function show($suratTugas)
    {
        $surat=$this->suratTugas->getDetail($suratTugas);
        $data=compact('surat');
        return view('surat.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat=$this->suratTugas->getDetail($id);
        $spk=$this->spk->getAll();
        $pegawai=$this->pegawaiRepository->getAll();
        $data=compact('surat','spk','pegawai');
        return view('surat.create',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'pegawai_id' => 'required',
            'spk_id' => 'required',
        ],[
            'pegawai.required' => 'pegawai harus di pilih',
            'spk_id.required' => 'spk harus di pilih'
        ]);
        $data=$request->all();
        $hasil=$this->suratTugas->update($id,$data);
        return redirect()->route('surat-tugas.show',$hasil['id'])->withMessage('Surat Tugas  berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil=$this->suratTugas->destroy($id);
        return redirect()->route('surat-tugas.show',$hasil['id'])->withMessage('Surat Tugas  berhasil di hapus');
    }
}
