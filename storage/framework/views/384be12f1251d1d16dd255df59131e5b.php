

<?php $__env->startSection('admin-content'); ?>
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h3 class="card-title fw-semibold mb-4">Article : <?php echo e($article->titre); ?></h3>

            <h5><b> Marchand :</b> </h5>
            <h6><b> Catégorie :</b> <?php echo e($article->subcategorie->categorie->categoriename); ?></h6>
            <h6><b> Sous-catégorie :</b> <?php echo e($article->subcategorie->subcategoryname); ?></h6>
            <h6><b> Référence :</b> <?php echo e($article->numero); ?></h6>
            <br>

            <table id="" class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4" style="background-color: #eee;">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">ID</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Image</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">taille</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Prix</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Qté</h6>
                        </th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"><?php echo e($article->id); ?></h6>
                        </td>

                        <td class="border-bottom-0">
                            <!-- <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="Article Image" width="75"> -->
                            <img src="<?php echo e($article->image); ?>" alt="Article Image" width="100" class="clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal">
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"><?php echo e($article->taille); ?></p>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"><?php echo e(number_format($article->prix, 0, ',', ' ')); ?> FCFA</p>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"><?php echo e($article->quantity); ?></p>
                        </td>

                    </tr>

                </tbody>
            </table>

            <hr>
            <h3 class="card-title fw-semibold mt-5 mb-3">Description</h3>

            <p><?php echo $article->description; ?></p>



        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/articles/show.blade.php ENDPATH**/ ?>