<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Repositories\Jabatan\JabatanInterface;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * @var JabatanInterface
     */
    private $jabatan;

    public function __construct(JabatanInterface $jabatan)
    {
        $this->jabatan = $jabatan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan=$this->jabatan->getAll();
        $data=compact('jabatan');
        return view('setting.jabatan.index',$data);
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
        $dat=$this->jabatan->store($data);
        return redirect(route('jabatan.index'))->withMessage('berhasil menambah jabatan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $data=$this->jabatan->update($id,$data);
        return redirect(route('jabatan.index'))->withMessage('berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd('a');
        $this->jabatan->destroy($id);
        return redirect()->route('jabatan.index')->withMessage('Data berhasil di hapus');
    }
}
