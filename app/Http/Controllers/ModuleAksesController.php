<?php

namespace App\Http\Controllers;

use App\ModuleAkses;
use App\Repositories\Jabatan\JabatanInterface;
use App\Repositories\Konfig\ModuleServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ModuleAksesController extends Controller
{
    /**
     * @var ModuleServiceInterface
     */
    private $moduleService;
    /**
     * @var JabatanInterface
     */
    private $jabatan;

    public function __construct(ModuleServiceInterface  $moduleService,JabatanInterface $jabatan)
    {
        $this->moduleService = $moduleService;
        $this->jabatan = $jabatan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try
        {
            $roleTitles = $this->moduleService->getAllRoleTitles();
        } catch (ModelNotFoundException $e)
        {
            return view('errors.404');
        }
//        $a=array('data'=>["1"=>"Manager","2"=>"Staff","3"=>"Admin"]);
        $data = compact('roleTitles');
//        dd($data);
//        printf(implode( $a));
//        dd($a);
        return view('setting.module.index', $data);

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
        $jabatan=$this->moduleService->getRole($request->jabatan_id);
        $jab=$this->moduleService->getRole($request->jabatan_id);

//        return $modules->moduleAccess;
            foreach ($jabatan->moduleAccess as $item) {
                if ($item->module->id == $request->module_id) {
                    return back()->withErrors(['Data Sudah Ada !!']);
//                    dd('s');
                }

            }
            $this->moduleService->store2($data);
            return redirect()->route('manajemen-modul.show',$request->jabatan_id)->withMessage('Data  berhasil ditambah');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ModuleAkses  $moduleAkses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $akses = $this->moduleService->getModule($id);
        $jabatan=$this->moduleService->getRole($id);
        $modules = $this->moduleService->getModulesAccess($id);
        $moduleall=$this->moduleService->getModules();
        $data = compact('jabatan','akses','moduleall','modules');
//        dd($data);
        return view('setting.module.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModuleAkses  $moduleAkses
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleAkses $moduleAkses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModuleAkses  $moduleAkses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuleAkses $moduleAkses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModuleAkses  $moduleAkses
     * @return \Illuminate\Http\Response
     */
    public function destroy($jabatan,$item)
    {
        $this->moduleService->hapus($jabatan,$item);
        return redirect()->route('manajemen-modul.show',$jabatan)->withMessage('Data  berhasil di hapus');
    }
}
