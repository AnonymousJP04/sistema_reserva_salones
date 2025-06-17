<style>
/* Animaciones Aurora */
@keyframes aurora-glow {
    0%, 100% { 
        box-shadow: 0 0 20px rgba(16, 185, 129, 0.3), 0 0 40px rgba(16, 185, 129, 0.1);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 30px rgba(16, 185, 129, 0.5), 0 0 60px rgba(16, 185, 129, 0.2);
        transform: scale(1.05);
    }
}

@keyframes aurora-pulse {
    0%, 100% { 
        transform: scale(1);
        filter: drop-shadow(0 0 5px rgba(34, 197, 94, 0.5));
    }
    50% { 
        transform: scale(1.1);
        filter: drop-shadow(0 0 20px rgba(34, 197, 94, 0.8));
    }
}

@keyframes aurora-ring {
    0% {
        transform: scale(0.8);
        opacity: 0.8;
    }
    100% {
        transform: scale(2.2);
        opacity: 0;
    }
}

@keyframes aurora-flow {
    0%, 100% { 
        background-position: 0% 50%;
        filter: hue-rotate(0deg);
    }
    25% { 
        background-position: 100% 50%;
        filter: hue-rotate(90deg);
    }
    50% { 
        background-position: 100% 100%;
        filter: hue-rotate(180deg);
    }
    75% { 
        background-position: 0% 100%;
        filter: hue-rotate(270deg);
    }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

/* Clases Aurora Modernizadas */
.aurora-nav {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.1) 0%,
        rgba(255, 255, 255, 0.05) 50%,
        rgba(16, 185, 129, 0.05) 100%
    );
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(16, 185, 129, 0.15);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.1),
        0 0 0 1px rgba(16, 185, 129, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.aurora-nav-link {
    position: relative;
    padding: 0.75rem 1.25rem;
    border-radius: 12px;
    font-weight: 600;
    color: #ffffff;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    background: transparent;
    border: 1px solid transparent;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.aurora-nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg, 
        transparent, 
        rgba(16, 185, 129, 0.15), 
        transparent
    );
    transition: left 0.6s ease;
}

.aurora-nav-link:hover::before {
    left: 100%;
}

.aurora-nav-link:hover {
    transform: translateY(-3px);
    background: linear-gradient(135deg, 
        rgba(16, 185, 129, 0.08) 0%,
        rgba(34, 197, 94, 0.06) 100%
    );
    border-color: rgba(16, 185, 129, 0.25);
    box-shadow: 
        0 12px 28px rgba(16, 185, 129, 0.15),
        0 0 20px rgba(16, 185, 129, 0.1);
    color: #ffffff;
}

.aurora-nav-link.active {
    background: linear-gradient(135deg, 
        rgba(16, 185, 129, 0.15) 0%,
        rgba(34, 197, 94, 0.1) 100%
    );
    color: #ffffff;
    border-color: rgba(16, 185, 129, 0.3);
    box-shadow: 
        0 8px 25px rgba(16, 185, 129, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    font-weight: 700;
}

.aurora-logo {
    animation: aurora-pulse 4s ease-in-out infinite;
    transition: all 0.3s ease;
}

.aurora-logo:hover {
    animation-duration: 2s;
    transform: scale(1.05);
}

.aurora-brand {
    background: linear-gradient(135deg, 
        #ffffff 0%,
        #f9fafb 25%,
        #f3f4f6 50%,
        #e5e7eb 75%,
        #d1d5db 100%
    );
    background-size: 200% 200%;
    animation: aurora-flow 8s ease-in-out infinite;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
}

.aurora-subtitle {
    background: linear-gradient(90deg, #f3f4f6, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 500;
}

.aurora-user-button {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.12) 0%,
        rgba(16, 185, 129, 0.08) 100%
    );
    backdrop-filter: blur(15px);
    border: 1px solid rgba(16, 185, 129, 0.2);
    border-radius: 16px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
        0 4px 16px rgba(0, 0, 0, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.aurora-user-button:hover {
    background: linear-gradient(135deg, 
        rgba(16, 185, 129, 0.12) 0%,
        rgba(34, 197, 94, 0.08) 100%
    );
    border-color: rgba(16, 185, 129, 0.35);
    transform: translateY(-2px);
    box-shadow: 
        0 8px 25px rgba(16, 185, 129, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

.aurora-avatar {
    background: linear-gradient(135deg, #059669, #10b981, #34d399);
    background-size: 200% 200%;
    animation: aurora-flow 6s ease-in-out infinite;
    box-shadow: 
        0 0 0 3px rgba(16, 185, 129, 0.2),
        0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.aurora-avatar:hover {
    animation-duration: 3s;
    box-shadow: 
        0 0 0 3px rgba(16, 185, 129, 0.4),
        0 6px 20px rgba(0, 0, 0, 0.2);
}

.aurora-hamburger {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.1) 0%,
        rgba(16, 185, 129, 0.05) 100%
    );
    backdrop-filter: blur(15px);
    border: 1px solid rgba(16, 185, 129, 0.2);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.aurora-hamburger:hover {
    background: linear-gradient(135deg, 
        rgba(16, 185, 129, 0.1) 0%,
        rgba(34, 197, 94, 0.05) 100%
    );
    border-color: rgba(16, 185, 129, 0.4);
    transform: scale(1.05);
}

.aurora-dropdown {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.95) 0%,
        rgba(240, 253, 250, 0.95) 100%
    );
    backdrop-filter: blur(25px);
    border: 1px solid rgba(16, 185, 129, 0.2);
    border-radius: 16px;
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.1),
        0 0 30px rgba(16, 185, 129, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

.aurora-mobile-menu {
    background: linear-gradient(
        180deg,
        rgba(255, 255, 255, 0.98) 0%,
        rgba(240, 253, 250, 0.95) 100%
    );
    backdrop-filter: blur(25px);
    border-top: 1px solid rgba(16, 185, 129, 0.2);
    box-shadow: 
        0 -8px 32px rgba(0, 0, 0, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

/* Responsive nav links */
.aurora-responsive-link {
    position: relative;
    padding: 1rem 1.25rem;
    color: #ffffff;
    font-weight: 500;
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
    border-radius: 0 12px 12px 0;
    margin: 0.25rem 0;
}

.aurora-responsive-link:hover {
    background: linear-gradient(90deg, 
        rgba(16, 185, 129, 0.08) 0%,
        rgba(16, 185, 129, 0.03) 100%
    );
    border-left-color: #10b981;
    color: #ffffff;
    transform: translateX(12px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
}

.aurora-responsive-link.active {
    background: linear-gradient(90deg, 
        rgba(16, 185, 129, 0.12) 0%,
        rgba(16, 185, 129, 0.05) 100%
    );
    border-left-color: #059669;
    color: #ffffff;
    font-weight: 600;
    box-shadow: 
        inset 0 0 20px rgba(16, 185, 129, 0.05),
        0 4px 12px rgba(16, 185, 129, 0.1);
}

/* Estados Dark Mode */
.dark .aurora-nav {
    background: linear-gradient(135deg, 
        rgba(0, 0, 0, 0.4) 0%,
        rgba(6, 78, 59, 0.2) 100%
    );
    border-bottom-color: rgba(16, 185, 129, 0.3);
}

.dark .aurora-nav-link {
    color: #a7f3d0;
}

.dark .aurora-nav-link:hover {
    color: #d1fae5;
    background: linear-gradient(135deg, 
        rgba(16, 185, 129, 0.15) 0%,
        rgba(34, 197, 94, 0.1) 100%
    );
}

.dark .aurora-responsive-link {
    color: #a7f3d0;
}

.dark .aurora-responsive-link:hover {
    color: #d1fae5;
    background: linear-gradient(90deg, 
        rgba(16, 185, 129, 0.15) 0%,
        rgba(16, 185, 129, 0.05) 100%
    );
}

/* Efectos especiales */
.aurora-glow-effect {
    position: relative;
}

.aurora-glow-effect::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
    z-index: -1;
}

.aurora-glow-effect:hover::after {
    opacity: 1;
}

/* Animación flotante para el logo */
.float-animation {
    animation: float 6s ease-in-out infinite;
}

/* Shimmer effect para texto */
.shimmer-text {
    background: linear-gradient(
        90deg,
        #065f46 0%,
        #10b981 25%,
        #34d399 50%,
        #10b981 75%,
        #065f46 100%
    );
    background-size: 200% 100%;
    animation: shimmer 3s ease-in-out infinite;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
</style>

<nav x-data="{ open: false }" class="fixed top-0 left-0 w-full z-40 aurora-nav transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo Mejorado -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 aurora-logo float-animation">
                    <div class="relative aurora-glow-effect">
                        <svg class="w-11 h-11 text-emerald-400 drop-shadow-xl" fill="none" viewBox="0 0 24 24">
                            <defs>
                                <linearGradient id="navAuroraGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#059669"/>
                                    <stop offset="25%" stop-color="#10b981"/>
                                    <stop offset="50%" stop-color="#22c55e"/>
                                    <stop offset="75%" stop-color="#34d399"/>
                                    <stop offset="100%" stop-color="#6ee7b7"/>
                                </linearGradient>
                                <filter id="glow">
                                    <feGaussianBlur stdDeviation="4" result="coloredBlur"/>
                                    <feMerge> 
                                        <feMergeNode in="coloredBlur"/>
                                        <feMergeNode in="SourceGraphic"/>
                                    </feMerge>
                                </filter>
                            </defs>
                            <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" 
                                  fill="url(#navAuroraGradient)" 
                                  filter="url(#glow)" />
                        </svg>
                        <!-- Ring animation mejorado -->
                        <div class="absolute inset-0 rounded-full border-2 border-emerald-400/40" 
                             style="animation: aurora-ring 3s ease-in-out infinite;"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-xl aurora-brand tracking-wide shimmer-text">Eventos Aurora</span>
                        <span class="text-xs aurora-subtitle font-semibold">Sistema de Gestión Avanzado</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links Mejorados -->
            <div class="hidden md:flex gap-1 items-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="aurora-nav-link aurora-glow-effect">
                    <span class="relative z-10">{{ __('Dashboard') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('salones.index')" :active="request()->routeIs('salones.*')" class="aurora-nav-link aurora-glow-effect">
                    <span class="relative z-10">{{ __('Salones') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('reservas.index')" :active="request()->routeIs('reservas.*')" class="aurora-nav-link aurora-glow-effect">
                    <span class="relative z-10">{{ __('Reservas') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('pagos.index')" :active="request()->routeIs('pagos.*')" class="aurora-nav-link aurora-glow-effect">
                    <span class="relative z-10">{{ __('Pagos') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('tarifas.index')" :active="request()->routeIs('tarifas.*')" class="aurora-nav-link aurora-glow-effect">
                    <span class="relative z-10">{{ __('Tarifas') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('mantenimientos.index')" :active="request()->routeIs('mantenimientos.*')" class="aurora-nav-link aurora-glow-effect">
                    <span class="relative z-10">{{ __('Mantenimientos') }}</span>
                </x-nav-link>
            </div>

            <!-- User Dropdown Mejorado -->
            <div class="hidden md:flex items-center gap-4">
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-3 px-5 py-3 aurora-user-button">
                            <div class="w-9 h-9 aurora-avatar rounded-full flex items-center justify-center text-white font-bold text-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}{{ substr(explode(' ', Auth::user()->name)[1] ?? '', 0, 1) }}
                            </div>
                            <div class="text-left">
                                <div class="text-sm font-bold text-white">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-200 font-medium">Administrador del Sistema</div>
                            </div>
                            <svg class="w-4 h-4 text-white transition-transform duration-200" 
                                 :class="{ 'rotate-180': open }" 
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="aurora-dropdown">
                            <div class="p-3">
                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-3 px-4 py-3 text-sm text-emerald-700 hover:bg-emerald-50/80 rounded-xl transition-all duration-200 font-medium">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{ __('Mi Perfil') }}
                                </x-dropdown-link>
                                
                                <hr class="my-3 border-emerald-200/50">
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50/80 rounded-xl transition-all duration-200 font-medium">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        {{ __('Cerrar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Mejorado -->
            <div class="md:hidden flex items-center">
                <button @click="open = ! open" class="p-3 aurora-hamburger">
                    <svg class="h-6 w-6 text-white transition-all duration-300" 
                         :class="{ 'rotate-90': open }"
                         stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu Mejorado -->
    <div :class="{'block': open, 'hidden': ! open}" 
         class="hidden md:hidden aurora-mobile-menu"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        <div class="px-4 pt-4 pb-3 space-y-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="aurora-responsive-link">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('salones.index')" :active="request()->routeIs('salones.*')" class="aurora-responsive-link">
                {{ __('Salones') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reservas.index')" :active="request()->routeIs('reservas.*')" class="aurora-responsive-link">
                {{ __('Reservas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pagos.index')" :active="request()->routeIs('pagos.*')" class="aurora-responsive-link">
                {{ __('Pagos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tarifas.index')" :active="request()->routeIs('tarifas.*')" class="aurora-responsive-link">
                {{ __('Tarifas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('mantenimientos.index')" :active="request()->routeIs('mantenimientos.*')" class="aurora-responsive-link">
                {{ __('Mantenimientos') }}
            </x-responsive-nav-link>
            @if(Route::has('reservas.pendientes'))
            <x-responsive-nav-link :href="route('reservas.pendientes')" :active="request()->routeIs('reservas.pendientes')" class="aurora-responsive-link">
                {{ __('Reservas Pendientes') }}
            </x-responsive-nav-link>
            @endif
        </div>
        
        <div class="pt-6 pb-4 border-t border-emerald-200/30 mx-4">
            <div class="flex items-center gap-4 px-4 py-3 bg-emerald-50/50 rounded-xl">
                <div class="w-12 h-12 aurora-avatar rounded-full flex items-center justify-center text-white font-bold text-lg">
                    {{ substr(Auth::user()->name, 0, 1) }}{{ substr(explode(' ', Auth::user()->name)[1] ?? '', 0, 1) }}
                </div>
                <div class="flex-1">
                    <div class="font-bold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-200 font-medium">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-4 space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="aurora-responsive-link">
                    {{ __('Mi Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="aurora-responsive-link text-red-600 hover:text-red-800">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>