<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
\Illuminate\Support\Facades\DB::enableQueryLog();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollaborationRequest extends Controller
{
    public function sendRequest($projectId)
    {
        $user = Auth::user();
        if (!$user->projects()->where('projects.id', $projectId)->exists()) {
            $user->projects()->attach($projectId, ['status' => 'pending']);
            return redirect()->route('project.details',  $projectId)->with('success', 'Collaboration request sent successfully.');
        }
        return redirect()->route('project.details',  $projectId)->with('error', 'You are already associated with this project.');
    }
    public function showdashboard()
    {
        $users = User::all();
        $pendingUsers = collect();
        
        foreach ($users as $user) {
            $pendingProjects = $user->projects()->wherePivot('status', 'pending')->get();
            

            if ($pendingProjects->count() > 0) {
                $pendingUsers->push($user);
            }
        }
        return view('partner.pendingUsers', compact('pendingUsers'));
    }
    public function acceptUserRequest(Request $request, $id)
    {
        $idData = explode('-',$id);
        $idProject = $idData[0];
        $idUser = $idData[1];
        $pendingProjects = User::find($idUser)->projects()->wherePivot('user_id',$idUser)->updateExistingPivot($idProject,[
            'status' => $request->status,
        ]);
    
        return redirect()->route('partner.dashboard');
        
    }

    public function showAcceptedUsers()
    {
        $users = User::all();
        $pendingUsers = collect();
        
        foreach ($users as $user) {
            $pendingProjects = $user->projects()->wherePivot('status', 'accepted')->get();
            

            if ($pendingProjects->count() > 0) {
                $pendingUsers->push($user);
            }
        }
        return view('partner.acceptedUsers', compact('pendingUsers'));
    }
    public function refuseRequest($projectId)
    {
        $user = Auth::user();
        $user->projects()->updateExistingPivot($projectId,['status' => 'refused']);
        return redirect(route('partner.dashboard')); 
    }
    public function showRefusedUsers()
    {
        $users = User::all();
        $pendingUsers = collect();
        
        foreach ($users as $user) {
            $pendingProjects = $user->projects()->wherePivot('status', 'refused')->get();
            

            if ($pendingProjects->count() > 0) {
                $pendingUsers->push($user);
            }
        }
        return view('partner.refusedUsers', compact('pendingUsers'));
        
    }

     
}
