<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Niraj',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
        ]);

        $adminRole = Role::findByName('admin');
        $admin->assignRole($adminRole);

        $staff = User::create([
            'name' => 'Sujan',
            'email' => 'staff@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
        ]);

        $staffRole = Role::findByName('staff');
        $staff->assignRole($staffRole);

        $user =User::create([
            'name' => 'Nabin',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
        ]);
        $userRole = Role::findByName('user');
        $user->assignRole($userRole);

    }
}