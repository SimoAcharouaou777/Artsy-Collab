<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    
    public function store(ProjectRequest $request)
    {
     
       $data = $request->all();
       $data['image'] = $request->file('image')->store('images','public');
       $data['partner_id'] = $request->input('partner');
       $newproject = Project::create($data);
       return redirect(route('dashboard'));
    }

    public function softDelete($id)
    {
        $project =Project::find($id);
        $project->delete();
        $project->update(['status' => 'deleted']);
        return redirect(route('dashboard'));
    }


    public function updateSatus(Request $request, $id)
    {
        $project = Project::find($id);
        $request->validate([
            'status' => 'required|in:published,unpublished',
        ]);
        $project->update(['status' => $request->input('status')]);
        return redirect(route('dashboard'));
    }
}
