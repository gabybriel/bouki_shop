<?php
    use Carbon\Carbon;
?>


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

<div class="p-3 bg-white">
    <div class="d-flex align-items-center">
        <a class="fw-bold text-success text-decoration-none" href="/"><i class="icofont-rounded-left back-page"></i> Retour</a>
        <a class="ms-auto fw-bold text-white text-decoration-none" href="#"></a>
        <a id="share" class="fw-bold text-white text-decoration-none ms-2" href="<?php echo e(route ('details', $article->id)); ?>" target="_blank"><i class="icofont-share p-2 bg-success shadow-sm rounded-circle"></i></a>
        <a class="toggle ms-3" href="#"><i class="icofont-navigation-menu "></i></a>
    </div>
</div>

<div class="px-3 bg-white pb-3">
    <div class="pt-0">
        <h2 class="fw-bold"><?php echo e($article->titre); ?></h2>
        <p class="fw-light text-dark m-0 d-flex align-items-center">
            Prix :  <b class="h6 text-dark m-0"> <?php echo e($article->prix); ?> FCFA</b>
            <span class="badge  badge-danger ms-2"> <?php echo e($article->taille); ?></span>
        </p>
        <div class="rating-wrap d-flex align-items-center mt-2">
            <p>Ref: <b><?php echo e($article->numero); ?></b></p>
            <?php if($article->user): ?>
                <p style="margin-left: 10px;">Marchand: <b><?php echo e($article->user->shopname); ?></b></p>
            <?php else: ?>
                <p style="margin-left: 10px;">Marchand: <b></b></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="pt-2">
        <div class="row">
        </div>
    </div>
</div>



<div class="osahan-product">

    <div class="product-details">
        <div class="recommend-slider py-1">
            <div class="osahan-slider-item m-2">
                <img src="<?php echo e($article->image); ?>" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
            </div>
            <div class="osahan-slider-item m-2">
                <img src="<?php echo e($article->image); ?>" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
            </div>
            <div class="osahan-slider-item m-2">
                <img src="<?php echo e($article->image); ?>" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
            </div>
        </div>
        <div class="details">
            <div class="p-3 bg-white">
                <div class="d-flex align-items-center">
                    <!-- 2nd option -->
                    <div class="" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-warning rounded-pill shadow-none" for="btnradio1"> <?php echo e($article->taille); ?></label>

                        <!--<input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">-->
                        <!--<label class="btn btn-outline-warning rounded-pill shadow-none" for="btnradio2"> <?php echo e($article->taille); ?></label>-->

                        <!--<input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">-->
                        <!--<label class="btn btn-outline-warning rounded-pill shadow-none" for="btnradio3"><?php echo e($article->taille); ?></label>-->
                    </div>


                    <form action="<?php echo e(route('cart.store')); ?>" method="post" class="ms-auto rounded">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="product_id" value="<?php echo e($article->id); ?>">
                        <button type="submit" class="btn btn-success btn-sm form-control mt-3">
                            <span class="fa fa-shopping-cart"></span> + Ajouter au panier
                        </button>
                    </form>
                </div>
            </div>
            <div class="p-3">
                <p class="fw-bold mb-2">Details du Produit </p>
                <p class="text-muted small">
                    <?php echo $article->description; ?>

                </p>
                <div class="input-group mb-3 rounded shadow-sm overflow-hidden bg-white">
                    <form action="<?php echo e(route('search')); ?>" method="get" class="text-decoration-none">
                        <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
                            <div class="input-group-prepend">
                                <button class="border-0 btn btn-outline-secondary text-success bg-white" type="submit">
                                    <i class="icofont-search"></i>
                                </button>
                            </div>
                            <input type="text" name="search_query" class="shadow-none border-0 form-control ps-0" placeholder="Rechercher un produit.." aria-label="" aria-describedby="basic-addon1">
                        </div>
                    </form>
                </div>


                <p class="fw-bold mb-3">Suggestion</p>
                <div class="row">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->index < 9): ?>
                            <div class="col-6 py-2">
                                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                    <div class="list-card-image">
                                        <a href="<?php echo e(route ('details', $article->id)); ?>" class="text-dark">
                                            <?php if($article->is_promo != 0): ?>
                                                <div class="member-plan position-absolute">
                                                    <span class="badge m-3" style="height:40px; background-color: rgba(136,12,12,0.8); text-align: center; font-size: 20px; padding: 8px;"><?php echo e($article->is_promo); ?>%</span>
                                                </div>
                                            <?php elseif(Carbon::parse($article->created_at)->gt(Carbon::now()->subDays(5))): ?>
                                                <div class="member-plan position-absolute">
                                                    <span class="badge m-3 badge-success">New</span>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="p-3">
                                                <img src="<?php echo e($article->image); ?>" class="img-fluid item-img w-100 mb-3">
                                                <h6><?php echo e($article->titre); ?></h6>
                                                <div class="d-flex align-items-center">
                                                    <p class="price m-0 text-success"><?php echo e($article->prix); ?> FCFA</p>

                                                    <form action="<?php echo e(route('cart.store')); ?>" method="post" style="margin-left: 30px;">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($article->id); ?>">
                                                        <button type="submit" class="btn btn-success">+</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <!-- Footer -->
    <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
        <div class="row m-0">
            <a href="/" class="text-dark small col font-weight-bold text-decoration-none p-2 selected">
                <p class="h5 m-0"><i class="icofont-grocery"></i></p>
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

    <script>
        document.getElementById('share-link').addEventListener('click', function(event) {
            event.preventDefault();
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    url: window.location.href
                }).then(() => {
                    console.log('Merci d\'avoir partagé !');
                }).catch((error) => {
                    console.log('Erreur de partage:', error);
                });
            } else {
                // Fallback si l'API Web Share n'est pas supportée
                alert('Le partage Web n\'est pas supporté sur ce navigateur.');
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\bouki\resources\views/details.blade.php ENDPATH**/ ?>