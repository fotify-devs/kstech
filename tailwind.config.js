import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    light: '#3b82f6',
                    DEFAULT: '#2563eb',
                    dark: '#1d4ed8'
                }
            },
            transitionProperty: {
                'colors': 'background-color, border-color, color, fill, stroke'
            }
        },
    },

    plugins: [forms],
};
