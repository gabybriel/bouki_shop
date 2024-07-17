<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="alert alert-danger">
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/layouts/messages.blade.php ENDPATH**/ ?>