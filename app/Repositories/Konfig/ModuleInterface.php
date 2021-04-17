<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 11:31 AM
 */

namespace App\Repositories\Konfig;


interface ModuleInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);

    public function getModule($roleID);
    public function getModulesAccess($roleID);
}