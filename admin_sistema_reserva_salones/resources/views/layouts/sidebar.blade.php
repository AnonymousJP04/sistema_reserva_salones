<aside class="fixed top-0 left-0 h-full w-64 bg-white/20 dark:bg-gray-900/40 backdrop-blur-md shadow-xl z-30 flex flex-col py-6 px-4 border-r border-emerald-300/30">
    <div class="flex items-center gap-3 mb-8">
        <svg class="w-8 h-8 text-emerald-400 animate-pulseGlow" fill="none" viewBox="0 0 24 24">
            <defs>
                <linearGradient id="sidebarAuroraGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#22c55e"/>
                    <stop offset="100%" stop-color="#10b981"/>
                </linearGradient>
            </defs>
            <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" fill="url(#sidebarAuroraGradient)" />
        </svg>
        <span class="text-xl font-bold text-emerald-100 tracking-wide">Eventos Aurora</span>
    </div>
    <nav class="flex-1 space-y-2">
        <a href="{{ route('dashboard') }}" class="aurora-sidebar-link @if(request()->routeIs('dashboard')) bg-emerald-400/20 text-white @endif">
            <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" viewBox="0 0 24 24"><path d="M3 12l9-9 9 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 21V9h6v12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Dashboard
        </a>
        <a href="{{ route('salones.index') }}" class="aurora-sidebar-link @if(request()->routeIs('salones.*')) bg-emerald-400/20 text-white @endif">
            <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2" stroke="currentColor" stroke-width="2"/><path d="M16 3v4M8 3v4" stroke="currentColor" stroke-width="2"/></svg>
            Salones
        </a>
        <a href="{{ route('reservas.index') }}" class="aurora-sidebar-link @if(request()->routeIs('reservas.*')) bg-emerald-400/20 text-white @endif">
            <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 2v4M16 2v4" stroke="currentColor" stroke-width="2"/><path d="M4 10h16" stroke="currentColor" stroke-width="2"/></svg>
            Reservas
        </a>
        <a href="{{ route('pagos.index') }}" class="aurora-sidebar-link @if(request()->routeIs('pagos.*')) bg-emerald-400/20 text-white @endif">
            <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" viewBox="0 0 24 24"><path d="M12 8v4l3 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/></svg>
            Pagos
        </a>
        <a href="{{ route('tarifas.index') }}" class="aurora-sidebar-link @if(request()->routeIs('tarifas.*')) bg-emerald-400/20 text-white @endif">
            <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" viewBox="0 0 24 24"><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/></svg>
            Tarifas
        </a>
        <a href="{{ route('mantenimientos.index') }}" class="aurora-sidebar-link @if(request()->routeIs('mantenimientos.*')) bg-emerald-400/20 text-white @endif">
            <svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" viewBox="0 0 24 24"><path d="M4 17v2a2 2 0 002 2h12a2 2 0 002-2v-2" stroke="currentColor" stroke-width="2"/><path d="M7 11l5-5 5 5" stroke="currentColor" stroke-width="2"/></svg>
            Mantenimientos
        </a>
        <a href="{{ route('reservas.pendientes') }}" class="aurora-sidebar-link @if(request()->routeIs('reservas.pendientes')) bg-yellow-400/20 text-yellow-100 @endif">
            <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 8v4l3 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Reservas Pendientes
        </a>
    </nav>
    <style>
        .aurora-sidebar-link {
            @apply flex items-center px-4 py-2 rounded-lg font-semibold text-emerald-100 hover:bg-emerald-400/20 hover:text-white transition-all duration-200;
        }
        .animate-pulseGlow {
            animation: pulseGlow 2s infinite;
        }
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.7);}
            50% { box-shadow: 0 0 30px 10px rgba(34,197,94,0.3);}
        }
    </style>
</aside>