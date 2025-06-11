<nav x-data="{ open: false }" class="fixed top-0 left-0 w-full z-40 bg-white/70 dark:bg-gray-900/80 backdrop-blur-lg shadow-lg border-b border-emerald-300/20 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <svg class="w-8 h-8 text-emerald-400 drop-shadow-lg" fill="none" viewBox="0 0 24 24">
                        <defs>
                            <linearGradient id="navAuroraGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#22c55e"/>
                                <stop offset="100%" stop-color="#10b981"/>
                            </linearGradient>
                        </defs>
                        <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" fill="url(#navAuroraGradient)" />
                    </svg>
                    <span class="font-bold text-lg text-emerald-700 dark:text-emerald-200 tracking-wide">Eventos Aurora</span>
                </a>
            </div>
            <!-- Navigation Links -->
            <div class="hidden md:flex gap-2 items-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="aurora-nav-link">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('salones.index')" :active="request()->routeIs('salones.*')" class="aurora-nav-link">
                    {{ __('Salones') }}
                </x-nav-link>
                <x-nav-link :href="route('reservas.index')" :active="request()->routeIs('reservas.*')" class="aurora-nav-link">
                    {{ __('Reservas') }}
                </x-nav-link>
                <x-nav-link :href="route('pagos.index')" :active="request()->routeIs('pagos.*')" class="aurora-nav-link">
                    {{ __('Pagos') }}
                </x-nav-link>
                <x-nav-link :href="route('tarifas.index')" :active="request()->routeIs('tarifas.*')" class="aurora-nav-link">
                    {{ __('Tarifas') }}
                </x-nav-link>
                <x-nav-link :href="route('mantenimientos.index')" :active="request()->routeIs('mantenimientos.*')" class="aurora-nav-link">
                    {{ __('Mantenimientos') }}
                </x-nav-link>
                <x-nav-link :href="route('reservas.pendientes')" :active="request()->routeIs('reservas.pendientes')" class="aurora-nav-link">
                    {{ __('Reservas Pendientes') }}
                </x-nav-link>
            </div>
            <!-- User Dropdown -->
            <div class="hidden md:flex items-center gap-2">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-emerald-700 dark:text-emerald-200 bg-white/0 hover:bg-emerald-400/10 transition duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <!-- Hamburger -->
            <div class="md:hidden flex items-center">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-emerald-700 dark:text-emerald-200 hover:bg-emerald-400/10 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white/90 dark:bg-gray-900/90 backdrop-blur-lg border-t border-emerald-300/20 shadow-lg">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('salones.index')" :active="request()->routeIs('salones.*')">
                {{ __('Salones') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reservas.index')" :active="request()->routeIs('reservas.*')">
                {{ __('Reservas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pagos.index')" :active="request()->routeIs('pagos.*')">
                {{ __('Pagos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tarifas.index')" :active="request()->routeIs('tarifas.*')">
                {{ __('Tarifas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('mantenimientos.index')" :active="request()->routeIs('mantenimientos.*')">
                {{ __('Mantenimientos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reservas.pendientes')" :active="request()->routeIs('reservas.pendientes')">
                {{ __('Reservas Pendientes') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-emerald-200/30">
            <div class="px-4">
                <div class="font-medium text-base text-emerald-700 dark:text-emerald-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-emerald-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    <style>
        .aurora-nav-link {
            @apply px-3 py-2 rounded-md font-semibold text-emerald-700 dark:text-emerald-200 hover:bg-emerald-400/10 hover:text-emerald-900 dark:hover:text-white transition-all duration-200;
        }
    </style>
</nav>