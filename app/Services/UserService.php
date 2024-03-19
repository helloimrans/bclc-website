<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getAllUsers($userType)
    {
        return User::when($userType, function ($query, $userType) {
            return $query->where('user_type', $userType);
        })
        ->latest()
        ->get();
    }

    public function createUser($input)
    {
        $user = new User();

        $user->user_type = $input['user_type'];
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->mobile = $input['mobile'];
        $user->dob = $input['dob'];
        $user->gender = $input['gender'];
        $user->marital_status = $input['marital_status'];

        $user->about = $input['about'];
        $user->designation = $input['designation'];
        $user->workplace_name = $input['workplace_name'];

        $user->address = $input['address'];
        $user->is_lawyer = $input['is_lawyer'] ?? 0;
        $user->is_consultant = $input['is_consultant'] ?? 0;
        $user->is_trainer = $input['is_trainer'] ?? 0;
        $user->is_writer = $input['is_writer'] ?? 0;

        $user->password = bcrypt($input['password']);

        if (isset($input['photo'])) {
            $user->photo = uploadFile($input['photo'], 'user');
        }

        $user->save();

        return $user;
    }

    public function getUser($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser($id, $input)
    {
        $user = User::find($id);

        $user->user_type = $input['user_type'];
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->mobile = $input['mobile'];
        $user->dob = $input['dob'];
        $user->gender = $input['gender'];
        $user->marital_status = $input['marital_status'];

        $user->about = $input['about'];
        $user->designation = $input['designation'];
        $user->workplace_name = $input['workplace_name'];

        $user->address = $input['address'];
        $user->is_lawyer = $input['is_lawyer'] ?? 0;
        $user->is_consultant = $input['is_consultant'] ?? 0;
        $user->is_trainer = $input['is_trainer'] ?? 0;
        $user->is_writer = $input['is_writer'] ?? 0;

        if($user->password != null || $user->password != ''){
            $user->password = bcrypt($input['password']);
        }

        if (isset($input['photo'])) {
            if($user->photo){
                deleteFile($user->photo);
            }
            $user->photo = uploadFile($input['photo'], 'user');
        }

        $user->save();

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
