<?php $__env->startSection('admin-content'); ?>
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Liste des Retraits</h5>

                <div class="table-responsive">
                    <div class="container">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <table id="example" class="table text-nowrap mb-0 align-middle">

                        <thead class="text-dark fs-4" style="background-color: #eee;">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">id</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Client</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Date</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Heure</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Mentant</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Mode</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tel</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Statut</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $finances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <b>
                                            <p> <?php echo e($finance->id); ?> </p>
                                        </b>
                                    </td>
                                    <td class="border-bottom-0">
                                        <b>
                                            <p> <?php echo e($finance->user->shopname); ?> </p>
                                        </b>
                                    </td>

                                    <td class="border-bottom-0">
                                        <p>
                                            <?php echo e($finance->created_at->format('d/m/Y')); ?>


                                        </p>
                                    </td>

                                    <td class="border-bottom-0">
                                        <p>
                                            <?php echo e($finance->created_at->format('H.i.s')); ?>

                                        </p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p>
                                            <?php echo e($finance->somme); ?> F CFA
                                        </p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p>
                                            <?php echo e($finance->mode); ?>

                                        </p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p>
                                            <?php echo e($finance->phone); ?>

                                        </p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span
                                                class=" badge <?= $finance->statut === 'En attente' ? 'bg-warning' : '' ?>
                                                        <?= $finance->statut === 'Effectué' ? 'bg-success' : '' ?>
                                                        rounded-3 fw-semibold ">
                                                <?php echo e($finance->statut); ?>

                                            </span>
                                        </div>
                                    </td>

                                    <td class="border-bottom-0 text-left">
                                        <div class="flex-right" style="display: flex; justify-content: flex-left;">
                                            <a href="<?php echo e(route('finances.show', $finance->id)); ?>"
                                                class="btn btn-success btn-sm" style="margin-right: 10px;">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('finances.edit', $finance->id)); ?>"
                                                class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('finances.destroy', $finance->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette finance ? ')">
                                                    <i class="ti ti-trash"></i>
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


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [0,
                        'desc'
                    ] // 0 is the index of the first column (assuming it's the ID column), 'desc' for descending order
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/finances/index.blade.php ENDPATH**/ ?>