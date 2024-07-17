<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.svg">
    <title>Paiement</title>
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

    <div class="osahan-payment">
        <div class="p-3 border-bottom">
            <div class="d-flex align-items-center">
                <a class="fw-bold text-success text-decoration-none" href="<?php echo e(route('cart.index')); ?>">
                    <i class="icofont-rounded-left back-page"></i></a>
                <h6 class="fw-bold m-0 ms-3">Mode de paiement</h6>
                <a class="toggle ms-auto" href="#"><i class="icofont-navigation-menu "></i></a>
            </div>
        </div>

        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>


        <form action="<?php echo e(route('commande.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="payment p-3">
                <div class="accordion" id="accordionExample">
                    <div class="osahan-card rounded shadow-sm bg-white mb-3">
                        <div class="osahan-card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="d-flex p-3 align-items-center border-0 btn btn-outline-success bg-white text-decoration-none text-success w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="icofont-credit-card me-3"></i> Paiement Mobile
                                    <i class="icofont-rounded-down ms-auto"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="osahan-card-body p-3 border-top">
                                <h6 class="m-0">Selectionnez votre mode de paiement</h6>
                                <p class="small">NOUS ACCEPTONS <span class="osahan-card ms-2 fw-bold"> MTN et AIRTEL Mobile money</span></p>

                                <div class="d-flex justify-content-center">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn">
                                            <input type="radio" id="modePaiement" name="modepaiement" autocomplete="off" value="MTN">
                                            <img src="<?php echo e(asset('./asset/images/mtn-logo.jpg')); ?>" alt="Option 1" class="img-fluid" width="100">
                                        </label>

                                        <label class="btn btn">
                                            <input type="radio" id="modePaiement" name="modepaiement" autocomplete="off" value="AIRTEL">
                                            <img src="<?php echo e(asset('./asset/images/airtel-logo.jpg')); ?>" alt="Option 2" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>


                                <div class="container mt-2">
                                    <p class="alert alert-warning text-center"> <small> NB: Aucun prélèvement automatique ne sera effectué ; vous devez effectuer un transfert en utilisant les numéros fournis par le système.</small></p>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label class="form-label fw-bold small">Adresse</label>
                                        <div class="input-group">
                                            <input placeholder="Votre Adresse de livraison" type="text" name="adresse" class="form-control">
                                            <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-pin"></i></button></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group mb-3">
                                        <label class="form-label fw-bold small">Ville</label>
                                        <input placeholder="Votre ville" type="text" name="ville" class="form-control">
                                    </div>

                                    <div class="d-flex justify-content-between mt-5">
                                        <h6 class="mb-2">Frais Mobile Money :</h6>
                                        <p class="mb-2" id="fraisPourcentage"><b></b></p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-3">
                                        <h6 class="mb-2">TOTAL :</h6>
                                        <p class="mb-2" id="totalAmount"><b><?php echo e(Cart::subtotal()); ?> FCFA</b></p>
                                    </div>

                                    <div class="col-md-12 form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Enregistrez ces informations en toute sécurité pour un paiement plus rapide la prochaine fois.
                                            </label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="osahan-card rounded shadow-sm bg-white mb-3">
                        <div class="osahan-card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="d-flex p-3 align-items-center btn border-0 text-decoration-none text-success w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="icofont-cart me-3"></i> Details de la commande
                                    <i class="icofont-rounded-down ms-auto"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="osahan-card-body p-3 border-top">

                                <div class="" role="group" aria-label="Basic radio toggle button group">

                                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cart-items bg-white position-relative border-bottom">
                                        <div class="d-flex align-items-center p-3">
                                            <a href="product_details.html"><img src="<?php echo e($product->model->image); ?>" class="img-fluid"></a>
                                            <a href="product_details.html" class="ms-3 text-dark text-decoration-none w-100">
                                                <h5 class="mb-1"><?php echo e($product->model->taille); ?></h5>
                                                <p class="text-muted mb-2"><span class="text-success me-1"> <?php echo e(number_format(floatval($product->price), 0, ',', ' ')); ?> FCFA</span></p>
                                                <div class="d-flex align-items-center">
                                                    <p class="total_price fw-bold m-0"></p>

                                                    <!-- Bouton Supprimer -->
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <input type="hidden" name="article_id" value="<?php echo e($product->id); ?>">
            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- ... existing code ... -->
            <input type="hidden" name="article_ids[]" value="<?php echo e($product->id); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <!-- continue -->
    <div class="fixed-bottom">
        <button type="submit" class="btn btn-success btn-block form-control"> Valider votre Commande </button>
    </div>

    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="addAddress1">Address Name</label>
                        <input type="text" class="form-control" id="addAddress1" required>
                    </div>
                    <div class="form-group">
                        <label for="addAddress2">Enter Full Address</label>
                        <input type="text" class="form-control" id="addAddress2" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>


            </div>
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
        // Supprimez la fonction updateFrais de la sélection onchange du mode de paiement
        // Appeler la fonction updateFrais uniquement au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            updateFrais();
        });

        function updateFrais() {
            // Récupérer le montant total
            var totalAmount = parseFloat(document.getElementById('totalAmount').innerText.replace(' FCFA', '').replace(',', ''));

            // Calculer les frais (3,5 % du montant total)
            var frais = (totalAmount * 3.5) / 100;

            // Ajouter les frais au montant total
            var montantAvecFrais = totalAmount + frais;

            // Afficher les frais dans le paragraphe fraisPourcentage
            document.getElementById('fraisPourcentage').innerHTML = '<b>' + frais.toFixed(2) + ' FCFA</b>';

            // Mettre à jour le montant total avec les frais
            document.getElementById('totalAmount').innerHTML = '<b>' + montantAvecFrais.toFixed(2) + ' FCFA</b>';
        }
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/commander.blade.php ENDPATH**/ ?>