

<?php $__env->startSection('admin-content'); ?>
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Liste des commandes</h5>

            <div class="table-responsive">
                <div class="container">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
                </div>

                <table id="example" class="table text-nowrap mb-0 align-middle">

                    <thead class="text-dark fs-4" style="background-color: #eee;">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Numero</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Client</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Heure</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Article</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Mode</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Statut</h6>
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border-bottom-0">
                                <b>
                                    <p> <?php echo e($commande->id); ?> </p>
                                </b>
                            </td>
                            <td class="border-bottom-0">
                                <b>
                                    <p> <?php echo e($commande->num_commande); ?> </p>
                                </b>
                            </td>
                            <td class="border-bottom-0">

                                <p> <?php echo e(optional($commande->user)->name); ?> </p>

                            </td>
                            <td class="border-bottom-0">
                                <p>
                                    <?php echo e($commande->created_at->format('d/m/Y')); ?>


                                </p>
                            </td>

                            <td class="border-bottom-0">
                                <p>
                                    <?php echo e($commande->created_at->format('H.i.s')); ?>

                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <p>
                                    <?php echo e($commande->cartItems->count()); ?>

                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <p>
                                    <?php echo e($commande->modepaiement); ?>

                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class=" badge <?= $commande->statut === 'En attente de paiement' ? 'bg-warning' : '' ?>
                                                        <?= $commande->statut === 'Payer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'En cours' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En cours de traitement' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En attente' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'Livrer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'Annuler' ? 'bg-danger' : '' ?>
                                                        rounded-3 fw-semibold ">
                                        <?php echo e($commande->statut); ?>

                                    </span>
                                </div>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [0, 'desc'] // 0 is the index of the first column (assuming it's the ID column), 'desc' for descending order
            ]
        });
    });
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vendor-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/orders/vendors/index.blade.php ENDPATH**/ ?>