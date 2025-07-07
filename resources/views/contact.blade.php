@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-900 to-pink-800 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Animated background elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
        <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-purple-500 rounded-full filter blur-3xl opacity-20 mix-blend-soft-light animate-float-slow"></div>
        <div class="absolute bottom-1/4 right-1/3 w-72 h-72 bg-cyan-500 rounded-full filter blur-3xl opacity-15 mix-blend-soft-light animate-float-medium"></div>
    </div>

    <div class="max-w-3xl mx-auto">
        <!-- Futuristic header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-white mb-4 font-['Rajdhani']">
                <span class="text-cyan-400">></span> INITIATE_CONTACT_SEQUENCE
            </h1>
            <p class="text-white/80 font-mono">
                [ communication_protocols_engaged ]
            </p>
        </div>

        <!-- Glassmorphism contact form -->
        <x-glass-card class="p-8 md:p-10 hover:border-cyan-400 transition-all duration-500">
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Grid for name/email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block font-['Rajdhani'] text-white/80 mb-2">
                            <span class="text-cyan-400">//</span> IDENTIFICATION
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="w-full px-4 py-3 bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent placeholder-white/30"
                                placeholder="ENTER_YOUR_NAME"
                                required
                            >
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="h-5 w-5 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block font-['Rajdhani'] text-white/80 mb-2">
                            <span class="text-cyan-400">//</span> CONTACT_NODE
                        </label>
                        <div class="relative">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="w-full px-4 py-3 bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent placeholder-white/30"
                                placeholder="USER@DOMAIN.EXT"
                                required
                            >
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="h-5 w-5 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subject field -->
                <div>
                    <label for="subject" class="block font-['Rajdhani'] text-white/80 mb-2">
                        <span class="text-cyan-400">//</span> MESSAGE_SUBJECT
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="subject" 
                            name="subject" 
                            class="w-full px-4 py-3 bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent placeholder-white/30"
                            placeholder="SUBJECT_HEADER"
                            required
                        >
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Message field -->
                <div>
                    <label for="message" class="block font-['Rajdhani'] text-white/80 mb-2">
                        <span class="text-cyan-400">//</span> MESSAGE_CONTENT
                    </label>
                    <div class="relative">
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="5" 
                            class="w-full px-4 py-3 bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent placeholder-white/30"
                            placeholder="ENTER_YOUR_MESSAGE_HERE"
                            required
                        ></textarea>
                        <div class="absolute bottom-3 right-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Submit button with glow effect -->
                <div class="pt-4">
                    <button type="submit" class="relative group w-full">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-400 to-blue-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-200"></div>
                        <div class="relative px-6 py-3 bg-gray-900 rounded-lg font-['Rajdhani'] font-bold text-white group-hover:text-cyan-300 transition-colors duration-200 flex items-center justify-center">
                            <span class="mr-2">>></span> TRANSMIT_MESSAGE
                        </div>
                    </button>
                </div>
            </form>
        </x-glass-card>

        <!-- Additional contact info -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-glass-card class="p-6 hover:border-cyan-400 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-cyan-400/10 rounded-full border border-cyan-400/30">
                        <svg class="h-6 w-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-['Rajdhani'] text-white/80 mb-1">DIRECT_MAIL</h3>
                        <p class="text-white font-mono text-sm">contact@example.com</p>
                    </div>
                </div>
            </x-glass-card>

            <x-glass-card class="p-6 hover:border-pink-400 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-pink-400/10 rounded-full border border-pink-400/30">
                        <svg class="h-6 w-6 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-['Rajdhani'] text-white/80 mb-1">VOICE_COMM</h3>
                        <p class="text-white font-mono text-sm">+1 (555) 123-4567</p>
                    </div>
                </div>
            </x-glass-card>

            <x-glass-card class="p-6 hover:border-purple-400 transition-colors">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-purple-400/10 rounded-full border border-purple-400/30">
                        <svg class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-['Rajdhani'] text-white/80 mb-1">LOCATION</h3>
                        <p class="text-white font-mono text-sm">San Francisco, CA</p>
                    </div>
                </div>
            </x-glass-card>
        </div>
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
    .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
    .animate-float-medium { animation: float-medium 6s ease-in-out infinite; }
</style>
@endsection