<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Aurora Background */
        .aurora-bg {
            background: linear-gradient(-45deg, 
                #0f172a, #1e293b, #134e4a, #064e3b, 
                #22c55e, #10b981, #059669,
                #1e293b, #0f172a);
            background-size: 400% 400%;
            animation: aurora-flow 20s ease-in-out infinite;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -10;
        }

        .aurora-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at center, transparent 0%, rgba(6, 78, 59, 0.3) 50%, rgba(10, 15, 28, 0.8) 100%);
            animation: aurora-radial 15s ease-in-out infinite alternate;
        }

        @keyframes aurora-flow {
            0%, 100% { background-position: 0% 50%; }
            25% { background-position: 100% 25%; }
            50% { background-position: 50% 100%; }
            75% { background-position: 25% 0%; }
        }

        @keyframes aurora-radial {
            0% { transform: scale(1) rotate(0deg); opacity: 0.8; }
            100% { transform: scale(1.1) rotate(180deg); opacity: 0.6; }
        }

        /* Floating Particles */
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
            width: 3px;
            height: 3px;
            background: linear-gradient(45deg, #22c55e, #10b981);
            border-radius: 50%;
            opacity: 0.7;
            animation: particle-float 15s linear infinite;
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }

        @keyframes particle-float {
            0% { 
                transform: translateY(100vh) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { 
                transform: translateY(-10vh) translateX(50px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Glass Card Effect */
        .glass-card {
            backdrop-filter: blur(25px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1),
                0 0 20px rgba(34, 197, 94, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(34, 197, 94, 0.4);
            box-shadow: 
                0 16px 64px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 30px rgba(34, 197, 94, 0.2);
        }

        /* Input Styling */
        .aurora-input {
            background: rgba(31, 41, 55, 0.8) !important;
            border: 1px solid rgba(34, 197, 94, 0.3) !important;
            color: #e5e7eb !important;
            transition: all 0.3s ease;
            border-radius: 0.75rem !important;
        }

        .aurora-input:focus {
            background: rgba(31, 41, 55, 0.9) !important;
            border: 1px solid #22c55e !important;
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3) !important;
            outline: none !important;
            transform: translateY(-1px);
        }

        .aurora-input::placeholder {
            color: rgba(156, 163, 175, 0.7) !important;
        }

        /* Button Styling */
        .aurora-btn {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 50%, #15803d 100%) !important;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none !important;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
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
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
        }

        /* Logo Animation */
        .logo-float {
            animation: logoFloat 4s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(1deg); }
        }

        /* Fade In Animations */
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

        .fade-in-delay-1 { animation-delay: 0.2s; }
        .fade-in-delay-2 { animation-delay: 0.4s; }
        .fade-in-delay-3 { animation-delay: 0.6s; }
        .fade-in-delay-4 { animation-delay: 0.8s; }

        /* Link Styling */
        .aurora-link {
            color: #86efac !important;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .aurora-link:hover {
            color: #22c55e !important;
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }

        /* Checkbox Styling */
        .aurora-checkbox:checked {
            background-color: #22c55e !important;
            border-color: #22c55e !important;
        }

        .aurora-checkbox:focus {
            ring-color: rgba(34, 197, 94, 0.5) !important;
            ring-offset-color: rgb(31 41 55) !important;
        }

        /* Glow Effect */
        .glow-effect {
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
            animation: glow-pulse 3s ease-in-out infinite alternate;
        }

        @keyframes glow-pulse {
            from { 
                box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
            }
            to { 
                box-shadow: 0 0 30px rgba(34, 197, 94, 0.5), 0 0 40px rgba(34, 197, 94, 0.2);
            }
        }

        /* Status Messages */
        .status-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #86efac;
        }

        /* Error Messages */
        .error-message {
            color: #fca5a5 !important;
        }
    </style>

    <!-- Background Effects -->
    <div class="aurora-bg"></div>
    
    <!-- Particles -->
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

    <!-- Main Content -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Logo y Título -->
            <div class="mb-8 text-center fade-in">
                <a href="/" class="inline-flex items-center logo-float">
                    <svg class="w-10 h-10 mr-3 glow-effect" viewBox="0 0 24 24" fill="none">
                        <defs>
                            <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#22c55e"/>
                                <stop offset="50%" style="stop-color:#10b981"/>
                                <stop offset="100%" style="stop-color:#059669"/>
                            </linearGradient>
                        </defs>
                        <path d="M12 2L13.09 8.26L19 7L14.74 12.5L21 14L13.59 16.41L16 22L12 18L8 22L10.41 16.41L3 14L9.26 12.5L5 7L10.91 8.26L12 2Z" 
                              fill="url(#logoGradient)" />
                        <circle cx="12" cy="12" r="3" fill="rgba(255,255,255,0.4)" />
                    </svg>
                    <span class="text-3xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400">
                        Eventos Aurora
                    </span>
                </a>
                <p class="mt-3 text-emerald-200/80 text-sm">
                    Sistema Administrativo - Acceso Interno
                </p>
            </div>

            <!-- Status Messages -->
            <x-auth-session-status class="mb-4 status-success rounded-lg p-3 text-center" :status="session('status')" />

            <!-- Login Card -->
            <div class="glass-card rounded-2xl p-8 fade-in fade-in-delay-1">
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-semibold text-white mb-2">Iniciar Sesión</h2>
                    <p class="text-emerald-200/70 text-sm">Ingresa tus credenciales para acceder al panel</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="fade-in fade-in-delay-2">
                        <x-input-label for="email" value="Correo Electrónico" class="text-emerald-200 font-medium mb-2 flex items-center" />
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            <x-text-input 
                                id="email" 
                                class="aurora-input block w-full pl-12 pr-4 py-3" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus 
                                autocomplete="username" 
                                placeholder="admin@eventosaurora.com"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 error-message" />
                    </div>

                    <!-- Password Field -->
                    <div class="fade-in fade-in-delay-3">
                        <x-input-label for="password" value="Contraseña" class="text-emerald-200 font-medium mb-2" />
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <x-text-input 
                                id="password" 
                                class="aurora-input block w-full pl-12 pr-4 py-3"
                                type="password"
                                name="password"
                                required 
                                autocomplete="current-password"
                                placeholder="Tu contraseña segura" 
                            />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 error-message" />
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex items-center justify-between fade-in fade-in-delay-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                class="aurora-checkbox rounded border-gray-600 bg-gray-700 text-emerald-500 shadow-sm focus:ring-emerald-400 focus:ring-offset-gray-800" 
                                name="remember"
                            >
                            <span class="ml-2 text-sm text-emerald-200/80">Recordarme</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="aurora-link text-sm hover:underline" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2 fade-in fade-in-delay-4">
                        <x-primary-button class="aurora-btn w-full flex items-center justify-center py-3 px-4 rounded-xl font-semibold text-white relative group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1-.43-1.563A6 6 0 1121.75 8.25Z" />
                            </svg>
                            Acceder al Panel
                        </x-primary-button>
                    </div>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="pt-4 text-center fade-in fade-in-delay-4">
                            <p class="text-sm text-emerald-200/70">
                                ¿Necesitas una cuenta de administrador?
                            </p>
                            <a href="{{ route('register') }}" class="aurora-link font-semibold text-sm inline-flex items-center mt-2 hover:underline">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Solicitar Registro
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Footer Info -->
            <div class="mt-6 text-center fade-in fade-in-delay-4">
                <p class="text-emerald-200/50 text-xs">
                    Sistema Administrativo Eventos Aurora v2.0
                </p>
                <div class="flex justify-center items-center mt-2 space-x-2">
                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-emerald-300/70 text-xs">Sistema Activo</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Crear partículas dinámicamente
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 2 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            
            // Variaciones de verde aurora
            const greenShades = [
                'linear-gradient(45deg, #22c55e, #10b981)',
                'linear-gradient(45deg, #34d399, #10b981)',
                'linear-gradient(45deg, #6ee7b7, #22c55e)',
                'linear-gradient(45deg, #86efac, #16a34a)'
            ];
            
            particle.style.background = greenShades[Math.floor(Math.random() * greenShades.length)];
            document.querySelector('.particles').appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 15000);
        }

        // Generar partículas cada 3 segundos
        setInterval(createParticle, 3000);

        // Efectos de input
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.aurora-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-1px)';
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

            // Burst inicial de partículas
            for (let i = 0; i < 5; i++) {
                setTimeout(createParticle, i * 200);
            }
        });
    </script>
</x-guest-layout>