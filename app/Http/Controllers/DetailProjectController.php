<?php

namespace App\Http\Controllers;

use App\Models\Complexity;
use App\Models\DetailProject;
use App\Models\MonitoringProject;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projectId = Project::get()->id;
        // $detPro = DetailProject::get();
        // $data = collect($projectId)->keyBy('id');
        // // $data = $projectId->concat($detPro);
        // foreach ($detPro as $i => $customer) {
        //     $detPro[$i]['project_id'] = '';
        //     if ($data->has($customer['id']))
        //         $detPro[$i]['class'] = $data[$customer['id']]['class'];
        // }
        // dd($customer);
        return view('dashboard.admin.detail_projects.index', [
            'title' => 'Detail Proyek',
            'project' => Project::where('user_id', auth()->user()->id)->get(),
            'detail_project' => DetailProject::where('project_id', Project::where('id')),
            // 'id' => $projectId
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
            'projects' => Project::where('user_id', auth()->user()->id)->get(),
            'complexities' => Complexity::all(),
            'users' => User::role('Software Engineer')->get(),
        ]);
    }
    public function createbyid($id)
    {
        return view('dashboard.admin.detail_projects.createbyid', [
            'title' => 'Add Detail Proyek',
            'projects' => Project::where('user_id', auth()->user()->id)->get(),
            'complexities' => Complexity::all(),
            'users' => User::role('Software Engineer')->get(),
            'id' => $id
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
        // dd($request->all());
        // $request->validate([
        //     'project_id' => ['required'],
        //     'module_name' => ['required'],
        //     'user_id' => ['required'],
        //     'jobdesc' => ['required'],
        // ]);

        $project_id = $request->project_id;
        $estimasi_orang = $request->estimasi_orang;
        $user_id = $request->user_id;
        $complexity_id = $request->complexity_id;
        $jobdesc = $request->jobdesc;
        $stardate = $request->startdate;
        $enddate = $request->enddate;


        for ($i = 0; $i < count($user_id); $i++) {
            $validateData = [
                'project_id' => $project_id,
                'estimasi_orang' => $estimasi_orang,
                'user_id' => $user_id[$i],
                'jobdesc' => $jobdesc[$i],
                'complexity_id' => $complexity_id[$i],
                'startdate' => $stardate[$i],
                'enddate' => $enddate[$i]
            ];
            DetailProject::create($validateData);
        }
        // foreach ($request->product_id as $product) {
        //     DetailProject::create([
        //         'project_id' => $request->project_id,
        //         'product_id' => $product,
        //     ]);
        // }

        return redirect('dashboard/admin/detail_projects')->with('success', 'Detail Project has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailProject  $detailProject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailProject = DetailProject::all()->where('project_id', $id);
        // dd($detailProject);
        return view('dashboard.admin.detail_projects.show', [
            'title' => 'Show Detail Project',
            'detail_project' => $detailProject->unique('user_id'),
            // 'count' => DetailProject::where('project_id', $detailProject->id)
        ]);
    }

    public function show_detail($id)
    {
        $detailProjectUsers = DetailProject::all()->where('user_id', $id);
        $detailProjectUser = DetailProject::all()->where('user_id', $id)->first();
        return view('dashboard.admin.detail_projects.show_detail', [
            'title' => 'Show Detail Project by ' . $detailProjectUser->user->name,
            'detail_project_user' => $detailProjectUsers,
            'detail_project_users' => $detailProjectUsers->first(),
        ]);
    }

    // public function add_revision($id)
    // {
    //     return view('dashboard.user.detail')
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailProject  $detailProject
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProject $detailProject)
    {
        return view('dashboard.admin.detail_projects.edit', [
            'title' => 'Edit Detail Proyek ' .  $detailProject->jobdesc,
            'detail_project' => $detailProject,
            'projects' => Project::all(),
            'products' => Product::all(),
            'users' => User::role('Software Engineer')->get()
        ]);
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
        // $oldProduct = DetailProject::select('product_id')->get();
        $request->validate([
            'user_id' => ['required'],
            'jobdesc' => ['required'],
            'estimasi_orang' => ['required', 'numeric'],
            'startdate' => ['required', 'date'],
            'enddate' => ['required', 'date']
        ]);

        $detailProject->update([
            'user_id' => $request->user_id,
            'jobdesc' => $request->jobdesc,
            'estimasi_orang' => $request->estimasi_orang,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate
        ]);

        MonitoringProject::where('detail_project_id', $detailProject->id)->update([
            'target' => $request->enddate
        ]);

        return redirect('dashboard/admin/detail_projects/' . $detailProject->project_id)->with('success', 'Detail Project has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailProject  $detailProject
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $detail_project = DetailProject::find($id);
        $detail_project->delete();
        MonitoringProject::where('detail_project_id', $id)->delete();

        return redirect('dashboard/admin/detail_projects/');
    }
}
