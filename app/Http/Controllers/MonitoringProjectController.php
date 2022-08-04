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
            'detail_projects' => DetailProject::where('user_id', auth()->user()->id)->get(),
            'detail_by_pm' => DetailProject::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.mn_projects.create', [
            'title' => 'Add Progress',
            'detail_projects' => DetailProject::where('user_id', auth()->user()->id)->get()
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
        // dd(DetailProject::where('id', 3)->get());
        $target = DetailProject::where('id', $request->detail_project_id)->get();
        // $tglAkhir = $target[0]->enddate;
        // $tglAwal = now();
        // $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tglAkhir);
        // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $tglAwal);
        // $diff_in_days = $to->diffInDays($from);
        // dd($target[0]);
        $request->validate([
            'detail_project_id' => ['required'],
            'date_progress' => ['required'],
            'progress' => ['required'],
        ]);

        MonitoringProject::create([
            'detail_project_id' => $request->detail_project_id,
            'date_progress' => $request->date_progress,
            'progress' => $request->progress,
            'target' => $target[0]->enddate
        ]);

        return redirect('dashboard/user/mn_projects')->with('success', 'Progress has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonitoringProject  $monitoringProject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        return view('dashboard.user.mn_projects.show', [
            'title' => 'Detail Pekerjaan',
            'monitoring_projects' => MonitoringProject::where('detail_project_id', $id)->orderBy('date_progress', 'desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonitoringProject  $monitoringProject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $detailProject = DetailProject::where('id', $id)->get();
        // // dd($detailProject);
        // return view('dashboard.user.mn_projects.edit', [
        //     'title' => 'Assessment ' . $detailProject[0]->jobdesc
        // ]);
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

    public function assessment($id)
    {
        $detailProject = DetailProject::where('id', $id)->get();
        return view('dashboard.user.mn_projects.assessment', [
            'title' => 'Assessment ' . $detailProject[0]->jobdesc,
            'detail_projects' => $detailProject
        ]);
    }
}
