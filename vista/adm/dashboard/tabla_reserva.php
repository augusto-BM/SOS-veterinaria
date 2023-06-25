<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador SOS</title>
    <link rel="icon" href="../../imagenes/principal/logo.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/73c70fe811.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/sb-admin-2.min.css?asd" rel="stylesheet">
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
        include '../../../controlador/controlador_tablas/controlador_tabla_reserva.php';
        $select = "SELECT * FROM reserva";
        $tabla = mysqli_query($conn, $select);
        ?>
        <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; font-weight: 600;">TABLA RESERVA</h3><hr>

        <form action="../../../controlador/controlador_tablas/controlador_tabla_reserva.php" method="post">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">ID Reserva:</label>
                                    <input type="text" class="form-control" name="id_reserva" id="id_reserva" value="<?php echo $id_reserva; ?>" readonly><br>
                                <br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="">ID Cliente:</label>
                                    <input type="text" class="form-control" required name="id_cliente" value="<?php echo $id_cliente; ?>"><br>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Fecha de Reserva:</label>
                                    <input type="date" class="form-control" required name="fecha_reserva" value="<?php echo $fecha_reserva; ?>"><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label>Hora de Reserva:</label>
                                    <input type="text" class="form-control" required name="hora_reserva" value="<?php echo $hora_reserva; ?>"><br>
                                </div>
  
                                <div class="form-group col-md-4">
                                    <label>Tipo de Reserva:</label>
                                    <select name="tipo_reserva" class="form-control">
                                    <option value="<?php echo $genero_adm; ?>"> <?php echo $tipo_reserva; ?></option>
                                        <option value="BAÑOS Y ESTETICA">BAÑOS Y ESTETICA</option>
                                        <option value="CLINICA VETERINARIA">CLINICA VETERINARIA</option>
                                        <option value="HOSPEDAJE DE MASCOTA">HOSPEDAJE DE MASCOTA</option>
                                        <option value="TRAMITE DE VIAJES PARA MASCOTAS">TRAMITE DE VIAJES PARA MASCOTAS</option>
                                        <option value="CREMACION DE MASCOTAS">CREMACION DE MASCOTAS</option>
                                    </select><br>
                                </div>

                                <div class="form-group col-md-8">
                                    <label>Modalidad de Reserva:</label>
                                    <select name="modalidad_reserva" class="form-control">
                                        <option value="presencial">Presencial</option>
                                        <option value="virtual">Virtual</option>
                                    </select><br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Comentarios:</label>
                                    <textarea class="form-control"  name="comentarios" value="<?php echo $comentarios; ?>"></textarea><br>
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
                <a href="pdfs/pdf_reserva.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="padding: 8px 15px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <i class="fa-solid fa-file-pdf fa-xl"></i> <b>Generar Reporte</b>
                </a>
            </div>
        </form>

        <div class="row1" style="margin-top: 10px; font-size: 14px; border-radius: 10px;">
            <table class="table table_id">
                <thead class="table-dark">
                    <tr>
                        <th>ID Reserva</th>
                        <th>ID Cliente</th>
                        <th>Fecha de Reserva</th>
                        <th>Hora de Reserva</th>
                        <th>Tipo de Reserva</th>
                        <th>Modalidad de Reserva</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($tabla)){?>
                    <tr>
                        <td><?php echo $row['id_reserva'];?></td>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['fecha_reserva']; ?></td>
                        <td><?php echo $row['hora_reserva']; ?></td>
                        <td><?php echo $row['tipo_reserva']; ?></td>
                        <td><?php echo $row['modalidad_reserva']; ?></td>
                        <td><?php echo $row['comentarios']; ?></td>

                        <form action="" method="post">
                            <input type="hidden" name="id_reserva" value="<?php echo $row['id_reserva']; ?>">
                            <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">
                            <input type="hidden" name="fecha_reserva" value="<?php echo $row['fecha_reserva']; ?>">
                            <input type="hidden" name="hora_reserva" value="<?php echo $row['hora_reserva']; ?>">
                            <input type="hidden" name="tipo_reserva" value="<?php echo $row['tipo_reserva']; ?>">
                            <input type="hidden" name="modalidad_reserva" value="<?php echo $row['modalidad_reserva']; ?>">
                            <input type="hidden" name="comentarios" value="<?php echo $row['comentarios']; ?>">
                            <td><input type="submit" value="Seleccionar" name="accion"></td>
                        </form>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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
