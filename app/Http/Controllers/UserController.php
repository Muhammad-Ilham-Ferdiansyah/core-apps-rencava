<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
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
            'title' => 'User Management',
            'users' => User::with('roles')->get(),
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
        // if (auth()->user()->role == 'Admin') {
        //     return redirect('/dashboard/admin/man_user')->with('success', 'User has been added');
        // } else if ($request->user()->hasVerifiedEmail() == FALSE) {
        //     Auth::login($user);
        //     return redirect(RouteServiceProvider::HOME);
        // }


        // if (Auth::user()->role == 'Admin') {
        //     echo 'test';
        // }

        // event(new Registered($user)); //kirim verifikasi email

        // dd(auth()->user()->hasRoles('Admin') == $request->role);

        // if (auth()->user()->role == $request->role) {
        //     event(new Registered($user));
        //     Auth::login();
        // }

        // if ($user->assignRole($request->role) == TRUE) {
        //     event(new Registered($user));
        //     Auth::login($user);
        // }
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
        //
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
        //
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
