<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bouki-Shopping</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body style="background-color: #f02eb5;">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../assets/images/logos/logo.png" width="180" alt="">
                                </a>

                                <?php if(session('status')): ?>
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    <?php echo e(session('status')); ?>

                                </div>
                                <?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginalb24df6adf99a77ed35057e476f61e153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb24df6adf99a77ed35057e476f61e153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $attributes = $__attributesOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__attributesOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $component = $__componentOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__componentOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>

                                <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email </label>
                                        <input type="email" name="email" :value="old('email')" required autofocus autocomplete="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email">
                                    </div>


                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" style="background-color: #f02eb5;">Réinitialiser le mot de passe</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="text-primary fw-bold ms-2" href="<?php echo e(route('login')); ?>">Se connecter</a>
                                    </div>
                                    <hr>
                                    <p>Si vous rencontrez des problèmes pour récupérer votre mot de passe, contactez l'administrateur ,<b>Bouki-shopping<br> au +242 05 627 33 25</b></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\bouki\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>