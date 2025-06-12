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
                                    800: '#1e293b',
                                    900: '#0f172a',
                                },
                                electric: {
                                    500: '#3b82f6',
                                    600: '#2563eb',
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
            
            /* Fondo Aurora simplificado */
            .aurora-bg {
                background: linear-gradient(-45deg, #0f172a, #1e293b, #134e4a, #064e3b);
                background-size: 400% 400%;
                animation: aurora-flow 15s ease-in-out infinite;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: -10;
            }
            
            @keyframes aurora-flow {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }
            
            /* Texto gradiente */
            .gradient-text {
                background: linear-gradient(135deg, #22c55e, #10b981, #059669);
                background-size: 200% 200%;
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                animation: gradient-shift 3s ease-in-out infinite;
            }
            
            @keyframes gradient-shift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }
            
            /* Efecto glass */
            .glass-effect {
                backdrop-filter: blur(20px);
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(34, 197, 94, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
                transition: all 0.3s ease;
            }
            
            .glass-effect:hover {
                background: rgba(255, 255, 255, 0.12);
                border-color: rgba(34, 197, 94, 0.4);
                transform: translateY(-2px);
            }
            
            /* Botones con efecto */
            .glow-button {
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }
            
            .glow-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s ease;
            }
            
            .glow-button:hover::before {
                left: 100%;
            }
            
            /* Animaciones suaves */
            .animate-float {
                animation: float 4s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            
            .fade-in {
                opacity: 0;
                transform: translateY(20px);
                animation: fadeIn 0.8s ease forwards;
            }
            
            @keyframes fadeIn {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            /* Partículas simples */
            .particles {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                pointer-events: none;
                z-index: -5;
            }
            
            .particle {
                position: absolute;
                width: 2px;
                height: 2px;
                background: #22c55e;
                border-radius: 50%;
                opacity: 0.6;
                animation: particle-float 12s linear infinite;
            }
            
            @keyframes particle-float {
                0% { 
                    transform: translateY(100vh) translateX(0);
                    opacity: 0;
                }
                10% { opacity: 1; }
                90% { opacity: 1; }
                100% { 
                    transform: translateY(-10vh) translateX(100px);
                    opacity: 0;
                }
            }
            
            /* Info cards mejoradas */
            .info-card {
                transition: all 0.3s ease;
            }
            
            .info-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(34, 197, 94, 0.1);
            }
        </style>
    </head>
    
    <body class="text-white antialiased flex flex-col min-h-screen">
        
        <!-- Fondo Aurora -->
        <div class="aurora-bg"></div>
        
        <!-- Partículas simples -->
        <div class="particles">
            <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
            <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
            <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
            <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
            <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
            <div class="particle" style="left: 60%; animation-delay: 1s;"></div>
            <div class="particle" style="left: 70%; animation-delay: 3s;"></div>
            <div class="particle" style="left: 80%; animation-delay: 5s;"></div>
            <div class="particle" style="left: 90%; animation-delay: 7s;"></div>
        </div>

        <!-- Navigation Bar -->
        <nav class="glass-effect shadow-lg w-full z-20 sticky top-0 fade-in">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="flex items-center space-x-3 text-xl lg:text-2xl font-display font-bold gradient-text">
                            <!-- Aurora Icon -->
                            <div class="relative">
                                <svg class="w-8 h-8 lg:w-10 lg:h-10 text-aurora-400 animate-float" viewBox="0 0 24 24" fill="none">
                                    <defs>
                                        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#22c55e"/>
                                            <stop offset="100%" style="stop-color:#059669"/>
                                        </linearGradient>
                                    </defs>
                                    <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" 
                                          fill="url(#logoGradient)" />
                                </svg>
                            </div>
                            <span>Eventos Aurora</span>
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center space-x-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="glow-button bg-gradient-to-r from-aurora-500 to-aurora-600 hover:from-aurora-600 hover:to-aurora-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-lg transition-all duration-300">
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                        </svg>
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-white/80 hover:text-aurora-300 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                                        Iniciar Sesión
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="glow-button bg-gradient-to-r from-electric-500 to-electric-600 hover:from-electric-600 hover:to-electric-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                                            Registro
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" class="glass-effect inline-flex items-center justify-center p-2 rounded-md text-white/80 hover:text-aurora-300 transition-all duration-300" id="mobile-menu-button">
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 glass-effect">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-aurora-500 hover:bg-aurora-600 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white/80 hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-electric-500 hover:bg-electric-600 text-white block px-3 py-2 rounded-md text-base font-medium">Registro</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow py-16 px-4 relative z-10">
            <div class="max-w-6xl mx-auto">
                
                <!-- Hero Section -->
                <div class="text-center mb-16 fade-in">
                    <div class="mb-8">
                        <div class="animate-float inline-block">
                            <svg class="w-32 h-32 sm:w-40 sm:h-40 mx-auto" viewBox="0 0 200 200" fill="none">
                                <defs>
                                    <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#22c55e"/>
                                        <stop offset="50%" style="stop-color:#10b981"/>
                                        <stop offset="100%" style="stop-color:#059669"/>
                                    </linearGradient>
                                </defs>
                                <circle cx="100" cy="100" r="80" fill="none" stroke="url(#heroGradient)" stroke-width="2" opacity="0.3" />
                                <path d="M100 30L108 65L140 60L115 90L150 100L115 110L140 140L108 135L100 170L92 135L60 140L85 110L50 100L85 90L60 60L92 65L100 30Z" 
                                      fill="url(#heroGradient)" />
                                <circle cx="100" cy="100" r="12" fill="rgba(255,255,255,0.6)" />
                            </svg>
                        </div>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-display font-bold gradient-text leading-tight mb-6">
                        Sistema Administrativo
                        <span class="block text-3xl sm:text-4xl lg:text-5xl mt-2">Eventos Aurora</span>
                    </h1>
                    
                    <p class="text-xl text-white/80 max-w-3xl mx-auto leading-relaxed mb-8">
                        Panel de control interno para la gestión completa de salones, reservas y administración de eventos
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="glow-button group bg-gradient-to-r from-aurora-500 to-aurora-600 hover:from-aurora-600 hover:to-aurora-700 text-white font-semibold py-3 px-8 rounded-xl text-lg shadow-lg transition-all duration-300 flex items-center space-x-3">
                                <span>Ir al Dashboard</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="glow-button group bg-gradient-to-r from-aurora-500 to-aurora-600 hover:from-aurora-600 hover:to-aurora-700 text-white font-semibold py-3 px-8 rounded-xl text-lg shadow-lg transition-all duration-300 flex items-center space-x-3">
                                <span>Iniciar Sesión</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14"></path>
                                </svg>
                            </a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="glass-effect hover:bg-white/15 text-white font-semibold py-3 px-8 rounded-xl text-lg border border-aurora-400/50 hover:border-aurora-400 transition-all duration-300">
                                    Crear Cuenta
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    <!-- Reservas Inteligentes -->
                    <div class="glass-effect info-card p-6 rounded-xl fade-in" style="animation-delay: 0.2s;">
                        <div class="text-aurora-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Reservas Inteligentes</h3>
                        <p class="text-white/70">Sistema avanzado para gestionar reservas de salones de manera eficiente y automática.</p>
                    </div>

                    <!-- Gestión de Eventos -->
                    <div class="glass-effect info-card p-6 rounded-xl fade-in" style="animation-delay: 0.4s;">
                        <div class="text-aurora-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V9a2 2 0 00-2-2h-2"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Gestión de Eventos</h3>
                        <p class="text-white/70">Administra todos los aspectos de tus eventos desde una plataforma centralizada.</p>
                    </div>

                    <!-- Reportes y Analytics -->
                    <div class="glass-effect info-card p-6 rounded-xl fade-in" style="animation-delay: 0.6s;">
                        <div class="text-aurora-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Reportes y Analytics</h3>
                        <p class="text-white/70">Obtén insights valiosos sobre el rendimiento de tus salones y eventos.</p>
                    </div>

                    <!-- Gestión de Usuarios -->
                    <div class="glass-effect info-card p-6 rounded-xl fade-in" style="animation-delay: 0.8s;">
                        <div class="text-aurora-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Gestión de Usuarios</h3>
                        <p class="text-white/70">Administra permisos, roles y accesos del personal y clientes del sistema.</p>
                    </div>

                    <!-- Sistema de Configuración -->
                    <div class="glass-effect info-card p-6 rounded-xl fade-in" style="animation-delay: 1s;">
                        <div class="text-aurora-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Configuración Avanzada</h3>
                        <p class="text-white/70">Personaliza parámetros del sistema, tarifas, horarios y configuraciones globales.</p>
                    </div>

                    <!-- Auditoría y Logs -->
                    <div class="glass-effect info-card p-6 rounded-xl fade-in" style="animation-delay: 1.2s;">
                        <div class="text-aurora-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Auditoría y Seguridad</h3>
                        <p class="text-white/70">Monitoreo de actividades, logs del sistema y control de seguridad avanzado.</p>
                    </div>
                </div>

                <!-- Admin Panel Overview -->
                <div class="glass-effect p-8 rounded-2xl text-center fade-in" style="animation-delay: 1.4s;">
                    <h2 class="text-3xl font-display font-bold gradient-text mb-6">
                        Panel de Administración
                    </h2>
                    <p class="text-white/70 mb-8 max-w-2xl mx-auto">
                        Sistema interno para la gestión completa de salones, reservas y eventos. 
                        Herramientas profesionales para administradores y personal autorizado.
                    </p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div>
                            <div class="text-3xl font-bold text-aurora-300 mb-2">
                                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path>
                                </svg>
                            </div>
                            <div class="text-white/70">Gestión de Salones</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-aurora-300 mb-2">
                                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7"></path>
                                </svg>
                            </div>
                            <div class="text-white/70">Control de Reservas</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-aurora-300 mb-2">
                                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="text-white/70">Administrar Usuarios</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-aurora-300 mb-2">
                                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10"></path>
                                </svg>
                            </div>
                            <div class="text-white/70">Reportes Avanzados</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="glass-effect border-t border-white/20 mt-16 relative z-10">
            <div class="max-w-7xl mx-auto py-6 px-4 text-center">
                <div class="flex justify-center items-center space-x-2 mb-3">
                    <div class="w-2 h-2 bg-aurora-500 rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 bg-aurora-400 rounded-full animate-pulse" style="animation-delay: 0.2s;"></div>
                    <div class="w-2 h-2 bg-aurora-300 rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                </div>
                <p class="text-white/60 text-sm mb-1">
                    &copy; {{ date('Y') }} Eventos Aurora. Sistema de Gestión de Eventos.
                </p>
                <p class="text-aurora-300/80 text-xs">
                    Creado con dedicación por Los Degradados
                </p>
            </div>
        </footer>

        <script>
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Agregar partículas dinámicamente
            function createParticle() {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 2 + 's';
                particle.style.animationDuration = (Math.random() * 8 + 8) + 's';
                document.querySelector('.particles').appendChild(particle);
                
                setTimeout(() => {
                    particle.remove();
                }, 12000);
            }

            // Crear partículas cada 4 segundos
            setInterval(createParticle, 4000);

            // Animación de entrada para elementos
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            });

            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });
        </script>

    </body>
</html>