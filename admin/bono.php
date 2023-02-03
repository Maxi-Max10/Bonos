<?php 

session_start();

if (!isset($_SESSION['idadmin'])) {
    header('Location: login.php');
  }elseif(isset($_SESSION['idadmin'])){
    if(isset($_POST['idP'])){
        include_once "Model/conexion_admin.php";
        $idP = $_POST['idP'];
        
        $nomb = $_POST['nomb'];
        $apell = $_POST['apell'];
        $cui = $_POST['cui'];
        $consultaB = "SELECT * FROM bonos WHERE personal_idpersonal = '".$idP."'";
        $resultadoB = mysqli_query($conexion,$consultaB);
          
      }else{
          echo "ERROR EN EL SISTEMA";
      }
      
  }else{
      echo "ERROR EN EL SISTEMA";
  }




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gasopen S.A.S | Administración</title>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="Includes/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--<link rel="stylesheet" href="Includes/css/style.css">-->
    <link rel="stylesheet" href="Includes/css/svg.css">

    <script src="Includes/js/scrollreveal.js"></script>

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
    <link rel="icon" type="image/png" sizes="192x192" href="Includes/assets/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Includes/assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="Includes/assets/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Includes/assets/icon/favicon-16x16.png">
    <link rel="manifest" href="Includes/assets/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="Includes/assets/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="">
    <nav class="navbar navbar-expand-lg navbar-ligth bg-ligth mb-3 shadow">
        <div class="container mt-3 mb-3">
            <a href="#" class="navbar-brand"><img class="" src="Includes/assets/logo gif.gif" width="35">
                Administración</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="Controller/cerrar.php" class="nav-item nav-link bi bi-box-arrow-left"> Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MODAL ELIMINAR -->

    <div class="modal fade" id="eliminarB" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro que desea eliminar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="from_eliminarB">
                        <input type="hidden" id="id_eB" name="id_eB" value="">
                        <div class="mb-3">
                            <h6 class="card-title">Nombre Bono
                                <input type="text" id="nombre_eB" class="form-control" name="nombre_eB" readonly>
                            </h6>
                        </div>
                        <input type="hidden" id="mostrar_eB" name="mostrar_eB" value="0">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnEliminarB" class="btn btn-danger">Si,Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL ELIMINAR -->

    <div class="container">
        <div class="card mt-5 shadow">
            <div class="row g-0 mb-2 mt-2">
                <div class="col-md-4 text-center">
                    <img src="Includes/assets/admin-bonos.svg" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8 text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nomb." ".$apell." ".$idP ?></h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-muted"><?php echo $cui ?></small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-2 mb-5">
            <table class="mt-4 table table-striped table-hover" id="tabla_bono">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th class="" scope="col">Bonos</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <?php
                                while ($row = mysqli_fetch_array($resultadoB)) {

                                $arregloB = $row['id_bonos']. ',' . $row['bonos'];
                            ?>
                        <td><?php echo $row['id_bonos']; ?></td>
                        <td><?php echo $row['bonos']; ?></td>
                        <td><button class="btn btn-outline-danger btn-sm bi bi-file-earmark-x-fill" data-bs-toggle="modal"
                                data-bs-target="#eliminarB" onclick="eliminarBono('<?php echo $arregloB ?>')">
                                Eliminar</button></td>

                    </tr>
                    <?php
                            }
                        ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>


    <!--  footer -->
    <footer class="footer-07">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading"><a href="#" class="logo">

                            <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="600px" height="100px"
                                viewBox="0 0 600 100">
                                <style type="text/css">
                                text {
                                    filter: url(#filter);
                                    fill: white;
                                    font-family: 'Share Tech Mono', sans-serif;
                                    font-size: 85px;
                                    -webkit-font-smoothing: antialiased;
                                    -moz-osx-font-smoothing: grayscale;
                                }
                                </style>
                                <defs>

                                    <filter id="filter">
                                        <feFlood flood-color="black" result="black" />
                                        <feFlood flood-color="red" result="flood1" />
                                        <feFlood flood-color="limegreen" result="flood2" />
                                        <feOffset in="SourceGraphic" dx="3" dy="0" result="off1a" />
                                        <feOffset in="SourceGraphic" dx="2" dy="0" result="off1b" />
                                        <feOffset in="SourceGraphic" dx="-3" dy="0" result="off2a" />
                                        <feOffset in="SourceGraphic" dx="-2" dy="0" result="off2b" />
                                        <feComposite in="flood1" in2="off1a" operator="in" result="comp1" />
                                        <feComposite in="flood2" in2="off2a" operator="in" result="comp2" />

                                        <feMerge x="0" width="100%" result="merge1">
                                            <feMergeNode in="121212" />
                                            <feMergeNode in="comp1" />
                                            <feMergeNode in="off1b" />

                                            <animate attributeName="y" id="y" dur="4s"
                                                values='104px; 104px; 30px; 105px; 30px; 2px; 2px; 50px; 40px; 105px; 105px; 20px; 6ßpx; 40px; 104px; 40px; 70px; 10px; 30px; 104px; 102px'
                                                keyTimes='0; 0.362; 0.368; 0.421; 0.440; 0.477; 0.518; 0.564; 0.593; 0.613; 0.644; 0.693; 0.721; 0.736; 0.772; 0.818; 0.844; 0.894; 0.925; 0.939; 1'
                                                repeatCount="indefinite" />

                                            <animate attributeName="height" id="h" dur="4s"
                                                values='10px; 0px; 10px; 30px; 50px; 0px; 10px; 0px; 0px; 0px; 10px; 50px; 40px; 0px; 0px; 0px; 40px; 30px; 10px; 0px; 50px'
                                                keyTimes='0; 0.362; 0.368; 0.421; 0.440; 0.477; 0.518; 0.564; 0.593; 0.613; 0.644; 0.693; 0.721; 0.736; 0.772; 0.818; 0.844; 0.894; 0.925; 0.939; 1'
                                                repeatCount="indefinite" />
                                        </feMerge>


                                        <feMerge x="0" width="100%" y="60px" height="65px" result="merge2">
                                            <feMergeNode in="#121212" />
                                            <feMergeNode in="comp2" />
                                            <feMergeNode in="off2b" />

                                            <animate attributeName="y" id="y" dur="4s"
                                                values='103px; 104px; 69px; 53px; 42px; 104px; 78px; 89px; 96px; 100px; 67px; 50px; 96px; 66px; 88px; 42px; 13px; 100px; 100px; 104px;'
                                                keyTimes='0; 0.055; 0.100; 0.125; 0.159; 0.182; 0.202; 0.236; 0.268; 0.326; 0.357; 0.400; 0.408; 0.461; 0.493; 0.513; 0.548; 0.577; 0.613; 1'
                                                repeatCount="indefinite" />
                                            <animate attributeName="height" id="h" dur="4s"
                                                values='0px; 0px; 0px; 16px; 16px; 12px; 12px; 0px; 0px; 5px; 10px; 22px; 33px; 11px; 0px; 0px; 10px'
                                                keyTimes='0; 0.055; 0.100; 0.125; 0.159; 0.182; 0.202; 0.236; 0.268; 0.326; 0.357; 0.400; 0.408; 0.461; 0.493; 0.513;  1'
                                                repeatCount="indefinite" />
                                        </feMerge>
                                        <feMerge>
                                            <feMergeNode in="SourceGraphic" />
                                            <feMergeNode in="merge1" />
                                            <feMergeNode in="merge2" />
                                        </feMerge>
                                    </filter>
                                </defs>
                                <g>
                                    <text x="0" y="100" style="font-size: 80px !important;">Polo Positivo</text>
                                </g>
                            </svg>
                        </a></h2>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Instagram"><span class="bi bi-instagram"></span></a></li>
                    </ul>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        <p class="copyright">
                            Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> Todos los derechos reservados | Polo Positivo <i class="ion-ios-heart"
                                aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="Includes/js/popper.min.js"></script>
    <script src="Includes/js/bootstrap.min.js"></script>

    <script src="Includes/js/jquery-3.6.3.min.js"></script>
    <!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
    <script src="Includes/js/index.js"></script>

    <!-- sweetalert -->
    <script src="Includes/js/sweetalert.js"></script>

<!--SCRIPT DE ELIMINAR-->
    <script type="text/javascript">
    function eliminarBono(arregloB) {
        cadenaB = arregloB.split(',');
        $("#id_eB").val(cadenaB[0]);
        $("#nombre_eB").val(cadenaB[1]);
        $("#mostrar_eB").val(cadenaB[2]);
    }

    $(document).ready(function() {
        $('#btnEliminarB').click(function() {
            var datos = $('#from_eliminarB').serialize();
            $.ajax({
                url: "Controller/eliminarBonoController.php",
                type: 'POST',
                data: datos,
                success: function(r) {
                    //alert(r);
                    if (r == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No existen datos.',
                        });

                    } else if (r == '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            text: 'Eliminado correctamente',
                        });
                        setTimeout(function(){
                            window.location.href= "Home";}, 1500); 

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error en el servidor',
                        });
                    }
                }
            });
        });
    });
    </script>