<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400 leading-tight flex items-center gap-3 animate-aurora-glow">
            <div class="relative">
                <svg class="w-10 h-10 text-emerald-300 animate-aurora-pulse" fill="none" viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="auroraStarGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#6ee7b7"/>
                            <stop offset="50%" stop-color="#22c55e"/>
                            <stop offset="100%" stop-color="#047857"/>
                        </linearGradient>
                        <filter id="auroral-glow">
                            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                            <feMerge> 
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" 
                          fill="url(#auroraStarGradient)" 
                          filter="url(#auroral-glow)" />
                </svg>
                <div class="absolute inset-0 w-10 h-10 bg-emerald-300/30 rounded-full animate-aurora-ring"></div>
            </div>
            {{ __('Dashboard Aurora') }}
            <div class="ml-auto flex items-center gap-2 text-sm font-normal text-emerald-200/80">
                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-aurora-blink"></div>
                Sistema Activo
            </div>
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body { font-family: 'Inter', sans-serif; }
        
        .aurora-bg {
            background: linear-gradient(-45deg, 
                #0a0f1c, #1a2332, #0d1b2a, 
                #134e4a, #115e59, #064e3b, 
                #22c55e, #10b981, #059669,
                #1a2332, #0a0f1c);
            background-size: 800% 800%;
            animation: aurora-flow 25s ease-in-out infinite;
            min-height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0; left: 0;
            z-index: -20;
            overflow: hidden;
        }
        
        .aurora-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at center, transparent 0%, rgba(6, 78, 59, 0.3) 50%, rgba(10, 15, 28, 0.8) 100%);
            animation: aurora-radial 20s ease-in-out infinite alternate;
        }
        
        .aurora-bg::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg at 50% 50%, 
                rgba(34, 197, 94, 0.1) 0deg,
                rgba(16, 185, 129, 0.2) 60deg,
                rgba(5, 150, 105, 0.15) 120deg,
                rgba(34, 197, 94, 0.1) 180deg,
                rgba(16, 185, 129, 0.25) 240deg,
                rgba(5, 150, 105, 0.1) 300deg,
                rgba(34, 197, 94, 0.1) 360deg);
            animation: aurora-rotate 30s linear infinite;
        }
        
        .aurora-waves {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: -15;
            overflow: hidden;
        }
        
        .aurora-wave {
            position: absolute;
            width: 200vw;
            height: 200vh;
            background: linear-gradient(45deg, 
                transparent 0%, 
                rgba(34, 197, 94, 0.03) 25%, 
                rgba(16, 185, 129, 0.06) 50%, 
                rgba(34, 197, 94, 0.03) 75%, 
                transparent 100%);
            animation: aurora-wave-1 15s ease-in-out infinite;
        }
        
        .aurora-wave:nth-child(2) {
            animation: aurora-wave-2 18s ease-in-out infinite reverse;
            background: linear-gradient(-45deg, 
                transparent 0%, 
                rgba(16, 185, 129, 0.04) 25%, 
                rgba(5, 150, 105, 0.08) 50%, 
                rgba(16, 185, 129, 0.04) 75%, 
                transparent 100%);
        }
        
        .aurora-wave:nth-child(3) {
            animation: aurora-wave-3 22s ease-in-out infinite;
            background: linear-gradient(135deg, 
                transparent 0%, 
                rgba(6, 120, 94, 0.02) 25%, 
                rgba(34, 197, 94, 0.05) 50%, 
                rgba(6, 120, 94, 0.02) 75%, 
                transparent 100%);
        }
        
        @keyframes aurora-flow {
            0%, 100% { background-position: 0% 50%; }
            25% { background-position: 100% 25%; }
            50% { background-position: 50% 100%; }
            75% { background-position: 25% 0%; }
        }
        
        @keyframes aurora-radial {
            0% { transform: scale(1) rotate(0deg); opacity: 0.8; }
            100% { transform: scale(1.2) rotate(180deg); opacity: 0.6; }
        }
        
        @keyframes aurora-rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes aurora-wave-1 {
            0%, 100% { transform: translateX(-50%) translateY(-50%) rotate(0deg); }
            33% { transform: translateX(-40%) translateY(-60%) rotate(1deg); }
            66% { transform: translateX(-60%) translateY(-40%) rotate(-1deg); }
        }
        
        @keyframes aurora-wave-2 {
            0%, 100% { transform: translateX(-30%) translateY(-30%) rotate(0deg); }
            50% { transform: translateX(-70%) translateY(-70%) rotate(2deg); }
        }
        
        @keyframes aurora-wave-3 {
            0%, 100% { transform: translateX(-40%) translateY(-60%) rotate(0deg); }
            50% { transform: translateX(-60%) translateY(-40%) rotate(-2deg); }
        }
        
        .animate-aurora-glow {
            animation: aurora-glow 3s ease-in-out infinite alternate;
        }
        
        @keyframes aurora-glow {
            0% { 
                text-shadow: 0 0 5px rgba(34, 197, 94, 0.5), 0 0 10px rgba(34, 197, 94, 0.3), 0 0 15px rgba(34, 197, 94, 0.1);
                transform: translateY(0px);
            }
            100% { 
                text-shadow: 0 0 10px rgba(34, 197, 94, 0.8), 0 0 20px rgba(34, 197, 94, 0.5), 0 0 30px rgba(34, 197, 94, 0.3);
                transform: translateY(-2px);
            }
        }
        
        .animate-aurora-pulse {
            animation: aurora-pulse 2s infinite;
        }
        
        @keyframes aurora-pulse {
            0%, 100% { 
                filter: drop-shadow(0 0 5px rgba(34, 197, 94, 0.5));
                transform: scale(1);
            }
            50% { 
                filter: drop-shadow(0 0 20px rgba(34, 197, 94, 0.8)) drop-shadow(0 0 30px rgba(16, 185, 129, 0.4));
                transform: scale(1.05);
            }
        }
        
        .animate-aurora-ring {
            animation: aurora-ring 2s infinite;
        }
        
        @keyframes aurora-ring {
            0% { 
                transform: scale(0.8); 
                opacity: 0.8;
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
            }
            50% { 
                transform: scale(1.2); 
                opacity: 0.4;
                box-shadow: 0 0 0 10px rgba(34, 197, 94, 0.1);
            }
            100% { 
                transform: scale(1.5); 
                opacity: 0;
                box-shadow: 0 0 0 20px rgba(34, 197, 94, 0);
            }
        }
        
        .animate-aurora-blink {
            animation: aurora-blink 2s infinite;
        }
        
        @keyframes aurora-blink {
            0%, 50% { opacity: 1; box-shadow: 0 0 5px rgba(34, 197, 94, 0.8); }
            25%, 75% { opacity: 0.3; box-shadow: 0 0 2px rgba(34, 197, 94, 0.4); }
        }
        
        .aurora-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1),
                0 0 20px rgba(34, 197, 94, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .aurora-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 30px rgba(34, 197, 94, 0.3);
            border-color: rgba(34, 197, 94, 0.4);
        }
        
        .aurora-stat-card {
            position: relative;
            overflow: hidden;
        }
        
        .aurora-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: aurora-shimmer 3s infinite;
        }
        
        @keyframes aurora-shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .animate-fadeInUp { 
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }
        
        @keyframes fadeInUp { 
            0% { opacity: 0; transform: translateY(30px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        
        .aurora-table {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(34, 197, 94, 0.15);
        }
        
        .aurora-table th {
            background: rgba(34, 197, 94, 0.1);
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .aurora-table tr:hover {
            background: rgba(34, 197, 94, 0.05);
            box-shadow: inset 0 0 20px rgba(34, 197, 94, 0.1);
        }
        
        .aurora-badge {
            position: relative;
            overflow: hidden;
        }
        
        .aurora-badge::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: badge-shine 2s infinite;
        }
        
        @keyframes badge-shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: -10;
        }
        
        .aurora-section {
            position: relative;
            z-index: 1;
        }
        
        .welcome-banner {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(16, 185, 129, 0.1));
            border: 1px solid rgba(34, 197, 94, 0.3);
            backdrop-filter: blur(20px);
        }
        
        .filter-tabs {
            display: flex;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.05);
            padding: 0.25rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        
        .filter-tab {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .filter-tab.active {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.3);
        }
        
        .filter-tab:not(.active) {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .filter-tab:hover:not(.active) {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.9);
        }
        
        @media (max-width: 768px) {
            .aurora-bg {
                background-size: 600% 600%;
            }
            
            .particles {
                display: none;
            }
            
            .filter-tabs {
                flex-wrap: wrap;
            }
            
            .filter-tab {
                font-size: 0.75rem;
                padding: 0.375rem 0.75rem;
            }
        }
        
        @media (max-width: 640px) {
            .animate-aurora-glow h2 {
                font-size: 1.5rem;
            }
            
            .aurora-card {
                margin-bottom: 1rem;
            }
        }
    </style>

    <div class="aurora-bg"></div>
    <div class="aurora-waves">
        <div class="aurora-wave"></div>
        <div class="aurora-wave"></div>
        <div class="aurora-wave"></div>
    </div>
    <canvas class="particles"></canvas>

    <div class="py-8 relative z-10 aurora-section">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de Bienvenida Personalizado -->
            @if(auth()->user())
            <div class="welcome-banner rounded-xl p-6 mb-8 animate-fadeInUp">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-emerald-400 to-green-500 flex items-center justify-center text-white font-bold text-lg mr-4">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-emerald-200">
                                ¡Bienvenido de vuelta, {{ auth()->user()->name }}!
                            </h3>
                            <p class="text-emerald-200/70 text-sm mt-1">
                                Tienes {{ $stats['reservas_pendientes'] ?? 0 }} reservas pendientes que requieren tu atención.
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center text-emerald-300">
                        <svg class="w-8 h-8 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            @endif

            <!-- Filtros de Tiempo -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 animate-fadeInUp" style="animation-delay:0.1s;">
                <div class="filter-tabs mb-4 sm:mb-0">
                    <div class="filter-tab active" data-period="today">Hoy</div>
                    <div class="filter-tab" data-period="week">Esta Semana</div>
                    <div class="filter-tab" data-period="month">Este Mes</div>
                    <div class="filter-tab" data-period="year">Este Año</div>
                </div>
                <div class="text-emerald-200/70 text-sm">
                    Última actualización: {{ now()->format('d/m/Y H:i') }}
                </div>
            </div>

            <!-- Estadísticas principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Salones Activos -->
                <div class="aurora-card aurora-stat-card rounded-2xl p-6 text-white animate-fadeInUp" style="animation-delay:0s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-emerald-500/20 border border-emerald-400/30">
                            <svg class="w-8 h-8 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-emerald-300">{{ $stats['salones_activos'] ?? 0 }}</p>
                            <div class="flex items-center text-emerald-400 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"/>
                                </svg>
                                +12% este mes
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-emerald-100">Salones Activos</h3>
                    <p class="text-emerald-200/70 text-sm mt-1">Espacios disponibles para eventos</p>
                </div>

                <!-- Reservas Pendientes -->
                <div class="aurora-card aurora-stat-card rounded-2xl p-6 text-white animate-fadeInUp" style="animation-delay:0.1s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-yellow-500/20 border border-yellow-400/30">
                            <svg class="w-8 h-8 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-yellow-300">{{ $stats['reservas_pendientes'] ?? 0 }}</p>
                            <div class="flex items-center text-yellow-400 text-sm">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse mr-1"></div>
                                Requieren atención
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-yellow-100">Reservas Pendientes</h3>
                    <p class="text-yellow-200/70 text-sm mt-1">Esperando confirmación</p>
                </div>

                <!-- Reservas de Hoy -->
                <div class="aurora-card aurora-stat-card rounded-2xl p-6 text-white animate-fadeInUp" style="animation-delay:0.2s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-green-500/20 border border-green-400/30">
                            <svg class="w-8 h-8 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-green-300">{{ $stats['reservas_hoy'] ?? 0 }}</p>
                            <div class="flex items-center text-green-400 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                Hoy, {{ now()->format('d M') }}
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-green-100">Reservas de Hoy</h3>
                    <p class="text-green-200/70 text-sm mt-1">Eventos programados</p>
                </div>

                <!-- Ingresos del Mes -->
                <div class="aurora-card aurora-stat-card rounded-2xl p-6 text-white animate-fadeInUp" style="animation-delay:0.3s;">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-blue-500/20 border border-blue-400/30">
                            <svg class="w-8 h-8 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-blue-300">${{ number_format($stats['ingresos_mes'] ?? 0, 0) }}</p>
                            <div class="flex items-center text-blue-400 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                {{ now()->format('M Y') }}
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-100">Ingresos del Mes</h3>
                    <p class="text-blue-200/70 text-sm mt-1">Facturación mensual</p>
                </div>
            </div>

            <!-- Reservas recientes -->
            <div class="aurora-card rounded-2xl p-6 mb-8 animate-fadeInUp" style="animation-delay:0.4s;">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-white flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-emerald-500/20 border border-emerald-400/30">
                            <svg class="w-6 h-6 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 to-green-300">
                            Últimas Reservas
                        </span>
                    </h3>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 text-emerald-300 text-sm">
                            <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                            Tiempo real
                        </div>
                        <a href="{{ route('reservas.index') }}" class="text-emerald-300 hover:text-emerald-200 text-sm font-medium transition-colors duration-300 flex items-center gap-1">
                            Ver todas
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                @if(isset($reservas_recientes) && $reservas_recientes->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="min-w-full aurora-table rounded-lg">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Salón</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Creado</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-emerald-500/20">
                                @foreach($reservas_recientes as $reserva)
                                    <tr class="transition-all duration-300 hover:bg-emerald-500/10">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-emerald-400 to-green-500 flex items-center justify-center text-white font-bold text-sm mr-3">
                                                    {{ substr($reserva->cliente_nombre ?? 'N', 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="font-semibold text-white">{{ $reserva->cliente_nombre ?? 'N/A' }}</div>
                                                    <div class="text-emerald-300/70 text-sm">{{ $reserva->cliente_email ?? 'Cliente' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                                <div>
                                                    <span class="text-white font-medium">{{ $reserva->salon->nombre ?? 'N/D' }}</span>
                                                    <div class="text-emerald-300/70 text-xs">Capacidad: {{ $reserva->salon->capacidad ?? 'N/D' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v4m-6 0v10a2 2 0 002 2h2a2 2 0 002-2V7"/>
                                                </svg>
                                                <div>
                                                    <span class="text-white">{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y') }}</span>
                                                    <div class="text-emerald-300/70 text-xs">{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('H:i') }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="aurora-badge inline-flex px-3 py-1 rounded-full text-xs font-semibold
                                                @if($reserva->estado == 'pendiente') bg-yellow-500/20 text-yellow-300 border border-yellow-400/30
                                                @elseif($reserva->estado == 'confirmado') bg-green-500/20 text-green-300 border border-green-400/30
                                                @elseif($reserva->estado == 'cancelado') bg-red-500/20 text-red-300 border border-red-400/30
                                                @else bg-gray-500/20 text-gray-300 border border-gray-400/30
                                                @endif">
                                                @if($reserva->estado == 'pendiente')
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                @elseif($reserva->estado == 'confirmado')
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                    </svg>
                                                @elseif($reserva->estado == 'cancelado')
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                    </svg>
                                                @endif
                                                {{ ucfirst($reserva->estado) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-emerald-200/70 text-sm">
                                            {{ $reserva->created_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('reservas.show', $reserva->id) }}" class="text-emerald-400 hover:text-emerald-300 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('reservas.edit', $reserva->id) }}" class="text-blue-400 hover:text-blue-300 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-emerald-300/50 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l6 0m-6 0v10a2 2 0 002 2h2a2 2 0 002-2V7m-6 0V3a2 2 0 012-2h4a2 2 0 012 2v4"/>
                        </svg>
                        <p class="text-emerald-200/70 text-lg">No hay reservas recientes</p>
                        <p class="text-emerald-300/50 text-sm mt-1">Las nuevas reservas aparecerán aquí</p>
                        <a href="{{ route('reservas.create') }}" class="inline-flex items-center mt-4 px-4 py-2 bg-emerald-500/20 text-emerald-300 rounded-lg hover:bg-emerald-500/30 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Crear Primera Reserva
                        </a>
                    </div>
                @endif
            </div>

            <!-- Salones populares -->
            <div class="aurora-card rounded-2xl p-6 mb-8 animate-fadeInUp" style="animation-delay:0.5s;">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-white flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-emerald-500/20 border border-emerald-400/30">
                            <svg class="w-6 h-6 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 to-green-300">
                            Salones Más Populares
                        </span>
                    </h3>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 text-emerald-300 text-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Ranking
                        </div>
                        <a href="{{ route('salones.index') }}" class="text-emerald-300 hover:text-emerald-200 text-sm font-medium transition-colors duration-300 flex items-center gap-1">
                            Ver todos los salones
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                @if(isset($salones_populares) && $salones_populares->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($salones_populares as $index => $salon)
                            <div class="flex items-center justify-between p-4 rounded-xl bg-gradient-to-r from-emerald-500/10 to-green-500/10 border border-emerald-400/20 hover:border-emerald-400/40 transition-all duration-300 hover:transform hover:scale-[1.02]">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-emerald-400 to-green-500 text-white font-bold text-lg">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-white text-lg">{{ $salon->nombre }}</h4>
                                        <div class="flex items-center gap-2 text-emerald-300/70 text-sm">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                            </svg>
                                            Capacidad: {{ $salon->capacidad ?? 'N/D' }} personas
                                            <a href="{{ route('salones.show', $salon->slug) }}" class="ml-2 text-emerald-400 hover:text-emerald-300 transition-colors text-xs underline">
                                                Ver detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-emerald-300">{{ $salon->reservas_count ?? 0 }}</div>
                                        <div class="text-emerald-400/70 text-sm">reservas</div>
                                    </div>
                                    <div class="aurora-badge inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Popular
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-emerald-300/50 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <p class="text-emerald-200/70 text-lg">No hay salones con reservas</p>
                        <p class="text-emerald-300/50 text-sm mt-1">Los salones más populares aparecerán aquí</p>
                        <a href="{{ route('salones.create') }}" class="inline-flex items-center mt-4 px-4 py-2 bg-emerald-500/20 text-emerald-300 rounded-lg hover:bg-emerald-500/30 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Agregar Primer Salón
                        </a>
                    </div>
                @endif
            </div>

            <!-- Botones de acción rápida -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                <a href="{{ route('reservas.create') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-emerald-500/30 transition-colors">
                        <svg class="w-6 h-6 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Nueva Reserva</span>
                    <p class="text-emerald-200/70 text-xs mt-1">Crear reservación</p>
                </a>
                
                <a href="{{ route('salones.index') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-500/30 transition-colors">
                        <svg class="w-6 h-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Gestionar Salones</span>
                    <p class="text-blue-200/70 text-xs mt-1">Administrar espacios</p>
                </a>
                
                <a href="{{ route('reservas.pendientes') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-yellow-500/30 transition-colors">
                        <svg class="w-6 h-6 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Reservas Pendientes</span>
                    <p class="text-yellow-200/70 text-xs mt-1">Revisar solicitudes</p>
                </a>
                
                <a href="{{ route('pagos.index') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-green-500/30 transition-colors">
                        <svg class="w-6 h-6 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Pagos</span>
                    <p class="text-green-200/70 text-xs mt-1">Gestión financiera</p>
                </a>

                <!-- Segunda fila de botones -->
                <a href="{{ route('tarifas.index') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-purple-500/30 transition-colors">
                        <svg class="w-6 h-6 text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Tarifas</span>
                    <p class="text-purple-200/70 text-xs mt-1">Configurar precios</p>
                </a>
                
                <a href="{{ route('mantenimientos.index') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-orange-500/30 transition-colors">
                        <svg class="w-6 h-6 text-orange-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Mantenimiento</span>
                    <p class="text-orange-200/70 text-xs mt-1">Control de espacios</p>
                </a>
                
                <a href="{{ route('reservas.index') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-cyan-500/30 transition-colors">
                        <svg class="w-6 h-6 text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Todas las Reservas</span>
                    <p class="text-cyan-200/70 text-xs mt-1">Ver historial</p>
                </a>
                
                <a href="{{ route('profile.edit') }}" class="aurora-card rounded-xl p-4 text-center hover:scale-105 transition-all duration-300 group block">
                    <div class="w-12 h-12 bg-indigo-500/20 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-indigo-500/30 transition-colors">
                        <svg class="w-6 h-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Mi Perfil</span>
                    <p class="text-indigo-200/70 text-xs mt-1">Configuración</p>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Sistema de partículas optimizado
        const canvas = document.querySelector('.particles');
        const ctx = canvas.getContext('2d');
        let particles = [];
        let mouseX = 0, mouseY = 0;
        
        const colors = [
            '#22c55e', '#10b981', '#059669', '#047857', 
            '#6ee7b7', '#34d399', '#10b981', '#065f46'
        ];

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        
        window.addEventListener('resize', resize);
        window.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });
        
        resize();

        class AuroraParticle {
            constructor() {
                this.reset();
                this.y = Math.random() * canvas.height;
                this.history = [];
            }
            
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.radius = Math.random() * 2 + 1;
                this.color = colors[Math.floor(Math.random() * colors.length)];
                this.speedX = (Math.random() - 0.5) * 0.6;
                this.speedY = (Math.random() - 0.5) * 0.6;
                this.alpha = Math.random() * 0.5 + 0.2;
                this.originalAlpha = this.alpha;
                this.pulse = Math.random() * Math.PI * 2;
                this.trail = [];
            }
            
            update() {
                // Movimiento base
                this.x += this.speedX;
                this.y += this.speedY;
                
                // Efecto de mouse optimizado
                const dx = mouseX - this.x;
                const dy = mouseY - this.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 120) {
                    const force = (120 - distance) / 120;
                    this.x += (dx / distance) * force * 0.3;
                    this.y += (dy / distance) * force * 0.3;
                    this.alpha = this.originalAlpha + force * 0.3;
                if (distance < 120) {
                    const force = (120 - distance) / 120;
                    this.x += (dx / distance) * force * 0.3;
                    this.y += (dy / distance) * force * 0.3;
                    this.alpha = this.originalAlpha + force * 0.3;
                } else {
                    this.alpha = this.originalAlpha;
                }
                
                // Efecto de pulsación
                this.pulse += 0.015;
                this.alpha += Math.sin(this.pulse) * 0.1;
                
                // Crear rastro más eficiente
                this.trail.push({x: this.x, y: this.y, alpha: this.alpha});
                if (this.trail.length > 5) {
                    this.trail.shift();
                }
                
                // Reposicionar si sale de pantalla
                if (this.x < -10) this.x = canvas.width + 10;
                if (this.x > canvas.width + 10) this.x = -10;
                if (this.y < -10) this.y = canvas.height + 10;
                if (this.y > canvas.height + 10) this.y = -10;
            }
            
            draw() {
                ctx.save();
                
                // Dibujar rastro
                for (let i = 0; i < this.trail.length; i++) {
                    const point = this.trail[i];
                    const trailAlpha = (point.alpha * (i / this.trail.length)) * 0.4;
                    const trailRadius = this.radius * (i / this.trail.length);
                    
                    ctx.globalAlpha = trailAlpha;
                    ctx.beginPath();
                    ctx.arc(point.x, point.y, trailRadius, 0, Math.PI * 2);
                    ctx.fillStyle = this.color;
                    ctx.shadowColor = this.color;
                    ctx.shadowBlur = 10;
                    ctx.fill();
                }
                
                // Dibujar partícula principal
                ctx.globalAlpha = this.alpha;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.shadowColor = this.color;
                ctx.shadowBlur = 15;
                ctx.fill();
                
                ctx.restore();
            }
        }

        // Crear conexiones entre partículas cercanas (optimizado)
        function drawConnections() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance < 100) {
                        ctx.save();
                        ctx.globalAlpha = (100 - distance) / 100 * 0.15;
                        ctx.strokeStyle = '#22c55e';
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                        ctx.restore();
                    }
                }
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            // Actualizar y dibujar partículas
            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });
            
            // Dibujar conexiones
            drawConnections();
            
            requestAnimationFrame(animate);
        }

        function initParticles() {
            particles = [];
            // Reducir número de partículas para mejor performance
            const particleCount = Math.min(60, Math.floor((canvas.width * canvas.height) / 20000));
            
            for (let i = 0; i < particleCount; i++) {
                particles.push(new AuroraParticle());
            }
        }

        // Filtros de tiempo funcionales
        document.addEventListener('DOMContentLoaded', () => {
            const filterTabs = document.querySelectorAll('.filter-tab');
            
            filterTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remover clase activa de todos los tabs
                    filterTabs.forEach(t => t.classList.remove('active'));
                    // Agregar clase activa al tab clickeado
                    tab.classList.add('active');
                    
                    // Aquí puedes agregar la lógica para filtrar los datos
                    const period = tab.dataset.period;
                    console.log('Filtro seleccionado:', period);
                    
                    // Ejemplo de como podrías hacer una petición AJAX
                    // fetchDashboardData(period);
                });
            });
            
            // Animaciones de entrada escalonadas
            const animatedElements = document.querySelectorAll('.animate-fadeInUp');
            animatedElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Función para actualizar datos del dashboard (ejemplo)
        function fetchDashboardData(period) {
            // Esta función se puede usar para hacer peticiones AJAX
            // y actualizar las métricas según el período seleccionado
            fetch(`/dashboard/data?period=${period}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                // Actualizar las métricas en el dashboard
                updateMetrics(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function updateMetrics(data) {
            // Actualizar las métricas con los nuevos datos
            if (data.stats) {
                document.querySelector('.salones-activos').textContent = data.stats.salones_activos || 0;
                document.querySelector('.reservas-pendientes').textContent = data.stats.reservas_pendientes || 0;
                document.querySelector('.reservas-hoy').textContent = data.stats.reservas_hoy || 0;
                document.querySelector('.ingresos-mes').textContent = ' + (data.stats.ingresos_mes || 0).toLocaleString();
            }
        }

        // Verificar si hay notificaciones nuevas cada 30 segundos
        setInterval(() => {
            fetch('/dashboard/notifications', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.new_reservations > 0) {
                    showNotification(`${data.new_reservations} nueva(s) reserva(s) recibida(s)`);
                }
            })
            .catch(error => {
                console.error('Error checking notifications:', error);
            });
        }, 30000);

        function showNotification(message) {
            // Crear notificación toast
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-emerald-500/90 text-white px-6 py-4 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300';
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.07 2.82l3.12 3.12-7.07 7.07-3.12-3.12z"></path>
                    </svg>
                    ${message}
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Mostrar notificación
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Ocultar después de 5 segundos
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 5000);
        }

        // Inicializar sistema de partículas si no estamos en móvil
        if (window.innerWidth > 768) {
            initParticles();
            animate();
            
            // Reinicializar en resize
            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    resize();
                    initParticles();
                } else {
                    // Limpiar canvas en móvil
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    particles = [];
                }
            });
        }
    </script>
</x-app-layout>