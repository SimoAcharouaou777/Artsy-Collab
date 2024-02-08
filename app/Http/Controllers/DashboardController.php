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
        return view('admin.projects',compact('partners','projects'));
    }
 

}
