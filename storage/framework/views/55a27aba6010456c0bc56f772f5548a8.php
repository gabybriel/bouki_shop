

<?php $__env->startSection('admin-content'); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"> Ajouter des categories </h5>

        <div class="card">
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <form method="post" action="<?php echo e(route('categories.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="categoriename" class="form-label">Categorie</label>
                            <input type="text" class="form-control" id="categoriename" name="categoriename" placeholder="Nom de la categorie" value="<?php echo e(old('categoriename')); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="imageField" class="form-label">Image</label>
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
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/categories/create.blade.php ENDPATH**/ ?>