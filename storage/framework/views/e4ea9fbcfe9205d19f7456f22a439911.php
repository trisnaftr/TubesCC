<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col text-center mt-5">
        <a href="<?php echo e(route('purchased.index')); ?>">
            <img src="/img/icon.png" alt="" class="img-fluid mx-auto d-block">
        </a>
        <h1>Vens<span class="text-primary fw-bold">_laundry</span></h1>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Semester 4\Pemrograman Framework\vens_laundry\resources\views/welcome.blade.php ENDPATH**/ ?>