<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(Vite::asset('resources/img/Logos/logo-gonly-icon.png')); ?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8dd3c39186.js" crossorigin="anonymous"></script>
    
    <?php echo $__env->yieldContent('link-css-js'); ?>
    
    <title><?php echo $__env->yieldContent('Welcome'); ?></title>
</head>

<body>

    <?php echo $__env->yieldContent('content-everyone'); ?>
    
</body>

</html>
<?php /**PATH C:\Users\diego\OneDrive\Documentos\GitHub\Gonly-web\Gonly-code\resources\views/layouts/head-pretm.blade.php ENDPATH**/ ?>