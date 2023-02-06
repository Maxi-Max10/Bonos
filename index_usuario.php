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
<nav class="navbar navbar-expand-lg navbar-ligth bg-ligth mb-3 shadow">
    <div class="container mt-3 mb-3">
        <a href="#" class="navbar-brand"><img class="" src="img/logo gif.gif" width="35"> Bonos de Sueldo</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="Controller/close.php" class="nav-item nav-link bi bi-box-arrow-left"> Cerrar Sesión</a>
            </div>
        </div>
    </div>
</nav>
<div class="container altura p-4">
    <div class="row">
        <div class="table-responsive altura mt-4 mb-5">
            <table class="mt-4 table table-striped table-hover" id="tabla_personal">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Bono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php
                    while ($row = mysqli_fetch_array($resultadoUs)) { ?>
                        <tr>
                            <td><?php echo $row['id_bonos'] ?></td>
                            <td><?php echo $row['bonos'] ?></td>
                            <td>
                                <a href="descargar_bono.php?id=<?php echo $row['personal_idpersonal'] ?>&bn=<?php echo $row['id_bonos'] ?>" class="btn btn-primary "><i class="fa-solid fa-file-arrow-down "></i> Descargar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> 
</div>
<?php include("View/footer.php") ?>