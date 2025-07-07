@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-900 to-pink-800 p-4 py-12">
    <div class="max-w-7xl mx-auto">
        <!-- Futuristic Header -->
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-bold text-white mb-2 font-['Rajdhani']">
                <span class="text-cyan-400">></span> PROJECT_ARCHIVE
            </h1>
            <p id="loading-text" class="text-white/70 font-mono text-sm animate-pulse">
                loading_projects...[{{ count($projects) }}_found]
            </p>
        </div>

        <!-- Filter/Search Controls -->
        <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Search with debounce -->
            <x-glass-card class="p-4 hover:border-cyan-400 transition-colors">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input 
                        id="project-search"
                        type="text" 
                        class="w-full pl-10 pr-4 py-2 bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent placeholder-white/30 font-mono"
                        placeholder="SEARCH_PROJECTS..."
                    >
                </div>
            </x-glass-card>

            <!-- Skill Filter Dropdown -->
            <x-glass-card class="p-4 hover:border-cyan-400 transition-colors">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <select 
                        id="skill-filter"
                        class="w-full pl-10 pr-4 py-2 bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent appearance-none font-mono"
                    >
                        <option value="">ALL_SKILLS</option>
                        @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ strtoupper($skill->name) }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </x-glass-card>
        </div>

        <!-- Active Filters Display -->
        <div id="active-filters" class="flex flex-wrap gap-2 mb-8 hidden">
            <span class="font-mono text-xs text-white/70">ACTIVE_FILTERS:</span>
        </div>

        <!-- Projects Grid (with Skeleton Loading) -->
        <div id="projects-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @include('projects.partials.project-items', ['projects' => $projects])
        </div>

        <!-- Skeleton Loading Placeholder -->
        <div id="skeleton-loading" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for($i = 0; $i < 6; $i++)
            <x-glass-card class="overflow-hidden">
                <div class="animate-pulse">
                    <div class="bg-white/10 h-48 w-full"></div>
                    <div class="p-6 space-y-4">
                        <div class="h-6 bg-white/10 rounded w-3/4"></div>
                        <div class="h-4 bg-white/10 rounded w-full"></div>
                        <div class="h-4 bg-white/10 rounded w-5/6"></div>
                        <div class="flex flex-wrap gap-2">
                            <div class="h-6 bg-white/10 rounded-full w-16"></div>
                            <div class="h-6 bg-white/10 rounded-full w-20"></div>
                        </div>
                        <div class="h-8 bg-white/10 rounded-lg w-24"></div>
                    </div>
                </div>
            </x-glass-card>
            @endfor
        </div>

        <!-- Project Counter -->
        <div class="mt-12 text-center">
            <p id="project-counter" class="font-mono text-sm text-white/50">
                [ displaying {{ count($projects) }} of {{ count($projects) }} projects ]
            </p>
        </div>
    </div>
</div>

<!-- Project Detail Modal -->
<div id="project-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Modal Backdrop -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
        </div>

        <!-- Modal Content -->
        <div class="inline-block align-bottom bg-gradient-to-br from-gray-900 to-indigo-900/80 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full border border-white/10">
            <div class="px-6 py-4">
                <div class="flex justify-between items-start">
                    <h3 id="modal-title" class="text-2xl font-bold text-white font-['Rajdhani']"></h3>
                    <button id="modal-close" class="text-white/50 hover:text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Image Carousel -->
            <div class="relative">
                <div id="modal-carousel" class="carousel slide relative" data-bs-ride="carousel">
                    <div class="carousel-inner relative w-full overflow-hidden">
                        <!-- Images will be injected here -->
                    </div>
                    <button class="carousel-control-prev absolute top-1/2 left-4 transform -translate-y-1/2 text-white hover:text-cyan-400" type="button">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="carousel-control-next absolute top-1/2 right-4 transform -translate-y-1/2 text-white hover:text-cyan-400" type="button">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Project Details -->
            <div class="px-6 py-4">
                <p id="modal-description" class="text-white/80 mb-6"></p>
                
                <div class="mb-6">
                    <h4 class="font-['Rajdhani'] text-white/80 mb-3"><span class="text-cyan-400">></span> TECHNOLOGIES_USED</h4>
                    <div id="modal-skills" class="flex flex-wrap gap-2">
                        <!-- Skills will be injected here -->
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <a id="modal-demo-btn" href="#" target="_blank" class="hidden items-center px-6 py-2 bg-cyan-400/20 border border-cyan-400/50 rounded-lg text-cyan-300 hover:bg-cyan-400/30 hover:text-white transition-colors font-['Rajdhani'] font-bold">
                        <span class="mr-2">>></span> LIVE_DEMO
                    </a>
                    <a id="modal-code-btn" href="#" target="_blank" class="hidden items-center px-6 py-2 bg-purple-400/20 border border-purple-400/50 rounded-lg text-purple-300 hover:bg-purple-400/30 hover:text-white transition-colors font-['Rajdhani'] font-bold">
                        <span class="mr-2">>></span> VIEW_CODE
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Dynamic Functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const searchInput = document.getElementById('project-search');
    const skillFilter = document.getElementById('skill-filter');
    const projectsContainer = document.getElementById('projects-container');
    const skeletonLoading = document.getElementById('skeleton-loading');
    const loadingText = document.getElementById('loading-text');
    const projectCounter = document.getElementById('project-counter');
    const activeFilters = document.getElementById('active-filters');
    
    // Modal Elements
    const projectModal = document.getElementById('project-modal');
    const modalClose = document.getElementById('modal-close');
    
    // Debounce Function
    const debounce = (func, delay) => {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), delay);
        };
    };
    
    // Filter Projects
    const filterProjects = debounce(() => {
        const searchTerm = searchInput.value.toLowerCase();
        const skillId = skillFilter.value;
        
        // Show skeleton loading
        projectsContainer.classList.add('hidden');
        skeletonLoading.classList.remove('hidden');
        loadingText.classList.add('animate-pulse');
        
        // Update active filters display
        updateActiveFilters(searchTerm, skillId);
        
        // AJAX request to filter projects
        fetch(`/projects/filter?search=${encodeURIComponent(searchTerm)}&skill=${skillId}`)
            .then(response => response.text())
            .then(html => {
                projectsContainer.innerHTML = html;
                projectsContainer.classList.remove('hidden');
                skeletonLoading.classList.add('hidden');
                loadingText.classList.remove('animate-pulse');
                
                // Update project counter
                const visibleProjects = projectsContainer.querySelectorAll('.project-card').length;
                projectCounter.textContent = `[ displaying ${visibleProjects} of ${visibleProjects} projects ]`;
                
                // Attach modal open events to new project cards
                attachModalEvents();
            });
    }, 300);
    
    // Update Active Filters Display
    const updateActiveFilters = (searchTerm, skillId) => {
        activeFilters.innerHTML = '<span class="font-mono text-xs text-white/70">ACTIVE_FILTERS:</span>';
        
        if (searchTerm) {
            const searchBadge = document.createElement('span');
            searchBadge.className = 'bg-cyan-400/20 text-cyan-300 text-xs px-3 py-1 rounded-full font-mono';
            searchBadge.textContent = `SEARCH: ${searchTerm}`;
            activeFilters.appendChild(searchBadge);
        }
        
        if (skillId) {
            const selectedSkill = skillFilter.options[skillFilter.selectedIndex].text;
            const skillBadge = document.createElement('span');
            skillBadge.className = 'bg-purple-400/20 text-purple-300 text-xs px-3 py-1 rounded-full font-mono';
            skillBadge.textContent = `SKILL: ${selectedSkill}`;
            activeFilters.appendChild(skillBadge);
        }
        
        activeFilters.classList.toggle('hidden', !searchTerm && !skillId);
    };
    
    // Show Project Modal
    const showProjectModal = (project) => {
        // Set modal content
        document.getElementById('modal-title').textContent = project.title;
        document.getElementById('modal-description').textContent = project.description;
        
        // Set carousel images
        const carouselInner = document.querySelector('#modal-carousel .carousel-inner');
        carouselInner.innerHTML = '';
        
        // Add images to carousel (assuming project.images is an array of image URLs)
        project.images.forEach((image, index) => {
            const item = document.createElement('div');
            item.className = `carousel-item relative float-left w-full ${index === 0 ? 'active' : ''}`;
            item.innerHTML = `
                <img src="${image}" class="block w-full h-96 object-cover" alt="${project.title}">
            `;
            carouselInner.appendChild(item);
        });
        
        // Set skills
        const skillsContainer = document.getElementById('modal-skills');
        skillsContainer.innerHTML = '';
        
        project.skills.forEach(skill => {
            const skillBadge = document.createElement('span');
            skillBadge.className = 'bg-white/10 backdrop-blur-sm text-white text-xs px-3 py-1 rounded-full border border-white/20';
            skillBadge.textContent = skill.name;
            skillsContainer.appendChild(skillBadge);
        });
        
        // Set demo/code buttons
        const demoBtn = document.getElementById('modal-demo-btn');
        const codeBtn = document.getElementById('modal-code-btn');
        
        if (project.demo_url) {
            demoBtn.href = project.demo_url;
            demoBtn.classList.remove('hidden');
        } else {
            demoBtn.classList.add('hidden');
        }
        
        if (project.code_url) {
            codeBtn.href = project.code_url;
            codeBtn.classList.remove('hidden');
        } else {
            codeBtn.classList.add('hidden');
        }
        
        // Show modal
        projectModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    };
    
    // Attach Modal Events to Project Cards
    const attachModalEvents = () => {
        document.querySelectorAll('.project-card .details-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const projectId = this.dataset.projectId;
                
                // Fetch project details
                fetch(`/projects/${projectId}`)
                    .then(response => response.json())
                    .then(project => showProjectModal(project));
            });
        });
    };
    
    // Initialize
    attachModalEvents();
    
    // Event Listeners
    searchInput.addEventListener('input', filterProjects);
    skillFilter.addEventListener('change', filterProjects);
    
    modalClose.addEventListener('click', () => {
        projectModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    });
    
    // Close modal when clicking outside
    projectModal.addEventListener('click', (e) => {
        if (e.target === projectModal) {
            projectModal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
    
    // Allow Enter key to trigger search immediately
    searchInput.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') {
            filterProjects();
        }
    });
});
</script>
@endsection