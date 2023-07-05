<?php session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<script src="https://kit.fontawesome.com/73c70fe811.js" crossorigin="anonymous"></script>
<link rel="icon" href="../../imagenes/principal/logo.ico" type="image/x-icon">
<title>Administrador SOS</title>   

<!-- Custom fonts for this template-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

<link

    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css?sas" rel="stylesheet">
<link href="css/reloj.css" rel="sytlesheet">

</head>

<!--FUNCIÓN DE MENSAJE DE CONFIRMACIÓN PARA LA EMLIMINACIÓN DE REGISTROS-->
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
            @include '../../../controlador/controlador_tablas/controlador_tabla_servicio.php';
            $select = "SELECT * FROM servicio";
            $tabla = mysqli_query($conn, $select);
        ?>
    <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; font-weight: 600;">TABLA SERVICIOS</h3><hr>
    
    <form action="../../../controlador/controlador_tablas/controlador_tabla_servicio.php" method="post">

        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Servicio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <!-- Etiquetas e dentro del formulario-->
                                
                                <div class="form-group col-md-4">
                                    <label>ID:</label>
                                    <input type="text" class="form-control" required name="id_servicio" placerholder="" id="id_servicio" value="<?php echo $id_servicio;?>" readonly><br>
                                </div>
                                
                                <div class="form-group col-md-8">
                                    <label>ID Veterinario:</label>
                                    <input type="text" class="form-control" required name="id_veterinario" placeholder="" id="id_veterinario" value="<?php echo $id_veterinario;?>">
                                    <br>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="">ID Reserva:</label>
                                    <input type="text" class="form-control" required name="id_reserva" placerholder="" id="id_reserva" value="<?php echo $id_reserva;?>"><br>
                                </div>
                                
                                <div class="form-group col-md-8">
                                    <label for="">Estado:</label>
                                    <input type="text" class="form-control" required name="estado_servicio" placerholder="" id="estado_servicio" value="<?php echo $estado_servicio;?>"><br>
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
                <a href="pdfs/pdf_servicio.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="padding: 8px 15px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <i class="fa-solid fa-file-pdf fa-xl"></i> <b>Generar Reporte</b></a>
            </div>
        </form>
        
        <div class="row1" style=" margin-top: 10px; font-size: 11px; border-radius: 10px;">
            <table class="table table_id" >
                <thead class="table-dark">
                    <tr>
                        <th>ID:</th>
                        <th>ID Veterinario:</th>
                        <th>ID Reserva:</th>
                        <th>Estado:</th>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = mysqli_fetch_array($tabla)){
                            ?>
                    <tr>
                        <td><?php echo $row['id_servicio'];?></td>
                        <td><?php echo $row['id_veterinario']; ?></td>
                        <td><?php echo $row['id_reserva']; ?></td>
                        <td><?php echo $row['estado_servicio']; ?></td>
                        
                        <form action="" method="POST">
                            <input type="hidden" value="<?php echo $row['id_servicio'];?>" name="id_servicio">
                            <input type="hidden" value="<?php echo $row['id_veterinario'];?>" name="id_veterinario">
                            <input type="hidden" value="<?php echo $row['id_reserva'];?>" name="id_reserva">
                            <input type="hidden" value="<?php echo $row['estado_servicio'];?>" name="estado_servicio">
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