<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.svg">
    <title>Liste des commandes</title>
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
    <div class="osahan-order">
        <div class="order-menu">
            <h5 class="fw-bold p-3 d-flex align-items-center">Mes commandes <a class="toggle ms-auto" href="#"><i class="icofont-navigation-menu"></i></a></h5>
            <div class="row m-0 text-center">
                <div class="col pb-2 border-success border-bottom">
                    <a href="" class="text-success fw-bold text-decoration-none">Toute les commandes</a>
                </div>
                
            </div>
        </div>
        <div class="order-body px-3 pt-3">
            <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="pb-3">
                <div href="#" class="text-decoration-none text-dark">
                    <div class="p-3 rounded shadow-sm bg-white">
                        <div class="d-flex align-items-center mb-3">
                            <span class=" badge <?= $commande->statut === 'En attente de paiement' ? 'bg-warning' : '' ?>
                                                        <?= $commande->statut === 'Payer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'En cours' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En cours de traitement' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'En attente' ? 'bg-primary' : '' ?>
                                                        <?= $commande->statut === 'Livrer' ? 'bg-success' : '' ?>
                                                        <?= $commande->statut === 'Annuler' ? 'bg-danger' : '' ?>
                                                        rounded-3 fw-semibold ">
                                        <?php echo e($commande->statut); ?>

                                    </span>
                            <!-- Date de la commande -->
                            <p class="text-muted ms-auto small mb-0"><i class="icofont-clock-time"></i> <?php echo e($commande->created_at); ?></p>
                        </div>
                        <div class="d-flex">
                            <!-- ID de la commande -->
                            <p class="text-muted m-0">ID de la Commande<br>
                                <span class="text-dark fw-bold"><?php echo e($commande->num_commande); ?></span>
                            </p>
                            <!-- Adresse de livraison -->
                            <p class="text-muted m-0 ms-auto">Adresse de livraison<br>
                                <span class="text-dark fw-bold"><?php echo e($commande->adresse); ?>, <?php echo e($commande->ville); ?></span>
                            </p>
                            <!-- Montant total -->
                            <p class="text-muted m-0 ms-auto">Montant Total<br>
                                <span class="text-dark fw-bold"><?php echo e($commande->total); ?> FCFA</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
    <!-- Footer -->
    <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
        <div class="row m-0">
            <a href="/" class="text-dark small col font-weight-bold text-decoration-none p-2">
                <p class="h5 m-0"><i class="icofont-grocery"></i></p>
                Boutique
            </a>
            <a href="<?php echo e(route('cart.index')); ?>" class="text-muted col small text-decoration-none p-2">
                <p class="h5 m-0"><i class="icofont-cart"><span class="badge badge-danger p-1 ms-1 small"><?php echo e(Cart::count()); ?></span></i></p>
                Panier
            </a>
            <a href="<?php echo e(route('commandelist')); ?>" class="text-muted col small text-decoration-none p-2 selected">
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/osahan.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\bouki\resources\views/commandelist.blade.php ENDPATH**/ ?>