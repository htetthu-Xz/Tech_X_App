<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() 
    {
        if(request()->ajax()) {
            $query = User::query();

            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($admin) {
                        return Carbon::parse($admin->created_at)->format('d M, Y');
                    })
                    ->addColumn('name_email', function ($user) {
                        return view('backend.user.partials.user_table_name_row', ['user' => $user]);
                    })
                    ->addColumn('action', function($user) {
                        return view('backend.user.partials.user_table_action', ['user' => $user]);
                    })
                    ->rawColumns(['name_email', 'action', 'created_date'])
                    ->make(true);
        }

        return view('backend.user.index');
    }

    public function create() : View
    {
        return view('backend.user.create');
    }

    public function store(UserRequest $request) : object
    {
        $attributes = $request->validated();

        if($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $file_name = uploadImage($request->file('profile'), 'public/images/profile/');
            $attributes['profile'] = $file_name;
        }

        User::create($attributes);

        return redirect()->route('users.index')->with(['create_status' => 'User Successfully Created!']);
    }

    public function show(User $user)
    {
        return view('backend.user.detail', ['user' => $user]);
    }

    public function edit(User $user) : View
    {
        return view('backend.user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user) : object
    {
        $attributes = $request->validated();

        if($attributes['password'] == null) {
            unset($attributes['password']);
        }

        if($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $file_name = uploadImage($request->file('profile'), 'public/images/profile/');
            $attributes['profile'] = $file_name;
        }

        $user->update($attributes);
        
        return redirect()->route('users.index')->with(['update_status' => 'User Successfully Updated!']);
    }

    public function destroy(User $user) : object
    {
        $user->delete();
        return back()->with(['delete_status' => 'User Successfully Deleted!']);
    }
}
