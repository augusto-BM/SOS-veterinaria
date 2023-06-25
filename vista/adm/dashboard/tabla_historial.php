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
    <link href="css/sb-admin-2.min.css?asd" rel="stylesheet">
    <link href="css/reloj.css" rel="stylesheet">
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
        include '../../../controlador/controlador_tablas/controlador_tabla_historial.php';
        $select = "SELECT * FROM historial_mascota";
        $tabla = mysqli_query($conn, $select);
        ?>
        <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; font-weight: 600;">TABLA HISTORIAL</h3><hr>
        
        <form action="../../../controlador/controlador_tablas/controlador_tabla_historial.php" method="post">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Historial</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">ID Mascota:</label>
                                    <input type="number" class="form-control" name="id_mascota" id="id_mascota" value="<?php echo $id_mascota; ?>" readonly><br>
                                </div>   

                                <div class="form-group col-md-8">
                                    <label for="">Diagnóstico:</label>
                                    <input type="text" class="form-control" required name="diagnostico" placerholder="" id="diagnostico" value="<?php echo $diagnostico;?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Tratamiento:</label>
                                    <input type="text" class="form-control" required name="tratamiento" placerholder="" id="tratamiento" value="<?php echo $tratamiento;?>"><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label>Evolución:</label>
                                    <input type="text" class="form-control" required name="evolucion" placerholder="" id="evolucion" value="<?php echo $evolucion;?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Vacuna:</label>
                                    <input type="text" class="form-control" required name="vacuna" placerholder="" id="vacuna" value="<?php echo $vacuna;?>"><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="">Fecha Historial:</label>
                                    <input type="date" class="form-control" required name="fecha_historial" placerholder="" id="fecha_historial" value="<?php echo $fecha_historial;?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Nivel Gravedad:</label>
                                    <input type="text" class="form-control" required name="nivel_gravedad" placerholder="" id="nivel_gravedad" value="<?php echo $nivel_gravedad;?>"><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="">Conclusiones:</label>
                                    <input type="text" class="form-control" required name="conclusiones" placerholder="" id="conclusiones" value="<?php echo $conclusiones;?>"><br>
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
                <a href="pdfs/pdf_historial.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="padding: 8px 15px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <i class="fa-solid fa-file-pdf fa-xl"></i> <b>Generar Reporte</b>
                </a>
            </div>
        </form>

        <div class="row1" style="margin-top: 10px; font-size: 14px; border-radius: 10px;">
            <table class="table table_id">
                <thead class="table-dark">
                    <tr>
                        <th>ID Historial:</th>
                        <th>ID Mascota:</th>
                        <th>Diagnóstico:</th>
                        <th>Tratamiento:</th>
                        <th>Evolución:</th>
                        <th>Vacuna:</th>
                        <th>Fecha Historial:</th>
                        <th>Nivel Gravedad:</th>
                        <th>Conclusiones:</th>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($tabla)){?>
                        <tr>
                            <td><?php echo $row['id_historial'];?></td>
                            <td><?php echo $row['id_mascota']; ?></td>
                            <td><?php echo $row['diagnostico']; ?></td>
                            <td><?php echo $row['tratamiento']; ?></td>
                            <td><?php echo $row['evolucion']; ?></td>
                            <td><?php echo $row['vacuna']; ?></td>
                            <td><?php echo $row['fecha_historial']; ?></td>
                            <td><?php echo $row['nivel_gravedad']; ?></td>
                            <td><?php echo $row['conclusiones']; ?></td>
                            <form action="" method="post">
                                <input type="hidden" name="id_mascota" value="<?php echo $row['id_mascota']; ?>">
                                <input type="hidden" name="diagnostico" value="<?php echo $row['diagnostico']; ?>">
                                <input type="hidden" name="tratamiento" value="<?php echo $row['tratamiento']; ?>">
                                <input type="hidden" name="evolucion" value="<?php echo $row['evolucion']; ?>">
                                <input type="hidden" name="vacuna" value="<?php echo $row['vacuna']; ?>">
                                <input type="hidden" name="fecha_historial" value="<?php echo $row['fecha_historial']; ?>">
                                <input type="hidden" name="nivel_gravedad" value="<?php echo $row['nivel_gravedad']; ?>">
                                <input type="hidden" name="conclusiones" value="<?php echo $row['conclusiones']; ?>">
                                <td><input type="submit" value="Seleccionar" name="accion"></td>
                            </form>
                        </tr>
                        <?php } ?>
                    </table>
                </tbody>
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
