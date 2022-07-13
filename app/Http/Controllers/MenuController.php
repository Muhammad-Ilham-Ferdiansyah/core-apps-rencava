<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.menu.index', [
            'title' => 'Setup Menu',
            'app_menus' => Menu::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.menu.create', [
            'title' => 'Create Menu',
            'menu_parent' => Menu::where('main_id', 0)
                ->where('published', 1)
                ->orderBy('orderno', 'asc')
                ->get()
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
            'menu_name' => ['required', 'string', 'max:255'],
            'main_id' => ['required'],
            'link' => ['required', 'string'],
            'orderno' => ['required', 'numeric'],
            'icon' => ['max:255'],
            'menu_desc' => ['required', 'max:255'],
        ]);
        $clicked = $request->menu_name;
        $clicked2 = str_replace(' ', '_', $clicked);
        $clicked3 = strtolower($clicked2);

        if ($request->has('published')) {
            $published = $request->published = 1;
        } else {
            $published = $request->published = 0;
        }

        Menu::create([
            'menu_name' => $clicked,
            'main_id' => $request->main_id,
            'link' => $request->link,
            'orderno' => $request->orderno,
            'icon' => $request->icon,
            'menu_desc' => $request->menu_desc,
            'published' => $published,
            'clicked' => $clicked3,
        ]);

        return redirect('dashboard/admin/menu')->with('success', 'Menu has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboard.admin.menu.edit', [
            'title' => 'Edit Menu',
            'menu' => $menu,
            'menu_name' => Menu::where('main_id', 0)->where('published', 1)
                ->orderBy('orderno', 'asc')
                ->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'menu_name' => ['required', 'string', 'max:255'],
            'main_id' => ['required'],
            'link' => ['required', 'string'],
            'orderno' => ['required', 'numeric'],
            'icon' => ['max:255'],
            'menu_desc' => ['required', 'max:255'],
        ]);
        $clicked = $request->menu_name;
        $clicked2 = str_replace(' ', '_', $clicked);
        $clicked3 = strtolower($clicked2);

        if ($request->has('published')) {
            $published = $request->published = 1;
        } else {
            $published = $request->published = 0;
        }

        $menu->update([
            'menu_name' => $clicked,
            'main_id' => $request->main_id,
            'link' => $request->link,
            'orderno' => $request->orderno,
            'icon' => $request->icon,
            'menu_desc' => $request->menu_desc,
            'published' => $published,
            'clicked' => $clicked3,
        ]);

        return redirect('dashboard/admin/menu')->with('success', 'Menu has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('dashboard/admin/menu');
    }
}
