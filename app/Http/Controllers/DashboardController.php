<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Project;


class DashboardController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $projects = Project::with('partner')->get();
        $acceptedCounts = [];

        foreach ($projects as $project) {
            $acceptedCounts[$project->id] = $project->users()->wherePivot('status', 'accepted')->count();
        }
        return view('admin.projects',compact('partners','projects','acceptedCounts'));
    }

}

