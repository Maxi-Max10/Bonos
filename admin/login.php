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
  
  <!-- Favicon -->
   <link href="Includes/assets/gasIcon.ico" rel="shortcut icon" type="image/x-icon">
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