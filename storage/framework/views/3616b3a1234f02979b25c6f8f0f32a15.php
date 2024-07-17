

<?php $__env->startSection('admin-content'); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"> Ajouter des sous-categories </h5>

        <div class="card">
            <div class="card-body">

                <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger">
                    <?php echo e($error); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <form method="post" action="<?php echo e(route('sous-categories.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="sous_categorie" class="form-label">Sous-catégorie</label>
                            <input type="text" class="form-control" id="sous_categorie" name="sous_categorie" placeholder="Sous-catégorie">
                        </div>
                        <div class="col-md-6">
                            <label for="categorie_id" class="form-label">Catégorie</label>
                            <select class="form-select" id="categorie_id" name="categorie_id">
                                <!-- Options de catégorie -->
                                <option value="">Selectionner</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->categoriename); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!-- Ajoutez d'autres options si nécessaire -->
                            </select>
                        </div>
                    </div><br>

                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="sous_categorie" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"> Ajouter </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/subcategories/create.blade.php ENDPATH**/ ?>