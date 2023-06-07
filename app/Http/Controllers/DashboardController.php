<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $projects = Project::all()->where('user_id', "=", $user_id);
        //dd($projects);
        return view('dashboard', compact('projects'));
    }

    //creta a delete function
    public function delete($project_api_key)
    {
        $project = Project::all()->where('project_api_key', "=", $project_api_key)->first();
        //dd($project);
        $project->delete();
        return redirect()->back();

    }


}
