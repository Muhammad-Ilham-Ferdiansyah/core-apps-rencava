<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailProjectController;
use App\Http\Controllers\DetailTeamController;
use App\Models\DetailProject;
use App\Models\Menu;
use App\Models\Project;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth', 'verified', 'isUser'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'roles' => ModelsRole::all()->count(),
            'app_menus' => Menu::all()
        ]);
    });

    //Route Profile
    Route::get('dashboard/profile', [ProfileController::class, 'index']);
    Route::get('dashboard/profile/edit', [ProfileController::class, 'edit']);
    Route::put('dashboard/profile/update', [ProfileController::class, 'update']);
    //Route Change Password
    Route::get('dashboard/password/edit', [ChangePasswordController::class, 'edit']);
    Route::put('dashboard/password/update', [ChangePasswordController::class, 'update']);
    //Route Role Admin
    Route::resource('dashboard/admin/users', UserController::class);
    Route::get('dashboard/admin/users/activate/{users:id}', [UserController::class, 'activate']);
    //Setup Role
    Route::resource('dashboard/admin/roles', RoleController::class);
    Route::get('dashboard/admin/roles/delete/{roles:id}', [RoleController::class, 'delete']);
    //Setup Menu
    Route::resource('dashboard/admin/menu', MenuController::class);
    Route::get('dashboard/admin/menu/delete/{app_menu:id}', [MenuController::class, 'delete']);
    //Setup Client
    Route::resource('dashboard/admin/clients', ClientController::class);
    Route::get('dashboard/admin/clients/delete/{clients:id}', [ClientController::class, 'delete']);
    //Setup Product
    Route::resource('dashboard/admin/products', ProductController::class);
    Route::get('dashboard/admin/products/delete/{products:id}', [ProductController::class, 'delete']);
    //List Project
    Route::resource('dashboard/admin/projects', ProjectController::class);
    Route::get('dashboard/admin/projects/delete/{projects:id}', [ProjectController::class, 'delete']);
    //Detail Project
    Route::resource('dashboard/admin/detail_projects', DetailProjectController::class);
    Route::get('dashboard/admin/detail_projects/show_detail/{detail_projects:user_id}', [DetailProjectController::class, 'show_detail']);
    Route::get('dashboard/admin/detail_projects/delete/{detail_projects:project_id}', [DetailProjectController::class, 'delete']);
    //Detail Team
    Route::resource('dashboard/admin/detail_teams', DetailTeamController::class);
});

require __DIR__ . '/auth.php';
