<?php

namespace App\Http\Controllers;

use App\Repositories\Konfig\ModuleServiceInterface;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    /**
     * @var ModuleServiceInterface
     */
    private $moduleService;

    public function __construct(ModuleServiceInterface $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    public function getModulesAccess(Request $request)
    {
        $roleID = $request->roleID;
        $modules = $this->moduleService->getModulesAccess($roleID);
        $data = compact('modules');
//        dd($modules);
        return response($data);
    }
    public function getModulesAccess2($roleID)
    {
        $modules = $this->moduleService->getModulesAccess($roleID);
        $data = compact('modules');
//        dd($modules);
        return response($data);
    }
}
