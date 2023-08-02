<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'phone' => 11111111111,
            'password' => 123123123,
            'gender' => 'male',
            'dob' => '1995-3-12',
        ]);

        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);

        $permissions = Permission::pluck('id', 'id')->all();
        
        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
    }
}
