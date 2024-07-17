<!DOCTYPE html>
<html>
<head>
    <title>Alerte de Stock</title>
</head>
<body>
    <h1>Alerte de Stock</h1>
    <p>Article : <?php echo e($articleName); ?></p>
    <p>Quantité disponible : <?php echo e($articleQuantity); ?></p>
    <p>Quantité demandée : <?php echo e($requestedQuantity); ?></p>
    <?php if($requestedQuantity > $articleQuantity): ?>
        <p style="color: red;">La quantité demandée est supérieure à la quantité disponible !</p>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\bouki\resources\views/emails/stock_alert.blade.php ENDPATH**/ ?>