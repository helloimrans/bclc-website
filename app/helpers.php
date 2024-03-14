<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadFile')) {
    function uploadFile($file, $path)
    {
        if ($file) {
            $storedFilePath = $file->store('uploaded/' . $path, 'public');
            if ($storedFilePath === false) {
                // throw new Exception('Failed to store the file.');
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
            // throw new Exception('File not found.');
        }
    }
}

if (!function_exists('setLawLocale')) {
    function setLawLocale($lawData) {
        $lawLocale = 'en';
        if ($lawData->lang == 'en' || $lawData->default_lang == 'en') {
            $lawLocale = 'en';
        } elseif ($lawData->lang == 'bn' || $lawData->default_lang == 'bn') {
            $lawLocale = 'bn';
        }
        session()->put([
            'lawLocale' => $lawLocale,
            'lawChapterLocale' => '',
            'lawId' => $lawData->id
        ]);
    }
}

// if (!function_exists('updateLawLocale')) {
//     function updateLawLocale($lawData) {
//         $lawLocale = session()->get('lawLocale');

//         if ($lawData->lang == 'en' && $lawLocale != 'en') {
//             $lawLocale = 'en';
//         } elseif ($lawData->lang == 'bn' && $lawLocale != 'bn') {
//             $lawLocale = 'bn';
//         } elseif ($lawData->lang == 'both') {
//             if ($lawData->default_lang == 'en' && $lawLocale != 'en') {
//                 $lawLocale = 'en';
//             } elseif ($lawData->default_lang == 'bn' && $lawLocale != 'bn') {
//                 $lawLocale = 'bn';
//             }
//         }

//         session()->put('lawLocale', $lawLocale);
//     }
// }
