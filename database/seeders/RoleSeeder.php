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
        Role::create(["name" => "Admin"]);
        Role::create(["name" => "Tester"])->each(function (Role $role){
            $role->syncPermissions(Permission::pluck('name')->toArray());
        });
        Role::create(["name" => "User"]);
    }
}
