<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Project Manager',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Software Engineer',
            'guard_name' => 'web'
        ]);

        User::factory(10)->create()->each(function ($users) {
            $users->assignRole('Software Engineer');
        });



        // $users->assignRole('Software Engineer');


        $admin = User::create([
            'name' => 'Muhammad Ilham Ferdiansyah',
            'username' => 'ilhamferdx',
            'image' => 'profile-images/default.jpg',
            'email' => 'ilhamferdiansyah737@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-06-19 09:27:33'
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'Raihan Malikul Mulki',
            'username' => 'razorraih01',
            'image' => 'profile-images/default.jpg',
            'email' => 'razorraihan000@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-06-22 09:17:33'
        ]);

        $user->assignRole('Project Manager');
    }
}
