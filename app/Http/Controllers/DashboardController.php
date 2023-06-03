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
}
