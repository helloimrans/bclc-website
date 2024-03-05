<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleService
{
    public function getAllArticles()
    {
        return User::with(['role','createdBy','updatedBy'])->latest()->get();
    }

    public function createUser($input)
    {
        $input['created_by'] = Auth::user()->id;
        $user = User::create($input);
        $user->assignRole($user->role->name);

        return $user;

        
    }

    public function getUser($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser($id, $input)
    {
        $user = User::find($id);
        $input['updated_by'] = Auth::user()->id;
        $user->update($input);
        $user->syncRoles($user->role->name);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->deleted_by = Auth::user()->id;
        $user->save();
        $user->delete();
    }
}
