<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageHelper
{
    public static function uploadImage(UploadedFile $file, $folder = '')
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Lưu file vào thư mục storage/app/public/$folder
        $file->storeAs('public/upload/' . $folder, $filename);

        return $filename;
    }

    public static function removeImage($filename, $folder = '')
    {
        $path = 'public/upload/' . $folder . '/' . $filename;

        if (Storage::exists($path)) {
            Storage::delete($path);
            return true;
        }

        return false;
    }
}
