<?php

namespace App\Http\Controllers;

use App\Repositories\Konfig\ModuleInterface;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @var ModuleInterface
     */
    private $module;

    public function __construct(ModuleInterface $module)
    {
        $this->module = $module;
    }

    public function a()
    {
        $roleId='1';
        $modules = $this->module->getModulesAccess($roleId);
        dd($modules);
    }

}
