<?php

namespace App\Http\Controllers\Backend;

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
                    ->addColumn('Name(Email)', function ($user) {
                        return view('backend.user.partials.user_table_name_row', ['user' => $user]);
                    })
                    ->addColumn('Action', function($user) {
                        return view('backend.user.partials.user_table_action', ['user' => $user]);
                    })
                    ->rawColumns(['Name(Email)', 'Action'])
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
        User::create($request->validated());
        return redirect()->route('users.index')->with(['create_status' => 'User Successfully Created!']);
    }

    public function show($id)
    {
        //
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

        $user->update($attributes);
        
        return redirect()->route('users.index')->with(['update_status' => 'User Successfully Updated!']);
    }

    public function destroy(User $user) : object
    {
        $user->delete();
        return back()->with(['delete_status' => 'User Successfully Deleted!']);
    }
}
