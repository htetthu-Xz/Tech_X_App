<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

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

    public function store(UserRequest $request) : RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['profile'] = $this->setFile($request, 'profile', 'public/images/profile/');

        User::create($attributes);

        return redirect()->route('users.index')->with(['create_status' => 'User Successfully Created!']);
    }

    public function show(User $user) : View
    {
        return view('backend.user.detail', ['user' => $user]);
    }

    public function edit(User $user) : View
    {
        return view('backend.user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user) : RedirectResponse
    {
        $attributes = $request->validated();

        if($request->profile !== null) {
            $attributes['profile'] = $this->setFile($request, 'profile', 'public/images/profile/');
        }

        $user->update($attributes);
        
        return redirect()->route('users.index')->with(['update_status' => 'User Successfully Updated!']);
    }

    public function destroy(User $user) : RedirectResponse
    {
        $user->delete();
        return back()->with(['delete_status' => 'User Successfully Deleted!']);
    }
}
