<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'Blog Laravel'); ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1000px; margin: 0 auto; padding: 1rem; line-height: 1.5; }
        header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; margin-bottom: 1rem; padding-bottom: .75rem; }
        nav a, nav form { display: inline-block; margin-left: .75rem; }
        input, textarea { width: 100%; padding: .5rem; margin-top: .25rem; box-sizing: border-box; }
        textarea { min-height: 160px; }
        .error { color: #b00020; font-size: .9rem; }
        .alert { background: #e8f5e9; padding: .75rem; border: 1px solid #b7dfb9; margin-bottom: 1rem; }
        .card { border: 1px solid #ddd; padding: 1rem; margin-bottom: 1rem; border-radius: .25rem; }
        .actions { display: flex; gap: .5rem; align-items: center; }
        button, .button { padding: .45rem .75rem; border: 1px solid #222; background: #f7f7f7; text-decoration: none; color: #111; cursor: pointer; }
    </style>
</head>
<body>
    <?php echo $__env->make('layouts.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(session('success')): ?>
        <div class="alert"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\RecuperacionesPHP\rec_laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>