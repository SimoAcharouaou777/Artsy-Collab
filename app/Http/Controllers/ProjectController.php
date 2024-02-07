<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
       
       $data = $request->validate([
        'title' => 'required|string|max:30',
        'genre' => 'required|string|max:30',
        'author' => 'required|string',
        'description' => 'required|string',
        'publication_year' => 'required',
        'total_copies' => 'required|integer|min:1',
        'available_copies' =>  'required|integer',
       
       ]);
    }
}
