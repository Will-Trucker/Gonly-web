import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/home-css/welcome.css',
                'resources/js/app.js',
                'resources/js/welcome.js',
                'resources/css/login.css',
                'resources/img/logo-gonly-icon.png',
                'resources/img/avatar5.png',
                
            ],
            refresh: true,
        }),
    ],
});
