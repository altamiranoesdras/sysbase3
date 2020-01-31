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
         $this->call(UsersTableSeeder::class);
         $this->call(OptionSeeder::class);

         if (app()->environment()=='local'){
             $this->call(RoleSeeder::class);
             $this->call(PermissionSeeder::class);
             $this->call(PermissionSeeder::class);
             $this->call(ConfigurationsTableSeeder::class);
         }
    }
}
