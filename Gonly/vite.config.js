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
                'resources/css/auth/login.css',
                'resources/css/login.css',
                'resources/img/Logos/logo-gonly-icon.png',
                'resources/img/default-150x150.png',
                'resources/img/avatar5.png',
                'resources/css/carrito.css',
                'resources/css/home/categories.css', 
                'resources/css/layouts-css/nav-guest.css',
                'resources/css/layouts-css/footer-users.css', 
                'resources/img/icongonly.png',
                'resources/img/Decoration/ilustration-removebg-preview.png',
                'resources/css/card-products/style.css',
                'resources/css//card-products/product-view.css',
                'resources/img/index.js',
                'resources/img/2.jpg',
                'resources/img/1.jpg'
  
            ],
            refresh: true,
        }),
    ],
});
