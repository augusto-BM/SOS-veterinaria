

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
            include '../../../controlador/controlador_tablas/controlador_tabla_veterinario.php';
            $select = "SELECT v.id_veterinario, t.id_turno, t.hora_inicio, t.hora_final, c.id_clinica, c.nombre_clinica, v.dni_veterinario, v.nombre_veterinario, v.apellido_veterinario, v.genero_veterinario, v.telefono_veterinario FROM turno t INNER JOIN veterinario v ON (t.id_turno = v.id_turno) INNER JOIN clinica c ON (v.id_clinica = c.id_clinica);";
            $tabla = mysqli_query($conn, $select);
        ?>
        <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; font-weight: 600;">TABLA VETERINARIO</h3><hr>
        
        <form action="../../../controlador/controlador_tablas/controlador_tabla_veterinario.php" method="post">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Veterinario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                                    <!-- Etiquetas e dentro del formulario-->
                                <div class="form-group col-md-6">                             
                                    <label for="">ID:</label>
                                    <input type="text" class="form-control" name="id_veterinario" id="id_veterinario" value="<?php echo $id_veterinario;?>" readonly><br>
                                </div>

                                <!--Modificación ID CLINICA de input a select-->
                                <div class="form-group col-md-6">
                                    <label>Turno (<?php echo $hora_i;?>-<?php echo $hora_f;?>):</label>
                                    <select name="id_turno1" id="id_turno1" class="form-select">
                                        <?php
                                            @include '../../modelo/config.php';
                                            include '../../../controlador/controlador_tablas/controlador_tabla_admin.php';

                                            $consulta = "SELECT * FROM turno";
                                            $ejecutar = mysqli_query($conn,$consulta);
                                        ?>
                                        <?php foreach ($ejecutar as $opciones): $i=$opciones['id_turno']; $a=$opciones['hora_inicio']; $e=$opciones['hora_final']; ?> 
                                            
                                            <option value="<?php echo $i; ?>"><?php echo $a; ?> - <?php echo $e; ?> </option>
                                        
                                            <?php endforeach ?>
                                    </select><br>
                                </div>

                                <!--<div class="form-group col-md-7">
                                    <label for="">ID Turno:</label>
                                    <input type="text" class="form-control" required name="id_turno" placerholder="" id="id_turno" value="<?php echo $id_turno;?>"><br>
                                </div>-->
                                        <!--Modificación ID CLINICA de input a select-->
                                <div class="form-group col-md-6">
                                    <label>Clinica (<?php echo $nombre_clinica; ?>):</label>
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

                               <!-- <div class="form-group col-md-5">
                                    <label for="">ID Clínica:</label>
                                    <input type="text" class="form-control" required name="id_clinica" placerholder="" id="id_clinica" value="<?php echo $id_clinica;?>"><br>
                                </div>-->

                                <div class="form-group col-md-6">
                                    <label>DNI:</label>
                                    <input type="text" class="form-control" required name="dni_veterinario" placerholder="" id="dni_veterinario" value="<?php echo $dni_veterinario;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control" required name="nombre_veterinario" placerholder="" id="nombre_veterinario" value="<?php echo $nombre_veterinario;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Apellido:</label>
                                    <input type="text" class="form-control" required name="apellido_veterinario" placerholder="" id="apellido_veterinario" value="<?php echo $apellido_veterinario;?>"><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Género:</label>
                                    <select name="genero_veterinario" class="form-select">
                                        <option value="<?php echo $genero_veterinario; ?>"> <?php echo $genero_veterinario; ?></option>
                                        <option value="femenino">femenino</option>
                                        <option value="masculino">masculino </option>
                                    </select><br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Telefono:</label>
                                    <input type="text" class="form-control" required name="telefono_veterinario" placerholder="" id="telefono_veterinario" value="<?php echo $telefono_veterinario;?>"><br>
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
                <a href="pdfs/pdf_veterinario.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="padding: 8px 15px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <i class="fa-solid fa-file-pdf fa-xl"></i> <b>Generar Reporte</b>
                </a>
            </div>
        </form>

        <div class="row" style=" margin-top: 25px; font-size: 14px; border-radius: 10px;">
            <table class="table table_id" >
                <thead class="table-dark">
                    <tr>
                        <th>ID:</th>
                        <th>ID Turno:</th>
                        <th>ID Clínica:</th>
                        <th>DNI:</th>
                        <th>Nombre:</th>
                        <th>Apellido:</th>
                        <th>Género:</th>
                        <th>Telefono:</th>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($tabla) or $op = mysqli_fetch_array($ejecutar)){?>                        
                        <tr>
                            <td><?php echo $row['id_veterinario'];?></td>
                            <td><?php echo $row['id_turno']; ?></td>
                            <td><?php echo $row['id_clinica']; ?></td>
                            <td><?php echo $row['dni_veterinario']; ?></td>
                            <td><?php echo $row['nombre_veterinario']; ?></td>
                            <td><?php echo $row['apellido_veterinario']; ?></td>
                            <td><?php echo $row['genero_veterinario']; ?></td>
                            <td><?php echo $row['telefono_veterinario']; ?></td>

                            <form action="" method="post">
                            <input type="hidden" name="id_veterinario" value=" <?php echo $row['id_veterinario']; ?>">
                            <input type="hidden" name="id_turno" value=" <?php echo $row['id_turno']; ?>">
                            <input type="hidden" name="hora_inicio" value=" <?php echo $row['hora_inicio']; ?>">
                            <input type="hidden" name="hora_final" value=" <?php echo $row['hora_final']; ?>">
                            <input type="hidden" name="id_clinica" value=" <?php echo $row['id_clinica']; ?>">
                            <input type="hidden" name="nombre_clinica" value=" <?php echo $row['nombre_clinica']; ?>">
                            <input type="hidden" name="dni_veterinario" value=" <?php echo $row['dni_veterinario']; ?>">
                            <input type="hidden" name="nombre_veterinario" value=" <?php echo $row['nombre_veterinario']; ?>">
                            <input type="hidden" name="apellido_veterinario" value=" <?php echo $row['apellido_veterinario']; ?>">
                            <input type="hidden" name="genero_veterinario" value=" <?php echo $row['genero_veterinario']; ?>">
                            <input type="hidden" name="telefono_veterinario" value=" <?php echo $row['telefono_veterinario']; ?>">
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