<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Eventos Aurora - Sistema de Reserva</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&family=space-grotesk:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            {{-- Fallback para Tailwind CSS si Vite no está disponible --}}
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    darkMode: 'class',
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                                display: ['Space Grotesk', 'ui-sans-serif', 'system-ui'],
                            },
                            colors: {
                                aurora: {
                                    50: '#f0fdf4',
                                    100: '#dcfce7',
                                    200: '#bbf7d0',
                                    300: '#86efac',
                                    400: '#4ade80',
                                    500: '#22c55e',
                                    600: '#16a34a',
                                    700: '#15803d',
                                    800: '#166534',
                                    900: '#14532d',
                                },
                                cosmic: {
                                    50: '#f8fafc',
                                    100: '#f1f5f9',
                                    200: '#e2e8f0',
                                    300: '#cbd5e1',
                                    400: '#94a3b8',
                                    500: '#64748b',
                                    600: '#475569',
                                    700: '#334155',
                                    800: '#1e293b',
                                    900: '#0f172a',
                                },
                                electric: {
                                    400: '#60a5fa',
                                    500: '#3b82f6',
                                    600: '#2563eb',
                                }
                            },
                            animation: {
                                'aurora': 'aurora 20s ease-in-out infinite',
                                'float': 'float 6s ease-in-out infinite',
                                'glow': 'glow 2s ease-in-out infinite alternate',
                                'particle': 'particle 15s linear infinite',
                                'shimmer': 'shimmer 2.5s ease-in-out infinite',
                            },
                            keyframes: {
                                aurora: {
                                    '0%, 100%': { 
                                        'background-position': '0% 50%' 
                                    },
                                    '50%': { 
                                        'background-position': '100% 50%' 
                                    },
                                },
                                float: {
                                    '0%, 100%': { 
                                        transform: 'translateY(0px)' 
                                    },
                                    '50%': { 
                                        transform: 'translateY(-20px)' 
                                    },
                                },
                                glow: {
                                    'from': { 
                                        'box-shadow': '0 0 20px rgba(34, 197, 94, 0.5)' 
                                    },
                                    'to': { 
                                        'box-shadow': '0 0 30px rgba(34, 197, 94, 0.8)' 
                                    },
                                },
                                particle: {
                                    '0%': { 
                                        transform: 'translateY(100vh) rotate(0deg)',
                                        opacity: '0' 
                                    },
                                    '10%': { 
                                        opacity: '1' 
                                    },
                                    '90%': { 
                                        opacity: '1' 
                                    },
                                    '100%': { 
                                        transform: 'translateY(-100vh) rotate(360deg)',
                                        opacity: '0' 
                                    },
                                },
                                shimmer: {
                                    '0%': { 
                                        'background-position': '-200% 0' 
                                    },
                                    '100%': { 
                                        'background-position': '200% 0' 
                                    },
                                }
                            }
                        }
                    }
                }
            </script>
        @endif
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .font-display {
                font-family: 'Space Grotesk', sans-serif;
            }
            .aurora-bg {
                background: linear-gradient(-45deg, #1e293b, #0f172a, #134e4a, #064e3b, #1e293b);
                background-size: 400% 400%;
                animation: aurora 20s ease-in-out infinite;
            }
            .gradient-text {
                background: linear-gradient(135deg, #22c55e, #10b981, #059669, #047857);
                background-size: 200% 200%;
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                animation: shimmer 2.5s ease-in-out infinite;
            }
            .glass-effect {
                backdrop-filter: blur(20px);
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            .particle {
                position: absolute;
                width: 4px;
                height: 4px;
                background: radial-gradient(circle, #22c55e, #10b981);
                border-radius: 50%;
                animation: particle 15s linear infinite;
            }
            .glow-button {
                position: relative;
                overflow: hidden;
            }
            .glow-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s;
            }
            .glow-button:hover::before {
                left: 100%;
            }
                
            
        </style>
    </head>
    <body class="aurora-bg text-white antialiased flex flex-col min-h-screen overflow-x-hidden">
        
        <!-- Animated Background Particles -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
            <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
            <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
            <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
            <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
            <div class="particle" style="left: 60%; animation-delay: 10s;"></div>
            <div class="particle" style="left: 70%; animation-delay: 12s;"></div>
            <div class="particle" style="left: 80%; animation-delay: 14s;"></div>
            <div class="particle" style="left: 90%; animation-delay: 16s;"></div>
        </div>

        <!-- Navigation Bar -->
        <nav class="glass-effect shadow-2xl w-full z-20 top-0 sticky">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center">
                        <a href="/" class="flex items-center space-x-3 text-2xl lg:text-3xl font-display font-bold gradient-text">
                            <!-- Aurora Icon -->
                            <div class="relative">
                                <svg class="w-10 h-10 lg:w-12 lg:h-12 text-aurora-400 animate-float" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient id="auroraGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#22c55e;stop-opacity:1" />
                                            <stop offset="50%" style="stop-color:#10b981;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                        </linearGradient>
                                    </defs>
                                    <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" fill="url(#auroraGradient)" />
                                    <circle cx="12" cy="12" r="3" fill="rgba(255,255,255,0.3)" />
                                </svg>
                                <div class="absolute inset-0 animate-ping">
                                    <svg class="w-10 h-10 lg:w-12 lg:h-12 text-aurora-400 opacity-30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>
                            <span>Eventos Aurora</span>
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6 space-x-6">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="glow-button bg-gradient-to-r from-aurora-500 to-aurora-600 hover:from-aurora-600 hover:to-aurora-700 text-white px-6 py-3 rounded-xl text-sm font-semibold shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105 animate-glow">
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                        </svg>
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-white/80 hover:text-aurora-300 px-4 py-2 rounded-md text-sm font-medium transition-colors duration-300 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                        </svg>
                                        <span>Iniciar Sesión</span>
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="glow-button bg-gradient-to-r from-electric-500 to-electric-600 hover:from-electric-600 hover:to-electric-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                            </svg>
                                            <span>Registro</span>
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" class="glass-effect inline-flex items-center justify-center p-2 rounded-md text-white/80 hover:text-aurora-300 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-aurora-400 transition-all duration-300" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                            <span class="sr-only">Abrir menú principal</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 glass-effect">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-aurora-500 hover:bg-aurora-600 text-white block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Ir al Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white/80 hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-electric-500 hover:bg-electric-600 text-white block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Registrar Usuario</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-16 px-4 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                
                <!-- Hero Icon -->
                <div class="mb-12 relative">
                    <div class="animate-float">
                        <div class="relative inline-block">
                            <svg class="w-40 h-40 sm:w-48 sm:h-48 mx-auto drop-shadow-2xl" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#22c55e;stop-opacity:1" />
                                        <stop offset="25%" style="stop-color:#10b981;stop-opacity:1" />
                                        <stop offset="50%" style="stop-color:#059669;stop-opacity:1" />
                                        <stop offset="75%" style="stop-color:#047857;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#065f46;stop-opacity:1" />
                                    </linearGradient>
                                    <filter id="glow">
                                        <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                                        <feMerge> 
                                            <feMergeNode in="coloredBlur"/>
                                            <feMergeNode in="SourceGraphic"/>
                                        </feMerge>
                                    </filter>
                                </defs>
                                
                                <!-- Outer Aurora Ring -->
                                <circle cx="100" cy="100" r="90" fill="none" stroke="url(#heroGradient)" stroke-width="2" opacity="0.3" />
                                <circle cx="100" cy="100" r="75" fill="none" stroke="url(#heroGradient)" stroke-width="1" opacity="0.5" />
                                
                                <!-- Main Star/Aurora -->
                                <path d="M100 20L110 65L150 60L115 100L170 110L120 125L130 165L100 140L70 165L80 125L30 110L85 100L50 60L90 65L100 20Z" fill="url(#heroGradient)" filter="url(#glow)" />
                                
                                <!-- Center Glow -->
                                <circle cx="100" cy="100" r="15" fill="rgba(255,255,255,0.4)" />
                                <circle cx="100" cy="100" r="8" fill="rgba(255,255,255,0.7)" />
                                
                                <!-- Decorative Elements -->
                                <circle cx="60" cy="50" r="3" fill="#22c55e" opacity="0.8" />
                                <circle cx="140" cy="70" r="2" fill="#10b981" opacity="0.6" />
                                <circle cx="170" cy="140" r="3" fill="#059669" opacity="0.9" />
                                <circle cx="40" cy="130" r="2" fill="#047857" opacity="0.7" />
                                <circle cx="130" cy="40" r="2" fill="#22c55e" opacity="0.8" />
                            </svg>
                            
                            <!-- Rotating Halo -->
                            <div class="absolute inset-0 animate-spin" style="animation-duration: 20s;">
                                <svg class="w-40 h-40 sm:w-48 sm:h-48" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="100" cy="100" r="95" fill="none" stroke="rgba(34, 197, 94, 0.2)" stroke-width="1" stroke-dasharray="10,10" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Text -->
                <div class="space-y-8">
                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-display font-bold gradient-text leading-tight">
                        ¡Bienvenido a 
                        <span class="block mt-2">Eventos Aurora!</span>
                    </h1>
                    
                    <p class="text-lg sm:text-xl lg:text-2xl text-white/80 max-w-3xl mx-auto leading-relaxed">
                        Experimenta la <span class="text-aurora-300 font-semibold">magia</span> de organizar eventos extraordinarios con nuestra plataforma 
                        <span class="text-aurora-300 font-semibold">innovadora y elegante</span>
                    </p>

                    <!-- Feature Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-12 mb-12">
                        <div class="glass-effect p-6 rounded-2xl transform hover:scale-105 transition-all duration-300 hover:bg-white/20">
                            <div class="text-aurora-400 mb-4">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6m-6 0H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V9a2 2 0 00-2-2h-2"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Reservas Inteligentes</h3>
                            <p class="text-white/70 text-sm">Sistema avanzado de gestión de reservas</p>
                        </div>
                        
                        <div class="glass-effect p-6 rounded-2xl transform hover:scale-105 transition-all duration-300 hover:bg-white/20">
                            <div class="text-aurora-400 mb-4">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Experiencia Única</h3>
                            <p class="text-white/70 text-sm">Interfaz moderna y fluida como una aurora</p>
                        </div>
                        
                        <div class="glass-effect p-6 rounded-2xl transform hover:scale-105 transition-all duration-300 hover:bg-white/20">
                            <div class="text-aurora-400 mb-4">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Seguridad Total</h3>
                            <p class="text-white/70 text-sm">Protección completa de tus datos</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="glow-button group bg-gradient-to-r from-aurora-500 via-aurora-600 to-aurora-700 hover:from-aurora-600 hover:via-aurora-700 hover:to-aurora-800 text-white font-semibold py-4 px-12 rounded-2xl text-lg shadow-2xl hover:shadow-aurora-500/50 transition-all duration-500 ease-in-out transform hover:scale-110 flex items-center space-x-3">
                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                                <span>Acceder al Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="glow-button group bg-gradient-to-r from-aurora-500 via-aurora-600 to-aurora-700 hover:from-aurora-600 hover:via-aurora-700 hover:to-aurora-800 text-white font-semibold py-4 px-12 rounded-2xl text-lg shadow-2xl hover:shadow-aurora-500/50 transition-all duration-500 ease-in-out transform hover:scale-110 flex items-center space-x-3">
                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Iniciar Sesión</span>
                            </a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="group glass-effect hover:bg-white/20 text-white font-semibold py-4 px-12 rounded-2xl text-lg border-2 border-aurora-400/50 hover:border-aurora-400 transition-all duration-500 ease-in-out transform hover:scale-105 flex items-center space-x-3">
                                    <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                    <span>Crear Cuenta</span>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="glass-effect border-t border-white/20 mt-auto relative z-10">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center">
                <div class="flex justify-center items-center space-x-4 mb-4">
                    <div class="flex space-x-2">
                        <div class="w-3 h-3 bg-aurora-600 rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                    </div>
                </div>
                <p class="text-white/60 text-sm mb-2">
                    &copy; {{ date('Y') }} Eventos Aurora. Sistema de Gestión de Eventos Premium.
                </p>
                <p class="text-aurora-300/80 text-xs font-medium">
                    ✨ Creado con magia por Los Degradados ✨
                </p>
            </div>
        </footer>

        <script>
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                    mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');
                    mobileMenuButton.querySelectorAll('svg').forEach(svg => svg.classList.toggle('hidden'));
                });
            }

            // Dynamic particle creation
            function createParticle() {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 2 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                document.querySelector('.fixed.inset-0').appendChild(particle);
                
                setTimeout(() => {
                    particle.remove();
                }, 15000);
            }

            // Create particles periodically
            setInterval(createParticle, 3000);

            // Add smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeInUp');
                    }
                });
            }, observerOptions);

            // Observe all feature cards
            document.querySelectorAll('.glass-effect').forEach(card => {
                observer.observe(card);
            });

            // Add some extra sparkle effects
            function addSparkle(event) {
                const sparkle = document.createElement('div');
                sparkle.className = 'absolute w-2 h-2 bg-aurora-400 rounded-full pointer-events-none animate-ping';
                sparkle.style.left = event.clientX + 'px';
                sparkle.style.top = event.clientY + 'px';
                sparkle.style.transform = 'translate(-50%, -50%)';
                document.body.appendChild(sparkle);
                
                setTimeout(() => {
                    sparkle.remove();
                }, 1000);
            }

            // Add sparkle effect to buttons on hover
            document.querySelectorAll('.glow-button').forEach(button => {
                button.addEventListener('mouseenter', (e) => {
                    const rect = button.getBoundingClientRect();
                    for (let i = 0; i < 3; i++) {
                        setTimeout(() => {
                            addSparkle({
                                clientX: rect.left + Math.random() * rect.width,
                                clientY: rect.top + Math.random() * rect.height
                            });
                        }, i * 100);
                    }
                });
            });
        </script>

    </body>
</html>