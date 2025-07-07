<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get 8 skills (ordered by proficiency or as you prefer)
        $skills = Skill::orderBy('proficiency', 'desc')
                      ->take(8)
                      ->get();
        
        // Get 2 featured projects (using whatever logic you prefer)
        $projects = Project::latest()
                          ->take(2)
                          ->with('skills') // Eager load skills relationship
                          ->get();
        
        return view('home', compact('skills', 'projects'));
    }
}