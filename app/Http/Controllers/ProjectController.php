<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Telegram;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'project_name' => 'required',
            'domain_name' => 'required',
            'api_key' => 'required',
            'channel_id' => 'required',
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        //dd($user_id);

        //generated encripted key for project api
        $project_api_key = Str::uuid()->toString();


        Project::create(
            [
                'project_name' => $request->project_name,
                'user_id' =>  $user_id,
                'domain_name' => $request->domain_name,
                'project_api_key' => $project_api_key,
                'key_generated_time' => now(),
            ]
        );
        //dd(Project::count());
        $project_id = Project::count();

        Telegram::create(
            [
                'project_id' => $project_id,
                'bot_api_key' => $request->api_key,
                'channel_id' => $request->channel_id,
            ]
        );
        return redirect()->route('dashboard')->with('success', 'Form data stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
