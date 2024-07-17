<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.svg">
    <title>Panier</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css" />
    <!-- Icofont Icon-->
    <link href="vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="vendor/sidebar/demo.css" rel="stylesheet">
</head>

<body class="fixed-bottom-padding">
    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
        </label>
        <em>Enable Dark Mode!</em>
    </div>
    <div class="osahan-cart">
        <div class="p-3 border-bottom">
            <div class="d-flex align-items-center">
                <h5 class="fw-bold m-0">Mon panier</h5>
                <a class="toggle ms-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
        </div>
        <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="osahan-body">
            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart-items bg-white position-relative border-bottom">
                <div class="d-flex align-items-center p-3">
                    <a href="product_details.html"><img src="<?php echo e($product->model->image); ?>" class="img-fluid"></a>
                    <a href="product_details.html" class="ms-3 text-dark text-decoration-none w-100">
                        <h5 class="mb-1"><?php echo e($product->model->taille); ?></h5>
                        <p class="text-muted mb-2"><span class="text-success me-1"> <?php echo e(number_format(floatval($product->price), 0, ',', ' ')); ?> FCFA</span></p>
                        <div class="d-flex align-items-center">
                            <p class="total_price fw-bold m-0"></p>
                            <div class="input-group input-spinner ms-auto cart-items-number">
                                <div class="input-group-prepend">
                                    <button class="btn btn-success btn-sm" type="button" id="button-minus"> - </button>
                                </div>
                                <input type="text" class="form-control" value="1">
                                <div class="input-group-append">
                                    <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                                </div>
                            </div>
                            <!-- Bouton Supprimer -->
                            <form action="<?php echo e(route('cart.destroy', $product->rowId)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm ms-3"><i class="icofont-trash"></i></button>
                            </form>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php if(Cart::count() > 0 ): ?>
            <div class="p-3 mt-5">
                <a href="<?php echo e(route('cart.create')); ?>" class="text-decoration-none">
                    <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                        <div class="more">
                            <h6 class="small m-2">Total: <?php echo e(Cart::subtotal()); ?> FCFA</h6>
                            <h6 class="m-0">Procéder au paiement </h6>
                        </div>
                        <div class="ms-auto"><i class="icofont-simple-right"></i></div>
                    </div>
                </a>
            </div>
            <?php else: ?>
            <div class="p-3 mt-5">
                <a href="/" class="text-decoration-none">
                    <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                        <div class="more">
                            <h6 class="m-0">Votre panier est vide</h6>
                        </div>
                        <div class="ms-auto"><i class="icofont-simple-right"></i></div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <!-- Footer -->
        <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
            <div class="row m-0">
                <a href="/" class="text-dark small col font-weight-bold text-decoration-none p-2 selected">
                    <p class="h5 m-0"><i class="text-success icofont-grocery"></i></p>
                    Boutique
                </a>
                <a href="<?php echo e(route('cart.index')); ?>" class="text-muted col small text-decoration-none p-2">
                    <p class="h5 m-0"><i class="icofont-cart"><span class="badge badge-danger p-1 ms-1 small"><?php echo e(Cart::count()); ?></span></i></p>
                    Panier
                </a>
                <a href="<?php echo e(route('commandelist')); ?>" class="text-muted col small text-decoration-none p-2">
                    <p class="h5 m-0"><i class="icofont-bag"></i></p>
                    Commandes
                </a>
                <a href="<?php echo e(route('dashboard')); ?> " class="text-muted small col text-decoration-none p-2">
                    <p class="h5 m-0"><i class="icofont-user"></i></p>
                    Compte
                </a>
            </div>
        </div>
        <nav id="main-nav">
            <ul class="second-nav">

                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                        <?php echo csrf_field(); ?>
                        <button type="submit" href="<?php echo e(route('logout')); ?>" @click.prevent="$root.submit();"><i class="icofont-check-circled me-2"></i>Déconnexion</button>
                    </form>
                </li>

            </ul>
            <ul class="bottom-nav">
                <li class="email">
                    <a class="text-success" href="home.html">
                        <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
                        Home
                    </a>
                </li>
                <li class="github">
                    <a href="cart.html">
                        <p class="h5 m-0"><i class="icofont-cart"></i></p>
                        CART
                    </a>
                </li>
                <li class="ko-fi">
                    <a href="help_ticket.html">
                        <p class="h5 m-0"><i class="icofont-headphone"></i></p>
                        Help
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- slick Slider JS-->
        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
        <!-- Sidebar JS-->
        <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/osahan.js"></script>




        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.querySelector('.input-spinner input');
        const buttonPlus = document.getElementById('button-plus');
        const buttonMinus = document.getElementById('button-minus');

        buttonPlus.addEventListener('click', function () {
            input.value = parseInt(input.value) + 1;
        });

        buttonMinus.addEventListener('click', function () {
            const value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        });
    });
</script>




</body>

</html><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/panier.blade.php ENDPATH**/ ?>