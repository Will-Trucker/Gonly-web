import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/login.css',
                'resources/css/app.css',
                'resources/img/logo-gonly-icon.png',
                'resources/img/avatar5.png',
                'resources/img/default-150x150.png'
            
            ],
            refresh: true,
        }),
    ],
});
