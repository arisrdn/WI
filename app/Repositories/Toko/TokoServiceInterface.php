<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 02-Jul-18
 * Time: 11:40 AM
 */

namespace App\Repositories\Toko;


interface TokoServiceInterface
{
    public function getTokoAll();
    public function getjenisTokoAll();
    public function getjenisTopologiAll();
    public function getTopologiAll();
    public function getToko($id);
    public function getjenisToko($id);
    public function getjenisTopologi($id);
    public function getTopologi($id);
    public function Tokostore(array $data);
    public function Tokoupdate($id, $data);
    public function Tokodestroy($id);
    public function Topologistore(array $data);
    public function Topologiupdate($id, $data);
    public function Topologidestroy($id);

    public function getTokoBranch();
    public function getTokoToko();

}