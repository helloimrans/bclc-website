<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use League\Csv\Writer;
use App\Models\Permission;

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



// Spatie Permission Check Helpers 

function get_permission_routes()
{
  return [
            
        ];
}

//This will check the permission of the given route name. Can be used for buttons
function check_access_by_route_name($routeName = null): bool
{
    if($routeName == null){
        $routeName = Route::currentRouteName();

    }
    $allowedPrefixes = get_permission_routes();

    $shouldCheckPermission = false;
    foreach ($allowedPrefixes as $prefix) {
        if (str_starts_with($routeName, $prefix)) {
            $shouldCheckPermission = true;
            break;
        }
    }

    if ($shouldCheckPermission) {
        if (!auth()->user()->can($routeName)) {
            return false;
        }
    }

    return true;
}

//This will export the permissions as csv for seeders
function createCSV($filename = 'permissions.csv'): string
{
    $permissions = Permission::all();

    $data = $permissions->map(function ($permission) {
        return [
            'name' => $permission->name,
            'guard_name' => $permission->guard_name,
            'prefix' => $permission->prefix,
            'permission_title' => $permission->permission_title,
        ];
    });

    $csv = Writer::createFromPath(public_path('csv/' . $filename), 'w+');

    $csv->insertOne(array_keys($data->first()));

    foreach ($data as $record) {
        $csv->insertOne($record);
    }

    return public_path('csv/' . $filename);
}
// Spatie Permission Check Helpers 
