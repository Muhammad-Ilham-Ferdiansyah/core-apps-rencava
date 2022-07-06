<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
            'roles' => ModelsRole::all()->count()
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
});

require __DIR__ . '/auth.php';
