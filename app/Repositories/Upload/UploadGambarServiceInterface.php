<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 09/11/2017
 * Time: 09.18
 */

namespace App\Repositories\Upload;


interface UploadGambarServiceInterface
{
    public function uploadImage($file, $id, $type, $path);
}