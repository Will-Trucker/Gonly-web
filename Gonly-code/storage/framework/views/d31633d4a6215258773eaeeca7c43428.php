<?php $__env->startSection('link-css-js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/home/dashboard.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js',  'resources/css/layouts-css/footer-users.css']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Welcome'); ?>
    Panel | Gonly
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-everyone'); ?>
    <?php echo $__env->make('layouts.nav-users-loged', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <div class="welcome-user" style="background-image: url(<?php echo e(Vite::asset('resources/img/Decoration/welcome-user.jpg')); ?>)">
            <h1>Bienvenido <?php echo e(Auth::user()->name); ?></h1>
            <p>Da un vistazo de las posibilidades que tienes con Gonly, para compra y venta, adelante!</p>
        </div>
        <section class="grid-containers-balanced">
            <div>
                <section style="background-image: url(<?php echo e(Vite::asset('resources/img/Decoration/productos.jpg')); ?>)">
                    <h1>Tus compras</h1>
                    <p>Aquí se verán en general tus compras realizadas en Gonly!</p>
                </section>
                <article>
                    <img src="<?php echo e(Vite::asset('resources/img/Decoration/no-sell.jpg')); ?>">
                    <p>Por el momento no tienes ningún registro de compra ligada a este usuario, puedes ver todo especial para ti, <a style="text-decoration: underline;" href="<?php echo e(route('welcome')); ?>">haz clic aquí.</a></p>
                </article>
            </div>
            <div>
                <section style="background-image: url(<?php echo e(Vite::asset('resources/img/Decoration/ventas.jpg')); ?>)">
                    <h1>Tus ingresos</h1>
                    <p>Aquí se verán en general tus ventas dentro de Gonly en Gonly!</p>
                </section>
                <article>
                    <img src="<?php echo e(Vite::asset('resources/img/Decoration/no-buy.png')); ?>">
                    <p>Por el momento no tienes ningún registro de venta ligada a este usuario, pero puedes vender productos, <a style="text-decoration: underline;" href="<?php echo e(route('welcome')); ?>">haz clic aquí.</a></p>
                </article>
            </div>
            <div>
                <section style="background-image: url(<?php echo e(Vite::asset('resources/img/Decoration/publicaciones.jpg')); ?>)">
                    <h1>Tus publicaciones</h1>
                    <p>Aquí se visualizarán los productos a vender que has publicado dentro de Gonly!</p>
                </section>
                <article>
                    <img src="<?php echo e(Vite::asset('resources/img/Decoration/nosearch-publish.png')); ?>">
                    <p>Por el momento no tienes ningún registro de publicación de algún producto ligado a este usuario, pero puedes vender, <a style="text-decoration: underline;" href="<?php echo e(route('products.create')); ?>">haz clic aquí.</a></p>
                </article>
            </div>
        </section>
    </main>

    <?php echo $__env->make('layouts.footer-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.head-pretm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/dashboard.blade.php ENDPATH**/ ?>