

<?php $__env->startSection('content'); ?>

<div class="text-center my-4">
    <img class="img-thumbnail" 
         src="<?php echo e(Vite::asset('resources/images/Laundry.png')); ?>" 
         style="width: 30%" 
         alt="Laundry">
</div>

<div class="card mx-auto" style="max-width: 80%;">
    <div class="card-header bg-secondary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Data Customer</h3>
            <a href="<?php echo e(route('purchased.create')); ?>" class="text-white btn btn-sm btn-success">
                <i class="fas fa-user-plus"></i> Tambah Customer
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-secondary">
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
                    <?php $__empty_1 = true; $__currentLoopData = $userPurchaseds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>#<?php echo e($item->user->no_pelanggan); ?></td>
                        <td><?php echo e($item->user->name); ?></td>
                        <td><?php echo e($item->user->no_telp); ?></td>
                        <td><?php echo e($item->user->alamat); ?></td>
                        <td><?php echo e($item->spesification->spesifikasi_cuci); ?></td>
                        <td><?php echo e($item->quantity_laundry); ?> kg</td>
                        <td>Rp <?php echo e(number_format($item->subtotal_laundry, 0, ',', '.')); ?></td>
                        <td>
                            <a href="<?php echo e(route('nota.index', $item->user_id)); ?>" 
                               class="btn btn-sm btn-info">
                                <i class="fas fa-file-alt"></i> Nota
                            </a>
                        </td>
                        <td>
                            <form action="<?php echo e(route('nota.delete', $item->user_id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="text-center">Data Customer tidak tersedia.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/purchased/index.blade.php ENDPATH**/ ?>