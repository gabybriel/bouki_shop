
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
        <a id="share" class="fw-bold text-white text-decoration-none ms-2" href="#"><i class="icofont-share p-2 bg-success shadow-sm rounded-circle"></i></a>
        <a class="toggle ms-3" href="#"><i class="icofont-navigation-menu "></i></a>
    </div>
</div>



<!-- sidebar + content -->
<section class="mt-10 mb-10 py-10">
    <div class="container">
        <div class="row">
            <!-- sidebar -->
            <div class="col-lg-3">
                <!-- Toggle button -->
                <button
                    class="btn btn-outline-secondary bg-success mb-3 text-white w-100 d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="toggle navigation"
                >
                    <span>Filter</span>
                </button>
                <!-- Collapsible wrapper -->
                <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button
                                    class="bg-success accordion-button text-white"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne"
                                    aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne"
                                >
                                    Categorie
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key < 5): ?>
                                            <li class="list-unstyled">
                                                <a href="<?php echo e(route('catepage.show', $category->id)); ?>" class="text-dark"><?php echo e($category->categoriename); ?></a>
                                            </li>
                                        <?php else: ?>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button
                                    class=" bg-success accordion-button text-white"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseTwo"
                                >
                                    Sous Categories
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key < 5): ?>
                                            <li class="list-unstyled">
                                                <a href="#" class="text-dark"><?php echo e($subcategory->subcategoryname); ?></a>
                                            </li>
                                        <?php else: ?>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sidebar -->
            <!-- content -->
            <div class="col-lg-9">
                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                    <strong class="d-block py-2">Tous les articles trouvés </strong>
                </header>
                <div class="row">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 py-2">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <a href="<?php echo e(route('details', $article->id)); ?>" class="text-dark">
                                        <?php if($article->is_promo != 0): ?>
                                            <div class="member-plan position-absolute">
                                                <span class="badge m-3 badge-danger"><?php echo e($article->is_promo); ?>%</span>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <hr />

            </div>
        </div>
    </div>
</section>
<!-- sidebar + content -->














<!-- Footer -->
<div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
    <div class="row m-0">
        <a href="/" class="text-dark small col font-weight-bold text-decoration-none p-2 selected">
            <p class="h5 m-0"><i class="icofont-grocery"></i></p>
            Boutique
        </a>
        <a href="<?php echo e(route('cart.index')); ?>" class="text-muted col small text-decoration-none p-2 ">
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




<?php /**PATH C:\xampp\htdocs\bouki\resources\views/plus.blade.php ENDPATH**/ ?>