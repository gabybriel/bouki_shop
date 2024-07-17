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
   <!-- Account Setup -->
   <div class="osahan-account-setup">
      <div class="account-setup">
         <video loop="" autoplay="" muted="" id="vid" class="w-100">
            <source src="img/grocery.mp4" type="video/mp4">
            <source src="img/grocery.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
      </div>
      <a class="p-4 text-white font-weight-bold d-flex align-items-center h4 text-decoration-none" href="">
         <img class="" src="../assets/images/logos/logo3.png" width="260">
      </a>
   </div>
   <!-- fixed bottom -->
   <div class="fixed-bottom fixed-bottom-auto px-4 pt-4 text-center d-grid gap-2">
      <a href="<?php echo e(route('register')); ?>" class="btn btn-success rounded btn-block btn-lg">
         Créer un compte
      </a>
      <a href="#" class="btn btn-primary btn-block rounded btn-lg btn-apple">
         <i class="icofont-social-facebook me-2"></i> S'inscrire avec Facebook
      </a>
      <a href="#" class="btn btn-light btn-block rounded btn-lg btn-google">
         <i class="icofont-google-plus text-danger me-2"></i> S'inscrire avec Google
      </a>
      <a href="<?php echo e(route('authlogin')); ?>" class="text-white btn btn-sm btn-block text-decoration-none mb-2">Vous avez déjà un compte? <br> Connectez-vous ici</a>
   </div>

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

</html><?php /**PATH C:\xampp\htdocs\bouki\resources\views/auth/login.blade.php ENDPATH**/ ?>