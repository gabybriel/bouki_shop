<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouki-Shopping</title>

    <!-- Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome via CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="shortcut icon" href="./asset/images/logo/favicon.ico" type="image/x-icon">

    <!--
    bootstrap 5
  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('./asset/css/style-prefix.css') }}">
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>


    <div class="overlay" data-overlay></div>


    <!--
    - HEADER
  -->

    <header>

        <div class="header-top" style="background-color: #ff04d3; background-image: url('./asset/images/checkout-h.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div class="container">
                <br>
            </div>

        </div>

        <div class="header-main" style="background-color: yellow; background-image: url('{{ asset('./asset/images/barner.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div class="container">

                <a href="/" class="header-logo">
                    <img src="{{ asset('./asset/images/logo/logo.png') }}" alt="Anon's logo" width="145">
                </a>

                <div class="header-user-actions">

                    <button class="action-btn">
                        <a href="{{ route('login') }}" style="color: #3c3a3a;">
                            <ion-icon name="person-outline">
                            </ion-icon>
                        </a>
                    </button>

                    <button class="action-btn">
                        <ion-icon name="heart-outline"></ion-icon>
                        <span class="count">0</span>
                    </button>

                    <button class="action-btn">
                        <a href="{{ route('cart.index') }}" style="color: #3c3a3a;"><ion-icon name="bag-handle-outline"></ion-icon>
                            <span class="count">{{ Cart::count() }}</span></a>
                    </button>

                </div>

            </div>

        </div>

        <nav class="desktop-navigation-menu">
            <br>
        </nav>

        <div class="mobile-bottom-navigation">

            <button class="action-btn">
                <a href="{{ route('cart.index') }}" style="color: #3c3a3a;"><ion-icon name="bag-handle-outline"></ion-icon>
                    <span class="count">{{ Cart::count() }}</span></a>
            </button>

            <button class="action-btn">
                <a href="/">
                    <ion-icon name="home-outline"></ion-icon>
                </a>
            </button>

            <button class="action-btn">
                <a href="{{ route('login') }}" style="color: #3c3a3a;">
                    <ion-icon name="person-outline">
                    </ion-icon>
                </a>
            </button>
        </div>

    </header>


    <!--
      - PRODUCT
    -->

    <section class="h-100 h-custom">
        <div class="container py-4 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <h3 style="text-align: center;"> CONDITIONS GENERALES DE VENTES - BOUKI-SHOPPING </h3><br>
                    <div class="card">
                        <div class="card-body p-2">

                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($conditions as $condition)
                                    <p> {!! $condition->cgv !!}</p>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br><br><br><br>

    <!--
    - FOOTER
  -->

    <footer>

        <div class="footer-category">

            <div class="container">

                <h2 class="footer-category-title" style="text-align: center;"><a href="#"> Conditions generales de vente </a></h2>


            </div>

        </div>


        <div class="footer-bottom">

            <div class="container">

                <img src="{{ asset('./asset/images/payment.png') }}" alt="payment method" class="payment-img">

                <p class="copyright">
                    &copy; <a href="#">Bouki-Shopping</a> Tous droits réservés.
                </p>

            </div>

        </div>


    </footer>


    <!--
    - custom js link
  -->
    <script src="./asset/js/script.js"></script>

    <!--
    - ionicon link
  -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Bootstrap JS and Popper.js via CDN (Optional, if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>