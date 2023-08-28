<header>
    <nav x-data="{ open: false }">
      <div class="logo-image">
        <a href="<?php echo e(route('welcome')); ?>"><img class="logo-gonly-black-letters" src="<?php echo e(Vite::asset('resources/img/Logos/logo-gonly-black-letters.png')); ?>"></a>
      </div>

      <form action="" class="form-search">
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

      <div class="relatve z-10">
        <button id="menuButton" class="w-52 user-configuration bg-transparent px-2 border-2 border-amber-300 py-0.5">
          <img src="<?php echo e(Vite::asset('resources/img/Users/Messi.png')); ?>" alt="">
          <h3><?php echo e(Auth::user()->name); ?></h3><i class="fa-solid fa-gear"></i>
        </button>
        <div id="menuDropdown" class="absolute px-2 bg-white rounded-lg shadow-xl hidden">
          
          <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <a href="<?php echo e(route('logout')); ?>" class="block text-center w-48 py-2 text-gray-800 hover:bg-gray-100 " onclick="event.preventDefault(); this.closest('form').submit();"><?php echo e(__('Log Out')); ?></a>
          </form>
        </div>
      </div>

    </div>

    </nav>
    <div class="menu-user-loged">
      <ul>
        <a href="<?php echo e(route('dashboard')); ?>" class="link-1"><li>Mis balances  <i class="fa-solid fa-scale-balanced"></i></li></a>
        <a href="<?php echo e(route('products.index')); ?>" class="link-2"><li>Mis publicaciones  <i class="fa-solid fa-newspaper"></i></li></a>
        <a href="#" class="link-3"><li>Mis ventas  <i class="fa-solid fa-tag"></i></li></a>
        <a href="#" class="link-4"><li>Mis compras  <i class="fa-solid fa-bag-shopping"></i></li></a>
        <a href="<?php echo e(route('profile.edit')); ?>" class="link-5"><li>Mi perfil <i class="fa-solid fa-user"></i></li></a>
      </ul>
    </div>
</header>

<?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/layouts/nav-users-loged.blade.php ENDPATH**/ ?>