<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('purchased.edit')); ?>" class="btn btn-primary mt-3">
    <i class="fas fa-edit"></i> Edit Pemesanan
</a>
<div class="card mt-2">
    <div class="card-body">
        <div class="text-center">
            <img class="img-thumbnail" src="<?php echo e(Vite::asset('resource/images/vens_laundry.jpg')); ?>" alt="" srcset="">
            <h3>No Pelanggan : #<?php echo e($users->user->no_pelanggan); ?></h3>
            <h5>Nama Pelanggan : <?php echo e($users->user->name); ?></h5>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Spesifikasi Cuci</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($users->spesification->spesifikasi_cuci); ?></td>
                    <td><?php echo e($users->quantity_laundry); ?> kg</td>
                    <td>Rp <?php echo e(number_format($users->spesification->hargakilo, 0, ',', '.')); ?>/kg</td>
                    <td>Rp <?php echo e(number_format($users->subtotal_laundry, 0, ',', '.')); ?></td>
                </tr>
            </tbody>
        </table>
        <h6>Setup Pembayaran : </h6>
        <form action="<?php echo e(route('checkout.update', $users->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
            <div class="d-flex items-center">
                <select class="form-control w-25" name="payment_method_id" id="">
                    <option value="">-- Pilih Pembayaran --</option>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($payment->id); ?>"><?php echo e($payment->payment_method_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button class="btn btn-sm btn-success mx-2" type="submit">
                    <i class="fa fa-cart-plus"></i>
                </button>

            </div>

        </form>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ferdi\Documents\vens_laundry - Copy\vens_laundry - Copy\resources\views/checkout/index.blade.php ENDPATH**/ ?>