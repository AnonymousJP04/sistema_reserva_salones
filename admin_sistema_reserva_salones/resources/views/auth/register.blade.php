<x-guest-layout>
    {{-- Fondo con efecto aurora --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-emerald-900/20 to-teal-900/30"></div>
        
        {{-- Efectos de aurora animados --}}
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-to-r from-emerald-400/20 to-teal-300/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/3 right-1/4 w-80 h-80 bg-gradient-to-l from-green-400/15 to-emerald-300/15 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute bottom-1/4 left-1/3 w-72 h-72 bg-gradient-to-t from-teal-400/10 to-green-300/10 rounded-full blur-3xl animate-pulse delay-2000"></div>
        </div>
        
        {{-- Estrellas brillantes --}}
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-1 h-1 bg-white rounded-full animate-ping"></div>
            <div class="absolute top-40 right-32 w-1 h-1 bg-emerald-300 rounded-full animate-ping delay-500"></div>
            <div class="absolute bottom-40 left-1/4 w-1 h-1 bg-teal-300 rounded-full animate-ping delay-1000"></div>
            <div class="absolute top-60 right-1/4 w-1 h-1 bg-green-300 rounded-full animate-ping delay-1500"></div>
            <div class="absolute bottom-60 right-20 w-1 h-1 bg-white rounded-full animate-ping delay-2000"></div>
        </div>
    </div>

    {{-- Contenedor principal con backdrop blur --}}
    <div class="relative z-10 w-full max-w-md mx-auto">
        {{-- Contenedor del formulario con efecto cristal --}}
        <div class="backdrop-blur-xl bg-white/10 dark:bg-slate-800/30 border border-emerald-200/20 dark:border-emerald-400/20 rounded-3xl shadow-2xl p-8 relative overflow-hidden">
            
            {{-- Efectos de luz interior --}}
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-emerald-400/60 to-transparent"></div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-teal-400/60 to-transparent"></div>
            
            {{-- Logo y título --}}
            <div class="mb-8 text-center relative">
                <div class="relative inline-block">
                    {{-- Halo de luz alrededor del logo --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/30 to-teal-400/30 rounded-full blur-xl scale-150 animate-pulse"></div>
                    
                    <a href="/" class="relative inline-flex items-center group">
                        {{-- Icono de aurora personalizado --}}
                        <div class="relative">
                            <svg class="w-12 h-12 text-emerald-400 mr-3 drop-shadow-lg group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12C2 12 5 8 12 8C19 8 22 12 22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" opacity="0.8"/>
                                <path d="M3 14C3 14 6 10 12 10C18 10 21 14 21 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" opacity="0.6"/>
                                <path d="M4 16C4 16 7 12 12 12C17 12 20 16 20 16" stroke="currentColor" stroke-width="1" stroke-linecap="round" opacity="0.4"/>
                                <circle cx="12" cy="12" r="2" fill="currentColor" opacity="0.9"/>
                            </svg>
                            {{-- Efecto de brillo --}}
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3 h-3 bg-emerald-300 rounded-full blur-sm opacity-60 animate-pulse"></div>
                        </div>
                        
                        <span class="text-3xl font-bold bg-gradient-to-r from-emerald-300 via-teal-300 to-green-300 bg-clip-text text-transparent drop-shadow-lg">
                            Eventos Aurora
                        </span>
                    </a>
                </div>
                
                <p class="mt-4 text-emerald-100/80 text-sm font-light">
                    ✨ Crea experiencias mágicas como las auroras boreales
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- Campo de Nombre --}}
                <div class="group">
                    <x-input-label for="name" value="Nombre Completo" class="text-emerald-100 font-medium mb-2 block" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-emerald-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <x-text-input id="name" 
                            class="block w-full pl-12 pr-4 py-3 bg-slate-800/50 border border-emerald-400/30 rounded-xl text-white placeholder-emerald-200/50 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all duration-300 backdrop-blur-sm group-hover:border-emerald-400/50" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name" 
                            placeholder="Tu nombre completo"/>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-300" />
                </div>

                {{-- Campo de Correo Electrónico --}}
                <div class="group">
                    <x-input-label for="email" value="Correo Electrónico" class="text-emerald-100 font-medium mb-2 block" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-emerald-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <x-text-input id="email" 
                            class="block w-full pl-12 pr-4 py-3 bg-slate-800/50 border border-emerald-400/30 rounded-xl text-white placeholder-emerald-200/50 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all duration-300 backdrop-blur-sm group-hover:border-emerald-400/50" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autocomplete="username" 
                            placeholder="tu@correo.com"/>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
                </div>

                {{-- Campo de Contraseña --}}
                <div class="group">
                    <x-input-label for="password" value="Contraseña" class="text-emerald-100 font-medium mb-2 block" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-emerald-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-text-input id="password" 
                            class="block w-full pl-12 pr-4 py-3 bg-slate-800/50 border border-emerald-400/30 rounded-xl text-white placeholder-emerald-200/50 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all duration-300 backdrop-blur-sm group-hover:border-emerald-400/50"
                            type="password"
                            name="password"
                            required 
                            autocomplete="new-password"
                            placeholder="Crea una contraseña segura" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
                </div>

                {{-- Campo de Confirmar Contraseña --}}
                <div class="group">
                    <x-input-label for="password_confirmation" value="Confirmar Contraseña" class="text-emerald-100 font-medium mb-2 block" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-emerald-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <x-text-input id="password_confirmation" 
                            class="block w-full pl-12 pr-4 py-3 bg-slate-800/50 border border-emerald-400/30 rounded-xl text-white placeholder-emerald-200/50 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all duration-300 backdrop-blur-sm group-hover:border-emerald-400/50"
                            type="password"
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Vuelve a escribir la contraseña" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300" />
                </div>

                {{-- Botón de Envío --}}
                <div class="pt-4">
                    <button type="submit" class="group relative w-full overflow-hidden rounded-xl bg-gradient-to-r from-emerald-500 via-teal-500 to-green-500 p-[2px] transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-emerald-500/25">
                        {{-- Efecto de brillo animado --}}
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 via-teal-400 to-green-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        
                        <div class="relative flex items-center justify-center px-6 py-4 bg-slate-800/90 rounded-xl backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-3 text-emerald-300 group-hover:scale-110 transition-transform duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                            <span class="font-semibold text-white group-hover:text-emerald-100 transition-colors duration-300">
                                Crear mi cuenta
                            </span>
                            
                            {{-- Efecto de partículas --}}
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="absolute top-2 left-8 w-1 h-1 bg-emerald-300 rounded-full animate-ping"></div>
                                <div class="absolute bottom-3 right-12 w-1 h-1 bg-teal-300 rounded-full animate-ping delay-200"></div>
                                <div class="absolute top-4 right-8 w-1 h-1 bg-green-300 rounded-full animate-ping delay-400"></div>
                            </div>
                        </div>
                    </button>
                </div>
                
                {{-- Enlace de Iniciar Sesión --}}
                <div class="text-center pt-4">
                    <p class="text-emerald-100/70 text-sm">
                        ¿Ya tienes una cuenta?
                        <a class="font-medium text-emerald-300 hover:text-emerald-200 transition-colors duration-300 underline decoration-emerald-400/50 hover:decoration-emerald-300 underline-offset-4" href="{{ route('login') }}">
                            Inicia sesión aquí
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    {{-- Estilos adicionales para animaciones personalizadas --}}
    <style>
        @keyframes aurora {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            33% { transform: translateY(-10px) rotate(1deg); opacity: 0.9; }
            66% { transform: translateY(5px) rotate(-1deg); opacity: 0.8; }
        }
        
        .animate-aurora {
            animation: aurora 8s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(52, 211, 153, 0.4), transparent);
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>
</x-guest-layout>