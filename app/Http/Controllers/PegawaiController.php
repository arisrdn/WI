<?php

namespace App\Http\Controllers;


use App\Repositories\Pegawai\PegawaiServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    /**
     * @var PegawaiServiceInterface
     */
    private $pegawaiService;

    /**
     * PegawaiController constructor.
     * @param PegawaiServiceInterface $pegawaiService
     */
    public function __construct(PegawaiServiceInterface $pegawaiService)
    {
        $this->pegawaiService = $pegawaiService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai=$this->pegawaiService->getTotalPegawai();
        $data=compact('pegawai');
        return view('pegawai.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=$this->pegawaiService->getJabatan();
        $data=compact('jabatan');
        return view('pegawai.create1',$data);

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
        $dat=$this->pegawaiService->store($data);
        return redirect(route('pegawai.index'))->withMessage('berhasil menambah pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai=$this->pegawaiService->getPegawai($id);
        $data=compact('pegawai');
        return view('pegawai.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan=$this->pegawaiService->getJabatan();
        $pegawai=$this->pegawaiService->getPegawai($id);
        $data=compact('pegawai','jabatan');
        return view('pegawai.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();
//        dd($data);
        $dat=$this->pegawaiService->update($id,$data);
//        dd($dat);
        return redirect(route('pegawai.index'))->withMessage('Berhasil Mengubah data pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function change()
    {
        $id = Auth::user()->id;
        $employee = $this->pegawaiService->getPegawai($id);
        return view('pegawai.ganti-sandi')->with(compact('employee'));
    }
    public function changePassword(Request $request)
    {
        $data = $request->only(['oldPassword', 'newPassword', 'confirmationPassword']);
        try
        {
            $result = $this->pegawaiService->changePassword($data);

            if (!$result)
            {
                return redirect()->route('pegawai.change_password')->withErrors('Kata Sandi lama anda salah');
            }
        } catch (ValidationException $e)
        {
            return redirect()->route('pegawai.change_password')->withErrors($e->getErrors());
        }
        $this->pegawaiService->logout();
        return redirect()->route('login')->withMessage('Kata Sandi Telah di Perbaharui');
    }
}
