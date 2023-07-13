<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SuitIt | Adapta la moda</title>




    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/gallery/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/gallery/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/gallery/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/gallery/logo.png">
    <link rel="manifest" href="assets/img/gallery/logo.png">
    <meta name="msapplication-TileImage" content="assets/img/gallery/logo.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- ===============================================-->
    <!--    Scripts-->
    <!-- ===============================================-->
    <script src="assets/vendors/@popperjs/popper.min.js"></script>
    <script src="assets\js\custom.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="assets/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="assets/vendors/feather-icons/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
    <script src="assets/js/theme.js"></script>



</head>

<body>

    <div class="login-container">
        <div class="logo-container vertical-center">
            <img src="assets/img/gallery/logo_login.png" alt="">
        </div>
        <div class=" vertical-center text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">

                        <img class="mb-4" src="assets/img/gallery/logo_login2.png" width="200">
                        <h1 class="h3 mb-3 fw-normal">Inicio de sesión</h1>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form id="loginForm" action="" method="POST">
                            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="floatingInput" placeholder=""
                                    name='email' required>
                                <label for="floatingInput">Correo electronico</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder=""
                                    name='password' required>
                                <label for="floatingPassword">Contraseña</label>
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Recuerdame
                                </label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
                            <p class="mt-5 mb-3 text-muted">
                                <a id="forgot-password" href="/register">Registrate aquí</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
