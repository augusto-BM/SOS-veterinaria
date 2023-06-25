<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/73c70fe811.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../../imagenes/principal/logo.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Administrador SOS</title>   

    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css?as" rel="stylesheet">
    <link href="css/reloj.css" rel="sytlesheet">
</head>

<script>
    function confirmacion(){
        var respuesta = confirm("¿Desea ELIMINAR el registro?");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }
    function confirmacionM(){
        var res = confirm("¿Desea MODIFICAR el registro?");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>

<body id="page-top">
    <div id="wrapper">
        <?php
            @include 'sidebar.php';
            @include 'navbar.php';
        ?>
    </div>

    <div class="container">
        <?php
        include '../../../controlador/controlador_tablas/controlador_tabla_cliente.php';
        $select = "SELECT * FROM cliente";
        $tabla = mysqli_query($conn, $select);
        ?>

        <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; font-weight: 600;">TABLA CLIENTE</h3><hr>
        
        <form action="../../../controlador/controlador_tablas/controlador_tabla_cliente.php" method="post">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">ID Cliente:</label>
                                    <input type="number" class="form-control" name="id_cliente" id="id_cliente" value="<?php echo $id_cliente; ?>" readonly><br>
                                </div>   

                                <div class="form-group col-md-8">
                                    <label for="">DNI:</label>
                                    <input type="text" class="form-control" required name="dni_cliente" placeholder="" id="dni_cliente" value="<?php echo $dni_cliente; ?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control" required name="nombre_cliente" placeholder="" id="nombre_cliente" value="<?php echo $nombre_cliente; ?>"><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label>Apellido:</label>
                                    <input type="text" class="form-control" required name="apellido_cliente" placeholder="" id="apellido_cliente" value="<?php echo $apellido_cliente; ?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Género:</label>
                                    <select name="genero_cliente" class="form-control">
                                        <option value="<?php echo $genero_cliente; ?>"> <?php echo $genero_cliente; ?></option>
                                        <option value="femenino">femenino</option>
                                        <option value="masculino">masculino</option>
                                    </select><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="">Dirección:</label>
                                    <input type="text" class="form-control" required name="direccion_cliente" placeholder="" id="direccion_cliente" value="<?php echo $direccion_cliente; ?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Teléfono:</label>
                                    <input type="text" class="form-control" required name="telefono_cliente" placeholder="" id="telefono_cliente" value="<?php echo $telefono_cliente; ?>"><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="">Correo:</label>
                                    <input type="email" class="form-control" required name="email" placeholder="" id="email" value="<?php echo $email; ?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Contraseña:</label>
                                    <input type="password" class="form-control" name="password" <?php echo $pass; ?> placeholder="" id="password" value="<?php echo $password; ?>"><br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                    
                            <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>

                            <button value="btnModificar" <?php echo $accionModificar; ?>  class="btn btn-warning" type="submit" name="accion" onclick='return confirmacionM()'>Modificar</button>
                            
                            <button value="btnEliminar" <?php echo $accionEliminar; ?>  class="btn btn-danger" type="submit" name="accion" onclick='return confirmacion()'>Eliminar</button>
                            
                            <button value="btnCancelar" <?php echo $accionCancelar; ?>  class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus fa-xl" style="padding: 5px 3px; font-family: Verdana, Geneva, Tahoma, sans-serif;" ></i>&nbsp;<b>Agregar registro </b>
            </button>
            <div class="d-sm-flex align-items-center justify-content-between mb-4" style="float: right;">
                <a href="pdfs/pdf_cliente.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="padding: 8px 15px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <i class="fa-solid fa-file-pdf fa-xl"></i> <b>Generar Reporte</b>
                </a>
            </div>
        </form>

        <div class="row1" style="margin-top: 10px; font-size: 14px; border-radius: 10px;">
            <table class="table table_id">
                <thead class="table-dark">
                    <tr>
                        <th>ID:</th>
                        <th>DNI:</th>
                        <th>Nombre:</th>
                        <th>Apellido:</th>
                        <th>Género:</th>
                        <th>Dirección:</th>
                        <th>Teléfono:</th>
                        <th>Correo:</th>
                        <th>Contraseña:</th>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($tabla)) { ?>
                        <tr>
                            <td><?php echo $row['id_cliente']; ?></td>
                            <td><?php echo $row['dni_cliente']; ?></td>
                            <td><?php echo $row['nombre_cliente']; ?></td>
                            <td><?php echo $row['apellido_cliente']; ?></td>
                            <td><?php echo $row['genero_cliente']; ?></td>
                            <td><?php echo $row['direccion_cliente']; ?></td>
                            <td><?php echo $row['telefono_cliente']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>

                            <form action="" method="post">

                                <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">
                                <input type="hidden" name="dni_cliente" value="<?php echo $row['dni_cliente']; ?>">
                                <input type="hidden" name="nombre_cliente" value="<?php echo $row['nombre_cliente']; ?>">
                                <input type="hidden" name="apellido_cliente" value="<?php echo $row['apellido_cliente']; ?>">
                                <input type="hidden" name="genero_cliente" value="<?php echo $row['genero_cliente']; ?>">
                                <input type="hidden" name="direccion_cliente" value="<?php echo $row['direccion_cliente']; ?>">
                                <input type="hidden" name="telefono_cliente" value="<?php echo $row['telefono_cliente']; ?>">
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
                                <td><input type="submit" value="Seleccionar" name="accion"></td>

                            </form>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
     <!--CÓDIGO PARA MOSTRAR EL MODAL CUANDO SE SELECCIONA EL REGISTRO (Implementar en todas las tablas)-->
     <?php if($mostrarModal){?>
            <script>
                $('#exampleModal').modal('show');
            </script>
        <?php }?>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="../../js/busqueda.js"></script>

</body>

</html>
