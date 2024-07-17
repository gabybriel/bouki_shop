<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('../assets/images/logos/favicon.png')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('../assets/css/styles.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datatables.min.css')); ?>">

</head>

<body style="background-color: #eee;">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between" style="background-color: #f02eb5">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <b class="p-5" style="color: #fff;">
                            <?php if(Auth::user()->is_admin): ?>
                            Administrateur
                            <?php elseif(Auth::user()->is_user): ?>
                            Utilisateur
                            <?php endif; ?>

                        </b>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav"><br><br>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route('admin-dashboard')); ?>" aria-expanded="false" style="background-color: #f02eb5;color:#fff;">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <br>
                        <img src="<?php echo e(asset('../assets/images/logos/logo.png')); ?>" width="180" alt="" />
                        <br><br>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route ('articles.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-box"></i>
                                </span>
                                <span class="hide-menu">Articles</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route ('orders.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span class="hide-menu">Commandes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route ('categories.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route ('sous-categories.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Sous-catégories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route('rapports.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Rapports</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route ('users.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Utilisateus</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-config nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Configurations</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route ('conditions.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file"></i>
                                </span>
                                <span class="hide-menu">Conditions générales</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route ('slider-config.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-photo"></i>
                                </span>
                                <span class="hide-menu">Slider config</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo e(route('formations.index')); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-school"></i>
                                </span>
                                <span class="hide-menu">Formations</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header" style="background-color: #f02eb5">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="text-white">
                                <b><?php echo e(Auth::user()->name); ?></b>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo e(asset('../assets/images/profile/user-1.jpg')); ?>" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Mon profil</p>
                                        </a>
                                        <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block" href="<?php echo e(route('logout')); ?>" @click.prevent="$root.submit();" style="background-color: #f02eb5;color:#fff;">
                                                Deconnexion</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->

                <?php echo $__env->yieldContent('admin-content'); ?>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session('success')): ?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?php echo e(session('success')); ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php endif; ?>


    <script src="<?php echo e(asset('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/simplebar/dist/simplebar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>


    <script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/fr.json')); ?>"></script>


</body>

</html><?php /**PATH C:\xampp\htdocs\Myshop\resources\views/layouts/admin-layout.blade.php ENDPATH**/ ?>