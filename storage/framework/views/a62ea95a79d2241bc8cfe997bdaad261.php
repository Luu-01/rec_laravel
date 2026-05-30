

<?php $__env->startSection('content'); ?>
<h1>Listado de posts</h1>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class="card">
        <h2><a href="/posts/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h2>
        <p>Autor: <?php echo e($post->user->name); ?> | Comentarios: <?php echo e($post->comments_count); ?></p>
        <p><?php echo e(Str::limit($post->content, 180)); ?></p>
    </article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo e($posts->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\RecuperacionesPHP\rec_laravel\resources\views/posts/index.blade.php ENDPATH**/ ?>