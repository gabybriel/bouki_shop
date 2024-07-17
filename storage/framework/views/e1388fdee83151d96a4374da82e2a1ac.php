<?php $__env->startSection('admin-content'); ?>

    <div class="container mt-4">
        <h1>Objet: <?php echo e($whatsapp->titre); ?></h1>

        <div class="whatsapps mt-4" >
            <h3>Message:</h3>
            <p class="p-3 ml-8">
                <?php echo e($whatsapp->message); ?>

            </p>
            <p><b>Date: <?php echo e($whatsapp->created_at->format('d/m/Y')); ?></b></p>
        </div>
        <hr>

        <div class="py-4">
            <a href="<?php echo e(route('whatsapp.index')); ?>" class="btn btn-primary mr-6"><i class="ti ti-arrow-left"></i> Retour</a>
            <form action="<?php echo e(route('whatsapp.destroy', $whatsapp->id)); ?>" class="text-end" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="button" class="btn btn-danger btn-sm delete-btn">
                    <i class="ti ti-trash"></i> Supprimer
                </button>
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/whatsapp/show.blade.php ENDPATH**/ ?>