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
            Crea tu cuenta para comenzar.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        {{-- Campo de Nombre --}}
        <div>
            <x-input-label for="name" value="Nombre Completo" class="dark:text-gray-300" />
            <x-text-input id="name" class="block mt-1 w-full dark:bg-slate-700 dark:border-slate-600 dark:text-gray-200 dark:placeholder-slate-400 focus:border-primary dark:focus:border-primary-light focus:ring-primary dark:focus:ring-primary-light" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu nombre completo"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Campo de Correo Electrónico --}}
        <div>
            <x-input-label for="email" value="Correo Electrónico" class="dark:text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full dark:bg-slate-700 dark:border-slate-600 dark:text-gray-200 dark:placeholder-slate-400 focus:border-primary dark:focus:border-primary-light focus:ring-primary dark:focus:ring-primary-light" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="tu@correo.com"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Campo de Contraseña --}}
        <div>
            <x-input-label for="password" value="Contraseña" class="dark:text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full dark:bg-slate-700 dark:border-slate-600 dark:text-gray-200 dark:placeholder-slate-400 focus:border-primary dark:focus:border-primary-light focus:ring-primary dark:focus:ring-primary-light"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Crea una contraseña segura" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Campo de Confirmar Contraseña --}}
        <div>
            <x-input-label for="password_confirmation" value="Confirmar Contraseña" class="dark:text-gray-300" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full dark:bg-slate-700 dark:border-slate-600 dark:text-gray-200 dark:placeholder-slate-400 focus:border-primary dark:focus:border-primary-light focus:ring-primary dark:focus:ring-primary-light"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Vuelve a escribir la contraseña" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Botón de Envío y Enlace de Iniciar Sesión --}}
        <div class="pt-2">
            <x-primary-button class="w-full flex items-center justify-center text-white font-semibold py-2.5 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 ease-in-out bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary/60 dark:focus:ring-offset-slate-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                Registrarse
            </x-primary-button>
        </div>
        
        <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            ¿Ya tienes una cuenta?
            <a class="font-medium text-primary hover:text-primary-dark dark:text-primary-light dark:hover:text-primary-dark underline" href="{{ route('login') }}">
                Inicia sesión aquí
            </a>
        </p>
    </form>
</x-guest-layout>