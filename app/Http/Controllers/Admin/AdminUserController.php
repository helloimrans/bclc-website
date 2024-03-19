<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $users = $this->userService->getAllUsers();
            return DataTables::of($users)
                ->editColumn('photo', function ($user) {
                    $imageUrl = $user->photo ? Storage::url($user->photo) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $user->title . '">';
                })
                ->editColumn('is_active', function ($user) {
                    $checkStatus = $user->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $user->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($user) {
                    $str = '<a href="' . route("users.edit", $user->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("users.destroy", $user->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'photo', 'is_active'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $this->userService->createUser($request->validated());
        return redirect()->route('users.index')->with([
            'message' => 'User created successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $user = $this->userService->getUser($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $this->userService->updateUser($id, $request->validated());
        return redirect()->route('users.index')->with([
            'message' => 'User updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with([
            'message' => 'User deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
