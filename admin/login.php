<?php
session_start();

if (isset($_SESSION['idadmin'])) { 
    header('Location: index_bonos.php');
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Gasopen S.A.S | Iniciar Sesión</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="Includes/css/bootstrap.min.css" rel="stylesheet">

   <!-- ICON -->
    <link rel="apple-touch-icon" sizes="57x57" href="Includes/assets/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="Includes/assets/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="Includes/assets/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="Includes/assets/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="Includes/assets/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="Includes/assets/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="Includes/assets/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="Includes/assets/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="Includes/assets/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="Includes/assets/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Includes/assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="Includes/assets/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Includes/assets/icon/favicon-16x16.png">
    <link rel="manifest" href="Includes/assets/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="Includes/assets/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
  
<body class="bg-light d-flex justify-content-center align-items-center vh-100 ">
    <div class="bg-white p-5 rounded-5 text-secondary shadow " style="width: 25rem">
        <div class="d-flex justify-content-center">
        <img class="" src="Includes/assets/GASOPEN S.A.S (1).gif" style="height: 10rem" />
        </div>
        <div class="text-center text-dark fs-5 fw-bold">BIENVENIDO ADMINISTRADOR</div>
        <?php
               
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'no'){ 
                                                     
            ?>
               <!-- <script>swal("Error!", "Email invalido!", "error");</script> -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Por favor ingrese un usuario y contraseña válidos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              }
            ?>
        <form action="Controller/loginController.php" method="POST">
            <div class="input-group mt-4">
                <div class="input-group-text bg-dark ">
                    <img src="Includes/assets/username-icon.svg" alt="username-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light border border-dark" type="text" id="usuario" placeholder="Usuario" name="usuario"
                    autocomplete="none" />
            </div>
            <div class="input-group mt-3">
                <div class="input-group-text bg-dark">
                    <img src="Includes/assets/password-icon.svg" alt="password-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light border border-dark" type="password" placeholder="Contraseña" name="password"
                    autocomplete="none" />
            </div>
            <div class="d-grid gap-2 mb-">
                <button type="submit" class="btn btn-dark mt-5 text-white rounded-pill" >Iniciar Sesión</button>
                <div class="pt-1 ">
                   <!-- <a href="recuperar.php" class="text-decoration-none fw-semibold fst-italic text-dark"
                        style="font-size: 0.8rem">¿Ovidaste tu contraseña?</a> -->
                </div>
            </div>
        </form>

    </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="Includes/js/popper.min.js"></script>
  <script src="Includes/js/bootstrap.min.js"></script>

</body>
</html>