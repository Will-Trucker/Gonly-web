<form action="<?php echo e($actionForm); ?>" method="POST" class="form-container" enctype="multipart/form-data">
    <div class="form-logo">
        <img src="<?php echo e(Vite::Asset('resources/img/Logos/logo-gonly-icon.png')); ?>" alt="">
        <h1><?php echo e($nameLook); ?></h1>
    </div>
    <div>
            <?php if(count($errors)>0): ?>
                <div class="mt-1 mx-80 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class=" text-lg -mx-60">Advertencia</span>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ol class=" -mx-60">- <?php echo e($error); ?></ol>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        <div>
            <label for="title">Nombre del producto</label>
            <input name="tittle" id="tittle" value="<?php echo e(isset($products ->tittle)?$products ->tittle:old('tittle')); ?>" type="input escalable" autofocus autocomplete="tittle" placeholder="Ingrese el nombre de su producto">
        </div>

        <div>
            <label for="description">Descripcción general del producto</label>
            <textarea name="description" style="max-height: 15em; overflow: hidden;" id="description" autofocus autocomplete="description" placeholder="Ingrese el nombre de su producto"><?php echo e(isset($products ->description)?$products ->description:old('description')); ?></textarea>
        </div>

        <div>
            <label for="specifications">Especificaciones</label>
            <textarea name="specifications" style="max-height: 40em; overflow: hidden;" id="specifications" autofocus autocomplete="specifications" placeholder="Ingrese las especificacipnes del producto"><?php echo e(isset($products ->specifications)?$products ->specifications:old('specifications')); ?></textarea>
        </div>

        <!--
        <div>
            <label for="">Categoría</label>
            <select placeholder="Ingrese el nombre de su producto" name="" id="">
                <option value="">Tecnología</option>
                <option value="">Ropa</option>
                <option value="">Sexo</option>
                <option value="">Calzado</option>
                <option value="">Minitas</option>
            </select>
        </div>
        -->

        <div class="container-price">
            <label for="price">Precio</label>
            <section class="container-price-sigma">
                <p style="color:#78892ccc;">$</p>
                <input style="outline: none !important;" name="price" id="price" value="<?php echo e(isset($products ->price)?$products ->price:old('price')); ?>"  type="number" autofocus autocomplete="price" placeholder="Ingrese el precio de su producto (Menor a $50,000 )" />
            </section> 
        </div>

        <div class="container-price">
            <label for="photos">Fotografías</label>
            <input name="photos" id="photos" type="file" autofocus autocomplete="photos" accept="image/*" multiple/>
            
        </div>

        <input type="submit" class="submit" value="<?php echo e($submitForm); ?>">
    </div>
    <?php echo e(isset($methodForm)?$methodForm:''); ?>

    <?php echo csrf_field(); ?>
</form>
<?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/layouts/form-user-products.blade.php ENDPATH**/ ?>