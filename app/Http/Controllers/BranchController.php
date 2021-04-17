<?php

namespace App\Http\Controllers;

use App\Repositories\Toko\Detail\TokoInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class BranchController extends Controller
{
    /**
     * @var TokoInterface
     */
    private $toko;

    public function __construct(TokoInterface $toko)
    {
        $this->toko = $toko;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('as');
        $branch=$this->toko->getBranch();
        $data=compact('branch');
        return view('branch.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//      dd('aa');
        return view('branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request);
        $this->validate($request, [
            'nama' => 'required',
            'kode_toko' => 'required|unique:tokos'
        ],
            [ 'nama.required'=>'Nama Branch harap di isi !!',
                'kode_toko.unnique'=>'Nama sudah Ada !!'
            ]);

        $data=$request->all();
//        $data->push(['jenis_toko'=>1]);
//        dd($data);
        $spk=$this->toko->store($data);
        return redirect()->route('branch.index')->withMessage('Data  berhasil ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kirim=$this->toko->getDetail($id);
        $data=compact('kirim');
        return view('branch.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $update=$this->toko->getDetail($id);

//        dd($update);
        $data=compact('update');

        return view('branch.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama' => 'required',
            'kode_toko' => 'required|unique:tokos,id,'.$id
        ],
            [ 'nama.required'=>'Nama Branch harap di isi !!',
                'kode_toko.unnique'=>'Nama sudah Ada !!'
            ]);
        $data=$request->all();
//        $data->push(['jenis_toko'=>1]);
//        dd($data);
        $spk=$this->toko->update($id,$data);
        $url=back();
//        dd(back());
//        if (strpos(u))
        return redirect()->route('branch.index')->withMessage('Data  berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->toko->destroy($id);
        return redirect()->route('branch.index')->withMessage('Data  berhasil di hapuss');
    }
}
