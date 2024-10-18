<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_1 = Permission::updateOrCreate(
            ['name' => 'Manage User'],
            ['name' => 'Manage User']
        );
        $permission_1->syncRoles(['Admin']);

        $permission_2 = Permission::updateOrCreate(
            ['name' => 'Manage Role'],
            ['name' => 'Manage Role']
        );
        $permission_2->syncRoles(['Admin']);

        $permission_3 = Permission::updateOrCreate(
            ['name' => 'Manage Permission'],
            ['name' => 'Manage Permission']
        );
        $permission_3->syncRoles(['Admin']);



        $permission_4 = Permission::updateOrCreate(
            ['name' => 'Manage Blog'],
            ['name' => 'Manage Blog']
        );
        $permission_4->syncRoles(['Admin']);
    }
}
