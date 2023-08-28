    <header>
        <nav>
            <div class="logo-image">
                <a href="<?php echo e(route('welcome')); ?>"><img class="logo-gonly-black-letters" src="<?php echo e(Vite::asset('resources/img/Logos/logo-gonly-black-letters.png')); ?>"></a>
            </div>

            <form action="">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="search" class="search hover:outline-none" name="search-products" placeholder="<?php echo e(__('Search product')); ?>">
              <input type="submit" class="submit" value="<?php echo e(__('Search')); ?>">
            </form>       
            
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.translateSwicht','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('translateSwicht'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

            <div class="container__user-status">
                <svg viewBox="0 0 36 36" fill="none" role="img" xmlns="http://www.w3.org/2000/svg" width="80" height="80"><mask id=":r2f:" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" rx="72" fill="#FFFFFF"></rect></mask><g mask="url(#:r2f:)"><rect width="36" height="36" fill="#ff005b"></rect><rect x="0" y="0" width="36" height="36" transform="translate(8 8) rotate(214 18 18) scale(1.1)" fill="#ffb238" rx="6"></rect><g transform="translate(4 4) rotate(-4 18 18)"><path d="M13,20 a1,0.75 0 0,0 10,0" fill="#000000"></path><rect x="10" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect><rect x="24" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect></g></g></svg>
                <h3>
                  <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                    <?php echo e(Auth::user()->name); ?>

                    <?php else: ?>
                       Gonly - naitor
                    <?php endif; ?>
                    <?php endif; ?>
                </h3>
                <a href="<?php echo e(route('profile.edit')); ?>" class="fa-solid fa-gear"></a>
            </div>

        </nav>
        <section>
            <ul>
                <a href="<?php echo e(route('categories')); ?>"><li><i class="fa-solid fa-cubes-stacked"></i><?php echo e(__('Categories')); ?></li></a>
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                    <a href="#"><li><i class="fa-solid fa-cart-shopping"></i>Carrito</li></a>
                    <a href="<?php echo e(Route('dashboard')); ?>"><li><i class="fa-solid fa-gauge"></i>Panel</li></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"><li><i class="fa-solid fa-right-from-bracket"></i><?php echo e(__('Log in')); ?></li></a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>"><li><i class="fa-solid fa-address-card"></i><?php echo e(__('Register')); ?></li></a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <a href="#"><li><i class="fa-solid fa-circle-info"></i><?php echo e(__('Information')); ?></li></a>
                <a href="#"><li><i class="fa-solid fa-headset"></i><?php echo e(__("Contact")); ?></li></a>
            </ul>
        </section>
    </header><?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/layouts/nav-users-guest.blade.php ENDPATH**/ ?>