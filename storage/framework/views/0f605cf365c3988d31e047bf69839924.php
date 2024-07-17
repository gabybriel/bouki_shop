<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="<?php echo e(asset('./asset/images/logo/favicon.png')); ?>" type="image/x-icon">
      <title>Bouki-Shopping</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('vendor/slick/slick.min.css')); ?>"/>
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('vendor/slick/slick-theme.min.css')); ?>"/>
      <!-- Icofont Icon-->
      <link href="<?php echo e(asset ('vendor/icons/icofont.min.css')); ?>" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo e(asset ('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo e(asset ('css/style.css')); ?>" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="<?php echo e(asset ('vendor/sidebar/demo.css')); ?>" rel="stylesheet">
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



      <div class="picks-today">

        <div class="p-3 border-bottom">
            <div class="d-flex align-items-center">
               <a class="fw-bold text-success text-decoration-none" href="/">
               <i class="icofont-rounded-left back-page"></i></a>
               <span class="fw-bold ms-3 h6 mb-0">Retour</span>
               <a class="toggle ms-auto" href="#"><i class="icofont-navigation-menu "></i></a>
            </div>
         </div>


         <div class="pick_today px-3 pb-3">
            <div class="container mt-5">
                <h1>Resultats pour "<?php echo e($query); ?>"</h1>
        
                <?php if($articles->isEmpty()): ?>
                    <p>Aucune article trouvé.</p>
                <?php else: ?>

                
            <div class="row pt-3">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <div class="col-6 pe-2">
                   <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                      <div class="list-card-image">
                         <a href="<?php echo e(route ('details', $article->id)); ?>" class="text-dark">
                            <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">10%</span></div>
                            <div class="p-3">
                               <img src="<?php echo e($article->image); ?>" class="img-fluid item-img w-100 mb-3">
                               <h6><?php echo e($article->titre); ?></h6>
                               <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success"><?php echo e($article->prix); ?> FCFA</h6>
                                    <a href="cart.html" class="btn btn-success btn-sm ms-auto">+</a>
                                </div>
                            </div>
                         </a>
                      </div>
                   </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
             </div>
            <?php endif; ?>
         </div>


      </div>

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
        <script src="<?php echo e(asset ('vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset ('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- slick Slider JS-->
        <script type="text/javascript" src="<?php echo e(asset ('vendor/slick/slick.min.js')); ?>"></script>
        <!-- Sidebar JS-->
        <script type="text/javascript" src="<?php echo e(asset ('js/hc-offcanvas-nav.js')); ?>"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo e(asset ('js/osahan.js')); ?>"></script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\bouki\resources\views/search/results.blade.php ENDPATH**/ ?>