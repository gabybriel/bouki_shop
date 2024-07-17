<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bouki-Shopping</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body style="background-color: #f02eb5;">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../assets/images/logos/logo.png" width="180" alt="">
                                </a>

                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <x-validation-errors class="mb-4" />

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email </label>
                                        <input type="email" name="email" :value="old('email', $request->email)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nouveau mot de passe </label>
                                        <input type="password" name="password" required autocomplete="new-password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Confirmation de mot de passe </label>
                                        <input type="password" name="password_confirmation" required autocomplete="new-password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                    </div>


                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" style="background-color: #f02eb5;">Réinitialiser le mot de passe</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Se connecter</a>
                                    </div>
                                    <hr>
                                    <p>Si vous rencontrez des problèmes pour récupérer votre mot de passe, contactez l'administrateur ,<b>Bouki-shopping<br> au +242 05 627 33 25</b></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>