

<?php $__env->startSection('link-css-js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/user/products-create.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js', 'resources/css/layouts-css/footer-users.css']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Welcome'); ?>
    Productos | Gonly
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-everyone'); ?>
    <?php echo $__env->make('layouts.nav-users-loged', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <div class="welcome-user" style="background-image: url(<?php echo e(Vite::asset('resources/img/Decoration/create-products.jpg')); ?>)">
            <h1>Mis publicaciones</h1>
            <p>Aquí se enlistan todos tus productos publicados para ventas dentro de Gonly!</p>
        </div>
        <a href="<?php echo e(route('products.create')); ?>">
            <article>
                <i class="fa-solid fa-circle-plus"></i>
                <h1>Agregar producto para tu venta!</h1>
                <p>Agrega un nuevo producto para vender y sumérgete en las oportunidades que Gonly te da!</p>
            </article>
        </a>

        <?php if(Session::has('message')): ?>
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <i class="fa-solid fa-check" style="margin: 0px 10px 0px 15px"></i>
                <span class="sr-only">Info</span>
                <div>
                    <span class="text-lg"><?php echo e(Session::get('message')); ?></span>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if( $products->isEmpty() ): ?>
            <section class="not-registers">        
                <img src="<?php echo e(Vite::asset('resources/img/Decoration/nosearch-publish.png')); ?>" alt="">
                <h1>No se han encontrado productos a vender relacionados con esta cuenta</h1>
            </section> 
        <?php else: ?>
        <section>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productsUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <h1><?php echo e($productsUser->tittle); ?></h1>
                    
                <aside class="contenedor">
                    <h5><?php echo e($productsUser->description); ?></h5>
                </aside>

                

                <h2>$ <?php echo e($productsUser->price); ?></h2>
                
                <picture><img src="<?php echo e(asset('storage').'/'.$productsUser->photos); ?>" alt=""></picture>

                <button onclick="window.location.href='<?php echo e(route('additional-view', ['id' => $productsUser->id])); ?>'" class="learn-more">
                    <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Más detalles</span>
                </button>

                

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
        <?php endif; ?>

        <?php echo $products->links(); ?>

    </main>

    <?php echo $__env->make('layouts.footer-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head-pretm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/user/products-view.blade.php ENDPATH**/ ?>