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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Tabla de Compras</title>
    <!-- Custom fonts for this template -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css?asd" rel="stylesheet">
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
        include '../../../controlador/controlador_tablas/controlador_tabla_compra.php';
        $select = "SELECT * FROM compra";
        $tabla = mysqli_query($conn, $select);
        ?>
        <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; font-weight: 600;">TABLA DE COMPRAS</h3><hr>
        
        <form action="../../../controlador/controlador_tablas/controlador_tabla_compra.php" method="post">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Compra</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">ID Compra:</label>
                                    <input type="number" class="form-control" name="id_compra" id="id_compra"  value="<?php echo $id_compra; ?>" readonly><br>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">ID Transacción:</label>
                                    <input type="text" class="form-control" required name="id_transaccion" value="<?php echo $id_transaccion; ?>"><br>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">ID Cliente:</label>
                                    <input type="number" class="form-control" required name="id_cliente" value="<?php echo $id_cliente; ?>"><br>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Fecha de Compra:</label>
                                    <input type="text" class="form-control" required name="fecha_compra" placeholder="" value="<?php echo $fecha_compra; ?>"><br>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Estado:</label>
                                    <input type="text" class="form-control" required name="status" placeholder="" value="<?php echo $status; ?>"><br>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Correo:</label>
                                    <input type="email" class="form-control" required name="email" placeholder="" value="<?php echo $email; ?>"><br>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">ID Cliente PayPal:</label>
                                    <input type="text" class="form-control" required name="id_cliente_paypal" placeholder="" value="<?php echo $id_cliente_paypal; ?>"><br>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Total:</label>
                                    <input type="MONEDA" class="form-control" required name="total" placeholder="" value="<?php echo $total; ?>"><br>
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
                <a href="pdfs/pdf_compras.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="padding: 8px 15px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <i class="fa-solid fa-file-pdf fa-xl"></i> <b>Generar Reporte</b>
                </a>
            </div>
        </form>
        <div class="row1" style="margin-top: 10px; font-size: 14px; border-radius: 10px;">
            <table class="table table_id">
                <thead class="table-dark">
                    <tr>
                        <th>ID Compra:</th>
                        <th>ID Transacción:</th>
                        <th>ID Cliente:</th>
                        <th>Fecha de Compra:</th>
                        <th>Estado:</th>
                        <th>Correo:</th>
                        <th>ID Cliente PayPal:</th>
                        <th>Total:</th>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($tabla)){?>
                        <tr>
                            <td><?php echo $row['id_compra'];?></td>
                            <td><?php echo $row['id_transaccion']; ?></td>
                            <td><?php echo $row['id_cliente']; ?></td>
                            <td><?php echo $row['fecha_compra']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['id_cliente_paypal']; ?></td>
                            <td><?php echo $row['total']; ?></td>

                            <form action="" method="post">

                                <input type="hidden" name="id_compra" value="<?php echo $row['id_compra']; ?>">
                                <input type="hidden" name="id_transaccion" value="<?php echo $row['id_transaccion']; ?>">
                                <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">
                                <input type="hidden" name="fecha_compra" value="<?php echo $row['fecha_compra']; ?>">
                                <input type="hidden" name="status" value="<?php echo $row['status']; ?>">
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                <input type="hidden" name="id_cliente_paypal" value="<?php echo $row['id_cliente_paypal']; ?>">
                                <input type="hidden" name="total" value="<?php echo $row['total']; ?>">
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
