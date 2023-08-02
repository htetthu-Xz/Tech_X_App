<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $custom_permissions = config('custom_permissions.default');

        Permission::chunk(20, function($permissions) {
            foreach(Permission::all() as $permission) {
                $permission->delete();
            }
        });

        foreach($custom_permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'admin'
            ]);
        }
    }
}
