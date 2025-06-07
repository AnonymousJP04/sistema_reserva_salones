import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Nota: En tu welcome.blade.php usas 'Instrument Sans'.
                // Aquí tienes 'Figtree'. Asegúrate de que la fuente que quieres usar esté configurada aquí
                // y que la estés importando correctamente (ej. en app.css o tu layout principal).
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                // Si quieres usar 'Instrument Sans' como fuente principal para 'sans':
                // sans: ['Instrument Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: { // <--- AÑADE ESTA SECCIÓN
                primary: {
                    light: '#3b82f6', // Azul claro (equivalente a blue-500)
                    DEFAULT: '#2563eb', // Azul principal (equivalente a blue-600)
                    dark: '#1d4ed8',   // Azul oscuro (equivalente a blue-700)
                },
                // Aquí podrías añadir más colores personalizados si los necesitas
                // secondary: {
                //     light: '#fde047',
                //     DEFAULT: '#facc15',
                //     dark: '#eab308',
                // }
            }
        },
    },

    plugins: [forms],
};