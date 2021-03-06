<?php

namespace App\Http\Controllers;

use App\Models\DetailTeam;
use Illuminate\Http\Request;

class DetailTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.detail_teams.index', [
            'title' => 'Detail Team',
            'detail_teams' => DetailTeam::all()
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
     * @param  \App\Models\DetailTeam  $detailTeam
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTeam $detailTeam)
    {
        return view('dashboard.admin.detail_teams.show', [
            'title' => 'Show Detail Teams',
            'detail_teams' => $detailTeam
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailTeam  $detailTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTeam $detailTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailTeam  $detailTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTeam $detailTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailTeam  $detailTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTeam $detailTeam)
    {
        //
    }
}
