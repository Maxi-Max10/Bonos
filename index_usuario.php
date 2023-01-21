<?php

session_start();

if (!isset($_SESSION['idpersonal'])) {
  header('Location: loginUs.php');

} else if (isset($_SESSION['idpersonal'])) {

  include_once "Model/conexion_usuario.php";

  $idpersonal = $_SESSION['idpersonal'];
  
  
  $consultaUs = "SELECT * FROM bonos WHERE personal_idpersonal = '".$idpersonal."'";
  $resultadoUs = mysqli_query($conexionUs, $consultaUs);

} else {
  echo "ERROR EN EL SISTEMA";
}



?>
<?php include "View/header.php" ?>
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
                <tbody>
                    <?php
                            while($row = mysqli_fetch_array($resultadoUs)) { ?>
                    <tr>
                        <td><?php echo $row['bonos'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td>
                            <a href="descargar_bono.php?id=<?php echo $row['id_bonos'] ?>" class="btn btn-secondary"><i
                                    class="fa-solid fa-file-arrow-down"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("View/footer.php") ?>