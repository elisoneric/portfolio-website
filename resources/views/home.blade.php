@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-900 to-pink-800 overflow-hidden pt-20">
    <!-- Animated background elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-purple-500 rounded-full filter blur-3xl opacity-20 mix-blend-soft-light animate-float-slow"></div>
        <div class="absolute bottom-1/3 right-1/3 w-72 h-72 bg-cyan-500 rounded-full filter blur-3xl opacity-15 mix-blend-soft-light animate-float-medium"></div>
    </div>

    <!-- Main content -->
    <div class="relative max-w-7xl mx-auto px-4 py-12 md:py-24">
        <!-- Hero section -->
        <div class="flex flex-col md:flex-row items-center gap-12 mb-24">
            <!-- Text content -->
            <div class="md:w-1/2">
                <div class="mb-6 flex items-center">
                    <div class="w-3 h-3 bg-red-500 rounded-full mr-2 animate-pulse"></div>
                    <span class="font-mono text-sm text-white/80">CURRENTLY AVAILABLE FOR WORK</span>
                </div>
                
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 font-['Rajdhani'] leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">> HELLO_WORLD</span><br>
                    I'M <span class="text-cyan-400">3LI</span>
                </h1>
                
                <div class="mb-6">
                    <div class="inline-block px-3 py-1 bg-cyan-400/20 border border-cyan-400/50 rounded-full mb-4">
                        <span class="font-mono text-sm text-cyan-300">AI/ML SPECIALIST</span>
                    </div>
                    <p class="text-white/80 text-lg mb-6">
                        Building intelligent systems that learn and adapt. 
                        <span class="text-white font-medium">Computer Science Graduate</span> with a passion for 
                        <span class="text-cyan-300">neural networks</span> and 
                        <span class="text-pink-300">generative AI</span>.
                    </p>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('projects') }}" class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-400 to-blue-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-200"></div>
                        <button class="relative px-8 py-3 bg-gray-900 rounded-lg font-['Rajdhani'] font-bold text-white group-hover:text-cyan-300 transition-colors duration-200">
                            <span class="mr-2">>></span> VIEW_WORK
                        </button>
                    </a>
                    
                    <a href="{{ route('contact') }}" class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-pink-500 to-purple-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-200"></div>
                        <button class="relative px-8 py-3 bg-gray-900 rounded-lg font-['Rajdhani'] font-bold text-white group-hover:text-pink-300 transition-colors duration-200">
                            <span class="mr-2">>></span> CONTACT_ME
                        </button>
                    </a>
                </div>
            </div>

            <!-- Profile image with techy frame -->
            <div class="md:w-1/2 relative">
                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-cyan-400 to-blue-600 rounded-2xl opacity-70 blur-lg group-hover:opacity-90 transition duration-500"></div>
                    <div class="relative overflow-hidden rounded-xl border-2 border-white/10 backdrop-blur-sm bg-white/5">
                        <img 
                            src="https://wallpapers.com/images/hd/cool-profile-picture-87h46gcobjl5e4xu.jpg" 
                            alt="Profile Image" 
                            class="w-full h-auto transition-transform duration-700 group-hover:scale-105"
                        >
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                                <span class="font-mono text-xs text-white">ACTIVE_SESSION</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Floating tech badges around image -->
                <div class="absolute -top-6 -left-6 w-16 h-16 bg-indigo-500/20 border border-indigo-400/30 rounded-lg backdrop-blur-sm flex items-center justify-center animate-float-slow">
                    <span class="font-mono text-xs text-indigo-300">AI_DEV</span>
                </div>
                <div class="absolute -bottom-6 -right-6 w-16 h-16 bg-cyan-500/20 border border-cyan-400/30 rounded-lg backdrop-blur-sm flex items-center justify-center animate-float-medium">
                    <span class="font-mono text-xs text-cyan-300">ML_EXPERT</span>
                </div>
            </div>
        </div>

        <!-- Skills Preview Section -->
        <section class="mb-24">
            <div class="flex items-center mb-8">
                <h2 class="text-3xl font-bold text-white font-['Rajdhani'] mr-4">
                    <span class="text-cyan-400">></span> CORE_SKILLS
                </h2>
                <a href="{{ route('skills') }}" class="font-mono text-sm text-white/60 hover:text-cyan-400 transition-colors flex items-center">
                    VIEW_ALL <span class="ml-1">→</span>
                </a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($skills->take(8) as $skill)
                <x-glass-card class="hover:border-cyan-400 transition-all duration-300 group">
                    <div class="flex items-center space-x-3">
                        <i class="{{ $skill->icon }} text-lg text-cyan-400"></i>
                        <div class="flex-1">
                            <h3 class="font-medium text-white">{{ $skill->name }}</h3>
                            <div class="w-full bg-white/10 rounded-full h-1.5 mt-1">
                                <div 
                                    class="bg-gradient-to-r from-cyan-400 to-blue-500 h-1.5 rounded-full" 
                                    style="width: {{ $skill->proficiency }}%"
                                ></div>
                            </div>
                        </div>
                    </div>
                </x-glass-card>
                @endforeach
            </div>
        </section>

        <!-- Projects Preview Section -->
        <section class="mb-24">
            <div class="flex items-center mb-8">
                <h2 class="text-3xl font-bold text-white font-['Rajdhani'] mr-4">
                    <span class="text-cyan-400">></span> FEATURED_PROJECTS
                </h2>
                <a href="{{ route('projects') }}" class="font-mono text-sm text-white/60 hover:text-cyan-400 transition-colors flex items-center">
                    VIEW_ALL <span class="ml-1">→</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($projects->take(2) as $project)
                <x-glass-card class="hover:border-cyan-400 transition-all duration-500 group overflow-hidden">
                    <div class="relative overflow-hidden h-48">
                        <img 
                            src="{{ $project->image_url }}" 
                            alt="{{ $project->title }}" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2 font-['Rajdhani']">
                            <span class="text-cyan-400">#</span> {{ $project->title }}
                        </h3>
                        <p class="text-white/80 mb-4">{{ Str::limit($project->description, 120) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->skills->take(3) as $skill)
                            <span class="bg-white/10 backdrop-blur-sm text-white text-xs px-3 py-1 rounded-full border border-white/20">
                                {{ $skill->name }}
                            </span>
                            @endforeach
                        </div>
                        <a href="#" class="inline-flex items-center text-cyan-300 hover:text-white font-medium">
                            <span class="mr-2">>></span> EXPLORE_PROJECT
                        </a>
                    </div>
                </x-glass-card>
                @endforeach
            </div>
        </section>

        <!-- Tech Stack Marquee -->
        <div class="mb-24 overflow-hidden">
            <div class="flex items-center mb-8">
                <h2 class="text-3xl font-bold text-white font-['Rajdhani']">
                    <span class="text-cyan-400">></span> TECH_STACK
                </h2>
            </div>
            
            <div class="relative">
                <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-indigo-900 to-transparent z-10"></div>
                <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-pink-800 to-transparent z-10"></div>
                
                <div class="flex space-x-8 animate-marquee whitespace-nowrap">
                    @foreach($skills->shuffle()->take(12) as $skill)
                    <div class="inline-flex items-center space-x-2 px-6 py-3 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10">
                        <i class="{{ $skill->icon }} text-xl text-cyan-400"></i>
                        <span class="font-mono text-white">{{ strtoupper($skill->name) }}</span>
                    </div>
                    @endforeach
                    
                    <!-- Duplicated for seamless loop -->
                    @foreach($skills->shuffle()->take(12) as $skill)
                    <div class="inline-flex items-center space-x-2 px-6 py-3 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10">
                        <i class="{{ $skill->icon }} text-xl text-cyan-400"></i>
                        <span class="font-mono text-white">{{ strtoupper($skill->name) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <x-glass-card class="text-center p-12 bg-gradient-to-br from-cyan-500/10 to-blue-600/10 border border-cyan-400/30">
            <h2 class="text-3xl font-bold text-white mb-4 font-['Rajdhani']">
                READY_TO_COLLABORATE?
            </h2>
            <p class="text-white/80 mb-8 max-w-2xl mx-auto">
                Let's build something amazing together. Whether you need machine learning expertise, AI solutions, or full-stack development, I'm ready to help bring your ideas to life.
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-cyan-400/20 border border-cyan-400/50 rounded-lg text-cyan-300 hover:bg-cyan-400/30 hover:text-white transition-colors font-['Rajdhani'] font-bold">
                <span class="mr-2">>></span> INITIATE_CONTACT
            </a>
        </x-glass-card>
    </div>
</div>

<!-- Custom animations -->
<style>
    @keyframes float-slow {
        0%, 100% { transform: translateY(0) translateX(0); }
        50% { transform: translateY(-20px) translateX(10px); }
    }
    @keyframes float-medium {
        0%, 100% { transform: translateY(0) translateX(0); }
        50% { transform: translateY(-15px) translateX(-5px); }
    }
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
    .animate-float-medium { animation: float-medium 6s ease-in-out infinite; }
    .animate-marquee { animation: marquee 30s linear infinite; }
</style>
@endsection