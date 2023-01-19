<?php 

include_once "Model/conexion_admin.php";

$consulta = "SELECT * FROM personal";
$resultado = mysqli_query($conexion,$consulta);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-ligth bg-ligth mb-3 shadow">
        <div class="container mt-3 mb-3">
            <a href="#" class="navbar-brand" >Administración</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="#" class="nav-item nav-link bi bi-box-arrow-left"> Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 ">
                    <button type="button" class="btn btn-primary mt-3 bi bi-person-plus-fill rounded-pill shadow" data-bs-toggle="modal"
                        data-bs-target="#agregar"> Agregar Personal</button>
                </div>

                <!-- Modal crear persona -->
                <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ingrese datos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form_crear" method="post">
                                    <div class="mb-3">
                                        <h6 class="card-title">Nombre
                                            <input type="text" id="nombreP" class="form-control" name="nombre" require>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Apellido
                                            <input type="text" id="apellidoP" class="form-control" name="apellido"
                                                require>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">CUIL
                                            <input type="text" id="cuilP" class="form-control" name="cuil" require
                                                maxlength="11">
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Contraseña
                                            <input type="text" id="passwordP" class="form-control" name="password"
                                                require>
                                        </h6>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnEnviar" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL ELIMINAR PERSONA -->

                <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro que desea eliminar?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="from_eliminar">
                                    <input type="hidden" id="id_e" name="id_e" value="">
                                    <div class="mb-3">
                                        <h6 class="card-title">Nombre
                                            <input type="text" id="nombre_e" class="form-control" name="nombre_e"
                                                readonly>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Apellido
                                            <input type="text" id="apellido_e" class="form-control" name="apellido_e"
                                                readonly>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">CUIL
                                            <input type="text" id="cuil_e" class="form-control" name="cuil_e" readonly>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Contraseña
                                            <input type="text" id="password_e" class="form-control" name="password_e"
                                                readonly>
                                        </h6>
                                    </div>
                                    <input type="hidden" id="mostrar_e" name="mostrar_e" value="0">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnEliminar" class="btn btn-danger">Si,Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL MODIFICAR PERSONA -->

                <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar persona</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="from_modificar">
                                    <input type="hidden" id="id_m" name="id_m" value="">
                                    <div class="mb-3">
                                        <h6 class="card-title">Nombre
                                            <input type="text" id="nombre_m" class="form-control" name="nombre_m">
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Apellido
                                            <input type="text" id="apellido_m" class="form-control" name="apellido_m">
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">CUIL
                                            <input type="text" id="cuil_m" class="form-control" name="cuil_m"
                                                maxlength="11">
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Contraseña
                                            <input type="text" id="password_m" class="form-control" name="password_m">
                                        </h6>
                                    </div>
                                    <input type="hidden" id="mostrar_m" name="mostrar_m" value="0">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnModificar" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL SUBIR BONO PERSONA -->

                <div class="modal fade" id="subir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Bono</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="from_SubirB" enctype="multipart/form-data">
                                    <input type="hidden" id="id_p" name="id_p" value="">
                                    <div class="mb-3">
                                        <h6 class="card-title">Nombre
                                            <input type="text" id="nombre_p" class="form-control" name="nombre_p"
                                                readonly>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Apellido
                                            <input type="text" id="apellido_p" class="form-control" name="apellido_p"
                                                readonly>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">CUIL
                                            <input type="text" id="cuil_p" class="form-control" name="cuil_p"
                                                maxlength="11" readonly>
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Bono
                                            <input type="file" id="bono_p" class="form-control" name="bono_p">
                                        </h6>
                                    </div>
                                    <input type="hidden" id="mostrar_p" name="mostrar_p" value="0">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnSubirBono" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <table class="mt-4 table table-striped table-hover" id="tabla_personal">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Cuil</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            while ($row = mysqli_fetch_array($resultado)) {

                            $arreglo = $row['idpersonal']. ',' . $row['nombre'] . ',' . $row['apellido'] . ',' . $row['cuil']. ',' . $row['password_personal'];
                        ?>
                        <td><?php echo $row['idpersonal']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['cuil']; ?></td>
                        <td><?php echo $row['password_personal']; ?></td>
                        <td><button class="btn btn-outline-success btn-sm bi bi-file-earmark-plus-fill"
                                data-bs-toggle="modal" data-bs-target="#subir"
                                onclick="subirBono('<?php echo $arreglo ?>')"> Subir Bono</button></td>
                        <td><button class="btn btn-outline-warning btn-sm bi bi-pencil-square" data-bs-toggle="modal"
                                data-bs-target="#modificar" onclick="modificar('<?php echo $arreglo ?>')">
                                Modificar</button></td>
                        <td><button class="btn btn-outline-danger btn-sm bi bi-person-dash-fill" data-bs-toggle="modal"
                                data-bs-target="#eliminar" onclick="eliminar('<?php echo $arreglo ?>')">
                                Eliminar</button></td>

                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="Desing/js/jquery-3.6.3.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--SCRIPT DE SUBIR  falta-->

    <script type="text/javascript">
    function subirBono(arreglo) {
        cadena = arreglo.split(',');
        $("#id_p").val(cadena[0]);
        $("#nombre_p").val(cadena[1]);
        $("#apellido_p").val(cadena[2]);
        $("#cuil_p").val(cadena[3]);
        $("#mostrar_p").val(cadena[4]);
    }

    $(document).ready(function() {
        $('#btnSubirBono').click(function() {
            var id = $("#id_p").val();
            var archivo = $('#bono_p').prop('files')[0];

            var formData = new FormData();
            formData.append('arch', archivo);
            formData.append('id', id);

            //console.log(archivo);

            $.ajax({
                url: "Controller/subirBonoPersonaController.php",
                type: 'POST',
                contentType: false,
                processData: false,
                data: formData,

                success: function(r) {
                    //alert(r);
                    if (r == '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Subido',
                            text: 'Archivo cargado correctamente',
                        });
                        from_SubirB.reset();
                        $('#tabla_personal').load('index_bonos.php #tabla_personal');
                        $('#subir').modal('hide');

                    } else if (r == '0') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: 'No se a encontrado bono. Por favor carge el documento.',
                        });

                    }

                }

            });
        });
    });
    </script>

    <!--SCRIPT DE INSERTAR-->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#btnEnviar').click(function() {
            var datos = $('#form_crear').serialize();
            $.ajax({
                url: "Controller/agregarPersonaController.php",
                type: 'POST',
                data: datos,
                success: function(r) {
                    //alert(r);
                    if (r == 'vacios') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: 'Existen campos vacíos',
                        });

                    } else if (r == 'cuil') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: 'El cuil ingresado ya se encuentra registrado',
                        });

                    } else if (r == '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Creado',
                            text: 'Creado correctamente',
                        });
                        form_crear.reset();
                        $('#tabla_personal').load('index_bonos.php #tabla_personal');
                        $('#agregar').modal('hide');

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

    <!--SCRIPT DE ELIMINAR-->
    <script type="text/javascript">
    function eliminar(arreglo) {
        cadena = arreglo.split(',');
        $("#id_e").val(cadena[0]);
        $("#nombre_e").val(cadena[1]);
        $("#apellido_e").val(cadena[2]);
        $("#cuil_e").val(cadena[3]);
        $("#password_e").val(cadena[4]);
        $("#mostrar_e").val(cadena[5]);
    }

    $(document).ready(function() {
        $('#btnEliminar').click(function() {
            var datos = $('#from_eliminar').serialize();
            $.ajax({
                url: "Controller/eliminarPersonaController.php",
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
                        from_eliminar.reset();
                        $('#tabla_personal').load('index_bonos.php #tabla_personal');
                        $('#eliminar').modal('hide');

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

    <!-- SCRIPT DE MODIFICAR -->
    <script type="text/javascript">
    function modificar(arreglo) {
        cadena = arreglo.split(',');
        $("#id_m").val(cadena[0]);
        $("#nombre_m").val(cadena[1]);
        $("#apellido_m").val(cadena[2]);
        $("#cuil_m").val(cadena[3]);
        $("#password_m").val(cadena[4]);
        $("#mostrar_m").val(cadena[5]);
    }

    $(document).ready(function() {
        $('#btnModificar').click(function() {
            var datos = $('#from_modificar').serialize();
            $.ajax({
                url: "Controller/modificarPersonaController.php",
                type: 'POST',
                data: datos,
                success: function(r) {
                    //alert(r);
                    if (r == 'vaciosM') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: 'Existen campos vacíos',
                        });

                    } else if (r == '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Modificado',
                            text: 'Modificado correctamente',
                        });
                        from_modificar.reset();
                        $('#tabla_personal').load('index_bonos.php #tabla_personal');
                        $('#modificar').modal('hide');

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

</body>

</html>