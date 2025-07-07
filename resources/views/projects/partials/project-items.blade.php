@foreach($projects as $project)
<div class="project-card">
    <x-glass-card class="hover:border-cyan-400 transition-all duration-500 group overflow-hidden">
        <!-- Image with hover zoom -->
        <div class="overflow-hidden">
            <img 
                src="{{ $project->image_url }}" 
                alt="{{ $project->title }}" 
                class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105"
            >
        </div>

        <!-- Project Content -->
        <div class="p-6">
            <h3 class="text-xl font-semibold text-white mb-2 font-['Rajdhani']">
                <span class="text-cyan-400">#</span> {{ $project->title }}
            </h3>

            <p class="text-white/80 mb-4 transition-all duration-300 group-hover:text-white">
                {{ Str::limit($project->description, 100) }}
            </p>

            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($project->skills as $skill)
                <span class="bg-white/10 backdrop-blur-sm text-white text-xs px-3 py-1 rounded-full border border-white/20 hover:bg-cyan-400/30 hover:border-cyan-400 transition-colors">
                    {{ $skill->name }}
                </span>
                @endforeach
            </div>

            <div class="flex space-x-3">
                <button class="details-btn text-cyan-300 hover:text-white font-medium flex items-center group" data-project-id="{{ $project->id }}">
                    <span class="mr-1">>></span>
                    <span class="border-b border-transparent group-hover:border-cyan-300 transition-all">
                        DETAILS
                    </span>
                </button>
                @if($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" class="text-green-300 hover:text-white font-medium flex items-center group">
                    <span class="mr-1">>></span>
                    <span class="border-b border-transparent group-hover:border-green-300 transition-all">
                        DEMO
                    </span>
                </a>
                @endif
            </div>
        </div>

        <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-cyan-400 opacity-80"></div>
    </x-glass-card>
</div>
@endforeach