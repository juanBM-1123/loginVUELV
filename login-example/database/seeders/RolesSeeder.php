<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(["name"=>"cajero"]);
        $permission = Permission::create(["name"=>"ventas"]);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $role = Role::create(["name"=>"gerente"]);
        $permission = Permission::create(["name"=>"all"]);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
    }
}
