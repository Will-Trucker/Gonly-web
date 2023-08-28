

<?php $__env->startSection('link-css-js'); ?>

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>    
    <?php echo app('Illuminate\Foundation\Vite')([ 'resources/css/user/upload-more-images-product.css', 'resources/css/user/form-products.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js', 'resources/css/layouts-css/footer-users.css', 'resources/js/options-product.js']); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">    <?php $__env->stopSection(); ?>

<?php $__env->startSection('Welcome'); ?>
    Más imágenes | Gonly
<?php $__env->stopSection(); ?>

<?php
    $product = \App\Models\Products::find(request()->id); // Obtén el producto según el ID en la URL
?>


<?php $__env->startSection('content-everyone'); ?>
    <?php echo $__env->make('layouts.nav-users-loged', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="form-images-upload">
        <div class="form-logo">
            <img src="<?php echo e(Vite::Asset('resources/img/Logos/logo-gonly-icon.png')); ?>" alt="">
            <h1>Añadir más imágenes</h1>
        </div>
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Cuidado!</span> Una vez que ingrese las imágenes, no podrá cambiarlas ni borrarlas
            </div>
        </div>
        <form action="<?php echo e(route('moreimg.store', ['id' => $product->id])); ?>" method="POST" class="dropzone" id="my-great-dropzone" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

        </form>
    </div>
    <?php echo $__env->make('layouts.footer-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php $__env->stopSection(); ?>

    
<script>
    Dropzone.options.myGreatDropzone = {
        maxFiles: 5,
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<?php echo $__env->make('layouts.head-pretm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/user/more-images-product.blade.php ENDPATH**/ ?>