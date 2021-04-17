<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 07/11/2017
 * Time: 20.54
 */

namespace App\Repositories\Lokasi\Propinsi;


interface PropinsiRepositoyInterface
{
    public function getPropinsiAll();

    public function getPropinsi($id);
}
