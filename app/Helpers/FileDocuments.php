<?php

namespace App\Helpers;

class FileDocuments
{
    //documnet upload
    public static function uploadDocument($title, $image)
    {

        $file_name = time() . '-' . $title . '.' . $image->getClientOriginalExtension();

        $image->move('storage/document', $file_name);

        return $file_name;
    }
    //document unlink before update and delete
    public static function unlinkDocument($image)
    {
        $pathToUpload = storage_path() . '/app/public/document/';
        if ($image != '' && file_exists($pathToUpload . $image)) {
            @unlink($pathToUpload . $image);
        }
    }
}
