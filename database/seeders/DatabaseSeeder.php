<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use App\Models\Client;
use App\Models\DetailProject;
use App\Models\DetailTeam;
use App\Models\Product;
use App\Models\Project;
use App\Models\Reference;
use App\Models\RoleMenu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Owner',
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

        $owner = User::create([
            'name' => 'Lisandro Martinez',
            'username' => 'Licha',
            'image' => 'profile-images/default.png',
            'email' => 'lisandro@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-06-19 09:27:33'
        ]);
        $owner->assignRole('Owner');


        $user = User::create([
            'name' => 'Scott McTominay',
            'username' => 'McTominay',
            'image' => 'profile-images/default.png',
            'email' => 'mctominay@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-06-22 09:17:33'
        ]);

        $user->assignRole('Project Manager');

        $user = User::create([
            'name' => 'James Maddison',
            'username' => 'madds',
            'image' => 'profile-images/PYUyvEMzbE7HGhLavmqkthmwqF0zjI5O2dN28HIW.png',
            'email' => 'maddison@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-09-22 09:17:33'
        ]);

        $user->assignRole('Project Manager');

        $user = User::create([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'image' => 'profile-images/bb1JwUVDGDu6eYAmriQYsyQxKQQ1VW4O2iZbh5cX.png',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-09-22 09:17:33'
        ]);

        $user->assignRole('Software Engineer');

        $user = User::create([
            'name' => 'Peter Drury',
            'username' => 'peterdrury',
            'image' => 'profile-images/BI1WfksXFA7Lj3lhMypAdOtMZ32CaoxvXuyFzydU.png',
            'email' => 'peter@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-09-22 09:17:33'
        ]);

        $user->assignRole('Software Engineer');

        $user = User::create([
            'name' => 'Aldo Dwie',
            'username' => 'aldo',
            'image' => 'profile-images/default.png',
            'email' => 'aldodwrzy@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => '2022-09-22 09:17:33'
        ]);

        $user->assignRole('Software Engineer');

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
        Menu::create([
            'menu_name' => 'Setup Produk',
            'main_id' => 2,
            'link' => 'admin/products',
            'clicked' => 'products',
            'orderno' => 21,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Setup Produk Software'
        ]);
        Menu::create([
            'menu_name' => 'Setup Klien',
            'main_id' => 2,
            'link' => 'admin/clients',
            'clicked' => 'clients',
            'orderno' => 22,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Setup Klien'
        ]);
        Menu::create([
            'menu_name' => 'Setup Proyek',
            'main_id' => 2,
            'link' => 'admin/projects',
            'clicked' => 'projects',
            'orderno' => 23,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Setup Proyek'
        ]);
        Menu::create([
            'menu_name' => 'Setup Detail Proyek',
            'main_id' => 2,
            'link' => 'admin/detail_projects',
            'clicked' => 'detail_projects',
            'orderno' => 24,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Setup Detail Proyek'
        ]);
        Menu::create([
            'menu_name' => 'Monitoring Proyek',
            'main_id' => 3,
            'link' => 'user/mn_projects',
            'clicked' => 'mn_project',
            'orderno' => 31,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Monitoring Proyek'
        ]);
        Menu::create([
            'menu_name' => 'Setup Referensi',
            'main_id' => 4,
            'link' => 'admin/setup_reference',
            'clicked' => 'setup_referensi',
            'orderno' => 41,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Setup Referensi'
        ]);
        Menu::create([
            'menu_name' => 'Perhitungan Matriks',
            'main_id' => 4,
            'link' => 'admin/tab1',
            'clicked' => 'matrix_calculate',
            'orderno' => 42,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Perhitungan Matriks TOPSIS'
        ]);
        Menu::create([
            'menu_name' => 'Laporan Detail Pekerjaan',
            'main_id' => 4,
            'link' => 'admin/report_detail',
            'clicked' => 'report_detail',
            'orderno' => 43,
            'icon' => '',
            'published' => 1,
            'menu_desc' => 'Laporan Detail Pekerjaan'
        ]);

        Product::create([
            'product_name' => 'PlitaSoft ILIIS',
            'product_desc' => 'Individual Life Insurance Information System (Conventional, Unit Link, Health, Sharia)'
        ]);
        Product::create([
            'product_name' => 'PlitaSoft GLIIS',
            'product_desc' => 'Group Life Insurance Information System (Conventional, Unit Link, Health, Sharia)'
        ]);
        Product::create([
            'product_name' => 'PlitaSoft Pension Funds',
            'product_desc' => 'Pension Fund Information System'
        ]);
        Product::create([
            'product_name' => 'PlitaSoft Financial',
            'product_desc' => 'General Ledger, Budgeting, Cash Management '
        ]);
        Product::create([
            'product_name' => 'PlitaSoft IIS',
            'product_desc' => 'Investment Information System '
        ]);
        Product::create([
            'product_name' => 'PlitaSoft HRIS',
            'product_desc' => 'Human Resources Information System '
        ]);
        Product::create([
            'product_name' => 'PlitaSoft AIS',
            'product_desc' => 'Agency Information System'
        ]);
        Product::create([
            'product_name' => 'PlitaSoft Mobile Apps',
            'product_desc' => 'Agency Portal and Customer Portal'
        ]);
        //Isi table Clients
        Client::create([
            'client_name' => 'PT. Asuransi Jiwa Central Asia Raya',
            'client_image' => 'client-images/eGWWB33TZfvEfKWa0qkkgXBIdsAbE20dmMdD4nTu.jpg',
            'address' => 'Jl. Jend. Gatot Subroto Kav 74-75 Menteng Dalam Tebet Jakarta Selatan DKI Jakarta, RT.2/RW.1, Menteng Dalam, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12870'
        ]);
        Client::create([
            'client_name' => 'PT. Asuransi Jiwa BNI Jiwasraya (BNI-Life)',
            'client_image' => 'client-images/rPEdogdhaUPqe5aWXZB58XaoVoZI5RyTjju8ktKZ.png',
            'address' => 'Jl. K.S. Tubun No.67, RT.2/RW.3, Petamburan, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10260'
        ]);
        //Isi table Project
        Project::create([
            'client_id' => 1,
            'product_id' => 1,
            'user_id' => 14,
            'project_name' => 'Unit Linked Software Development and Implementation',
            'technology' => 'Client Server, SQL Server, Power Builder',
            'budget' => '1.200.000.000',
            'startdate' => '2022-07-13',
            'enddate' => '2022-10-11'
        ]);
        Project::create([
            'client_id' => 2,
            'product_id' => 2,
            'user_id' => 12,
            'project_name' => 'Individual Life Insurance Development and Implementation',
            'technology' => 'Client Server with SQL Server and Power Bulider',
            'budget' => '2.000.000.000',
            'startdate' => '2022-11-13',
            'enddate' => '2022-01-13'
        ]);

        DB::table('complexities')->insert([
            'name' => 'Mudah',
            'desc_complexity' => 'Complexity Easy Point (1)'
        ]);
        DB::table('complexities')->insert([
            'name' => 'Normal',
            'desc_complexity' => 'Complexity Normal Point (2)'
        ]);

        DB::table('complexities')->insert([
            'name' => 'Sulit',
            'desc_complexity' => 'Complexity Hard Point (3)'
        ]);
        DB::table('complexities')->insert([
            'name' => 'Sangat Sulit',
            'desc_complexity' => 'Complexity Very Hard Point (4)'
        ]);

        DB::table('complexities')->insert([
            'name' => 'Kompleks',
            'desc_complexity' => 'Complexity Expert Point (5)'
        ]);

        //Setup Referensi
        Reference::create([
            'reference_name' => 'Kompleksitas',
            'bobot' => 4
        ]);
        Reference::create([
            'reference_name' => 'Waktu',
            'bobot' => 5
        ]);
        Reference::create([
            'reference_name' => 'Revisi',
            'bobot' => 3
        ]);
    }
}
