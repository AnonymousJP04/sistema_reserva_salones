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
            animation: particle-float 18s linear infinite;
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
        .fade-in-delay-5 { animation-delay: 1s; }

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

        /* Error Messages */
        .error-message {
            color: #fca5a5 !important;
        }

        /* Form Group Effects */
        .form-group {
            position: relative;
            transition: all 0.3s ease;
        }

        .form-group:hover {
            transform: scale(1.01);
        }

        /* Aurora Sparkles */
        .sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #22c55e;
            border-radius: 50%;
            opacity: 0;
            animation: sparkle 2s ease-in-out infinite;
        }

        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
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
                    Sistema Administrativo - Solicitud de Cuenta
                </p>
            </div>

            <!-- Register Card -->
            <div class="glass-card rounded-2xl p-8 fade-in fade-in-delay-1">
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-semibold text-white mb-2">Crear Cuenta Administrativa</h2>
                    <p class="text-emerald-200/70 text-sm">Completa el formulario para solicitar acceso al sistema</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group fade-in fade-in-delay-2">
                        <x-input-label for="name" value="Nombre Completo" class="text-emerald-200 font-medium mb-2" />
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <x-text-input 
                                id="name" 
                                class="aurora-input block w-full pl-12 pr-4 py-3" 
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required 
                                autofocus 
                                autocomplete="name" 
                                placeholder="Ingresa tu nombre completo"
                            />
                            <div class="sparkle" style="top: 10px; right: 15px; animation-delay: 0.5s;"></div>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2 error-message" />
                    </div>

                    <!-- Email Field -->
                    <div class="form-group fade-in fade-in-delay-3">
                        <x-input-label for="email" value="Correo Electrónico" class="text-emerald-200 font-medium mb-2" />
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
                                autocomplete="username" 
                                placeholder="admin@eventosaurora.com"
                            />
                            <div class="sparkle" style="top: 10px; right: 15px; animation-delay: 1s;"></div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 error-message" />
                    </div>

                    <!-- Password Field -->
                    <div class="form-group fade-in fade-in-delay-4">
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
                                autocomplete="new-password"
                                placeholder="Contraseña segura (mín. 8 caracteres)" 
                            />
                            <div class="sparkle" style="top: 10px; right: 15px; animation-delay: 1.5s;"></div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 error-message" />
                    </div>

                    <!-- Password Confirmation Field -->
                    <div class="form-group fade-in fade-in-delay-5">
                        <x-input-label for="password_confirmation" value="Confirmar Contraseña" class="text-emerald-200 font-medium mb-2" />
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <x-text-input 
                                id="password_confirmation" 
                                class="aurora-input block w-full pl-12 pr-4 py-3"
                                type="password"
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Repite la contraseña anterior" 
                            />
                            <div class="sparkle" style="top: 10px; right: 15px; animation-delay: 2s;"></div>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error-message" />
                    </div>

                    <!-- Security Notice -->
                    <div class="fade-in fade-in-delay-5">
                        <div class="bg-emerald-500/10 border border-emerald-400/30 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-emerald-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-emerald-200 font-medium text-sm mb-1">Acceso Seguro</h4>
                                    <p class="text-emerald-200/70 text-xs">
                                        Tu cuenta se creará inmediatamente. Después del registro, podrás 
                                        iniciar sesión con tus credenciales en el sistema administrativo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 fade-in fade-in-delay-5">
                        <x-primary-button class="aurora-btn w-full flex items-center justify-center py-3 px-4 rounded-xl font-semibold text-white relative group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0ZM3 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 019.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                            Crear Cuenta Administrativa
                        </x-primary-button>
                    </div>

                    <!-- Login Link -->
                    <div class="pt-4 text-center fade-in fade-in-delay-5">
                        <p class="text-sm text-emerald-200/70">
                            ¿Ya tienes una cuenta administrativa?
                        </p>
                        <a href="{{ route('login') }}" class="aurora-link font-semibold text-sm inline-flex items-center mt-2 hover:underline">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Iniciar Sesión
                        </a>
                    </div>
                </form>
            </div>

            <!-- Footer Info -->
            <div class="mt-6 text-center fade-in fade-in-delay-5">
                <p class="text-emerald-200/50 text-xs">
                    Sistema Administrativo Eventos Aurora v2.0
                </p>
                <div class="flex justify-center items-center mt-2 space-x-2">
                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-emerald-300/70 text-xs">Registro Seguro</span>
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
            particle.style.animationDuration = (Math.random() * 12 + 12) + 's';
            
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
            }, 18000);
        }

        // Generar partículas cada 3 segundos
        setInterval(createParticle, 3000);

        // Efectos de input mejorados
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.aurora-input');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-1px)';
                    this.parentElement.style.transform = 'scale(1.02)';
                    
                    // Crear sparkles en focus
                    createSparkles(this.parentElement);
                });
                
                input.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                    this.parentElement.style.transform = 'scale(1)';
                });

                // Validación en tiempo real
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = '#22c55e';
                        this.style.boxShadow = '0 0 15px rgba(34, 197, 94, 0.2)';
                    } else {
                        this.style.borderColor = 'rgba(34, 197, 94, 0.3)';
                        this.style.boxShadow = 'none';
                    }
                });
            });

            // Burst inicial de partículas
            for (let i = 0; i < 6; i++) {
                setTimeout(createParticle, i * 200);
            }
        });

        // Crear sparkles en elementos
        function createSparkles(container) {
            for (let i = 0; i < 3; i++) {
                setTimeout(() => {
                    const sparkle = document.createElement('div');
                    sparkle.className = 'sparkle';
                    sparkle.style.top = Math.random() * 40 + 'px';
                    sparkle.style.right = Math.random() * 40 + 10 + 'px';
                    sparkle.style.animationDelay = Math.random() * 1 + 's';
                    container.appendChild(sparkle);
                    
                    setTimeout(() => {
                        sparkle.remove();
                    }, 2000);
                }, i * 100);
            }
        }

        // Validación de contraseñas
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');

        function validatePasswords() {
            if (password.value && confirmPassword.value) {
                if (password.value === confirmPassword.value) {
                    confirmPassword.style.borderColor = '#22c55e';
                    confirmPassword.style.boxShadow = '0 0 15px rgba(34, 197, 94, 0.3)';
                } else {
                    confirmPassword.style.borderColor = '#ef4444';
                    confirmPassword.style.boxShadow = '0 0 15px rgba(239, 68, 68, 0.3)';
                }
            }
        }

        if (password && confirmPassword) {
            password.addEventListener('input', validatePasswords);
            confirmPassword.addEventListener('input', validatePasswords);
        }
    </script>
</x-guest-layout>