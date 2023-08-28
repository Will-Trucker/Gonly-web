<?php $__env->startSection('link-css-js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/auth/verify-email.css']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Welcome'); ?>
    Verificación | Gonly
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-everyone'); ?>
<body style="background-image: url( <?php echo e(Vite::Asset('resources/img/decoration/scattered.svg')); ?>  )">
    <div class="principal-container">

        <section>
            <img src="<?php echo e(Vite::Asset('resources/img/Logos/logo-gonly-icon.png')); ?>" alt="">
            <h1>Verificación de correo electrónico</h1>
        </section>

        <div class="text-information">
            <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

        </div>
    
        <?php if(session('status') == 'verification-link-sent'): ?>
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                <?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?>

            </div>
        <?php endif; ?>
    
        <div class="container-buttons">
            <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                <?php echo csrf_field(); ?>
    
                <div>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php echo e(__('Resend Verification Email')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                </div>
            </form>
    
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    <?php echo e(__('Log Out')); ?>

                </button>
            </form>
        </div>  
    </div>
</body>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head-pretm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>