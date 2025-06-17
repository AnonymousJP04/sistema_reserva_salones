<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Tarifa - Eventos Aurora</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Configurar colores personalizados */
        :root {
            --emerald-primary: #22c55e;
            --emerald-dark: #047857;
            --emerald-light: #6ee7b7;
            --blue-accent: #3b82f6;
            --yellow-accent: #f59e0b;
            --red-accent: #ef4444;
        }

        /* Fondo Aurora Animado */
        body {
            background: linear-gradient(45deg, #1a2332, #1f2937, #111827);
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 20%, rgba(34, 197, 94, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 40%, rgba(59, 130, 246, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(34, 197, 94, 0.25) 0%, transparent 50%),
                linear-gradient(135deg, transparent 0%, rgba(34, 197, 94, 0.1) 50%, transparent 100%);
            animation: aurora-flow 25s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes aurora-flow {
            0%, 100% { 
                background: 
                    radial-gradient(circle at 20% 20%, rgba(34, 197, 94, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 80% 40%, rgba(59, 130, 246, 0.2) 0%, transparent 50%),
                    radial-gradient(circle at 40% 80%, rgba(34, 197, 94, 0.25) 0%, transparent 50%);
            }
            25% { 
                background: 
                    radial-gradient(circle at 80% 30%, rgba(34, 197, 94, 0.35) 0%, transparent 50%),
                    radial-gradient(circle at 20% 70%, rgba(59, 130, 246, 0.25) 0%, transparent 50%),
                    radial-gradient(circle at 60% 20%, rgba(34, 197, 94, 0.2) 0%, transparent 50%);
            }
            50% { 
                background: 
                    radial-gradient(circle at 40% 60%, rgba(34, 197, 94, 0.4) 0%, transparent 50%),
                    radial-gradient(circle at 70% 20%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
                    radial-gradient(circle at 30% 40%, rgba(34, 197, 94, 0.3) 0%, transparent 50%);
            }
            75% { 
                background: 
                    radial-gradient(circle at 60% 80%, rgba(34, 197, 94, 0.25) 0%, transparent 50%),
                    radial-gradient(circle at 30% 30%, rgba(59, 130, 246, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 80% 60%, rgba(34, 197, 94, 0.35) 0%, transparent 50%);
            }
        }

        /* Glassmorphism Aurora Cards */
        .aurora-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1.5px solid rgba(34, 197, 94, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 0 20px rgba(34, 197, 94, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .aurora-card:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 0 30px rgba(34, 197, 94, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
            border-color: rgba(34, 197, 94, 0.4);
        }

        .aurora-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .aurora-card:hover::before {
            opacity: 1;
        }

        /* Animaciones Aurora */
        @keyframes aurora-glow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
                transform: scale(1);
            }
            50% { 
                box-shadow: 0 0 40px rgba(34, 197, 94, 0.5);
                transform: scale(1.02);
            }
        }

        @keyframes aurora-pulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
            }
        }

        @keyframes aurora-ring {
            0% { 
                transform: scale(0.8);
                opacity: 1;
            }
            100% { 
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes badge-shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Header con animación */
        .aurora-header-icon {
            animation: aurora-pulse 2s ease-in-out infinite;
        }

        .aurora-title {
            background: linear-gradient(135deg, var(--emerald-primary), var(--emerald-light), var(--emerald-primary));
            background-size: 200% 200%;
            animation: gradient-flow 3s ease infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Inputs Aurora */
        .aurora-input {
            background: rgba(255, 255, 255, 0.08);
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 12px;
            padding: 12px 16px;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .aurora-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .aurora-input:focus {
            outline: none;
            border-color: var(--emerald-primary);
            box-shadow: 
                0 0 0 3px rgba(34, 197, 94, 0.2),
                0 0 20px rgba(34, 197, 94, 0.1);
            background: rgba(255, 255, 255, 0.12);
        }

        .aurora-input:hover {
            border-color: rgba(34, 197, 94, 0.4);
            background: rgba(255, 255, 255, 0.1);
        }

        /* Labels Aurora */
        .aurora-label {
            color: var(--emerald-light);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
            display: block;
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.3);
        }

        /* Botones Aurora */
        .aurora-btn {
            background: linear-gradient(135deg, var(--emerald-primary), #10b981);
            color: white;
            font-weight: 600;
            padding: 12px 32px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 4px 15px rgba(34, 197, 94, 0.3),
                0 0 20px rgba(34, 197, 94, 0.1);
        }

        .aurora-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .aurora-btn:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 8px 25px rgba(34, 197, 94, 0.4),
                0 0 30px rgba(34, 197, 94, 0.2);
            background: linear-gradient(135deg, #10b981, var(--emerald-primary));
        }

        .aurora-btn:hover::before {
            left: 100%;
        }

        .aurora-btn:active {
            transform: translateY(0);
        }

        .aurora-btn-cancel {
            color: var(--emerald-light);
            font-weight: 500;
            margin-left: 20px;
            text-decoration: underline;
            transition: all 0.3s ease;
            position: relative;
        }

        .aurora-btn-cancel:hover {
            color: white;
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }

        /* Checkbox Aurora */
        .aurora-checkbox {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid var(--emerald-primary);
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .aurora-checkbox:checked {
            background: var(--emerald-primary);
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }

        .aurora-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        /* Select Aurora */
        .aurora-select {
            background: rgba(255, 255, 255, 0.08);
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 12px;
            padding: 12px 16px;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .aurora-select:focus {
            outline: none;
            border-color: var(--emerald-primary);
            box-shadow: 
                0 0 0 3px rgba(34, 197, 94, 0.2),
                0 0 20px rgba(34, 197, 94, 0.1);
        }

        .aurora-select option {
            background: #1f2937;
            color: white;
        }

        /* Animación de entrada */
        .animate-fadeInUp {
            animation: fadeInUp 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            0% { 
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            100% { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Mensajes de error */
        .error-message {
            color: var(--red-accent);
            font-size: 0.875rem;
            margin-top: 4px;
            text-shadow: 0 0 5px rgba(239, 68, 68, 0.3);
        }

        /* Grid responsivo mejorado */
        .aurora-grid {
            display: grid;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .aurora-grid-2 { grid-template-columns: repeat(2, 1fr); }
            .aurora-grid-3 { grid-template-columns: repeat(3, 1fr); }
        }

        /* Efectos adicionales */
        .aurora-form-section {
            margin-bottom: 32px;
        }

        .aurora-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.3), transparent);
            margin: 24px 0;
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-transparent backdrop-blur-sm border-b border-white/10 mb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center gap-4">
                    <div class="aurora-header-icon">
                        <svg class="w-10 h-10 text-emerald-400" fill="none" viewBox="0 0 24 24">
                            <defs>
                                <linearGradient id="headerGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#22c55e"/>
                                    <stop offset="50%" stop-color="#6ee7b7"/>
                                    <stop offset="100%" stop-color="#10b981"/>
                                </linearGradient>
                            </defs>
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" 
                                  stroke="url(#headerGradient)" 
                                  stroke-width="2.5" 
                                  stroke-linecap="round" 
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h1 class="aurora-title text-3xl font-bold">
                        Crear Nueva Tarifa
                    </h1>
                </div>
            </div>
        </header>

        <!-- Formulario Principal -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <div class="aurora-card rounded-2xl p-8 animate-fadeInUp">
<form action="{{ route('tarifas.store') }}" method="POST" class="space-y-8">
    @csrf
                    <!-- Sección: Información Básica -->
                    <div class="aurora-form-section">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-6 flex items-center gap-2">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                            Información Básica
                        </h3>
                        
                        <div class="aurora-grid aurora-grid-2">
                            <div>
                                <label for="salon_id" class="aurora-label">Salón</label>
                                <select name="salon_id" id="salon_id" class="aurora-select" required>
    <option value="">Seleccione un salón</option>
    @foreach($salones as $salon)
        <option value="{{ $salon->id }}">{{ $salon->nombre }}</option>
    @endforeach
</select>
                            </div>
                            
                            <div>
                                <label for="nombre" class="aurora-label">Nombre de la Tarifa</label>
                                <input type="text" 
                                       name="nombre" 
                                       id="nombre" 
                                       maxlength="100" 
                                       required 
                                       class="aurora-input"
                                       placeholder="Ej: Tarifa Corporativa 2025">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="tipo_evento" class="aurora-label">Tipo de Evento</label>
                            <input type="text" 
                                   name="tipo_evento" 
                                   id="tipo_evento" 
                                   maxlength="100" 
                                   class="aurora-input"
                                   placeholder="Ej: Conferencia, Boda, Cumpleaños">
                        </div>
                    </div>

                    <div class="aurora-divider"></div>

                    <!-- Sección: Precios -->
                    <div class="aurora-form-section">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-6 flex items-center gap-2">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                            Estructura de Precios
                        </h3>
                        
                        <div class="aurora-grid aurora-grid-3">
                            <div>
                                <label for="precio_por_hora" class="aurora-label">Precio por Hora</label>
                                <input type="number" 
                                       name="precio_por_hora" 
                                       id="precio_por_hora" 
                                       step="0.01" 
                                       min="0" 
                                       class="aurora-input"
                                       placeholder="0.00">
                            </div>
                            
                            <div>
                                <label for="precio_medio_dia" class="aurora-label">Precio Medio Día</label>
                                <input type="number" 
                                       name="precio_medio_dia" 
                                       id="precio_medio_dia" 
                                       step="0.01" 
                                       min="0" 
                                       class="aurora-input"
                                       placeholder="0.00">
                            </div>
                            
                            <div>
                                <label for="precio_dia_completo" class="aurora-label">Precio Día Completo</label>
                                <input type="number" 
                                       name="precio_dia_completo" 
                                       id="precio_dia_completo" 
                                       step="0.01" 
                                       min="0" 
                                       class="aurora-input"
                                       placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="aurora-divider"></div>

                    <!-- Sección: Vigencia -->
                    <div class="aurora-form-section">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-6 flex items-center gap-2">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                            Período de Vigencia
                        </h3>
                        
                        <div class="aurora-grid aurora-grid-2">
                            <div>
                                <label for="vigente_desde" class="aurora-label">Vigente Desde</label>
                                <input type="date" 
                                       name="vigente_desde" 
                                       id="vigente_desde" 
                                       required 
                                       class="aurora-input">
                            </div>
                            
                            <div>
                                <label for="vigente_hasta" class="aurora-label">Vigente Hasta</label>
                                <input type="date" 
                                       name="vigente_hasta" 
                                       id="vigente_hasta" 
                                       required 
                                       class="aurora-input">
                            </div>
                        </div>
                    </div>

                    <div class="aurora-divider"></div>

                    <!-- Sección: Configuración Adicional -->
                    <div class="aurora-form-section">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-6 flex items-center gap-2">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                            Configuración Adicional
                        </h3>
                        
                        <div class="aurora-grid aurora-grid-3">
                            <div>
                                <label for="horas_minimas" class="aurora-label">Horas Mínimas</label>
                                <input type="number" 
                                       name="horas_minimas" 
                                       id="horas_minimas" 
                                       min="1" 
                                       value="1" 
                                       required 
                                       class="aurora-input">
                            </div>
                            
                            <div>
                                <label for="recargo_fin_semana" class="aurora-label">Recargo Fin de Semana (%)</label>
                                <input type="number" 
                                       name="recargo_fin_semana" 
                                       id="recargo_fin_semana" 
                                       step="0.01" 
                                       min="0" 
                                       max="100" 
                                       value="0.00" 
                                       class="aurora-input">
                            </div>
                            
                            <div class="flex flex-col gap-4 justify-center">
                                <div class="flex items-center">
                                    <input type="checkbox" 
                                           name="aplica_fines_semana" 
                                           id="aplica_fines_semana" 
                                           value="1" 
                                           checked 
                                           class="aurora-checkbox">
                                    <label for="aplica_fines_semana" class="ml-3 text-emerald-200 font-medium">
                                        Aplica fines de semana
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input type="checkbox" 
                                           name="activa" 
                                           id="activa" 
                                           value="1" 
                                           checked 
                                           class="aurora-checkbox">
                                    <label for="activa" class="ml-3 text-emerald-200 font-semibold">
                                        Tarifa Activa
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="aurora-divider"></div>

                    <!-- Botones de Acción -->
                    <div class="flex items-center justify-between pt-6">
                        <div class="flex items-center">
                            <button type="submit" class="aurora-btn">
                                💎 Guardar Tarifa
                            </button>
                            <a href="{{ route('tarifas.index') }}" class="aurora-btn-cancel">
                                Cancelar
                            </a>
                        </div>
                        
                        <div class="text-sm text-emerald-300/70">
                            <span class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                                Sistema Aurora Eventos
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Efectos interactivos adicionales
        document.addEventListener('DOMContentLoaded', function() {
            // Animación de entrada escalonada para los inputs
            const inputs = document.querySelectorAll('.aurora-input, .aurora-select');
            inputs.forEach((input, index) => {
                input.style.animationDelay = `${index * 0.1}s`;
                input.classList.add('animate-fadeInUp');
            });

            // Validación en tiempo real con efectos visuales
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.style.borderColor = 'var(--emerald-primary)';
                    } else {
                        this.style.borderColor = 'rgba(255, 255, 255, 0.2)';
                    }
                });
            });

            // Efecto de ondas en el botón
            const submitBtn = document.querySelector('.aurora-btn');
            submitBtn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: aurora-ring 0.6s ease-out;
                    pointer-events: none;
                `;
                
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>

</body>
</html>