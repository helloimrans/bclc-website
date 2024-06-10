<?php

namespace App\Services;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentService
{
    public function getAllDocuments()
    {
        return Document::with(['category' => ['subCategory'], 'createdBy','updatedBy'])->latest()->get();
    }

    public function createDocument($input)
    {
        $input['created_by'] = Auth::user()->id;
        if(isset($input['file'])){
            $input['file'] = uploadFile($input['file'], 'documents');
        }

        return Document::create($input);
    }

    public function getDocument($id)
    {
        return Document::findOrFail($id);
    }

    public function updateDocument($id, $input)
    {
        $data = Document::find($id);
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['file'])) {
            if($data->file){
                deleteFile($data->file);
            }
            $input['file'] = uploadFile($input['file'], 'documents');
        }

        $data->update($input);

        return $data;
    }

    public function deleteDocument($id)
    {
        $article = Document::find($id);
        $article->deleted_by = Auth::user()->id;
        $article->save();
        $article->delete();
    }
}
