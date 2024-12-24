<?php $__env->startSection('content'); ?>

<div class="text-center">
    <img class="w-25" src="/img/icon.png" alt="">
</div>

<div class="card mx-auto">
    <div class="card-header bg-secondary text-white"> <!-- Added background color and text color to the card header -->
        <div class="d-flex justify-content-between">
           <h3 class="text-center">Data Customer</h3>
            <a href="<?php echo e(route('purchased.create')); ?>" class="text-white">
                <i class="fas fa-user-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive"> <!-- Added a container for responsive table design -->
            <table class="table table-bordered text-center"> <!-- Centered the table and added border -->
                <thead>
                    <tr>
                        <th>ID Customer</th>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Riwayat Cuci</th>
                        <th>Quantity Laundry</th>
                        <th>Sub Total</th>
                        <th>Nota</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $userPurchaseds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>#<?php echo e($item->user->no_pelanggan); ?></td>
                        <td><?php echo e($item->user->name); ?></td>
                        <td><?php echo e($item->user->no_telp); ?></td>
                        <td><?php echo e($item->user->alamat); ?></td>
                        <td><?php echo e($item->spesification->spesifikasi_cuci); ?></td>
                        <td><?php echo e($item->quantity_laundry); ?> kg</td>
                        <td>Rp <?php echo e(number_format($item->subtotal_laundry, 0, ',', '.')); ?></td>
                        <td>
                            <a href="<?php echo e(route('nota.index', $item->user_id)); ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </td>
                        <td>
                            <form action="<?php echo e(route('nota.delete', $item->user_id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Semester 4\Pemrograman Framework\vens_laundry\resources\views/purchased/index.blade.php ENDPATH**/ ?>