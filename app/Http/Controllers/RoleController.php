<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roles = Role::all();
        $roles = Role::with('permissions')->withCount('users')->get();
        return view('dashboard.admin.roles.index', [
            'title' => 'Setup Role',
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.roles.create', [
            'title' => 'Create Role'
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
            'guard_name' => ['required']
        ]);
        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        return redirect('dashboard/admin/roles')->with('success', 'Role has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // $roles = Role::with('permissions')->withCount('users')->get();
        return view('dashboard.admin.roles.edit', [
            'title' => 'Edit Role',
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'guard_name' => ['required']
        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'updated_at' => now()
        ]);

        return redirect('dashboard/admin/roles')->with('success', 'Role has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Role::destroy($role->id);
        $role = Role::find($id);
        DB::table('model_has_roles')->where('role_id', $id)->delete();
        $role->delete();

        return redirect('dashboard/admin/roles');
    }
}
