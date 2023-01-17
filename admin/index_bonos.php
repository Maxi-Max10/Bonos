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

</head>

<body>
    <div class="container">
        <div class="card mb-2 mt-1 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h3 style="margin-top:5px">Personal</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#agregar">Agregar Personal</button>
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
                                            <input type="text" id="nombre" class="form-control" name="nombre" require value="">
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Apellido
                                            <input type="text" id="apellido" class="form-control" name="apellido" require value="">
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">CUIL
                                            <input type="text" id="cuil" class="form-control" name="cuil" require value="">
                                        </h6>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Contraseña
                                            <input type="text" id="password" class="form-control" name="password" require value="">
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
                <table class="table mt-5 table-borderless" id="adm">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Cuil</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                       // while ($row = mysqli_fetch_array($query)) {

                                           // $arreglo = $row['idc2news_feriados'] . ',' . $row['nombre'] . ',' . $row['fecha']. ',' . $row['tipo']. ',' . $row['pais'];
                                            ?>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php  ?></td>
                                            <td><?php  ?></td>
                                            <!-- <td><button class="btn btn-principal" data-bs-toggle="modal" data-bs-target="#editar" onclick="modificar('<?php echo $arreglo ?>')">Modificar</button></td>
                                            <td><button class="btn btn-principal" data-bs-toggle="modal" data-bs-target="#eliminar" onclick="eliminar('<?php echo $arreglo ?>')">Eliminar</button></td>
                                       -->
                                        </tr>
                                    </tbody>    
                                    <?php
                               // }
                                ?>
                            </table>
            </div>
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

    <!--SCRIPT DE INSERTAR-->
    <script type="text/javascript">
        $(document).ready(function () {
         $('#btnEnviar').click(function () {
        var datos = $('#form_crear').serialize();
        $.ajax({
         url: "Controller/agregarPersonaController.php",
         type: 'POST',
         data: datos,
         success: function (r) {
         if (r == 1) {
         Swal.fire({
           icon: 'success',
           title: 'Creado',
           text: 'Creado correctamente',
        })
        form_crear.reset();
         $('#agregar').modal('hide');
         
         } else {
        Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: 'Error en el servidor',
        })
         }
       }
    });
        return false;
        });
    });
</script>
</body>

</html>