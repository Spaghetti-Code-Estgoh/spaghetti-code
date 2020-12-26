<?php $__env->startSection('nav'); ?>
    <li>
        <a class="btn logNav" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registar')); ?></a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class=" cont-log bg-white">
    <div class="row justify-content-center box-log">
        <div class="col-md-6">
            <img src="https://www.nicepng.com/png/full/129-1294940_dr-whoa-medic-team-fortress-2-medic-png.png">
        </div>
        <div class="col-md-6 align-self-center">
            <h1 class="display-1">404</h1>
            <h2 class="display-3">UH OH! Algo correu mal.</h2>
            <p class="display-4">A página que procura não existe...
            </p>
            <a href="/"><button class="btn-dark">HOME</button></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\spaghetti-code\resources\views/404.blade.php ENDPATH**/ ?>