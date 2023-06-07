<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($project_api_key)
    { {
            $user = Auth::user();
            //dd($user);
            $user_id = $user->id;
            //dd($user_id);

            $project = Project::all()->where('user_id', "=", $user_id)->where('project_api_key', "=", $project_api_key)->first();
            //dd($project);
            $project_id = $project->id;
           //dd($project_id);
            // $logs = Log::all()->where('project_id', '=',  $project_id);
            $logs = Log::where('project_id', $project_id)
            ->paginate(5); // Set the number of logs to display per page (e.g., 10 logs per page)

           //dd($logs);
            return view('logs', compact('logs'));
        }
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
    public function store(StoreLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogRequest $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        //
    }
}
