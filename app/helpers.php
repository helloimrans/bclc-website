<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadFile')) {
    function uploadFile($file, $path){
        if($file){
            $storedFilePath = $file->store($path, 'public');
            if ($storedFilePath === false) {
                throw new Exception('Failed to store the file.');
            }
            return $storedFilePath;
        } else {
            return null;
        }
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        } else {
            throw new Exception('File not found.');
        }
    }
}

