<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col text-center mt-5">
            <div class="text-center">
                <h1>Vens<span class="text-primary fw-bold">_laundry</span></h1>
            </div>
            <section>
                <div class="container p-5" style="width: 100%">
                    <div class="">
                        <a href="<?php echo e(route('purchased.index')); ?>">
                            <img class="img-thumbnail" src="<?php echo e(Vite::asset('resources/images/vens_laundry.jpg')); ?>"
                                alt="" srcset=""></a>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ferdi\Documents\vens_laundry - Copy\vens_laundry - Copy\resources\views/welcome.blade.php ENDPATH**/ ?>