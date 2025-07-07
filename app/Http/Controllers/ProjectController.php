<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // app/Http/Controllers/ProjectController.php

public function index()
    {
        $projects = Project::with('skills')->get();
        $skills = Skill::all(); // Get all skills for the filter
        
        return view('projects', compact('projects', 'skills'));
    }

    public function filter(Request $request)
{
    $search = $request->input('search');
    $skill = $request->input('skill');
    
    $projects = Project::query()
        ->when($search, function($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        })
        ->when($skill, function($query) use ($skill) {
            $query->whereHas('skills', function($q) use ($skill) {
                $q->where('skills.id', $skill);
            });
        })
        ->with('skills')
        ->get();
    
    return view('projects.partials.project-items', compact('projects'));
}

public function show(Project $project)
{
    return response()->json([
        'title' => $project->title,
        'description' => $project->description,
        'demo_url' => $project->demo_url,
        'code_url' => $project->code_url,
        'images' => [$project->image_url], // Add more images if available
        'skills' => $project->skills->map(function($skill) {
            return ['name' => $skill->name];
        })
    ]);
}
}
