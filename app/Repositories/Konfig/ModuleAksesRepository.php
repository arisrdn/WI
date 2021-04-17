<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 11:32 AM
 */

namespace App\Repositories\Konfig;


use App\Models\ModuleAkses;
use PhpParser\Node\Expr\AssignOp\Mod;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class ModuleAksesRepository implements ModuleAksesInterface

{
    /**
     * @var ModuleAkses
     */
    private $moduleAkses;

    public function __construct(ModuleAkses $moduleAkses)
    {
        $this->moduleAkses = $moduleAkses;
    }

    public function isAbleToAccess($moduleID, $roleID)
    {
        // TODO: Implement isAbleToAccess() method.
        $check = $this->moduleAkses->where('module_id', $moduleID)->where('role_id', $roleID)->get();
        if (!$check)
            throw new ResourceNotFoundException(ModuleAkses::MODEL_NAME);
        if (count($check) > 0) {
            return true;
        }
        return false;

    }


    public function store($roleID, array $moduleAccesses)
    {   $moduleAccess = null;
        foreach ($moduleAccesses as $moduleAccessData) {
            $moduleAccess = new ModuleAkses();
            $moduleAccess->jabatan_id = $roleID;
            $moduleAccess->module_id = $moduleAccessData;
            $moduleAccess->save();
        }
        return $moduleAccess;

    }

    public function destroy($roleID)
    {
        // TODO: Implement destroy() method.
        $modulesAccess = $this->moduleAkses->where('jabatan_id', $roleID)->get();
        if (!$modulesAccess) {
            throw new ResourceNotFoundException(ModuleAkses::MODEL_NAME);
        }

        foreach ($modulesAccess as $moduleAccess) {
            $moduleAccess->delete();
        }
        return null;
    }

    public function store2($data)
    {
        $simpan= new ModuleAkses();
        $simpan->module_id=$data['module_id'];
        $simpan->jabatan_id=$data['jabatan_id'];
        $simpan->save();
        return $simpan;
    }

    public function hapus($jabatan_id, $model_id)
    {
        $flight = $this->moduleAkses->where('jabatan_id', $jabatan_id)->where('module_id', $model_id);
        $flight->delete();
        return $flight;
    }
}