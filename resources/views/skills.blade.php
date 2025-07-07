@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-900 to-pink-800 p-4 py-12">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-white mb-8">My Skills</h1>
        
        @foreach($skills as $category => $categorySkills)
        <x-glass-card class="mb-8">
            <h2 class="text-2xl font-semibold text-white mb-4">{{ $category }} Skills</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categorySkills as $skill)
                <x-glass-card class="hover:border-primary transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <i class="{{ $skill->icon }} text-2xl text-white mr-3"></i>
                        <div>
                            <h3 class="text-xl font-semibold text-white">{{ $skill->name }}</h3>
                            @if($skill->projects->count() > 0)
                            <p class="text-sm text-white/80">
                                Used in {{ $skill->projects->count() }} project{{ $skill->projects->count() != 1 ? 's' : '' }}
                            </p>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Updated Proficiency Bar -->
                    <div class="shine-progress mb-2">
                        <div 
                            class="h-full bg-gradient-to-r from-primary to-secondary rounded-full" 
                            style="width: {{ $skill->proficiency }}%">
                        </div>
                    </div>
                    <span class="text-sm text-white/80">{{ $skill->proficiency }}% proficiency</span>
                    
                    @if($skill->projects->count() > 0)
                    <div class="mt-4">
                        <h4 class="text-sm font-medium text-white mb-2">Featured Projects:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($skill->projects->take(3) as $project)
                            <a href="#" class="text-sm text-white hover:text-primary hover:underline transition-colors">
                                {{ $project->title }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </x-glass-card>
                @endforeach
            </div>
        </x-glass-card>
        @endforeach
    </div>
</div>
@endsection