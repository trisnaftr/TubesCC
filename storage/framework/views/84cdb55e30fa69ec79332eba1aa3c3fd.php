

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col text-center mt-5">
        <section>
            <div class="d-grid gap-3 justify-content-center">
                <div class="text-center">
                    <img class="img-thumbnail w-75" 
                         src="<?php echo e(Vite::asset('resources/images/Laundry.png')); ?>" 
                         alt="Laundry" />
                </div>
                <div class="text-center">
                    <a class="btn btn-primary btn-lg" 
                       href="<?php echo e(route('purchased.index')); ?>" 
                       role="button">
                        ORDER
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/welcome.blade.php ENDPATH**/ ?>