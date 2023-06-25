<?php
    @include '../../modelo/config.php';

    $id_servicio = (isset($_POST['id_servicio']))?$_POST['id_servicio']:"";
    $id_veterinario = (isset($_POST['id_veterinario']))?$_POST['id_veterinario']:"";
    $id_reserva = (isset($_POST['id_reserva']))?$_POST['id_reserva']:"";
    $estado_servicio = (isset($_POST['estado_servicio']))?$_POST['estado_servicio']:"";
    
    /*$id_servicio = $_POST['id_servicio'];
    $id_veterinario = mysqli_real_escape_string($conn, $_POST['id_veterinario']);
    $id_reserva = mysqli_real_escape_string($conn, $_POST['id_reserva']);
    $estado_servicio = mysqli_real_escape_string($conn, $_POST['estado_servicio']);*/

    $accionAgregar="";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    $accion= (isset($_POST['accion']))?$_POST['accion']:"";
    switch($accion){
        case "btnAgregar":
                $select = "SELECT * FROM servicio WHERE id_reserva = '$id_reserva'";
                $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result) > 0){
                    echo "<script> alert('¡Cuenta existente!')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_servicio.php');
                }else{
                    
                    $insert = "INSERT INTO servicio(id_veterinario, id_reserva, estado_servicio) VALUES('$id_veterinario', '$id_reserva', '$estado_servicio')";
                    mysqli_query($conn, $insert);

                    echo "<script> alert('Registro exitoso')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_servicio.php');
                }
            break;
            case "btnModificar":
                //TERMINADO
                $update = "UPDATE servicio SET id_veterinario = '$id_veterinario', id_reserva = '$id_reserva', estado_servicio = '$estado_servicio' WHERE id_servicio = '$id_servicio'";
                mysqli_query($conn,$update);
                echo "<script>alert('Seleccionó el botón Modificar')</script>";
                header('location: ../../vista/adm/dashboard/tabla_servicio.php');
            break;
        case "btnEliminar":
                //Completado mensaje de confirmación.
                $delete = "DELETE FROM servicio WHERE id_servicio = $id_servicio";
                mysqli_query($conn,$delete);
                header('location: ../../vista/adm/dashboard/tabla_servicio.php');
            break;
        case "btnCancelar":
            header('location: ../../vista/adm/dashboard/tabla_servicio.php');
            break;

        case "Seleccionar":
            $pass="disabled";
            $accionAgregar="disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal= true;
            break;
    }
?>