<?php session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<!-- BARRA DE NAV EMPIEZA EN LA FILA 	pag 169-->
<!-- Recuperar nombre del admninitrador pag 338-->
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
    <link
    
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css?asd" rel="stylesheet">
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
            include '../../../controlador/controlador_tablas/controlador_tabla_admin.php';
            $select = "SELECT a.id_clinica, a.id_adm, c.nombre_clinica, a.dni_adm, a.nombre_adm, a.apellido_adm, a.genero_adm, a.direccion_adm, a.telefono_adm, a.email, a.password, a.user_type FROM clinica c INNER JOIN administrador a ON (c.id_clinica = a.id_clinica)";
            $tabla = mysqli_query($conn, $select);

        ?>
        
        <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; font-weight: 600;">TABLA ADMINISTRADOR</h3><hr>
        
        <form action="../../../controlador/controlador_tablas/controlador_tabla_admin.php" method="post">

        <script>
            $(".cerrarModal").click(function(){
                $('#exampleModal').modal('hide');
            });
        </script>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Administrador</h1>
                            <button type="button" class="btn-close cerrarModal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                                    <!-- Etiquetas e dentro del formulario-->

                                <div class="form-group col-md-12">                             
                                    <label for="">ID:</label>
                                    <input type="text" class="form-control" name="id_adm" id="id_adm" value="<?php echo $id_adm; ?>" readonly><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Clínica (<?php echo $nombre_clinica; ?>):</label>
                                    <select name="id_clinica1" id="id_clinica1" class="form-select">
                                        <?php
                                            @include '../../modelo/config.php';
                                            include '../../../controlador/controlador_tablas/controlador_tabla_admin.php';

                                            $consulta = "SELECT * FROM clinica";
                                            $ejecutar = mysqli_query($conn,$consulta);

                                        ?>
                                        <?php foreach ($ejecutar as $opciones): $i=$opciones['id_clinica']; $a=$opciones['nombre_clinica'];?> 
                                            
                                            <option value="<?php echo $i; ?>"><?php echo $a; ?></option>
                                        
                                            <?php endforeach ?>
                                    </select><br>
                                </div>


                                <!--<div class="form-group col-md-4">                             
                                    <label for="">ID Clínica:</label>
                                    <input type="text" class="form-control" name="id_clinica" id="id_clinica" value="<?php echo $id_clinica; ?>"><br>
                                </div>-->   

                                <div class="form-group col-md-6">
                                    <label for="">DNI:</label>
                                    <input type="text" class="form-control" required name="dni_adm" placerholder="" id="dni_adm" value="<?php echo $dni_adm;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control" required name="nombre_adm" placerholder="" id="nombre_adm" value="<?php echo $nombre_adm;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Apellido:</label>
                                    <input type="text" class="form-control" required name="apellido_adm" placerholder="" id="apellido_adm" value="<?php echo $apellido_adm;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Género:</label>
                                    <select name="genero_adm" class="form-select">
                                        <option value="<?php echo $genero_adm; ?>"> <?php echo $genero_adm; ?></option>
                                        <option value="femenino">femenino</option>
                                        <option value="masculino">masculino </option>
                                    </select><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Dirección:</label>
                                    <input type="text" class="form-control" required name="direccion_adm" placerholder="" id="direccion_adm" value="<?php echo $direccion_adm;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Telefono:</label>
                                    <input type="text" class="form-control" required name="telefono_adm" placerholder="" id="telefono_adm" value="<?php echo $telefono_adm;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Correo:</label>
                                    <input type="email" class="form-control" required name="email" placerholder="" id="email" value="<?php echo $email;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Contraseña:</label>
                                    <input type="password" class="form-control" name="pass" <?php echo $pass; ?> placeholder="" id="pass" value=""><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Tipo de usuario:</label>
                                    <select name="user_type" id="user_type" class="form-select">
                                        <option value=" <?php echo $user_type; ?>"><?php echo $user_type; ?></option>
                                        <option value="admin">admin</option>
                                        <option value="user" disabled>user</option>
                                    </select><br><br>
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
                <a href="pdfs/pdf_admin.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="padding: 8px 15px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <i class="fa-solid fa-file-pdf fa-xl"></i> <b>Generar Reporte</b>
                </a>
            </div>
        </form>

        <div class="row1" style="margin-top: 10px; font-size: 14px; border-radius: 10px;">
            <table class="table table_id" >
                <thead class="table-dark">
                    <tr>
                        <th>ID:</th>
                        <th>ID Clínica:</th>
                        <th>DNI:</th>
                        <th>Nombre:</th>
                        <th>Apellido:</th>
                        <th>Género:</th>
                        <th>Direccion:</th>
                        <th>Telefono:</th>
                        <th>Correo:</th>
                        <th>Contraseña:</th>
                        <th>Tipo:</th>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($tabla) or $op = mysqli_fetch_array($ejecutar)){ ?>                        
                        <tr>
                            <td><?php echo $row['id_adm'];?></td>
                            <td><?php echo $row['id_clinica']; ?></td>
                            <td><?php echo $row['dni_adm']; ?></td>
                            <td><?php echo $row['nombre_adm']; ?></td>
                            <td><?php echo $row['apellido_adm']; ?></td>
                            <td><?php echo $row['genero_adm']; ?></td>
                            <td><?php echo $row['direccion_adm']; ?></td>
                            <td><?php echo $row['telefono_adm']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['user_type']; ?></td>

                            <form action="" method="post">
                                <input type="hidden" name="id_adm" value=" <?php echo $row['id_adm']; ?>">
                                <input type="hidden" name="id_clinica" value=" <?php echo $row['id_clinica']; ?>">
                                <input type="hidden" name="nombre_clinica" value=" <?php echo $row['nombre_clinica']; ?>">
                                <input type="hidden" name="dni_adm" value=" <?php echo $row['dni_adm']; ?>">
                                <input type="hidden" name="nombre_adm" value=" <?php echo $row['nombre_adm']; ?>">
                                <input type="hidden" name="apellido_adm" value=" <?php echo $row['apellido_adm']; ?>">
                                <input type="hidden" name="genero_adm" value=" <?php echo $row['genero_adm']; ?>">
                                <input type="hidden" name="direccion_adm" value=" <?php echo $row['direccion_adm']; ?>">
                                <input type="hidden" name="telefono_adm" value=" <?php echo $row['telefono_adm']; ?>">
                                <input type="hidden" name="email" value=" <?php echo $row['email']; ?>">
                                <input type="hidden" name="pass" value=" <?php echo $row['password']; ?>">
                                <input type="hidden" name="user_type" value=" <?php echo $row['user_type']; ?>">
                                <td><input type="submit" value="Seleccionar" name="accion"></td>
                            </form>        
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!--CÓDIGO PARA MOSTRAR EL MODAL CUANDO SE SELECCIONA EL REGISTRO (Implementar en todas las tablas)-->
        <?php if($mostrarModal){ ?>
            <script>
                $('#exampleModal').modal('show');
            </script>
        <?php } ?>
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