<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $permissions = [
            [
                'name' => 'sendRequest',
            ],
            [
                'name' => 'createProject',
            ],
            [
                'name' => 'deleteProject',
            ],
            [
                'name' => 'editeProject',
            ],
            [
                'name' => 'accesProject',
            ],
        ];

       

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

     
        
    }
}
