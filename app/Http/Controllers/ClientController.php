<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.clients.index', [
            'title' => 'Setup Clients',
            'clients' => Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.clients.create', [
            'title' => 'Add Client'
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
        $validateData = $request->validate([
            'client_name' => ['required', 'max:255', 'unique:clients'],
            'client_image' => ['image', 'file', 'max:1024'],
            'address' => ['required']
        ]);

        if ($request->file('client_image')) {
            $validateData['client_image'] = $request->file('client_image')->store('client-images');
        }

        Client::create($validateData);

        return redirect('dashboard/admin/clients')->with('success', 'Client has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.admin.clients.edit', [
            'title' => 'Edit Client',
            'clients' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validateData = $request->validate([
            'client_name' => ['required', 'max:255'],
            'client_image' => ['image', 'file', 'max:1024'],
            'address' => ['required']
        ]);

        if ($request->file('client_image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['client_image'] = $request->file('client_image')->store('client-images');
        }

        Client::where('id', $client->id)->update($validateData);

        return redirect('dashboard/admin/clients')->with('success', 'Client has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $client = Client::find($id);
        $client_in_project = Project::find($id);

        if ($client->client_image) {
            Storage::delete($client->client_image);
        }
        $client->delete();
        $client_in_project->delete();

        return redirect('dashboard/admin/clients');
    }
}
