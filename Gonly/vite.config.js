import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
<<<<<<< HEAD
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/login.css',
                'resources/css/app.css',
                'resources/img/logo-gonly-icon.png',
                'resources/img/avatar5.png',
                'resources/img/default-150x150.png'
            
=======
                'resources/css/app.css',
                'resources/css/home-css/welcome.css',
                'resources/js/app.js',
                'resources/js/welcome.js',
                'resources/css/auth/login.css',
>>>>>>> 0c2391a7cf3ac030aad21ac643b278333407d552
            ],
            refresh: true,
        }),
    ],
});
