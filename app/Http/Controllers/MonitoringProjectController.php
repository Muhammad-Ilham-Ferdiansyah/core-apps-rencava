<?php

namespace App\Http\Controllers;

use App\Models\DetailProject;
use App\Models\MonitoringProject;
use Illuminate\Http\Request;

class MonitoringProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.mn_projects.index', [
            'title' => 'Monitoring Project',
            'detail_projects' => DetailProject::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonitoringProject  $monitoringProject
     * @return \Illuminate\Http\Response
     */
    public function show(MonitoringProject $monitoringProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonitoringProject  $monitoringProject
     * @return \Illuminate\Http\Response
     */
    public function edit(MonitoringProject $monitoringProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonitoringProject  $monitoringProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonitoringProject $monitoringProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonitoringProject  $monitoringProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonitoringProject $monitoringProject)
    {
        //
    }
}
