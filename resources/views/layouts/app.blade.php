<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI/ML Developer Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Space+Grotesk:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-900 to-pink-800 font-['Space_Grotesk']">
    <!-- Animated background elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
        <div class="absolute top-0 left-0 w-64 h-64 bg-purple-500 rounded-full filter blur-3xl opacity-20 mix-blend-soft-light"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-pink-500 rounded-full filter blur-3xl opacity-20 mix-blend-soft-light"></div>
    </div>

    <!-- Futuristic Navigation -->
    <header class="relative z-50">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <!-- Logo with techy effect -->
                <a href="{{ route('home') }}" class="group">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-cyan-400 rounded-full animate-pulse"></div>
                        <span class="font-['Rajdhani'] text-xl font-bold text-white tracking-tighter group-hover:text-cyan-300 transition-colors duration-300">
                            <span class="text-cyan-400">AI</span>/ML_DEV
                        </span>
                    </div>
                </a>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Holographic Nav -->
                <nav class="hidden md:block">
                    <ul class="flex space-x-8">
                        @foreach([
                            ['route' => 'home', 'text' => 'HOME'],
                            ['route' => 'skills', 'text' => 'SKILLS'],
                            ['route' => 'projects', 'text' => 'PROJECTS'],
                            ['route' => 'contact', 'text' => 'CONTACT']
                        ] as $item)
                        <li>
                            <a href="{{ route($item['route']) }}" 
                               class="relative font-['Rajdhani'] font-medium text-white/80 hover:text-white transition-colors duration-300 group">
                                {{ $item['text'] }}
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        </li>
                        @endforeach
                        @auth
                        <li>
                            <a href="{{ route('admin.dashboard') }}" 
                               class="font-['Rajdhani'] font-medium text-white/80 hover:text-white transition-colors duration-300 flex items-center">
                                <span class="relative">
                                    DASHBOARD
                                    <span class="absolute top-0 right-0 w-2 h-2 bg-green-400 rounded-full animate-pulse -mt-1 -mr-3"></span>
                                </span>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </nav>
            </div>

            <!-- Mobile menu (hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 py-4 bg-white/5 backdrop-blur-lg rounded-lg border border-white/10">
                <ul class="flex flex-col space-y-4 px-4">
                    @foreach([
                        ['route' => 'home', 'text' => 'HOME'],
                        ['route' => 'skills', 'text' => 'SKILLS'],
                        ['route' => 'projects', 'text' => 'PROJECTS'],
                        ['route' => 'contact', 'text' => 'CONTACT']
                    ] as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" 
                           class="block font-['Rajdhani'] font-medium text-white hover:text-cyan-400 transition-colors duration-300 py-2">
                            {{ $item['text'] }}
                        </a>
                    </li>
                    @endforeach
                    @auth
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="block font-['Rajdhani'] font-medium text-white hover:text-cyan-400 transition-colors duration-300 py-2 flex items-center">
                            <span class="relative">
                                DASHBOARD
                                <span class="absolute top-0 right-0 w-2 h-2 bg-green-400 rounded-full animate-pulse -mt-1 -mr-3"></span>
                            </span>
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Futuristic Footer -->
    <footer class="relative mt-20 pb-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="border-t border-white/10 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <!-- Animated copyright -->
                    <div class="mb-4 md:mb-0">
                        <p class="font-['Rajdhani'] text-white/70 text-sm tracking-wide">
                            © <span class="text-cyan-400">{{ date('Y') }}</span> AI/ML DEVELOPER PORTFOLIO
                        </p>
                    </div>
                    
                    <!-- Social/contact links with techy look -->
                    <div class="flex space-x-6">
                        <a href="#" class="text-white/60 hover:text-cyan-400 transition-colors duration-300">
                            <span class="font-['Rajdhani'] text-sm tracking-wider">GITHUB</span>
                        </a>
                        <a href="#" class="text-white/60 hover:text-cyan-400 transition-colors duration-300">
                            <span class="font-['Rajdhani'] text-sm tracking-wider">LINKEDIN</span>
                        </a>
                        <a href="{{ route('contact') }}" class="text-white/60 hover:text-cyan-400 transition-colors duration-300">
                            <span class="font-['Rajdhani'] text-sm tracking-wider">CONTACT</span>
                        </a>
                    </div>
                </div>
                
                <!-- Techy status indicator -->
                <div class="mt-6 flex items-center justify-center space-x-2">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <p class="font-mono text-xs text-white/50">SYSTEM STATUS: OPERATIONAL</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile menu toggle script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>