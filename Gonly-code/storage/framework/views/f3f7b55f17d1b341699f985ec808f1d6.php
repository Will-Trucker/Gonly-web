

<?php $__env->startSection('link-css-js'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/user/form-products.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js', 'resources/css/layouts-css/footer-users.css']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Welcome'); ?>
    Crear productos | Gonly
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-everyone'); ?>
    <?php echo $__env->make('layouts.nav-users-loged', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        
            <?php echo e(method_field('PATCH')); ?>

            <?php echo $__env->make('layouts.form-user-products', ['nameLook' => 'Edición de producto', 'actionForm' => url('/products/'.$products->id), 'methodForm' => method_field('PATCH'), 'submitForm' => 'Guardar cambios' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </main>

    <?php echo $__env->make('layouts.footer-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head-pretm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/user/product-edit.blade.php ENDPATH**/ ?>