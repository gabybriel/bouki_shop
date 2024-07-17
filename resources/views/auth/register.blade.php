<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.svg">
    <title>Inscription</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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
    <!-- sign up -->
    <div class="osahan-signup">
        <div class="border-bottom p-3 d-flex align-items-center">
            <a class="fw-bold text-success text-decoration-none" href="/"><i class="icofont-rounded-left back-page"></i></a>
            <a class="toggle ms-auto" href=""><i class="icofont-navigation-menu "></i></a>
        </div>
        <div class="p-3">
            <h2 class="my-0">Commençons </h2>
            <p>Inscrivez-vous maintenant pour découvrir nos meilleures suggestions personnalisées!</p>

            <x-validation-errors class="mb-4" />
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif


            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="exampleInputName1"><b>Nom </b> <span style="color: red;">*</span></label>
                    <input placeholder="Votre nom" type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputName1"><b>Prenom (s)</b> <span style="color: red;">*</span></label>
                    <input placeholder="Votre prénom (s)" type="text" name="prenoms" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputNumber1"><b>Telephone</b> <span style="color: red;">*</span></label>
                    <input placeholder="Telephone" type="tel" name="phone" class="form-control" id="phone" aria-describedby="emailHelp">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1"><b>Email </b> </label>
                    <input placeholder="Votre email" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="form-group mb-3">
                    <label for="exampleInputPassword1"><b>Mot de passe</b></label>
                    <div class="input-group">
                        <input placeholder="Enter Password" type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <div class="input-group-append">
                            <div>
                                <span class="input-group-text" id="togglePassword" style="width: 45px; height: 35px; border: 1px solid #ccc; position: relative; background-color:#eee;  border-radius: 0;">
                                    <i class="fa fa-eye-slash toggle-password" onclick="togglePasswordVisibility()"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="exampleInputPassword1"><b>Confirmation</b></label>
                    <div class="input-group">
                        <input placeholder="Enter Password" type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                        <div class="input-group-append">
                            <div>
                                <span class="input-group-text" id="togglePassword" style="width: 45px; height: 35px; border: 1px solid #ccc; position: relative; background-color:#eee;  border-radius: 0;">
                                    <i class="fa fa-eye-slash toggle-password" onclick="togglePasswordVisibility()"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><br>

                <input type="hidden" name="country_code" id="country_code" value="">

                <button type="submit" class="btn btn-success rounded btn-lg w-100">Créer le compte</button>
            </form>
            <p class="text-muted text-center small py-2 m-0"><b>OU</b></p>
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-primary rounded btn-lg btn-apple">
                    <i class="icofont-brand- me-2"></i> S'inscrire avec Facebook
                </a>
                <a href="#" class="btn btn-light rounded btn-lg btn-google">
                    <i class="icofont-google-plus text-danger me-2"></i> S'inscrire avec Google
                </a>
            </div>
        </div>
    </div>
    <!-- footer fixed -->
    <div class="osahan-fotter fixed-bottom">
        <a href="{{ route('authlogin') }}" class="btn btn-block btn-lg bg-white"> Vous avez déjà un compte? Connectez-vous ici</a>
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


    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.querySelector("#phone");
            const iti = window.intlTelInput(input, {
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
                initialCountry: "cg", // Sélectionne le Congo par défaut

            });

            // Mettre à jour la valeur de l'input avec le code pays initial
            input.value = `+${iti.getSelectedCountryData().dialCode}`;

            // Écoutez l'événement de changement de pays
            iti.input.addEventListener("countrychange", function() {
                const selectedCountry = iti.getSelectedCountryData();
                // Mettre à jour la valeur de l'input avec le code pays sélectionné
                input.value = `+${selectedCountry.dialCode}`;
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('exampleInputPassword1');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                this.querySelector('.toggle-password').classList.toggle('fa-eye');
                this.querySelector('.toggle-password').classList.toggle('fa-eye-slash');
            });
        });
    </script>

    <script>
        function handleFormSubmissionComplete() {
            var submitButton = document.querySelector('button[type="submit"]');
            submitButton.removeAttribute('disabled');
            submitButton.innerHTML = 'Se connecter';
        }

        document.querySelector('form').addEventListener('submit', function() {
            var submitButton = document.querySelector('button[type="submit"]');
            submitButton.setAttribute('disabled', 'true');
            submitButton.innerHTML = '<div class="d-flex align-items-center"><span class="spinner-grow mr-2" role="status" aria-hidden="true"></span> Chargement...</div>';
        });
    </script>
</body>

</html>