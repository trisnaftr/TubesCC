<?php $__env->startSection('content'); ?>

<div class="row mt-4">
    <h3 class="text-center mt-2">Check Pemesanan</h3>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary">
                <h5 class="mb-0 text-light">Set Customer <i class="fas fa-user"></i></h5>
            </div>
            <div class="card-body">
                <?php if(\Route::currentRouteName() == 'purchased.edit'): ?>
                <form action="<?php echo e(route('purchased.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <?php endif; ?>

                    <?php if(\Route::currentRouteName() == 'purchased.create'): ?>
                    <form action="<?php echo e(route('purchased.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="nama">Nama Customer</label>
                                <input class="form-control" type="text" name="name"
                                    value="<?php echo e(old('name', $bind->user->name ?? '')); ?>" id="">
                                <input type="hidden" name="tanggal_mulai_laundry" id="">
                                <input type="hidden" name="no_pelanggan" id="">
                                <input type="hidden" name="subtotal_laundry" id="">
                            </div>
                            <div class="col-md-6">
                                <label for="no_telp">No Telp</label>
                                <input class="form-control" value="<?php echo e(old('no_telp', $bind->user->no_telp ?? '')); ?>"
                                    type="text" name="no_telp" id="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Spesifikasi Cuci</label>
                                <select class="form-control" name="spesification_id" id="">
                                    <option value="">-- Pilih Spesifikasi Cuci --</option>
                                    <?php $__currentLoopData = $spesifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spesification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($spesification->id); ?>" <?php echo e(old('spesification_id', $bind->
                                        spesification_id ?? '') == $spesification->id ? 'selected' : ''); ?>>
                                        <?php echo e($spesification->spesifikasi_cuci); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="">Gender</label>
                                <select class="form-control" name="gender" id="">
                                    <option value="" selected disabled>-- Masukkan Gender --</option>
                                    <option value="L" <?php echo e(old('gender', $bind->user->gender ?? '') == 'L' ?
                                        'selected'
                                        : ''); ?>>
                                        Laki Laki
                                    </option>
                                    <option value="P" <?php echo e(old('gender', $bind->user->gender ?? '') == 'P' ?
                                        'selected'
                                        : ''); ?>>
                                        Perempuan
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="">Quantity Laundry</label>
                                <input value="<?php echo e(old('quantity_laundry', $bind->quantity_laundry ?? '')); ?>"
                                    class="form-control" type="text" name="quantity_laundry">
                            </div>
                            <div class="col-md-6">
                                <label for="">Tanggal selesai</label>
                                <input
                                    value="<?php echo e(old('tanggal_selesai_laundry', $bind->tanggal_selesai_laundry ?? '')); ?>"
                                    class="form-control" type="date" name="tanggal_selesai_laundry">
                            </div>
                            <div class="col-md-6">
                                <label for="diantar">Pesanan Diantar?</label>
                                <div>
                                    <input class="form-checkbox" type="checkbox" id="diantarCheckbox"> iya
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="alamatInput" style="display:none;">
                                    <label for="">Alamat</label>
                                    <input value="<?php echo e(old('alamat', $bind->user->alamat ?? '')); ?>" class="form-control"
                                        type="text" name="alamat">
                                </div>
                            </div>
                        </div>

                        <?php if(\Route::currentRouteName() == 'purchased.get'): ?>
                        <button class="btn btn-sm btn-primary mt-2 float-left" hidden type="submit">Submit</button>
                        <?php endif; ?>
                        <?php if(\Route::currentRouteName() == 'purchased.edit'): ?>
                        <button class="btn btn-sm btn-primary mt-2 float-left" type="submit">Submit</button>
                        <?php endif; ?>
                    </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary">
                <h5 class="mb-0 text-light">Daftar Harga <i class="fas fa-list-alt"></i></h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Spesifikasi Cuci</th>
                            <th>Harga/kilo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        <?php $__currentLoopData = $spesifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spesification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>#<?php echo e($no++); ?></td>
                            <td><?php echo e($spesification->spesifikasi_cuci); ?></td>
                            <td><?php echo e($spesification->hargakilo); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>


<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-success" id="checkoutButton">
        <i class="fas fa-shopping-cart"></i> Checkout
    </button>
</div>




<table class="mt-3 table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Nama Pelanggan</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Quantity Laundry</th>
            <th>Spesifikasi Cuci</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $__currentLoopData = $userPurchaseds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userPurchased): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td><?php echo e($userPurchased->user->name); ?></td>
            <td><?php echo e($userPurchased->user->no_telp); ?></td>
            <td><?php echo e($userPurchased->user->alamat); ?></td>
            <td><?php echo e($userPurchased->quantity_laundry ? $userPurchased->quantity_laundry : "-"); ?></td>
            <td><?php echo e($userPurchased->spesification ? $userPurchased->spesification->spesifikasi_cuci : "-"); ?>

            </td>
            <td>

                <?php if($userPurchased->spesification != null): ?>
                <?php if(\Route::currentRouteName() == 'purchased.get'): ?>
                <a href="<?php echo e(route('purchased.edit')); ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit Pemesanan
                </a>
                <form action="<?php echo e(route('purchased.destroyPemesanan', $userPurchased->user_id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <button class="btn btn-sm btn-danger" type="submit">
                        <i class="fas fa-trash-alt"></i> Clear Pemesanan
                    </button>
                </form>
                <?php else: ?>
                <?php if(\Route::currentRouteName() == 'purchased.edit'): ?>
                <?php if($bind->user->alamat != null): ?>
                <a href="<?php echo e(route('purchased.get')); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
            </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </tbody>
</table>
<script>
    document.getElementById('diantarCheckbox').addEventListener('change', function() {
            var alamatInput = document.getElementById('alamatInput');
    
            if (this.checked) {
                alamatInput.style.display = 'block';
            } else {
                alamatInput.style.display = 'none';
            }
        });

        document.getElementById('checkoutButton').addEventListener('click', function () {
        Swal.fire({
            title: 'Confirmation',
            text: 'Apakah yakin untuk checkout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, Checkout',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo e(route('checkout.index')); ?>";
            }
        });
    });

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('masters', ['title' => 'Set Customer'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Semester 4\Pemrograman Framework\vens_laundry\resources\views/purchased/_create.blade.php ENDPATH**/ ?>