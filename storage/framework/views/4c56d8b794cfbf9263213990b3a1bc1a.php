

<?php $__env->startSection('admin-content'); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Mettre à jour le statut de la commande - <?php echo e($commande->num_commande); ?></h5>

        <div class="card">
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <form method="post" action="<?php echo e(route('orders.update', $commande->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label for="statut" class="form-label">Statut</label>
                            <select class="form-select" id="statut" name="statut" required>
                                <option value="En attente de paiement" <?php echo e($commande->statut === 'En attente de paiement' ? 'selected' : ''); ?>>En attente de paiement</option>
                                <option value="Payer" <?php echo e($commande->statut === 'Payer' ? 'selected' : ''); ?>>Payer</option>
                                <option value="En cours" <?php echo e($commande->statut === 'En cours' ? 'selected' : ''); ?>>En cours</option>
                                <option value="En cours de traitement" <?php echo e($commande->statut === 'En cours de traitement' ? 'selected' : ''); ?>>En cours de traitement</option>
                                <option value="En attente" <?php echo e($commande->statut === 'En attente' ? 'selected' : ''); ?>>En attente</option>
                                <option value="Livrer" <?php echo e($commande->statut === 'Livrer' ? 'selected' : ''); ?>>Livrer</option>
                            </select>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/orders/edit.blade.php ENDPATH**/ ?>