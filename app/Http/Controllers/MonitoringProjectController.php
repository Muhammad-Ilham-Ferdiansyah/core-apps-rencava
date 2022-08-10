<?php

namespace App\Http\Controllers;

use App\Models\DetailProject;
use App\Models\MonitoringProject;
use App\Models\Project;
use Attribute;
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
            'project_by_pm' => Project::where('user_id', auth()->user()->id)->get()
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

        $validateData = $request->validate([
            'detail_project_id' => ['required'],
            'date_progress' => ['required'],
            'desc_progress' => ['required'],
            'progress' => ['required'],
            'evidence' => ['image', 'file', 'max:1024'],
        ]);


        if ($request->file('evidence')) {
            $validateData['evidence'] = $request->file('evidence')->store('evidence-images');
        }

        $validateData['target'] = $target[0]->enddate;

        MonitoringProject::create($validateData);

        // MonitoringProject::create([
        //     'detail_project_id' => $request->detail_project_id,
        //     'date_progress' => $request->date_progress,
        //     'progress' => $request->progress,
        //     'target' => $target[0]->enddate
        // ]);

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

    public function assessment($id)
    {
        return view('dashboard.user.mn_projects.assessment', [
            'title' => 'Assessment Pekerjaan',
            'detail_projects' => DetailProject::where('project_id', $id)->get()
        ]);
    }

    public function show_detail($id)
    {
        return view('dashboard.user.mn_projects.show_detail', [
            'title' => 'Show Detail',
            'monitoring_projects' => MonitoringProject::where('detail_project_id', $id)->get()
        ]);
    }

    public function add_revision(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $data = $request->all();
            MonitoringProject::where(['id' => $id])->update(['revision' => $data['revision']]);

            return redirect()->back()->with('success', 'Revision has been sended.');
        }
    }

    public function approved($id)
    {
        // $completed = MonitoringProject::where();
        // $not_completed = MonitoringProject::where('progress', '<>', 100)->get();
        $data = MonitoringProject::where('id', $id)->get();
        $data_target = $data[0]->progress;
        $date_selesai = $data[0]->date_progress;
        $date_target = $data[0]->target;

        function dateDiffInDays($date_selesai, $date_target)
        {
            $diff = strtotime($date_selesai) - strtotime($date_target);
            return abs(round($diff / 86400));
        }

        $get_day = (dateDiffInDays($date_selesai, $date_target));

        if ($date_target >= $date_selesai) {
            $evaluasi = 5;
        } else if (($date_target < $date_selesai) && $get_day == 1) {
            $evaluasi = 4;
        } else if (($date_target < $date_selesai) && $get_day == 2) {
            $evaluasi = 3;
        } else if (($date_target < $date_selesai) && $get_day == 3) {
            $evaluasi = 2;
        } else if (($date_target < $date_selesai) && $get_day == 4) {
            $evaluasi = 1;
        } else {
            $evaluasi = 1;
        }


        if ($data[0]->progress == 100) {
            MonitoringProject::where(['id' => $id])->update([
                'status' => 100,
                'date_selesai' => $date_selesai,
                'evaluasi' => $evaluasi
            ]);
        } elseif ($data[0]->progress != 100) {
            MonitoringProject::where(['id' => $id])->update(['status' => $data_target]);
        }

        return redirect()->back()->with('success', 'Approval has been completed.');
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
}
