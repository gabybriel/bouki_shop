

<?php $__env->startSection('admin-content'); ?>
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Liste des sous catégories </h5>
            <a href="<?php echo e(route('sous-categories.create')); ?>" class="btn btn-primary"> <i class="ti ti-cards"></i> Ajouter des sous catégories </a>
            <br><br>
            <div class="table-responsive">
                <div class="container">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <table id="example" class="table text-nowrap mb-0 align-middle">
                    <colgroup>
                        <col style="width: 10%;">
                        <col style="width: 30%;">
                        <col style="width: 20%;">
                        <col style="width: 20%;">
                        <col style="width: 20%;">
                    </colgroup>
                    <thead class="text-dark fs-4" style="background-color: #eee;">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Sous-categories</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">images</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Categories</h6>
                            </th>
                            <th class="border-bottom-0 text-left">
                                <h6 class="fw-semibold mb-0">Boutton Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo e($subcategorie->id); ?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1"><?php echo e($subcategorie->subcategoryname); ?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1"><img src="<?php echo e($subcategorie->image); ?>" width="50" class="rounded">
                                </h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1"><?php echo e($subcategorie->categorie->categoriename); ?></h6>
                            </td>
                            <td class="border-bottom-0 text-left">
                                <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                    <a href="<?php echo e(route('sous-categories.edit', $subcategorie->id)); ?>" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                        <i class="ti ti-edit"></i> Modifier
                                    </a>


                                    <form action="<?php echo e(route('sous-categories.destroy', $subcategorie->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-catégorie ? ')">
                                            <i class="ti ti-trash"></i> Supprimer
                                        </button>
                                    </form>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/subcategories/index.blade.php ENDPATH**/ ?>