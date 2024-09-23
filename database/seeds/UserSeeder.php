<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::updateOrCreate(
            [
                'name' => 'Yazid Asykurillah',
                'email' => 'yazid@autoroom.localhost',
            ],
            [
                'name' => 'Yazid Asykurillah',
                'email' => 'yazid@autoroom.localhost',
                'password' => bcrypt('12345678'),
                'code'=>'000'
            ]
        );
        $superadmin->assignRole('Super Admin');

        $admin = User::updateOrCreate(
            [
                'name' => 'Admin',
                'email' => 'testadmin@autoroom.localhost',
            ],
            [
                'name' => 'Admin',
                'email' => 'testadmin@autoroom.localhost',
                'password' => bcrypt('12345678'),
                'code'=>'001'
            ]
        );
        $admin->assignRole('Admin');
    }
}
