<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_permissions =  [2,3,4,5];
        $user_permissions =  [1,5];

        Role::where('name','admin')->firstOrFail()->permissions()->sync($admin_permissions);
        Role::where('name','user')->firstOrFail()->permissions()->sync($user_permissions);
    }
}
