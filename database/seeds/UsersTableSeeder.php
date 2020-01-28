<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        if (Storage::exists('avatars')){

            Storage::deleteDirectory('avatars');
        }
        Storage::makeDirectory('avatars');

        //Usuario admin
        factory(User::class,1)->create([
            "username" => "admin",
            "name" => "Administrador",
            "password" => bcrypt("123")
        ]);

        factory(User::class,10)->create([
            "password" => bcrypt("123")
        ]);
    }
}
