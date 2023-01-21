<?php
session_start();

if (isset($_SESSION['idusuario'])) {
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


<body class="bg-light d-flex justify-content-center align-items-center vh-100 ">
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
  <div class="login-box">
    <img class="avatar" src="css/img/User-icon.png" alt="user icon">
    <h1>Inicio de sesión</h1>
    <form>
      <!-- USERNAME INPUT -->
      <label for="username">Username</label>
      <input type="text" placeholder="Ingrese CUIL">
      <!-- PASSWORD INPUT -->
      <label for="password">Password</label>
      <input type="password" placeholder="Ingrese contraseña">
      <input type="submit" value="Inicio de sesión">
      <div class="pt-1 ">
        <a href="admin/Includes/" class="text-decoration-none fw-semibold fst-italic text-light" style="font-size: 0.8rem">¿Ovidaste tu contraseña?</a>
        <br>
        <a href="#" class="text-decoration-none fw-semibold fst-italic text-light" style="font-size: 0.8rem">¿No tienes cuenta?</a>
      </div>
    </form>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8f914819e1.js" crossorigin="anonymous"></script>
</body>

</html>