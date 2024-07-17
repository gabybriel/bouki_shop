<?php $__env->startSection('admin-content'); ?>
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Liste des message  Whatsapp</h5>
                <a class="btn btn-primary mb-3" href="<?php echo e(route('whatsapp.create')); ?>"><i class="ti ti-brand-whatsapp"></i>  Ecrire un message</a>

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
                                <h6 class="fw-semibold mb-0">Titre</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Message</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Heure</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $whatsapps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $whatsapp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border-bottom-0">
                                    <b>
                                        <p> <?php echo e($whatsapp->titre); ?> </p>
                                    </b>
                                </td>
                                <td class="border-bottom-0">

                                    <p> <?php echo e($whatsapp->message); ?> </p>

                                </td>
                                <td class="border-bottom-0">
                                    <p>
                                        <?php echo e($whatsapp->created_at->format('d/m/Y')); ?>


                                    </p>
                                </td>

                                <td class="border-bottom-0">
                                    <p>
                                        <?php echo e($whatsapp->created_at->format('H.i.s')); ?>

                                    </p>
                                </td>


                                <td class="border-bottom-0 text-left">
                                    <div class="flex-right" style="display: flex; justify-content: flex-left;">

                                        <a href="<?php echo e(route('whatsapp.show', $whatsapp->id)); ?>" class="btn btn-success btn-sm" style="margin-right: 10px;">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <form action="<?php echo e(route('whatsapp.destroy', $whatsapp->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette whatsapp ? ')">
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
                    [0, 'desc'] // 0 is the index of the first column (assuming it's the ID column), 'desc' for descending order
                ]
            });
        });
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bouki\resources\views/whatsapp/index.blade.php ENDPATH**/ ?>