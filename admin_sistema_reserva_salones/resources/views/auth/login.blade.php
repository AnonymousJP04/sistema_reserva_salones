<x-guest-layout>
    <style>
        /* Custom Aurora Green Colors */
        :root {
            --aurora-primary: #00ff88;
            --aurora-secondary: #00cc6a;
            --aurora-light: #4dffa6;
            --aurora-dark: #00b359;
            --aurora-glow: rgba(0, 255, 136, 0.3);
            --aurora-bg: rgba(0, 255, 136, 0.1);
        }

        /* Aurora Background Animation */
        .aurora-bg {
            background: linear-gradient(135deg, 
                rgba(0, 20, 40, 0.95) 0%,
                rgba(0, 40, 60, 0.9) 25%,
                rgba(0, 60, 80, 0.95) 50%,
                rgba(0, 40, 60, 0.9) 75%,
                rgba(0, 20, 40, 0.95) 100%);
            position: relative;
            overflow: hidden;
        }

        .aurora-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, 
                transparent 0%,
                var(--aurora-bg) 25%,
                rgba(0, 255, 136, 0.15) 50%,
                var(--aurora-bg) 75%,
                transparent 100%);
            animation: aurora-shift 8s ease-in-out infinite;
        }

        @keyframes aurora-shift {
            0%, 100% { 
                background: linear-gradient(45deg, 
                    transparent 0%,
                    var(--aurora-bg) 25%,
                    rgba(0, 255, 136, 0.15) 50%,
                    var(--aurora-bg) 75%,
                    transparent 100%);
            }
            33% { 
                background: linear-gradient(135deg, 
                    var(--aurora-bg) 0%,
                    rgba(0, 255, 136, 0.2) 25%,
                    transparent 50%,
                    var(--aurora-bg) 75%,
                    rgba(0, 255, 136, 0.15) 100%);
            }
            66% { 
                background: linear-gradient(225deg, 
                    rgba(0, 255, 136, 0.15) 0%,
                    transparent 25%,
                    var(--aurora-bg) 50%,
                    rgba(0, 255, 136, 0.2) 75%,
                    var(--aurora-bg) 100%);
            }
        }

        /* Floating Aurora Particles */
        .aurora-particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            background: var(--aurora-primary);
            box-shadow: 0 0 20px var(--aurora-glow);
            animation: float-aurora 6s ease-in-out infinite;
        }

        @keyframes float-aurora {
            0%, 100% { 
                opacity: 0;
                transform: translateY(100vh) scale(0);
            }
            10% { 
                opacity: 0.8;
            }
            90% { 
                opacity: 0.8;
            }
            100% { 
                opacity: 0;
                transform: translateY(-100px) scale(1);
            }
        }

        /* Aurora Wave Effect */
        .aurora-wave {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, 
                transparent 0%,
                rgba(0, 255, 136, 0.2) 25%,
                rgba(0, 255, 136, 0.4) 50%,
                rgba(0, 255, 136, 0.2) 75%,
                transparent 100%);
            transform: translateX(-100%);
            animation: aurora-wave 6s ease-in-out infinite;
        }

        @keyframes aurora-wave {
            0% { transform: translateX(-100%) skewX(-15deg); }
            50% { transform: translateX(100%) skewX(15deg); }
            100% { transform: translateX(-100%) skewX(-15deg); }
        }

        /* Glowing Effects */
        .glow-aurora {
            box-shadow: 
                0 0 20px var(--aurora-glow),
                0 0 40px rgba(0, 255, 136, 0.2),
                0 0 60px rgba(0, 255, 136, 0.1);
            animation: glow-pulse 3s ease-in-out infinite alternate;
        }

        @keyframes glow-pulse {
            from { 
                box-shadow: 
                    0 0 20px var(--aurora-glow),
                    0 0 40px rgba(0, 255, 136, 0.2),
                    0 0 60px rgba(0, 255, 136, 0.1);
            }
            to { 
                box-shadow: 
                    0 0 30px rgba(0, 255, 136, 0.5),
                    0 0 60px rgba(0, 255, 136, 0.4),
                    0 0 90px rgba(0, 255, 136, 0.3);
            }
        }

        /* Card Styling */
        .aurora-card {
            backdrop-filter: blur(20px);
            background: rgba(17, 24, 39, 0.85);
            border: 1px solid rgba(0, 255, 136, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .aurora-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent 0%,
                var(--aurora-primary) 50%,
                transparent 100%);
            animation: card-glow 3s ease-in-out infinite;
        }

        @keyframes card-glow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        .aurora-card:hover {
            background: rgba(17, 24, 39, 0.9);
            border: 1px solid rgba(0, 255, 136, 0.5);
            transform: translateY(-5px);
        }

        /* Input Styling */
        .aurora-input {
            background: rgba(31, 41, 55, 0.8) !important;
            border: 1px solid rgba(0, 255, 136, 0.3) !important;
            color: #e5e7eb !important;
            transition: all 0.3s ease;
        }

        .aurora-input:focus {
            background: rgba(31, 41, 55, 0.9) !important;
            border: 1px solid var(--aurora-primary) !important;
            box-shadow: 0 0 20px var(--aurora-glow) !important;
            outline: none !important;
            ring: none !important;
        }

        .aurora-input::placeholder {
            color: rgba(156, 163, 175, 0.7) !important;
        }

        /* Button Styling */
        .aurora-btn {
            background: linear-gradient(135deg, 
                var(--aurora-primary) 0%,
                var(--aurora-secondary) 50%,
                var(--aurora-dark) 100%) !important;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none !important;
        }

        .aurora-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent 0%,
                rgba(255, 255, 255, 0.3) 50%,
                transparent 100%);
            transition: left 0.5s ease;
        }

        .aurora-btn:hover::before {
            left: 100%;
        }

        .aurora-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px var(--aurora-glow);
        }

        /* Logo Animation */
        .logo-float {
            animation: logoFloat 6s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(1deg); }
            66% { transform: translateY(5px) rotate(-0.5deg); }
        }

        /* Fade In Animation */
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-delay-1 { animation-delay: 0.2s; }
        .fade-in-delay-2 { animation-delay: 0.4s; }
        .fade-in-delay-3 { animation-delay: 0.6s; }
        .fade-in-delay-4 { animation-delay: 0.8s; }

        /* Stars */
        .stars {
            position: absolute;
            width: 2px;
            height: 2px;
            background: var(--aurora-light);
            border-radius: 50%;
            animation: twinkle 4s ease-in-out infinite;
            box-shadow: 0 0 10px var(--aurora-glow);
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.5); }
        }

        /* Link Styling */
        .aurora-link {
            color: var(--aurora-light) !important;
            transition: color 0.3s ease;
        }

        .aurora-link:hover {
            color: var(--aurora-primary) !important;
            text-shadow: 0 0 10px var(--aurora-glow);
        }

        /* Checkbox Styling */
        .aurora-checkbox:checked {
            background-color: var(--aurora-primary) !important;
            border-color: var(--aurora-primary) !important;
        }

        .aurora-checkbox:focus {
            ring-color: var(--aurora-glow) !important;
            ring-offset-color: rgb(31 41 55) !important;
        }
    </style>

    <!-- Background Effects -->
    <div class="fixed inset-0 aurora-bg">
        <div class="aurora-wave"></div>
        
        <!-- Stars -->
        <div class="stars" style="top: 10%; left: 15%; animation-delay: 0s;"></div>
        <div class="stars" style="top: 20%; left: 80%; animation-delay: 1s;"></div>
        <div class="stars" style="top: 30%; left: 40%; animation-delay: 2s;"></div>
        <div class="stars" style="top: 60%; left: 20%; animation-delay: 1.5s;"></div>
        <div class="stars" style="top: 70%; left: 90%; animation-delay: 0.5s;"></div>
        <div class="stars" style="top: 80%; left: 60%; animation-delay: 2.5s;"></div>
        <div class="stars" style="top: 15%; left: 70%; animation-delay: 3s;"></div>
        <div class="stars" style="top: 45%; left: 85%; animation-delay: 1.8s;"></div>
        
        <!-- Particles Container -->
        <div id="particles-container" class="absolute inset-0 pointer-events-none"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            {{-- Logo o Nombre del Sistema --}}
            <div class="mb-8 text-center fade-in opacity-0">
                <a href="/" class="inline-flex items-center logo-float">
                    {{-- Aurora Icon --}}
                    <svg class="w-10 h-10 mr-2 glow-aurora" style="color: var(--aurora-primary);" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01"/>
                    </svg>
                    <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-300 via-green-400 to-green-500">
                        InvControl Pro
                    </span>
                </a>
                <p class="mt-2 text-sm text-gray-300">
                    Accede a tu cuenta para gestionar el inventario.
                </p>
            </div>

            {{-- Estado de la Sesión --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Login Card --}}
            <div class="aurora-card rounded-2xl p-8 glow-aurora fade-in fade-in-delay-1 opacity-0">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    {{-- Campo de Correo Electrónico --}}
                    <div class="fade-in fade-in-delay-2 opacity-0">
                        <x-input-label for="email" value="Correo Electrónico" class="text-gray-300 font-medium mb-2" />
                        <x-text-input 
                            id="email" 
                            class="aurora-input block mt-1 w-full px-4 py-3 rounded-lg" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            placeholder="tu@correo.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Campo de Contraseña --}}
                    <div class="fade-in fade-in-delay-3 opacity-0">
                        <x-input-label for="password" value="Contraseña" class="text-gray-300 font-medium mb-2" />
                        <x-text-input 
                            id="password" 
                            class="aurora-input block mt-1 w-full px-4 py-3 rounded-lg"
                            type="password"
                            name="password"
                            required 
                            autocomplete="current-password"
                            placeholder="Tu contraseña" 
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Casilla de "Recordarme" y Enlace de "Olvidé mi contraseña" --}}
                    <div class="flex items-center justify-between fade-in fade-in-delay-4 opacity-0">
                        <label for="remember_me" class="inline-flex items-center">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                class="aurora-checkbox rounded border-gray-600 bg-gray-700 text-green-400 shadow-sm focus:ring-green-400 focus:ring-offset-gray-800" 
                                name="remember"
                            >
                            <span class="ml-2 text-sm text-gray-400">Recordarme</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="aurora-link text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    {{-- Botón de Envío --}}
                    <div class="pt-2 fade-in fade-in-delay-4 opacity-0">
                        <x-primary-button class="aurora-btn w-full flex items-center justify-center py-3 px-4 rounded-lg font-medium text-white relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                            </svg>
                            Iniciar Sesión
                        </x-primary-button>
                    </div>

                    {{-- Enlace de Registro --}}
                    @if (Route::has('register'))
                        <p class="mt-6 text-center text-sm text-gray-400 fade-in fade-in-delay-4 opacity-0">
                            ¿No tienes una cuenta?
                            <a href="{{ route('register') }}" class="aurora-link font-medium">
                                Regístrate aquí
                            </a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script>
        // Aurora Particles Generator
        function createAuroraParticle() {
            const particle = document.createElement('div');
            particle.className = 'aurora-particle';
            
            // Random size and position
            const size = Math.random() * 6 + 3;
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            particle.style.left = Math.random() * window.innerWidth + 'px';
            
            // Green aurora variations
            const greenVariations = [
                'rgba(0, 255, 136, 0.8)',
                'rgba(0, 204, 106, 0.7)',
                'rgba(77, 255, 166, 0.6)',
                'rgba(0, 179, 89, 0.8)',
                'rgba(102, 255, 179, 0.7)'
            ];
            
            const selectedColor = greenVariations[Math.floor(Math.random() * greenVariations.length)];
            particle.style.background = selectedColor;
            particle.style.boxShadow = `0 0 20px ${selectedColor}`;
            
            // Random animation duration
            particle.style.animationDuration = (Math.random() * 4 + 6) + 's';
            particle.style.animationDelay = Math.random() * 2 + 's';
            
            document.getElementById('particles-container').appendChild(particle);
            
            // Remove particle after animation
            setTimeout(() => {
                if (particle.parentNode) {
                    particle.parentNode.removeChild(particle);
                }
            }, 10000);
        }

        // Generate particles continuously
        setInterval(createAuroraParticle, 1000);

        // Input focus effects
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.aurora-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.style.transform = 'scale(1)';
                });
            });

            // Initial particle burst
            for (let i = 0; i < 3; i++) {
                setTimeout(createAuroraParticle, i * 300);
            }
        });
    </script>
</x-guest-layout>