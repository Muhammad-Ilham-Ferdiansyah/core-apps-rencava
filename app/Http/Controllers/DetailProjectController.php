<?php

namespace App\Http\Controllers;

use App\Models\DetailProject;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;

class DetailProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.detail_projects.index', [
            'title' => 'Detail Proyek',
            'detail_project' => DetailProject::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.detail_projects.create', [
            'title' => 'Add Detail Proyek',
            'projects' => Project::all(),
            'products' => Product::all()
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
        // dd($request);
        $request->validate([
            'project_id' => ['required'],
            'product_id' => ['required'],
            'estimasi_orang' => ['required', 'numeric'],
            'startdate' => ['required', 'date'],
            'enddate' => ['required', 'date']
        ]);

        foreach ($request->product_id as $product) {
            DetailProject::create([
                'project_id' => $request->project_id,
                'product_id' => $product,
                'estimasi_orang' => $request->estimasi_orang,
                'startdate' => $request->startdate,
                'enddate' => $request->enddate
            ]);
        }

        return redirect('dashboard/admin/detail_projects')->with('success', 'Detail Project has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailProject  $detailProject
     * @return \Illuminate\Http\Response
     */
    public function show(DetailProject $detailProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailProject  $detailProject
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProject $detailProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailProject  $detailProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailProject $detailProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailProject  $detailProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailProject $detailProject)
    {
        //
    }
}
