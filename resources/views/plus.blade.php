
@php
    use Carbon\Carbon;
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('./asset/images/logo/favicon.png') }}" type="image/x-icon">
    <title>Bouki-Shopping</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('vendor/slick/slick.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('vendor/slick/slick-theme.min.css')}}"/>
    <!-- Icofont Icon-->
    <link href="{{ asset ('vendor/icons/icofont.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset ('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset ('css/style.css')}}" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="{{ asset ('vendor/sidebar/demo.css')}}" rel="stylesheet">
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
                                    @foreach ($categories as $key => $category)
                                        @if ($key < 5)
                                            <li class="list-unstyled">
                                                <a href="{{ route('catepage.show', $category->id) }}" class="text-dark">{{ $category->categoriename }}</a>
                                            </li>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
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
                                    @foreach ($subcategories as $key => $subcategory)
                                        @if ($key < 5)
                                            <li class="list-unstyled">
                                                <a href="#" class="text-dark">{{ $subcategory->subcategoryname }}</a>
                                            </li>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
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
                    @foreach ($articles as $article)
                        <div class="col-6 py-2">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <a href="{{ route('details', $article->id) }}" class="text-dark">
                                        @if($article->is_promo != 0)
                                            <div class="member-plan position-absolute">
                                                <span class="badge m-3" style="height:40px; background-color: rgba(136,12,12,0.8); text-align: center; font-size: 20px; padding: 8px;">{{$article->is_promo}}%</span>
                                            </div>
                                        @elseif(Carbon::parse($article->created_at)->gt(Carbon::now()->subDays(5)))
                                            <div class="member-plan position-absolute">
                                                <span class="badge m-3 badge-success">New</span>
                                            </div>
                                        @endif
                                        <div class="p-3">
                                            <img src="{{ $article->image }}" class="img-fluid item-img w-100 mb-3">
                                            <h6>{{ $article->titre }}</h6>
                                            <div class="d-flex align-items-center">
                                                <p class="price m-0 text-success">{{ $article->prix }} FCFA</p>
                                                <form action="{{ route('cart.store') }}" method="post" style="margin-left: 30px;">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $article->id }}">
                                                    <button type="submit" class="btn btn-success">+</button>
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

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
        <a href="{{ route('cart.index') }}" class="text-muted col small text-decoration-none p-2 ">
            <p class="h5 m-0"><i class="icofont-cart"><span class="badge badge-danger p-1 ms-1 small">{{ Cart::count() }}</span></i></p>
            Panier
        </a>
        <a href="{{ route('commandelist') }}" class="text-muted col small text-decoration-none p-2">
            <p class="h5 m-0"><i class="icofont-bag"></i></p>
            Commandes
        </a>
        <a href="{{ route('dashboard') }} " class="text-muted small col text-decoration-none p-2">
            <p class="h5 m-0"><i class="icofont-user"></i></p>
            Compte
        </a>
    </div>
</div>
<nav id="main-nav">
    <ul class="second-nav">

        <li>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" href="{{ route('logout') }}" @click.prevent="$root.submit();" class="btn btn-success"><i class="icofont-check-circled me-2 "></i>Déconnexion</button>
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
            <a href="{{ route('cart.index') }}">
                <p class="h5 m-0"><i class="icofont-cart"></i></p>
                Panier
            </a>
        </li>
        <li class="ko-fi">
            <a href="{{ route('dashboard') }}">
                <p class="h5 m-0"><i class="icofont-user"></i></p>
                Moi
            </a>
        </li>
    </ul>
</nav>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset ('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset ('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- slick Slider JS-->
<script type="text/javascript" src="{{ asset ('vendor/slick/slick.min.js')}}"></script>
<!-- Sidebar JS-->
<script type="text/javascript" src="{{ asset ('js/hc-offcanvas-nav.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset ('js/osahan.js')}}"></script>

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




