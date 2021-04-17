<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 19-Jul-18
 * Time: 6:28 AM
 */

namespace App\Repositories\SuratTugas;


interface SuratTugasInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
    public function getNo();

}