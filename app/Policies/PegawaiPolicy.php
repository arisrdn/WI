<?php

namespace App\Policies;

use App\Models\Pegawai;
use App\Repositories\Konfig\ModuleAksesInterface;
use App\Repositories\Konfig\ModuleInterface;
use App\Repositories\Konfig\ModuleServiceInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class PegawaiPolicy
{
    use HandlesAuthorization;
    /**
     * @var ModuleServiceInterface
     */
    private $moduleService;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function __construct(ModuleInterface $moduleService)
    {
        //
        $this->moduleService = $moduleService;
    }

    public function accessModule(Pegawai $pegawai, $moduleUrl)
    {

//        dd($moduleUrl);
        $modules = $this->moduleService->getModule($pegawai->jabatan->id);
        if ($moduleUrl == '/')
        {
            return true;
        } else
        {
//            dd($modules);
            foreach ($modules as $module)
            {
                if ($module->url != '/')
                {
                    if (str_contains($module->url, 'persetujuan'))
                    {
                        if (str_contains($moduleUrl, $module->url))
                        {
                            return true;
                        }
                    } else if (str_contains($moduleUrl, $module->url))
                    {
                        return true;
                    }
                }
            }
        }

        return false;
    }


}
