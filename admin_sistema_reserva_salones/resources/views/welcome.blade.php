<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Reserva de Salones</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

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
                                sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
                            },
                            colors: {
                                primary: { // Updated primary color scheme
                                    light: '#2dd4bf', // teal-400
                                    DEFAULT: '#14b8a6', // teal-500
                                    dark: '#0d9488', // teal-600
                                },
                                secondary: {
                                    light: '#67e8f9', // cyan-300
                                    DEFAULT: '#22d3ee', // cyan-400
                                    dark: '#06b6d4', // cyan-500
                                }
                            }
                        }
                    }
                }
            </script>
        @endif
        <style>
            body {
                font-family: 'Instrument Sans', sans-serif;
            }
            .gradient-text {
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
            }
        </style>
    </head>
    <body class="bg-gray-50 dark:bg-slate-900 text-gray-800 dark:text-gray-200 antialiased flex flex-col min-h-screen">

        <!-- Navigation Bar -->
        <nav class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-md shadow-sm w-full z-20 top-0 sticky">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center">
                        <a href="/" class="flex-shrink-0 text-3xl font-bold bg-gradient-to-r from-primary-dark to-secondary-dark dark:from-primary-light dark:to-secondary-light gradient-text">
                           {{-- New Icon for Nav --}}
                           <svg class="w-9 h-9 inline-block mr-2 text-primary dark:text-primary-light" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01"/>
                           </svg>
                            Sistema de Reserva de Salones
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6 space-x-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-primary to-secondary hover:from-primary-dark hover:to-secondary-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">Ir al Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-light px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150">Iniciar Sesión</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-primary to-secondary hover:from-primary-dark hover:to-secondary-dark text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300 ease-in-out">Registrar Usuario</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" class="bg-gray-100 dark:bg-slate-700 inline-flex items-center justify-center p-2 rounded-md text-gray-500 dark:text-gray-300 hover:text-primary dark:hover:text-primary-light hover:bg-gray-200 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
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
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-primary hover:bg-primary-dark text-white block px-3 py-2 rounded-md text-base font-medium">Ir al Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-700 block px-3 py-2 rounded-md text-base font-medium">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-primary hover:bg-primary-dark text-white block px-3 py-2 rounded-md text-base font-medium transition duration-150 ease-in-out">Registrar Usuario</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-16">
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <div class="mb-10">
                    {{-- New Icon for Hero Section --}}
                    <svg class="w-36 h-36 text-primary dark:text-primary-light mx-auto drop-shadow-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <defs>
                            <linearGradient id="iconGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:var(--color-primary-light); stop-opacity:1" />
                                <stop offset="100%" style="stop-color:var(--color-secondary-dark); stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path stroke="url(#iconGradient)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01"/>
                    </svg>
                </div>

                <h1 class="text-5xl sm:text-6xl font-bold mb-6 bg-gradient-to-r from-primary-dark to-secondary-dark dark:from-primary-light dark:to-secondary-light gradient-text">
                    ¡Bienvenido al Sistema de Reserva de Salones!
                </h1>
                <p class="text-xl sm:text-2xl text-gray-600 dark:text-gray-300 mb-12 leading-relaxed">
                    Tu sistema para reservar salones, <span class="font-semibold text-primary dark:text-primary-light">moderno y eficiente</span>
                </p>
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block bg-gradient-to-r from-primary to-secondary hover:from-primary-dark hover:to-secondary-dark text-white font-semibold py-4 px-10 rounded-xl text-lg shadow-xl hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary/50">
                        Acceder al Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block bg-gradient-to-r from-primary to-secondary hover:from-primary-dark hover:to-secondary-dark text-white font-semibold py-4 px-10 rounded-xl text-lg shadow-xl hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary/50">
                        Iniciar Sesión para Continuar
                    </a>
                @endauth
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-slate-800 border-t border-gray-200 dark:border-slate-700 mt-auto">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    &copy; {{ date('Y') }} Reserva Salones. Sistema de Gestión Interno. By Los Degradados.
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

            // Define CSS variables for gradient colors to be used in SVG
            const root = document.documentElement;
            root.style.setProperty('--color-primary-light', '#2dd4bf'); // teal-400
            root.style.setProperty('--color-secondary-dark', '#06b6d4'); // cyan-500
        </script>

    </body>
</html>