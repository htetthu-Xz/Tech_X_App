<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() : View
    {
        $users = User::all();
        return view('backend.user.index', ['users' => $users]);
    }

    public function create() : View
    {
        return view('backend.user.create');
    }

    public function store(UserRequest $request) : object
    {
        User::create($request->validated());
        return redirect()->route('user.index')->with(['create_status' => 200]);
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
        $user->update($request->validated());
        return redirect()->route('user.index')->with(['update_status' => 200]);
    }

    public function destroy(User $user) : object
    {
        $user->delete();
        return back()->with(['delete_status' => 200]);
    }
}
