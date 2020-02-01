<?php

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


        if (app()->environment()=='local'){
            $this->call(RoleSeeder::class);
            $this->call(PermissionSeeder::class);
            $this->call(ConfigurationsTableSeeder::class);
        }

        $this->call(UsersTableSeeder::class);
        $this->call(OptionSeeder::class);
    }
}
