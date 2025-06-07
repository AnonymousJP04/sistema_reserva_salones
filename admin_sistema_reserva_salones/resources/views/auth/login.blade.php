<x-guest-layout>
    {{-- Logo o Nombre del Sistema --}}
    <div class="mb-8 text-center">
        <a href="/" class="inline-flex items-center">
            {{-- New Icon --}}
            <svg class="w-10 h-10 text-primary dark:text-primary-light mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01"/>
            </svg>
            <span class="text-3xl font-bold text-gray-800 dark:text-gray-200">InvControl Pro</span>
        </a>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Accede a tu cuenta para gestionar el inventario.
        </p>
    </div>
    {{-- Estado de la Sesión (ej. para reseteo de contraseña) --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        {{-- Campo de Correo Electrónico --}}
        <div>
            <x-input-label for="email" value="Correo Electrónico" class="dark:text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400 focus:border-primary dark:focus:border-primary-light focus:ring-primary dark:focus:ring-primary-light" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tu@correo.com"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Campo de Contraseña --}}
        <div>
            <x-input-label for="password" value="Contraseña" class="dark:text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400 focus:border-primary dark:focus:border-primary-light focus:ring-primary dark:focus:ring-primary-light"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Tu contraseña" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Casilla de "Recordarme" y Enlace de "Olvidé mi contraseña" --}}
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-600 text-primary shadow-sm focus:ring-primary dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary-light rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        {{-- Botón de Envío y Enlace de Registro --}}
        <div class="pt-2">
            <x-primary-button class="w-full flex items-center justify-center bg-primary hover:bg-primary-dark focus:bg-primary-dark active:bg-primary-darker dark:bg-primary dark:hover:bg-primary-light dark:focus:bg-primary-light">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
                Iniciar Sesión
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}" class="font-medium text-primary hover:text-primary-dark dark:text-primary-light dark:hover:text-primary underline">
                    Regístrate aquí
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
