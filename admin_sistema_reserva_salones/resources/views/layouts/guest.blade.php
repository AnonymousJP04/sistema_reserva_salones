<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .aurora-bg {
                position: fixed;
                top: 0; left: 0;
                width: 100vw; height: 100vh;
                z-index: -10;
                background: linear-gradient(-45deg, #1e293b, #0f172a, #134e4a, #22c55e, #10b981, #818cf8, #a21caf, #1e293b, #06b6d4, #22d3ee, #059669, #a7f3d0, #1e293b);
                background-size: 1200% 1200%;
                animation: aurora 30s ease-in-out infinite;
            }
            @keyframes aurora {
                0% { background-position: 0% 50%; }
                20% { background-position: 100% 50%; }
                40% { background-position: 50% 100%; }
                60% { background-position: 0% 50%; }
                80% { background-position: 100% 0%; }
                100% { background-position: 0% 50%; }
            }
            .particles {
                position: fixed;
                top: 0; left: 0;
                width: 100vw; height: 100vh;
                pointer-events: none;
                z-index: -5;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="aurora-bg"></div>
        <canvas class="particles"></canvas>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
            <div>
                <a href="/">
                    <x-application-logo class="w-24 h-24 text-emerald-300 drop-shadow-lg" />
                </a>
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white/30 dark:bg-gray-900/40 backdrop-blur-md shadow-xl overflow-hidden sm:rounded-2xl border border-emerald-300/20">
                {{ $slot }}
            </div>
        </div>
        <script>
            // Partículas aurora
            const canvas = document.createElement('canvas');
            canvas.className = 'particles';
            document.body.appendChild(canvas);
            const ctx = canvas.getContext('2d');
            let particles = [];
            const colors = [
                '#22c55e', '#10b981', '#059669', '#818cf8', '#a21caf', '#06b6d4', '#22d3ee', '#a7f3d0', '#f472b6', '#facc15'
            ];
            function resize() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
            window.addEventListener('resize', resize);
            resize();

            function Particle() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.radius = Math.random() * 2 + 1;
                this.color = colors[Math.floor(Math.random() * colors.length)];
                this.speedX = (Math.random() - 0.5) * 0.5;
                this.speedY = (Math.random() - 0.5) * 0.5;
                this.alpha = Math.random() * 0.5 + 0.3;
            }
            Particle.prototype.draw = function() {
                ctx.save();
                ctx.globalAlpha = this.alpha;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.shadowColor = this.color;
                ctx.shadowBlur = 10;
                ctx.fill();
                ctx.restore();
            }
            Particle.prototype.update = function() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
            }
            function animateParticles() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                for (let p of particles) {
                    p.update();
                    p.draw();
                }
                requestAnimationFrame(animateParticles);
            }
            function initParticles() {
                particles = [];
                for (let i = 0; i < 60; i++) {
                    particles.push(new Particle());
                }
            }
            initParticles();
            animateParticles();
        </script>
    </body>
</html>