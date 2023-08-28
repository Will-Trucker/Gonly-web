import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/css/home/welcome.css',
        './resources/css/auth/forgot-password.css',
        './resources/views/welcome.blade.php',
        './resources/views/authforgot-password.blade.php',
    ],

    plugins: [
        require('flowbite/plugin')
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Fredoka', ...defaultTheme.fontFamily.sans],
            },
        },
    },
};



