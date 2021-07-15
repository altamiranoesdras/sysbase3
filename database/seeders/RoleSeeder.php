<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "Developer"]);
        Role::create(["name" => "Superadmin"]);

        $role= Role::create(["name" => "Admin"]);
        $role->syncPermissions(Permission::pluck('name')->toArray());

        $role = Role::create(["name" => "Tester"]);
        $role->syncPermissions(Permission::pluck('name')->toArray());

        Role::create(["name" => "User"]);

    }
}
