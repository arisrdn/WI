<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 11:32 AM
 */

namespace App\Repositories\Konfig;




use App\Models\Module;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class ModuleRepository implements ModuleInterface
{
    /**
     * @var Module
     */
    private $module;

    public function __construct(Module $module)
    {

        $this->module = $module;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->module->get();
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
    }

    public function store(array $data)
    {
        $simpan= new SpkItem();
        $simpan->spk_id=$data['spk_id'];
        $simpan->toko_id=$data['toko_id'];
        $simpan->save();
        return $simpan;
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function getModule($roleID)
    {
        // TODO: Implement getModule() method.
        $modules = $this->module
            ->whereHas('moduleAccess', function ($query) use ($roleID) {
                return $query->where('jabatan_id', $roleID);
            })->get();
//        dd($modules );
        if (!$modules) {
            throw new ResourceNotFoundException(Module::MODEL_NAME);
        }
        return $modules;
    }

    public function getModulesAccess($roleID)
    {
        // TODO: Implement getModulesAccess() method.
        $modules = $this->module
            ->with(['module_akses' => function ($query) use ($roleID) {
                return $query->where('jabatan_id', $roleID);
            }])->get();
        if (!$modules) {
            throw new ResourceNotFoundException(Module::MODEL_NAME);
        }
        return $modules;
    }
}