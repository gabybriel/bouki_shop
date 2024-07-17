<!-- resources/views/your/edit/view.blade.php -->



<?php $__env->startSection('admin-content'); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"><i class="ti ti-user"></i> Modifier l'utilisateur </h5>

        <div class="card">
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <form method="post" action="<?php echo e(route('users.update', $user->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?> <!-- Use the "put" method for update -->

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="prenoms" class="form-label">Prenoms</label>
                            <input type="text" class="form-control" id="prenoms" name="prenoms" value="<?php echo e($user->prenoms); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Telephone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($user->phone); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="is_admin" class="form-label">Est Administrateur</label>
                            <select id="is_admin" name="is_admin" class="form-select">
                                <option value="1" <?php echo e($user->is_admin ? 'selected' : ''); ?>>Oui</option>
                                <option value="0" <?php echo e(!$user->is_admin ? 'selected' : ''); ?>>Non</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="is_vendor" class="form-label">Est Marchand</label>
                            <select id="is_vendor" name="is_vendor" class="form-select">
                                <option value="1" <?php echo e($user->is_vendor ? 'selected' : ''); ?>>Oui</option>
                                <option value="0" <?php echo e(!$user->is_vendor ? 'selected' : ''); ?>>Non</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="is_visitor" class="form-label">Est Client</label>
                            <select id="is_visitor" name="is_visitor" class="form-select">
                                <option value="1" <?php echo e($user->is_visitor ? 'selected' : ''); ?>>Oui</option>
                                <option value="0" <?php echo e(!$user->is_visitor ? 'selected' : ''); ?>>Non</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="shopname" class="form-label">Nom de la Boutique</label>
                            <input type="text" class="form-control" id="shopname" name="shopname" value="<?php echo e($user->shopname); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>

                    <!-- Add input fields for other user attributes -->

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"> <i class="ti ti-world"></i> Enregistrer les modifications</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/users/edit.blade.php ENDPATH**/ ?>