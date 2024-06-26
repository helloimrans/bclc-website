<?php

namespace App\Services;

use App\Models\WriteUp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WriteUpService
{
    public function getAllWriteUps()
    {
        return WriteUp::with(['category','createdBy','updatedBy','wroteBy'])->latest()->get();
    }

    public function getAllWriteUpsDatatable()
    {
        return WriteUp::with(['category','createdBy','updatedBy','wroteBy'])->latest();
    }

    public function createWriteUp($input)
    {
        $input['slug'] = Str::slug($input['title']);
        $input['user_id'] = $input['user_id'] ?? Auth::user()->id;
        $input['created_by'] = Auth::user()->id;
        if(isset($input['thumbnail_image'])){
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'write_up');
        }

        return WriteUp::create($input);
    }

    public function getWriteUp($id)
    {
        return WriteUp::findOrFail($id);
    }

    public function updateWriteUp($id, $input)
    {
        $write_up = WriteUp::find($id);
        $input['slug'] = Str::slug($input['title']);
        $input['user_id'] = $input['user_id'] ?? Auth::user()->id;
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['thumbnail_image'])) {
            if($write_up->thumbnail_image){
                deleteFile($write_up->thumbnail_image);
            }
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'write_up');
        }

        $write_up->update($input);

        return $write_up;
    }

    public function deleteWriteUp($id)
    {
        $write_up = WriteUp::find($id);
        $write_up->deleted_by = Auth::user()->id;
        $write_up->save();
        $write_up->delete();
    }
}
