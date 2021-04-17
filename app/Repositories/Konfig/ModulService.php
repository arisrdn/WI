<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 12-Jul-18
 * Time: 2:10 AM
 */

namespace App\Repositories\Konfig;


use App\Repositories\Jabatan\JabatanRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ModulService implements ModuleServiceInterface
{
    /**
     * @var ModuleAksesInterface
     */
    private $moduleAkses;
    /**
     * @var ModuleInterface
     */
    private $module;
    /**
     * @var JabatanRepository
     */
    private $jabatanRepository;

    public function __construct(ModuleAksesInterface $moduleAkses, ModuleInterface $module,JabatanRepository $jabatanRepository)
    {
        $this->moduleAkses = $moduleAkses;
        $this->module = $module;
        $this->jabatanRepository = $jabatanRepository;
    }

    public function getModule($roleID)
    {
        //        dd($this->moduleRepository->getModule($roleID));
        return $this->module->getModule($roleID);

    }

    public function getModules()
    {
        return $this->module->getAll();
    }

    public function getModulesAccess($roleID)
    {
        return $this->module->getModulesAccess($roleID);
    }

    public function isAbleToAccess($moduleID, $roleID)
    {
//        dd($this->moduleRepository->getModule($roleID));
        $data = $this->moduleAkses->isAbleToAccess($moduleID, $roleID);
        if (count($data) > 0) {
            return true;
        }
        return false;
    }

    private function validatorStoreModuleAccess(array $data)
    {
        $validator = Validator::make($data, [
            'module_management.role' => 'required|int',
            'module_management.module_access.*' => 'required|max:2'
        ])->validate();
        return $validator;
    }

    public function store($roleID, array $data)
    {
        $validator = $this->validatorStoreModuleAccess($data);

        $response = DB::transaction(function () use ($roleID, $data) {
            $moduleAccessesData = array();
            $moduleAccesses = null;
            if (isset($data['module_management']['module_access'])) {
                foreach ($data['module_management']['module_access'] as $k => $v) {
                    if ($v === 'on') {
                        array_push($moduleAccessesData, $k);
                    }
                }
            }
            $this->module->destroy($roleID);
            $moduleAccesses = $this->moduleAkses->store($roleID, $moduleAccessesData);
            return $moduleAccesses;
        });
        return $response;
    }
    public function getAllRoleTitles()
    {
        $roleTitles = $this->jabatanRepository->getAll()->pluck('nama', 'id');
        return $roleTitles;
    }

    public function getRole($id)
    {
        $roleTitles = $this->jabatanRepository->getDetail($id);
        return $roleTitles;
    }

    public function store2($data)
    {
        return $this->moduleAkses->store2($data);
    }

    public function hapus($jabatan,$module)
    {
        // TODO: Implement hapus() method.
        return $this->moduleAkses->hapus($jabatan,$module);
    }
}