<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 11:31 AM
 */

namespace App\Repositories\Konfig;


interface ModuleAksesInterface
{
    public function isAbleToAccess($moduleID, $roleID);

    public function store($roleID, array $moduleAccesses);

    public function destroy($roleID);

    public function  hapus($jabatan_id,$model_id);
}