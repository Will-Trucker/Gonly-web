<div class="relatve z-10">
    <button id="menuButton" class="bg-transparent p-0.7 w-48 border-2 border-amber-300 py-2"><?php echo e(__('Languages')); ?>:  <?php echo e(Config::get('languages')[App::getLocale()]); ?>  <i class="ml-2 fa-solid fa-caret-down"></i></button>
    <div id="menuDropdown" class="absolute w-48 bg-white rounded-lg shadow-xl hidden ">
      <?php $__currentLoopData = Config::get('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($lang != App::getLocale()): ?>
          <a class="block text-center px-4 py-3 text-gray-800 hover:bg-gray-100 w-full" href="<?php echo e(route('lang.switch', $lang)); ?>"> <?php echo e($language); ?></a>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/components/translateSwicht.blade.php ENDPATH**/ ?>