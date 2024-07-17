

<?php $__env->startSection('admin-content'); ?>
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4"> Rapport des ventes</h5>

            <div class="container">
                <!-- Ajouter un formulaire pour choisir les dates -->
                <form action="<?php echo e(route('rapports.index')); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="start_date">Date de début</label>
                            <input type="date" name="start_date" class="form-control" value="<?php echo e(request('start_date')); ?>">
                        </div>
                        <div class="col">
                            <label for="end_date">Date de fin</label>
                            <input type="date" name="end_date" class="form-control" value="<?php echo e(request('end_date')); ?>">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mt-4">Filtrer</button>
                        </div>
                    </div>
                    <div class="col">
                        <label for="apply_discount">
                            <input type="checkbox" name="apply_discount" id="apply_discount">
                            Retirer les frais Mobile Money
                        </label>
                    </div><br>
                </form>

                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
            </div>

            <div class="table-responsive">
                <table id="example" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4" style="background-color: #eee;">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Numero</h6>
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
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Total</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Actions</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border-bottom-0"><b>
                                    <p><?php echo e($commande->num_commande); ?></p>
                                </b></td>
                            <td class="border-bottom-0">
                                <p><?php echo e($commande->created_at->format('d/m/Y')); ?></p>
                            </td>
                            <td class="border-bottom-0">
                                <p><?php echo e($commande->created_at->format('h.m.s')); ?></p>
                            </td>
                            <td class="border-bottom-0">
                                <p><?php echo e($commande->cartItems->count()); ?></p>
                            </td>
                            <td class="border-bottom-0">
                                <p><?php echo e($commande->modepaiement); ?></p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge 
                                            <?php if($commande->statut === 'En attente de paiement'): ?> bg-warning
                                            <?php elseif($commande->statut === 'Payer'): ?> bg-success
                                            <?php elseif($commande->statut === 'En cours' || $commande->statut === 'En cours de traitement' || $commande->statut === 'En attente'): ?> bg-primary
                                            <?php elseif($commande->statut === 'Livrer'): ?> bg-success
                                            <?php elseif($commande->statut === 'Annuler'): ?> bg-danger
                                            <?php endif; ?>
                                            rounded-3 fw-semibold">
                                        <?php echo e($commande->statut); ?>

                                    </span>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <p><b><?php echo e($commande->cartItems->sum('price')); ?> FCFA</b></p>
                            </td>
                            <td class="border-bottom-0 text-left">
                                <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                    <a href="" class="btn btn-info btn-sm" style="margin-right: 10px;"><i class="ti ti-printer"></i></a>
                                    <a href="<?php echo e(route('orders.show', $commande->id)); ?>" class="btn btn-success btn-sm" style="margin-right: 10px;"><i class="ti ti-eye"></i> Voir</a>
                                    <a href="<?php echo e(route('orders.edit', $commande->id)); ?>" class="btn btn-primary btn-sm" style="margin-right: 10px;"><i class="ti ti-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <!-- Afficher le total des commandes -->
                <div class="mt-4">
                    <p class="fw-bold">
                        Total des commandes filtrées : <?php echo e(round($totalCommandes)); ?> FCFA
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/rapports/index.blade.php ENDPATH**/ ?>