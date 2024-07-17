

<?php $__env->startSection('admin-content'); ?>

<body style="background-color: #676767;">
    <div class="col-lg-8 d-flex align-items-stretch mx-auto">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-file"></i>CONDITIONS GÉNÉRALES DE VENTES</h5>
                <?php if($conditions->isEmpty()): ?>
                <a href="<?php echo e(route('conditions.create')); ?>" class="btn btn-primary"> <i class="ti ti-file"></i> Creer votre CGV </a>
                <?php endif; ?>
                <br><br>
                <div class="table-responsive">
                    <div class="container">
                        <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                    <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p> <?php echo $condition->cgv; ?> </p>
                    <a href="<?php echo e(route('conditions.edit', $condition->id)); ?>" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                        <i class="ti ti-edit"></i> Modifier les conditions générales de ventes
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/conditions/index.blade.php ENDPATH**/ ?>