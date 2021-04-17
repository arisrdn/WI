<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 12-Jul-18
 * Time: 2:10 AM
 */

namespace App\Repositories\Konfig;


interface ModuleServiceInterface
{
    public function getModule($roleID);

    public function getModules();

    public function getModulesAccess($roleID);

    public function isAbleToAccess($moduleID, $roleID);

    public function store($roleID, array $data);

    public function getAllRoleTitles();

    public function getRole($id);

    public function store2($data);

    public function hapus($jabatan,$module);
}