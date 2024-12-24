

<?php $__env->startSection('content'); ?>

<div class="text-center">
    <img class="img-thumbnail" src="<?php echo e(Vite::asset('resources/images/vens_laundry.jpg')); ?>" style="width: 30%">
</div>

<div class="row">
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
                                    class="form-control" type="number" name="quantity_laundry">
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
                        <button id="checkButton" class="btn btn-sm btn-primary mt-2 float-left" type="submit">
                            <i class="fas fa-check"></i> Submit
                        </button>

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
                            <td> Rp <?php echo e(number_format ($spesification->hargakilo, 0, ',', '.')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('diantarCheckbox').addEventListener('change', function() {
            var alamatInput = document.getElementById('alamatInput');

            if (this.checked) {
                alamatInput.style.display = 'block';
            } else {
                alamatInput.style.display = 'none';
            }
        });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Set Customer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 5\TRISNAA\Tubes-Framework\resources\views/purchased/create.blade.php ENDPATH**/ ?>