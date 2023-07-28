<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;

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

    public function store(AdminRequest $request) : object
    {
        Admin::create($request->validated());
        return redirect()->route('admin.index')->with(['create_status' => 200]);
    }


    public function show($id)
    {
        //
    }


    public function edit(Admin $admin) : View
    {
        return view('backend.admin.edit', ['admin' => $admin]);
    }


    public function update(AdminRequest $request, Admin $admin) : object
    {
        $admin->update($request->validated());
        return redirect()->route('admin.index')->with(['update_status' => 200]);
    }


    public function destroy(Admin $admin) : object
    {
        $admin->delete();
        return back()->with(['delete_status' => 200]);
    }
}
