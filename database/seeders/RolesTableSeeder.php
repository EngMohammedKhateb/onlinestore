<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Role::create([
//            'name'=> 'user',
//        ])->permissions()->sync([1]);

         Role::create([
         'name'=> 'user',
         ]);

        $permissions=Permission::all();

        $arr =[];
        foreach($permissions as $index => $permission){
            $id=$index+1;
            array_push($arr,$id);
        }

        Role::create([
            'name'=> 'manager',
        ])->permissions()->sync($arr);

    }
}
