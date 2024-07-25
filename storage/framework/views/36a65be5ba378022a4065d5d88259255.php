<?php $__env->startSection('admin-content'); ?>

    <body style="background-color: #eee;">

        <div>
            <div class="card">
                <div class="row align-items-start py-4">
                    <div class="col-9 p-9">
                        <h4 class="card-title mb-9 fw-semibold"><i class="ti ti-wallet views-icon"></i>Votre Portefeuille</h4>
                        <h4 class="fw-semibold mb-3" id="total-sum">Total: <?php echo e(number_format($totalSum, 2)); ?>

                            FCFA</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-9">
                            <h4 class="card-title mb-9 fw-semibold"><i class="ti ti-wallet views-icon"></i>Effectuer un
                                retrait</h4>
                            <div class="d-flex align-items-center pb-1">
                                <form action="<?php echo e(route('vendors.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Somme</label>
                                            <input type="number" class="form-control"
                                                placeholder="Entrez le montant à retirer" name="somme">
                                            <small>Entrer la somme à retirer</small>
                                        </div>
                                        <div class="col-md-9 pt-5">
                                            <label class="form-label">Mode de paiement</label>
                                            <select class="form-control" name="mode">
                                                <option value="MTN">MTN</option>
                                                <option value="Airtel">Airtel</option>
                                                <option value="Autres">Autres</option>
                                            </select>
                                            <label class="form-label">Numéro</label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder="Numéro de téléphone">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-2" type="submit">Envoyer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Utilisez le totalSum directement depuis le contrôleur
                const totalSum = <?php echo json_encode($totalSum, 15, 512) ?>;
                console.log('Total Sum:', totalSum);
            });
        </script>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vendor-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/finances/vendors/create.blade.php ENDPATH**/ ?>