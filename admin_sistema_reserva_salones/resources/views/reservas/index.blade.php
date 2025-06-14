<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400 leading-tight flex items-center gap-3 animate-aurora-glow">
            <div class="relative">
                <svg class="w-10 h-10 text-emerald-300 animate-aurora-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
                <div class="absolute inset-0 w-10 h-10 bg-emerald-300/30 rounded-full animate-aurora-ring"></div>
            </div>
            {{ __('Gestión de Reservas') }}
            <div class="ml-auto flex items-center gap-2 text-sm font-normal text-emerald-200/80">
                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-aurora-blink"></div>
                Panel Administrativo
            </div>
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body { font-family: 'Inter', sans-serif; }
        
        .aurora-bg {
            background: linear-gradient(135deg, 
                #0f172a 0%, #1e293b 25%, #0f766e 50%, 
                #134e4a 75%, #0f172a 100%);
            background-size: 400% 400%;
            animation: aurora-admin-flow 20s ease-in-out infinite;
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
            background: radial-gradient(circle at 20% 80%, rgba(6, 78, 59, 0.3) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(14, 116, 144, 0.2) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
            animation: aurora-admin-radial 15s ease-in-out infinite alternate;
        }
        
        @keyframes aurora-admin-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        @keyframes aurora-admin-radial {
            0% { transform: scale(1) rotate(0deg); opacity: 0.8; }
            100% { transform: scale(1.1) rotate(180deg); opacity: 0.6; }
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
            transform: translateY(-2px);
            box-shadow: 
                0 12px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 25px rgba(34, 197, 94, 0.2);
            border-color: rgba(34, 197, 94, 0.3);
        }
        
        .aurora-table {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(34, 197, 94, 0.15);
            border-radius: 1rem;
            overflow: hidden;
        }
        
        .aurora-table thead {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(16, 185, 129, 0.15));
            border-bottom: 1px solid rgba(34, 197, 94, 0.2);
        }
        
        .aurora-table th {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.75rem;
            padding: 1rem 1.5rem;
            position: relative;
        }
        
        .aurora-table th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.5), transparent);
        }
        
        .aurora-table tbody tr {
            border-bottom: 1px solid rgba(34, 197, 94, 0.1);
            transition: all 0.3s ease;
        }
        
        .aurora-table tbody tr:hover {
            background: rgba(34, 197, 94, 0.05);
            box-shadow: inset 0 0 20px rgba(34, 197, 94, 0.1);
            transform: scale(1.001);
        }
        
        .aurora-table td {
            padding: 1.25rem 1.5rem;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
        }
        
        .aurora-badge {
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all 0.3s ease;
        }
        
        .aurora-badge.aprobada {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(16, 185, 129, 0.2));
            color: #10b981;
            border: 1px solid rgba(34, 197, 94, 0.4);
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.2);
        }
        
        .aurora-badge.pendiente {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.2), rgba(245, 158, 11, 0.2));
            color: #f59e0b;
            border: 1px solid rgba(251, 191, 36, 0.4);
            box-shadow: 0 0 15px rgba(251, 191, 36, 0.2);
        }
        
        .aurora-badge.rechazada {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(220, 38, 38, 0.2));
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.4);
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.2);
        }
        
        .aurora-badge::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: badge-shine 3s infinite;
        }
        
        @keyframes badge-shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .aurora-link {
            color: #22c55e;
            font-weight: 600;
            text-decoration: none;
            position: relative;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .aurora-link:hover {
            color: #10b981;
            transform: translateX(2px);
        }
        
        .aurora-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #22c55e, #10b981);
            transition: width 0.3s ease;
        }
        
        .aurora-link:hover::after {
            width: 100%;
        }
        
        .animate-fadeInUp { 
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }
        
        @keyframes fadeInUp { 
            0% { opacity: 0; transform: translateY(30px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        
        .filter-bar {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .filter-tabs {
            display: flex;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.05);
            padding: 0.25rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(34, 197, 94, 0.2);
            flex-wrap: wrap;
        }
        
        .filter-tab {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.7);
            border: 1px solid transparent;
        }
        
        .filter-tab.active {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(16, 185, 129, 0.2));
            color: #22c55e;
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.3);
            border-color: rgba(34, 197, 94, 0.3);
        }
        
        .filter-tab:hover:not(.active) {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.9);
            border-color: rgba(255, 255, 255, 0.1);
        }
        
        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #22c55e, #10b981);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.875rem;
            margin-right: 0.75rem;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }
        
        .salon-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 0.5rem;
            color: #60a5fa;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .date-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            background: rgba(168, 85, 247, 0.1);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 0.5rem;
            color: #c084fc;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .empty-state svg {
            width: 4rem;
            height: 4rem;
            margin: 0 auto 1rem;
            color: rgba(34, 197, 94, 0.3);
        }
        
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
            border-color: rgba(34, 197, 94, 0.3);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.15);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #22c55e;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        @media (max-width: 768px) {
            .aurora-bg {
                background-size: 300% 300%;
            }
            
            .filter-tabs {
                justify-content: center;
            }
            
            .filter-tab {
                font-size: 0.75rem;
                padding: 0.5rem 1rem;
            }
            
            .aurora-table {
                font-size: 0.875rem;
            }
            
            .aurora-table th,
            .aurora-table td {
                padding: 0.75rem 1rem;
            }
            
            .stats-bar {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        .aurora-section {
            position: relative;
            z-index: 1;
        }
    </style>

    <div class="aurora-bg"></div>

    <div class="py-8 relative z-10 aurora-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Estadísticas Rápidas -->
            <div class="stats-bar animate-fadeInUp">
                <div class="stat-card">
                    <div class="stat-number">{{ $reservas->count() }}</div>
                    <div class="stat-label">Total Reservas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $reservas->where('estado', 'pendiente')->count() }}</div>
                    <div class="stat-label">Pendientes</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $reservas->where('estado', 'aprobada')->count() }}</div>
                    <div class="stat-label">Aprobadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $reservas->where('estado', 'rechazada')->count() }}</div>
                    <div class="stat-label">Rechazadas</div>
                </div>
            </div>

            <!-- Barra de Filtros -->
            <div class="filter-bar animate-fadeInUp" style="animation-delay: 0.1s;">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="filter-tabs">
                        <div class="filter-tab active" data-filter="todos">Todas</div>
                        <div class="filter-tab" data-filter="pendiente">Pendientes</div>
                        <div class="filter-tab" data-filter="aprobada">Aprobadas</div>
                        <div class="filter-tab" data-filter="rechazada">Rechazadas</div>
                    </div>
                    <div class="flex items-center gap-2 text-emerald-200/70 text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Última actualización: {{ now()->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>

            <!-- Tabla de Reservas -->
            <div class="aurora-card rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.2s;">
                <div class="aurora-table">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        ID
                                    </div>
                                </th>
                                <th class="text-left">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                        Cliente
                                    </div>
                                </th>
                                <th class="text-left">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"/>
                                        </svg>
                                        Salón
                                    </div>
                                </th>
                                <th class="text-left">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        Fecha
                                    </div>
                                </th>
                                <th class="text-left">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Estado
                                    </div>
                                </th>
                                <th class="text-left">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                        </svg>
                                        Acciones
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reservas as $reserva)
                                <tr class="reserva-row" data-estado="{{ $reserva->estado }}">
                                    <td>
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-r from-emerald-400 to-green-500 rounded-lg flex items-center justify-center text-white font-bold text-sm mr-3">
                                                {{ $reserva->id }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="user-avatar">
                                                {{ substr($reserva->usuario->name ?? 'N', 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="font-semibold text-white">{{ $reserva->usuario->name ?? 'N/A' }}</div>
                                                <div class="text-emerald-300/70 text-sm">{{ $reserva->usuario->email ?? 'Sin email' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="salon-badge">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $reserva->salon->nombre ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-badge">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}
                                        </div>
                                        <div class="text-purple-300/70 text-xs mt-1 ml-6">
                                            {{ \Carbon\Carbon::parse($reserva->fecha)->format('H:i') }} hrs
                                        </div>
                                    </td>
                                    <td>
                                        <div class="aurora-badge {{ $reserva->estado }}">
                                            @if($reserva->estado === 'aprobada')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                            @elseif($reserva->estado === 'pendiente')
                                                <svg class="w-4 h-4 animate-spin" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                            {{ ucfirst($reserva->estado) }}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('reservas.show', $reserva->id) }}" class="aurora-link">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Ver detalles
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-state">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                        </svg>
                                        <h3 class="text-xl font-semibold text-emerald-200 mb-2">No hay reservas registradas</h3>
                                        <p class="text-emerald-300/70">Las reservas de los clientes aparecerán aquí una vez que sean creadas</p>
                                        <div class="mt-6">
                                            <a href="{{ route('dashboard') }}" class="aurora-link text-base">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                                </svg>
                                                Ir al Dashboard
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginación (si existe) -->
            @if(method_exists($reservas, 'links'))
                <div class="mt-8 flex justify-center animate-fadeInUp" style="animation-delay: 0.3s;">
                    <div class="aurora-card rounded-lg px-6 py-4">
                        {{ $reservas->links() }}
                    </div>
                </div>
            @endif

            <!-- Botón de Acción Rápida -->
            <div class="flex justify-center mt-8 animate-fadeInUp" style="animation-delay: 0.4s;">
                <a href="{{ route('dashboard') }}" class="aurora-card rounded-xl px-8 py-4 text-center hover:scale-105 transition-all duration-300 group flex items-center gap-3">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                        <svg class="w-6 h-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <span class="text-white font-semibold text-lg block">Volver al Dashboard</span>
                        <p class="text-blue-200/70 text-sm">Ver resumen general del sistema</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sistema de filtros funcional
            const filterTabs = document.querySelectorAll('.filter-tab');
            const reservaRows = document.querySelectorAll('.reserva-row');
            
            filterTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remover clase activa de todos los tabs
                    filterTabs.forEach(t => t.classList.remove('active'));
                    // Agregar clase activa al tab clickeado
                    tab.classList.add('active');
                    
                    const filter = tab.dataset.filter;
                    
                    // Filtrar filas
                    reservaRows.forEach(row => {
                        const estado = row.dataset.estado;
                        
                        if (filter === 'todos' || estado === filter) {
                            row.style.display = '';
                            row.style.animation = 'fadeInUp 0.5s ease forwards';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    
                    // Actualizar estadísticas
                    updateStats(filter);
                });
            });
            
            // Función para actualizar estadísticas según filtro
            function updateStats(filter) {
                const visibleRows = Array.from(reservaRows).filter(row => {
                    return filter === 'todos' || row.dataset.estado === filter;
                });
                
                // Aquí puedes actualizar los números en las tarjetas de estadísticas
                console.log(`Mostrando ${visibleRows.length} reservas con filtro: ${filter}`);
            }
            
            // Animaciones de entrada escalonadas
            const animatedElements = document.querySelectorAll('.animate-fadeInUp');
            animatedElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Efecto de búsqueda en tiempo real (opcional)
            const searchInput = document.getElementById('search-input');
            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    
                    reservaRows.forEach(row => {
                        const clienteName = row.querySelector('td:nth-child(2) .font-semibold').textContent.toLowerCase();
                        const salonName = row.querySelector('.salon-badge').textContent.toLowerCase();
                        
                        if (clienteName.includes(searchTerm) || salonName.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
            
            // Función para mostrar notificaciones (reutilizada del dashboard)
            function showNotification(message, type = 'success') {
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 px-6 py-4 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${
                    type === 'success' ? 'bg-emerald-500/90 text-white' : 'bg-red-500/90 text-white'
                }`;
                notification.innerHTML = `
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        ${message}
                    </div>
                `;
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.classList.remove('translate-x-full');
                }, 100);
                
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 3000);
            }
            
            // Auto-refresh cada 30 segundos para nuevas reservas
            setInterval(() => {
                // Aquí puedes hacer una petición AJAX para verificar nuevas reservas
                // y actualizar la tabla sin recargar la página
                console.log('Verificando nuevas reservas...');
            }, 30000);
        });
        
        // Función para exportar reservas (opcional)
        function exportReservas(formato) {
            const url = `/reservas/export?formato=${formato}`;
            window.open(url, '_blank');
            showNotification(`Exportando reservas en formato ${formato}...`);
        }
    </script>
</x-app-layout>