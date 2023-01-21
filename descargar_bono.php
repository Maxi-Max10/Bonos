<?php 
include("Model/conexion_usuario.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM bonos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $bonos = $row['bonos'];
        $fecha = $row['fecha'];
    }
   }
?>