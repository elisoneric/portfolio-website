@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Total Skills</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $skillsCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Total Projects</h3>
            <p class="text-3xl font-bold text-green-600">{{ $projectsCount }}</p>
        </div>
        
    </div>
    
    <div class="flex space-x-4 mb-8">
        <a href="{{ route('admin.skills.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition duration-300">Manage Skills</a>
        <a href="{{ route('admin.projects.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition duration-300">Manage Projects</a>
    </div>
</div>
@endsection