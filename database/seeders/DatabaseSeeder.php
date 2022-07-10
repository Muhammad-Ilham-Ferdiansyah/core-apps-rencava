<?php

namespace Database\Seeders;

use App\Models\Menu;
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
            'image' => 'profile-images/default.png',
            'email' => 'ilhamferdiansyah737@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-06-19 09:27:33'
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'Raihan Malikul Mulki',
            'username' => 'razorraih01',
            'image' => 'profile-images/default.png',
            'email' => 'razorraihan000@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-06-22 09:17:33'
        ]);

        $user->assignRole('Project Manager');

        //SEED App_menu
        Menu::create([
            'menu_name' => 'Dashboard',
            'main_id' => 0,
            'link' => 'dashboard',
            'clicked' => 'dashboard',
            'orderno' => 1,
            'icon' => 'mdi mdi-view-dashboard',
            'published' => 1,
            'menu_desc' => 'Menu Dashboard'
        ]);
        Menu::create([
            'menu_name' => 'Perencanaan Proyek',
            'main_id' => 0,
            'link' => '',
            'clicked' => 'planning',
            'orderno' => 20,
            'icon' => 'mdi mdi-table-edit',
            'published' => 1,
            'menu_desc' => 'Menu Perencanaan Proyek'
        ]);
        Menu::create([
            'menu_name' => 'Pencatatan Proyek',
            'main_id' => 0,
            'link' => '',
            'clicked' => 'monitoring',
            'orderno' => 30,
            'icon' => 'mdi mdi-pencil-box-outline',
            'published' => 1,
            'menu_desc' => 'Menu Pencatatan Proyek'
        ]);
        Menu::create([
            'menu_name' => 'Evaluasi Proyek',
            'main_id' => 0,
            'link' => '',
            'clicked' => 'evaluation',
            'orderno' => 40,
            'icon' => 'mdi mdi-chart-line',
            'published' => 1,
            'menu_desc' => 'Menu Evaluasi Proyek'
        ]);
        Menu::create([
            'menu_name' => 'User Management',
            'main_id' => 0,
            'link' => '',
            'clicked' => 'usermanagement',
            'orderno' => 50,
            'icon' => 'mdi mdi-account-multiple',
            'published' => 1,
            'menu_desc' => 'Menu Pengaturan Pengguna'
        ]);
        Menu::create([
            'menu_name' => 'System Utilities',
            'main_id' => 0,
            'link' => '',
            'clicked' => 'utilities',
            'orderno' => 60,
            'icon' => 'mdi mdi-settings',
            'published' => 1,
            'menu_desc' => 'Menu Pengaturan Aplikasi'
        ]);
        Menu::create([
            'menu_name' => 'Setup Role',
            'main_id' => 5,
            'link' => 'admin/roles',
            'clicked' => 'role',
            'orderno' => 51,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Menu Setup Role'
        ]);
        Menu::create([
            'menu_name' => 'Setup User',
            'main_id' => 5,
            'link' => 'admin/users',
            'clicked' => 'users',
            'orderno' => 52,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Menu Setup Users'
        ]);
        Menu::create([
            'menu_name' => 'Setup Menu',
            'main_id' => 6,
            'link' => 'admin/menu',
            'clicked' => 'menu',
            'orderno' => 61,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Pengaturan Menu'
        ]);
    }
}
