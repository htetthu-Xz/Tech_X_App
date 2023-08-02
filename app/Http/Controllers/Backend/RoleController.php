<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    public function index() 
    {
        $this->checkRolePermission('view-role');

        if(request()->ajax()) {
            $query = Role::query();

            return DataTables::of($query)
                    ->addColumn('Created_date', function($role) {
                        return Carbon::parse($role->created_at)->format('d M, Y' );
                    })
                    ->addColumn('Action', function($role) {
                        return view('backend.role.partials.role_table_action', ['role' => $role]);
                    })
                    ->rawColumns(['Created_date','Action'])
                    ->make(true);
        }

        return view('backend.role.index');
    }

    public function create() : View
    {
        $permissions = Permission::all()->toBase()->pluck('name', 'id')->toArray();

        return view('backend.role.create', ['permissions' => $permissions]);
    }

    public function store(Request $request) : RedirectResponse
    {
        $attributes = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array'
        ]);

        $role = Role::create([
            'name' => $attributes['name'],
            'guard_name' => 'admin'
        ]);
        
        $role->syncPermissions($attributes['permissions']);

        return redirect()->route('roles.index')->with(['create_status' => 'Roles Successfully Created!']);
    }

    public function show($id)
    {
        //
    }

    public function edit(Role $role) : View
    {
        $permissions = Permission::all()->pluck('name', 'id');

        $role_permission_id = $role->permissions->toBase()->pluck('name', 'id')->toArray();

        return view('backend.role.edit', ['role' => $role, 'permissions' => $permissions, 'role_permission_id' => $role_permission_id]);
    }

    public function update(Request $request, Role $role) : RedirectResponse
    {
        $attributes = $request->validate([
            'name' => 'required|unique:roles,name,'. $role->id,
            'permissions' => 'required|array'
        ]);
        $role->update([
            'name' => $attributes['name']
        ]);

        $role->syncPermissions($attributes['permissions']);
        
        return redirect()->route('roles.index')->with(['update_status' => 'Admin Successfully Updated!']);
    }

    public function destroy(Role $role) : RedirectResponse
    {
        // dd($role);
        $role->delete();
        return back()->with(['delete_status' => 'Admin Successfully Deleted!']);
    }
}
