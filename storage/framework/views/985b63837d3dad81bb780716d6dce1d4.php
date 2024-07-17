<?php $__env->startSection('admin-content'); ?>


<body style="background-color: #eee">


<div class="card">
    <div class="card-body">
        <div class="row align-items-start">
            <div class="col-12">
                <h4 class="card-title mb-9 fw-semibold"><i class="ti ti-wallet views-icon"></i>Modifier le statut du retrait</h4>
                <div class="d-flex align-items-center pb-1">
                    <form action="<?php echo e(route('finances.update', $finance->id)); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <select class="form-control" name="statut">
                            <option value="En attente" <?php echo e($finance->statut == 'En attente' ? 'selected' : ''); ?>>En attente</option>
                            <option value="Effectué" <?php echo e($finance->statut == 'Effectué' ? 'selected' : ''); ?>>Effectué</option>
                        </select>
                        <button class="btn btn-primary mt-2" type="submit">Envoyer</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</body>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/finances/edit.blade.php ENDPATH**/ ?>