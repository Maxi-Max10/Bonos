<?php

session_start();


if (!isset($_SESSION['iduser'])) {
  header('Location: login.php');
} elseif (isset($_SESSION['iduser'])) {
  include_once "Model/conexion_usuario.php";
  $consulta = "SELECT * FROM personal";
  $resultado = mysqli_query($conexion, $consulta);
} else {
  echo "ERROR EN EL SISTEMA";
}



?>
<?php include("Model/conexion_usuario.php") ?>
<?php include("View/header.php") ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Bono</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<?php include("View/footer.php") ?>

