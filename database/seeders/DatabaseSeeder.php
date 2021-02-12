<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        if (app()->environment()=='local'){
            $this->call(PermissionSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(ConfigurationsTableSeeder::class);
        }

        $this->call(OptionSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
