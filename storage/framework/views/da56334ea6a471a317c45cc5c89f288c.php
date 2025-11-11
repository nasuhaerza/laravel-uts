

<?php $__env->startSection('title', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Barang</h4>
        <a href="<?php echo e(route('brg_create')); ?>" class="btn btn-primary btn-sm">Tambah Barang</a>
    </div>

    
    <form action="<?php echo e(route('brg')); ?>" method="GET" class="mb-3 d-flex" role="search">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari barang..." value="<?php echo e(request('search')); ?>">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($row->kode); ?></td>
                        <td><?php echo e($row->nama); ?></td>
                        <td><?php echo e($row->kategori); ?></td>
                        <td><?php echo e($row->stok); ?></td>
                        <td><?php echo e($row->harga); ?></td>
                        <td>
                            <a href="<?php echo e(route('brg_edit', $row->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('brg_delete', $row->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data barang</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.dashboard.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\NASUHA ERZA\PWL\uts_laravel\resources\views/backend/items/index.blade.php ENDPATH**/ ?>