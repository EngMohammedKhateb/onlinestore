<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'App Manager',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123123123'),
            'role_id'=>2,
        ]);
        User::create([
            'name'=>'default user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('123123123'),
            'role_id'=>1,
        ]) ;

        $names = ["mohammed","yazan","ali","molham","enas","jena","laya","john","becolo","hoshi","morad","layla","nour","abed","leen","ibrahem","mere"];

        for($i=0 ; $i<17 ;$i++){

            User::create([
                'name' => $names[$i],
                'email' => $names[$i].'@gmail.com',
                'password' => Hash::make('password'),
                'role_id'=>1,
            ]);
        }


    }
}
