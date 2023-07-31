<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    public function index() : View
    {
        $admins = Admin::all();
        return view('backend.admin.index', ['admins' => $admins]);
    }

    public function create() : View
    {
        return view('backend.admin.create');
    }

    public function store(AdminRequest $request) : RedirectResponse
    {
        Admin::create($request->validated());
        return redirect()->route('admins.index')->with(['create_status' => 'Admin Successfully Created!']);
    }

    public function show($id)
    {
        //
    }

    public function edit(Admin $admin) : View
    {
        return view('backend.admin.edit', ['admin' => $admin]);
    }

    public function update(AdminRequest $request, Admin $admin) : RedirectResponse
    {
        $attributes = $request->validated();

        if($attributes['password'] == null) {
            unset($attributes['password']);
        }

        $admin->update($attributes);
        
        return redirect()->route('admins.index')->with(['update_status' => 'Admin Successfully Updated!']);
    }

    public function destroy(Admin $admin) : RedirectResponse
    {
        $admin->delete();
        return back()->with(['delete_status' => 'Admin Successfully Deleted!']);
    }
}
