<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo e(asset('asset/images/logo/favicon.png')); ?>" type="image/x-icon">
    <title>Panier</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/slick/slick.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/slick/slick-theme.min.css')); ?>" />
    <!-- Icofont Icon-->
    <link href="<?php echo e(asset('vendor/icons/icofont.min.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="<?php echo e(asset('vendor/sidebar/demo.css')); ?>" rel="stylesheet">
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
        <?php
            $sousTotal = 0;
        ?>
        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $prix = $product->price;
                $quantite = $product->qty;
                $reduction = $product->model->is_promo / 100; // Convertir en pourcentage
                $prixReduit = $product->model->is_promo ? $prix * (1 - $reduction) : $prix;
                $prixTotal = $prixReduit * $quantite;
                $sousTotal += $prixTotal;
            ?>
            <div class="cart-items bg-white position-relative border-bottom">
                <div class="d-flex align-items-center p-3">
                    <div class="col-9 d-flex align-items-center p-3">
                        <a href="<?php echo e(route('details', $product->id)); ?>"><img src="<?php echo e($product->model->image); ?>" class="img-fluid"></a>
                        <a href="<?php echo e(route('details', $product->id)); ?>" class="ms-3 text-dark text-decoration-none w-100">
                            <h5 class="mb-1"><?php echo e($product->model->titre); ?></h5>
                            <p class="total_price fw-bold m-0" id="item-total-<?php echo e($product->rowId); ?>"><?php echo e(number_format(floatval($prixTotal), 0, ',', ' ')); ?> FCFA</p>
                            <p class="text-muted mb-2"><span class="text-success me-1"><?php echo e($product->taille); ?></span></p>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="input-group input-spinner ms-auto cart-items-number" data-product-id="<?php echo e($product->rowId); ?>" data-product-price="<?php echo e($prixReduit); ?>">
                            <div class="input-group-prepend">
                                <button class="btn btn-success btn-sm button-minus" type="button" data-row-id="<?php echo e($product->rowId); ?>"> - </button>
                            </div>
                            <input type="text" class="form-control quantity-input" value="<?php echo e($product->qty); ?>" id="quantity-<?php echo e($product->rowId); ?>" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-success btn-sm button-plus" type="button" data-row-id="<?php echo e($product->rowId); ?>"> + </button>
                            </div>
                        </div>
                        <form action="<?php echo e(route('cart.destroy', $product->rowId)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm ms-3"><i class="icofont-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(Cart::count() > 0): ?>
            <div class="p-3 mt-5">
                <a href="<?php echo e(route('cart.create')); ?>" class="text-decoration-none">
                    <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                        <div class="more">
                            <h6 class="small m-2">Total: <span id="cart-total"><?php echo e(number_format($sousTotal, 0, ',', ' ')); ?></span> FCFA</h6>
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
    </div>
    <?php endif; ?>

    <!-- Footer -->
    <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
        <div class="row m-0">
            <a href="/" class="text-dark small col font-weight-bold text-decoration-none p-2">
                <p class="h5 m-0"><i class="icofont-grocery"></i></p>
                Boutique
            </a>
            <a href="<?php echo e(route('cart.index')); ?>" class="text-muted col small text-decoration-none p-2 selected">
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
                    <button type="submit" href="<?php echo e(route('logout')); ?>" @click.prevent="$root.submit();" class="btn btn-success"><i class="icofont-check-circled me-2 "></i>Déconnexion</button>
                </form>
            </li>
        </ul>
        <ul class="bottom-nav">
            <li class="email">
                <a class="text-success" href="/">
                    <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
                    Boutique
                </a>
            </li>
            <li class="github">
                <a href="<?php echo e(route('cart.index')); ?>">
                    <p class="h5 m-0"><i class="icofont-cart"></i></p>
                    Panier
                </a>
            </li>
            <li class="ko-fi">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <p class="h5 m-0"><i class="icofont-user"></i></p>
                    Moi
                </a>
            </li>
        </ul>
    </nav>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="<?php echo e(asset('vendor/slick/slick.min.js')); ?>"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="<?php echo e(asset('vendor/sidebar/hc-offcanvas-nav.js')); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/osahan.js')); ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.button-plus, .button-minus').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    let isPlus = event.target.classList.contains('button-plus');
                    let rowId = event.target.dataset.rowId;
                    let quantityInput = document.getElementById('quantity-' + rowId);
                    let newQuantity = parseInt(quantityInput.value);

                    if (isPlus) {
                        newQuantity++;
                    } else {
                        newQuantity = Math.max(1, newQuantity - 1);
                    }

                    // Update the quantity input value
                    quantityInput.value = newQuantity;

                    // Update the server with the new quantity
                    fetch(`/cart/update/${rowId}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        body: JSON.stringify({ quantity: newQuantity })
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Update the total price for the item
                            let productPrice = parseFloat(document.querySelector(`.cart-items-number[data-product-id="${rowId}"]`).dataset.productPrice);
                            document.getElementById('item-total-' + rowId).innerText = (productPrice * newQuantity).toLocaleString() + ' FCFA';

                            // Update the cart total
                            document.getElementById('cart-total').innerText = data.cartTotal;
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\bouki\resources\views/panier.blade.php ENDPATH**/ ?>