<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class DetailsController extends Controller
{
    public function index($id)
    {
        $project = Project::find($id);
        return view('details',compact('project'));
    }
}
