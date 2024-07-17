

<?php $__env->startSection('admin-content'); ?>
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h3 class="card-title fw-semibold mb-4">Details | Commande : <?php echo e($commande->num_commande); ?></h3>

                <h6><b> Client :</b> <?php echo e($commande->user->name); ?> <?php echo e($commande->user->prenoms); ?> </h6>
                <h6><b> Telephone :</b> <?php echo e($commande->user->phone); ?></h6>

            <h6><b> Adresse :</b> <?php echo e($commande->adresse); ?></h6>
            <h6><b> Ville : </b> <?php echo e($commande->ville); ?></h6>
            <h6><b> Numero momo :</b> <?php echo e($commande->num_momo); ?> </h6>
            <br>


            <table id="example" class="table text-nowrap mb-0 align-middle">

                <thead class="text-dark fs-4" style="background-color: #eee;">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Image</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Quantité</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Numero</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Prix</h6>
                        </th>


                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $commande->cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border-bottom-0">
                            <p> <img src="<?php echo e($cartItem->article->image); ?>" width="75"></p>
                        </td>
                        <td class="border-bottom-0">
                            <p>
                                <?php echo e($cartItem->quantity); ?>

                            </p>
                        </td>

                        <td class="border-bottom-0">
                            <p>
                                <?php echo e($cartItem->article->numero); ?>

                            </p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">
                                <?php echo e($cartItem->price); ?>

                            </h6>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vendor-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/orders/vendors/show.blade.php ENDPATH**/ ?>