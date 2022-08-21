<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportDetailController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.report_detail.index', [
            'title' => 'Laporan Detail Pekerjaan',
            'report_details' => DB::table('detail_projects')
                ->join('monitoring_projects', 'detail_projects.id', '=', 'monitoring_projects.detail_project_id')
                ->join('users', 'detail_projects.user_id', '=', 'users.id')
                ->join('preferences', 'detail_projects.id', '=', 'preferences.detail_project_id')
                ->get()
        ]);
    }
}
