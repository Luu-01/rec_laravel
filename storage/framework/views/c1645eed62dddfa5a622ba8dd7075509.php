<header>
    <a href="<?php echo e(route('posts.index')); ?>"><strong>Blog Laravel</strong></a>

    <nav>
        <a href="<?php echo e(route('posts.index')); ?>">Posts</a>

        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('posts.create')); ?>">Crear post</a>
            <span><?php echo e(auth()->user()->name); ?></span>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">Cerrar sesión</button>
            </form>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">Login</a>
            <a href="<?php echo e(route('register')); ?>">Registro</a>
        <?php endif; ?>
    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\RecuperacionesPHP\rec_laravel\resources\views/layouts/partials/header.blade.php ENDPATH**/ ?>