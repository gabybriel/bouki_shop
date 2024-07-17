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
   <link rel="icon" type="image/png" href="img/logo.svg">
   <title>Boutique</title>
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

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-XXX" crossorigin="anonymous">

   <style>
      /* Ajoute une transition douce entre les diapositives */
      .carousel-item {
         transition: transform 0.6s ease;
      }
   </style>
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
   <!-- home page -->
   <div class="osahan-home-page">
      <div class="border-bottom p-3" style="background-color: #fd9b26; background-image: url('./asset/images/barner.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
         <div class="title d-flex align-items-center">
            <a href="/" class="text-decoration-none text-dark d-flex align-items-center">
               <img class="" src="../assets/images/logos/logo.png" width="160">
               <h4 class="font-weight-bold text-success m-0"></h4>
            </a>
            <p class="ms-auto m-0">
               <a href="#" class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
                  <i class="text-dark icofont-notification"></i>
                  <span class="badge badge-danger p-1 ms-1 small"></span>
               </a>
            </p>
            <a class="toggle ms-3" href="#"><i class="icofont-navigation-menu "></i></a>
         </div>
         <form action="{{route('search')}}" method="get" class="text-decoration-none">
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
      <!-- body -->
      <div class="osahan-body">

         <!-- Slider -->
         <div id="carouselExampleControls" class="p-3 carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               @foreach ($sliders as $key => $slider)
               <div class="carousel-item @if($key == 0) active @endif">
                  <img class="d-block w-100" src="{{ $slider->image }}" alt="Slide {{ $key + 1 }}">
               </div>
               @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>


         @include('layouts.messages')

         <!-- Categories Section -->
         <div class="mt-4 p-3">
            <div id="categoriesCarousel" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-inner">
                  @php $count = count($categories); @endphp
                  @for ($i = 0; $i < $count; $i +=3) <div class="carousel-item @if ($i === 0) active @endif">
                     <div class="row">
                        @for ($j = $i; $j < $i + 3 && $j < $count; $j++) <div class="col-4">
                           <div class="text-center mb-3">
                              <a href="{{route ('catepage.show', ['category' => $categories[$j]->id])}}">
                                 <img src="{{ $categories[$j]->image }}" alt="{{ $categories[$j]->name }}" width="75" height="75" class="img-fluid rounded-circle" style="border: 2px solid white;">
                              </a>
                              <p>{{ $categories[$j]->categoriename }}</p>
                           </div>
                     </div>
                     @endfor
               </div>
            </div>
            @endfor
         </div>

         <button class="carousel-control-prev rounded-circle btn btn-primary btn-sm" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="prev" style="width: 25px; height: 25px; border: 1px solid #ccc; background-color:black; border-radius: 0; margin-top: 25px; margin-right: 10px;">
            <span class="visually-hidden">Previous</span>
            <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 15px;"></span>
         </button>

         <button class="carousel-control-next rounded-circle btn btn-primary btn-sm" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="next" style="width: 25px; height: 25px; border: 1px solid #ccc; background-color:black; border-radius: 0; margin-top: 25px; margin-left: 10px;">
            <span class="visually-hidden">Next</span>
            <span class="carousel-control-next-icon" aria-hidden="true" style="width: 15px;"></span>
         </button>

      </div>
   </div>


   </div>
   <!-- Promos -->
   <div class="title d-flex align-items-center p-3">
      <h6 class="m-0">Recommander pour vous</h6>
      <a class="ms-auto text-success" href="#">{{ $articleCount }} Articles et plus</a>
   </div>
   <!-- osahan recommend -->
   <div class="osahan-recommend px-3">
      <div class="row">
         <div class="col-12 mb-3">
            <div class="text-dark text-decoration-none">
               <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                  <div class="recommend-slider rounded pt-2">
                     @foreach ($articles as $article)
                     @if ($loop->index < 8) <div class="osahan-slider-item m-2 rounded">
                        <img src="{{ $article->image }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                  </div>
                  @else
                  @break
                  @endif
                  @endforeach
               </div>

               <div class="p-3 position-relative">
                  <h6 class="mb-1 font-weight-bold text-success">Quoi de neuf
                  </h6>
                  <p class="text-muted">Voir les articles les plus récents</p>
                  <div class="d-flex align-items-center">
                     <h6 class="m-0"></h6>
                  </div>
               </div>
         </div>
         </div>
      </div>
   </div>
   </div>



   <!-- Pick's Today -->
   <!-- pick today -->
   <div class="pick_today px-3">
       <h6 class="m-0">Recommander pour vous</h6>
       <a class="ms-auto text-success" href="{{route("autres.plus")}}">Voir plus d'articles </a>
      <div class="row">
         @foreach ($articles->where('quantity', '!=', 0) as $article)
         @if ($loop->index < 4) <div class="col-6 pe-2 mb-3">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
               <div class="list-card-image">
                  <a href="{{route ('details', $article->id)}}" class="text-dark">
                      @if(Carbon::parse($article->created_at)->gt(Carbon::now()->subDays(5)))
                          <div class="member-plan position-absolute">
                              <span class="badge m-3 badge-success">New</span>
                          </div>
                      @endif
                     <div class="p-3">
                        <img src="{{ $article->image }}" class="img-fluid item-img w-100 mb-3">
                        <h6>{{ $article->numero }}</h6>
                        <div class="d-flex align-items-center">
                           <h6 class="price m-0 text-success">{{ $article->prix }} FCFA</h6>
                        </div>
                        <form action="{{ route('cart.store') }}" method="post">
                           @csrf

                           <input type="hidden" name="product_id" value="{{ $article->id }}">
                           <button type="submit" class="btn btn-success btn-sm form-control mt-3">
                              <span class="fa fa-shopping-cart"></span> + Ajouter
                           </button>
                        </form>
                     </div>
                  </a>
               </div>
            </div>
      </div>
      @else
      @break
      @endif
      @endforeach
   </div>
   </div>

   <div class="title d-flex align-items-center p-3">
      <h6 class="m-0">Acheter à prix reduit</h6>
      <a class="ms-auto text-success" href="#">{{ $articleCount }} Articles et plus</a>
   </div>
   <!-- osahan recommend -->
   <div class="osahan-recommend px-3">
      <div class="row">
         <div class="col-12 mb-3">
            <div  class="text-dark text-decoration-none">
               <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                  <div class="recommend-slider rounded pt-2">
                     @foreach ($articles->where('is_promo', '!=', 0)->take(5) as $article)
                     <div class="osahan-slider-item m-2 rounded">
                        <div class="member-plan position-absolute">
                            <span class="badge m-3" style="height:40px; background-color: rgba(136,12,12,0.8); text-align: center; font-size: 20px; padding: 8px;">{{$article->is_promo}}%</span>
                        </div>
                        <img src="{{ $article->image }}" class="img-fluid mx-auto rounded shadow-sm" alt="Responsive image">
                     </div>
                     @endforeach
                  </div>
                  <div class="p-3 position-relative">
                     <h6 class="mb-1 font-weight-bold text-success">Articles en promotion</h6>
                     <p class="text-muted">Voir les articles en promotion</p>
                     <div class="d-flex align-items-center">
                        <h6 class="m-0"></h6>
                     </div>
                  </div>
               </div>
            </div>

      </div>
   </div>
   </div>
   </div>
   </div>


   <!-- Pick's Today -->
   <div class="title d-flex align-items-center mb-3 mt-3 px-3">
       <h6 class="m-0">Articles en promotion</h6>
       <a class="ms-auto text-success" href="{{route('autres.plus')}}">Plus d'articles</a>
   </div>
   <!-- pick today -->
   <div class="pick_today px-3">
       <div class="row">
           @foreach ($articles->where('is_promo', '!=', 0)->take(5) as $article)
               @if ($loop->index < 8) <div class="col-6 pe-2 mb-3">
                   <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                       <div class="list-card-image">
                           <a href="#" class="text-dark">
                               <div class="member-plan position-absolute" >
                                   <span class="badge m-3" style="height:40px; background-color: rgba(136,12,12,0.8); text-align: center; font-size: 20px; padding: 8px;">{{$article->is_promo}}%</span>
                               </div>
                               <div class="p-3">
                                   <img src="{{ $article->image }}" class="img-fluid item-img w-100 mb-3">
                                   <h6>{{ $article->numero }}</h6>
                                   <div class="d-flex align-items-center">
                                       <h6 class="price m-0 text-success">{{ $article->prix }} FCFA</h6>
                                   </div>
                                   <form action="{{ route('cart.store') }}" method="post">
                                       @csrf

                                       <input type="hidden" name="product_id" value="{{ $article->id }}">
                                       <button type="submit" class="btn btn-success btn-sm form-control mt-3">
                                           <span class="fa fa-shopping-cart"></span> + Ajouter
                                       </button>
                                   </form>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
               @else
                   @break
               @endif
           @endforeach
       </div>
   </div>


   <!-- Pick's Today -->
   <div class="title d-flex align-items-center mb-3 mt-3 px-3">
      <h6 class="m-0">Autres articles</h6>
      <a class="ms-auto text-success" href="{{route('autres.plus')}}">Plus d'articles</a>
   </div>
   <!-- pick today -->
   <div class="pick_today px-3">
       <div class="row">
           @foreach ($articles->where('quantity', '!=', 0) as $article)
               @if ($loop->index < 4)
                   <div class="col-6 pe-2 mb-3">
                       <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                           <div class="list-card-image">
                               <a href="#" class="text-dark">
                                   @if(Carbon::parse($article->created_at)->gt(Carbon::now()->subDays(5)))
                                       <div class="member-plan position-absolute">
                                           <span class="badge m-3 badge-success">New</span>
                                       </div>
                                   @endif
                                   <div class="p-3">
                                       <img src="{{ $article->image }}" class="img-fluid item-img w-100 mb-3">
                                       <h6>{{ $article->numero }}</h6>
                                       <div class="d-flex align-items-center">
                                           <h6 class="price m-0 text-success">{{ $article->prix }} FCFA</h6>
                                       </div>
                                       <form action="{{ route('cart.store') }}" method="post">
                                           @csrf

                                           <input type="hidden" name="product_id" value="{{ $article->id }}">
                                           <button type="submit" class="btn btn-success btn-sm form-control mt-3">
                                               <span class="fa fa-shopping-cart"></span> + Ajouter
                                           </button>
                                       </form>
                                   </div>
                               </a>
                           </div>
                       </div>
                   </div>
               @else
                   @break
               @endif
           @endforeach
       </div>
   </div>
   </div>


   </div>
   </div>
   <!-- Footer -->
   <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
      <div class="row m-0">
         <a href="/" class="text-dark small col font-weight-bold text-decoration-none p-2 selected">
            <p class="h5 m-0"><i class="text-success icofont-grocery"></i></p>
            Boutique
         </a>
         <a href="{{ route('cart.index') }}" class="text-muted col small text-decoration-none p-2">
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
               <button type="submit" href="{{ route('logout') }}" @click.prevent="$root.submit();"><i class="icofont-check-circled me-2"></i>Déconnexion</button>
            </form>
         </li>
          <li>
              Filtre
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


   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


   <script>
      $(document).ready(function() {
         $('#carouselExampleControls').carousel({
            interval: 1000, // Temps entre chaque diapositive (en millisecondes)
            wrap: true // Permet le défilement en boucle
         });
      });
   </script>

   <script>
      // Détecter les mouvements tactiles pour changer de slide
      var startX, startY;

      document.getElementById('categoriesCarousel').addEventListener('touchstart', function(e) {
         startX = e.changedTouches[0].screenX;
         startY = e.changedTouches[0].screenY;
      });

      document.getElementById('categoriesCarousel').addEventListener('touchend', function(e) {
         var endX, endY;
         endX = e.changedTouches[0].screenX;
         endY = e.changedTouches[0].screenY;

         var diffX = startX - endX;
         var diffY = startY - endY;

         if (Math.abs(diffX) > Math.abs(diffY)) {
            if (diffX > 0) {
               $('#categoriesCarousel').carousel('next');
            } else {
               $('#categoriesCarousel').carousel('prev');
            }
         }
      });
   </script>

   <script>
      $(document).ready(function() {
         $('.category-image').click(function() {
            var categoryId = $(this).data('category-id');
            window.location.href = "{{ url('/categories') }}/" + categoryId + "/subcategories";
         });
      });
   </script>


</body>

</html>
