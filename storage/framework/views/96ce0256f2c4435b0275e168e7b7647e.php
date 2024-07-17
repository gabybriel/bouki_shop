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

      <div class="osahan-profle">
        <div class="p-3 border-bottom">
           <div class="d-flex align-items-center">
              <a class="fw-bold text-success text-decoration-none" href="my_account.html">
              <i class="icofont-rounded-left back-page"></i></a>
              <h6 class="fw-bold m-0 ms-3">Edit Profile</h6>
              <a class="toggle ms-auto" href="#"><i class="icofont-navigation-menu "></i></a>
           </div>
        </div>
     </div>




     <div id="edit_profile">
        <div class="p-4 profile text-center border-bottom">
           <img src="<?php echo e(asset('../assets/images/profile/user-1.png')); ?>" class="img-fluid rounded-pill" width="150">
           <h6 class="fw-bold m-0 mt-2"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->prenoms); ?></h6>
           <p class="small text-muted m-0"><?php echo e(Auth::user()->phone); ?><br> <?php echo e(Auth::user()->email); ?></p>
        </div>
        <div class="p-3">
            <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?> <!-- This is already implied when using POST method, but you can specify if you want -->
                
                <div class="form-group mb-3">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            
                <div class="form-group mb-3">
                    <label for="prenoms">Prénom</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['prenoms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="prenoms" name="prenoms" value="<?php echo e(old('prenoms', $user->prenoms)); ?>">
                    <?php $__errorArgs = ['prenoms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            
                <div class="form-group mb-3">
                    <label for="phone">Téléphone</label>
                    <input type="number" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            
                <div class="text-center d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Save Changes</button>
                </div>
            </form>
            
        </div>
        <div class="additional">
           <div class="change_password border-bottom border-top">
              <a href="change_password.html" class="p-3 bg-white btn d-flex align-items-center border-0 rounded-0">Change Password 
              <i class="icofont-rounded-right ms-auto"></i></a>
           </div>
           <div class="deactivate_account border-bottom">
              <a href="deactivate_account.html" class="p-3 bg-white btn d-flex align-items-center border-0 rounded-0">Deactivate Account 
              <i class="icofont-rounded-right ms-auto"></i></a>
           </div>
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
            <a href="<?php echo e(route('commandelist')); ?>" class="text-muted col small text-decoration-none p-2">
                <p class="h5 m-0"><i class="icofont-bag"></i></p>
                Commandes
            </a>
            <a href="<?php echo e(route('dashboard')); ?> " class="text-muted small col text-decoration-none p-2 selected">
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

</html><?php /**PATH C:\xampp\htdocs\bouki\resources\views/profile/edit.blade.php ENDPATH**/ ?>