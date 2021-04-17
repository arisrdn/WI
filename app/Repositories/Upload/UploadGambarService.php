<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 09/11/2017
 * Time: 09.19
 */

namespace App\Repositories\Upload;


class UploadGambarService implements UploadGambarServiceInterface
{

    public function uploadImage($file, $id, $type, $path)
    {
        $fileName = '';
        if ($file and $file->isValid()) {
            $fileName = $path . $type . "-" .date('dmy_His') . "-" . $id . "." . $file->getClientOriginalExtension();
            $file->move(public_path($path), $fileName);
        }
//        dd($file);
        return $fileName;
    }
}