<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ArchivedProjectsController extends Controller
{
    public function index()
    {
        $archivedProjects = Project::onlyTrashed()->where('status','deleted')->get();
        return view('admin.archivedProjects',compact('archivedProjects'));
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->find($id);
        $project->restore();
        $project->update(['status' => 'unpublished']);
        return redirect(route('showArchived.projects'));
    }
    
} 
