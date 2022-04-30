<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cruds = ["create", "read","update","delete"];
        $models=["user","permission","role","notification","market","category","product"];
        foreach($models as $model):
            foreach($cruds as $crud):
                Permission::Create([
                    'name'=> $crud.' '.$model
                ]);
            endforeach;
        endforeach;
    }
}
