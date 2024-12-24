

<?php $__env->startSection('content'); ?>

<div class="text-center my-4">
    <img class="img-thumbnail" 
         src="<?php echo e(Vite::asset('resources/images/Laundry.png')); ?>" 
         style="width: 30%" 
         alt="Laundry">
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary">
                <h5 class="mb-0 text-light">Set Customer <i class="fas fa-user"></i></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(\Route::currentRouteName() == 'purchased.edit' ? route('purchased.update', $bind->id ?? '') : route('purchased.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php if(\Route::currentRouteName() == 'purchased.edit'): ?>
                        <?php echo method_field('patch'); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nama Customer</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="<?php echo e(old('name', $bind->user->name ?? '')); ?>" required>
                            <input type="hidden" name="tanggal_mulai_laundry" value="<?php echo e(now()); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="no_telp">No Telp</label>
                            <input class="form-control" type="text" name="no_telp" id="no_telp"
                                value="<?php echo e(old('no_telp', $bind->user->no_telp ?? '')); ?>" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="spesification_id">Spesifikasi Cuci</label>
                            <select class="form-control" name="spesification_id" id="spesification_id" required>
                                <option value="" disabled selected>-- Pilih Spesifikasi Cuci --</option>
                                <?php $__currentLoopData = $spesifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spesification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($spesification->id); ?>" <?php echo e(old('spesification_id', $bind->spesification_id ?? '') == $spesification->id ? 'selected' : ''); ?>>
                                        <?php echo e($spesification->spesifikasi_cuci); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" disabled selected>-- Pilih Gender --</option>
                                <option value="L" <?php echo e(old('gender', $bind->user->gender ?? '') == 'L' ? 'selected' : ''); ?>>Laki-Laki</option>
                                <option value="P" <?php echo e(old('gender', $bind->user->gender ?? '') == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="quantity_laundry">Quantity Laundry</label>
                            <input class="form-control" type="number" name="quantity_laundry" id="quantity_laundry"
                                value="<?php echo e(old('quantity_laundry', $bind->quantity_laundry ?? '')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_selesai_laundry">Tanggal Selesai</label>
                            <input class="form-control" type="date" name="tanggal_selesai_laundry" id="tanggal_selesai_laundry"
                                value="<?php echo e(old('tanggal_selesai_laundry', $bind->tanggal_selesai_laundry ?? '')); ?>" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="diantarCheckbox">Pesanan Diantar?</label>
                            <div>
                                <input type="checkbox" id="diantarCheckbox" <?php echo e(old('alamat', $bind->user->alamat ?? '') ? 'checked' : ''); ?>> Iya
                            </div>
                        </div>
                        <div class="col-md-6" id="alamatInput" style="<?php echo e(old('alamat', $bind->user->alamat ?? '') ? '' : 'display:none;'); ?>">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" type="text" name="alamat" id="alamat"
                                value="<?php echo e(old('alamat', $bind->user->alamat ?? '')); ?>">
                        </div>
                    </div>

                    <button id="checkButton" class="btn btn-primary mt-4" type="submit">
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
                        <?php $__currentLoopData = $spesifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $spesification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($spesification->spesifikasi_cuci); ?></td>
                            <td>Rp <?php echo e(number_format($spesification->hargakilo, 0, ',', '.')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('diantarCheckbox').addEventListener('change', function () {
        var alamatInput = document.getElementById('alamatInput');
        alamatInput.style.display = this.checked ? 'block' : 'none';
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters', ['title' => 'Set Customer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Semester 5\Cloud Computing\TubesCC\resources\views/purchased/create.blade.php ENDPATH**/ ?>