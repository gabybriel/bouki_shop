<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.svg">
    <title>Mon compte</title>
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
    <div class="osahan-account">
        <div class="p-3 border-bottom">
            <div class="d-flex align-items-center">
                <h5 class="fw-bold m-0">Mon compte</h5>
                <a class="toggle ms-auto" href="#"><i class="icofont-navigation-menu "></i></a>
            </div>
        </div>
        <div class="p-4 profile text-center border-bottom">
            <img src="<?php echo e(asset('../assets/images/profile/user-1.png')); ?>" class="img-fluid rounded-pill" width="150">
            <h6 class="fw-bold m-0 mt-2"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->prenoms); ?></h6><br>
            <p class="small text-muted"><?php echo e(Auth::user()->phone); ?><br> <?php echo e(Auth::user()->email); ?></p>
            <a href="edit_profile.html" class="btn btn-success btn-sm"><i class="icofont-pencil-alt-5"></i> Editer le profil</a>
        </div>
        <div class="account-sections">
            <ul class="list-group">

                <a href="" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-info-circle osahan-icofont bg-primary"></i>Conditions générales
                        <span class="badge badge-success p-1 badge-pill ms-auto"><i class="icofont-simple-right"></i></span>
                    </li>
                </a>
                <a href="help_support.html" class="text-decoration-none text-dark">
                    <li class="border-bottom bg-white d-flex align-items-center p-3">
                        <i class="icofont-phone osahan-icofont bg-warning"></i>Support 24h/24
                        <span class="badge badge-success p-1 badge-pill ms-auto"><i class="icofont-simple-right"></i></span>
                    </li>
                </a>
            </ul>
        </div>
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
</body>

</html><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/dashboard.blade.php ENDPATH**/ ?>