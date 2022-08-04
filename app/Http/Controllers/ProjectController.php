<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.projects.index', [
            'title' => 'List Project',
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.projects.create', [
            'title' => 'Add Project',
            'clients' => Client::all(),
            'products' => Product::all(),
            'users' => User::role('Project Manager')->get()
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
        $validateData =  $request->validate([
            'project_name' => ['required', 'max:255'],
            'client_id' => ['required'],
            'product_id' => ['required'],
            'user_id' => ['required'],
            'technology' => ['required', 'max:255'],
            'budget' => ['required'],
            'startdate' => ['required', 'date'],
            'enddate' => ['required', 'date']
        ]);

        Project::create($validateData);

        return redirect('dashboard/admin/projects')->with('success', 'Project has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }
    // test doang

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('dashboard.admin.projects.edit', [
            'title' => 'Edit Project',
            'project' => $project,
            'clients' => Client::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validateData =  $request->validate([
            'project_name' => ['required', 'max:255'],
            'client_id' => ['required'],
            'technology' => ['required', 'max:255'],
            'budget' => ['required'],
            'contract' => ['required']
        ]);

        $project->update($validateData);

        return redirect('dashboard/admin/projects')->with('success', 'Project has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect('dashboard/admin/projects');
    }
}
