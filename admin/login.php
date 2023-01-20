<?php
session_start();

if (isset($_SESSION['idadmin'])) { 
    header('Location: index_bonos.php');
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  
<body class="bg-light d-flex justify-content-center align-items-center vh-100 ">
    <div class="bg-white p-5 rounded-5 text-secondary shadow " style="width: 25rem">
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

        <div class="d-flex justify-content-center">
            <img src="Includes/assets/user.svg" alt="login-icon" style="height: 6rem" />
        </div>
        <div class="text-center text-dark fs-5 fw-bold">BIENVENIDO ADMINISTRADOR</div>
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
                    <a href="recuperar.php" class="text-decoration-none fw-semibold fst-italic text-dark"
                        style="font-size: 0.8rem">¿Ovidaste tu contraseña?</a>
                </div>
            </div>
        </form>

    </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>