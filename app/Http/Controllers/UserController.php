<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roles = Role::all();
        // $users = User::with('roles')->get();
        return view('dashboard.admin.users.index', [
            'title' => 'Setup User',
            'users' => User::with('roles')->orderBy('id', 'desc')->get(),
            // 'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect::setIntendedUrl(url()->previous());
        return view('dashboard.admin.users.create', [
            'title' => 'Create User',
            'roles' => Role::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make('password123'),
            'email_verified_at' => now()
        ]);

        $user->assignRole($request->role);
        return redirect('dashboard/admin/users')->with('success', 'User has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.admin.users.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'min:3', 'max:191', 'string', 'alpha_num', 'unique:users,username,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required']
        ]);
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'updated_at' => now()
        ]);

        $user = User::find($user->id);
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->role);
        return redirect('dashboard/admin/users')->with('success', 'User has been updated');
    }

    public function activate($id)
    {
        $specific_user = User::find($id);

        if ($specific_user->is_banned == 0) {
            $specific_user->where('id', $id)->update(['is_banned' => 1]);
        } else {
            $specific_user->where('id', $id)->update(['is_banned' => 0]);
        }
        return redirect('dashboard/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
