<?php

session_start();

if (isset($_SESSION['idpersonal'])) {
  header('Location: index_usuario.php');
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Inicio Sesión</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/estilos.css">
  <!-- Boostrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



</head>


<body class="bg-light d-flex justify-content-center align-items-center bg-verde">

  <!-- <div class=" bg-black rounded align-middle position-absolute h-auto w-auto"> -->

      <?php

if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'no') {

?>
<!-- <script>swal("Error!", "Email invalido!", "error");</script> -->

  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Por favor ingrese un usuario y contraseña válidos.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
}
?>
  <div class=" login-box">
    <div>
      <!-- <img class="h-25 w-25 position-absolute top-0 start-50 translate-middle" src="css/img/User-icon.png" alt="user icon"> -->
      <img class="avatar" src="admin/Includes/assets/user.svg" alt="user icon">
    </div>
    <h1>
      Inicio de sesión
    </h1>

     <!-- <form class="d-flex flex-column p-5" action="Controller/User_login_controller.php" method="POST">  -->
     <form action="Controller/User_login_controller.php" method="POST"> 

      <!-- USERNAME INPUT -->
      <label class="text-light"for="username">Username</label>
      <input type="text" name="cuil" placeholder="Ingrese CUIL">
      <!-- PASSWORD INPUT -->
      <label class="text-light"for="password">Password</label>
      <input type="password" name="password" placeholder="Ingrese contraseña">
      <input type="submit" value="Inicio de sesión">
      <div class="pt-1 ">
        <a href="Controller/user_recupera.php" class="text-decoration-none fw-semibold fst-italic text-light" style="font-size: 0.8rem">¿Ovidaste tu contraseña?</a>
      </div>
    </form>
    <?php

    if (isset($_GET['alerta']) && $_GET['alerta'] == 'si') {

    ?>
      <!-- Alerta olvidó contraseña -->
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <strong>¡Atención!</strong> Por favor contactese con el administrador para recuperar su contraseña.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }
    ?>

  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <!-- SCRIPTS -->
  <!-- Script popover -->
  <script>
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8f914819e1.js" crossorigin="anonymous"></script>
</body>

</html>