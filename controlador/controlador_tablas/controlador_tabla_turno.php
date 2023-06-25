<?php
    @include '../../modelo/config.php';

    $id_turno = (isset($_POST['id_turno']))?$_POST['id_turno']:"";
    $hora_inicio = (isset($_POST['hora_inicio']))?$_POST['hora_inicio']:"";
    $hora_final = (isset($_POST['hora_final']))?$_POST['hora_final']:"";

    /*$id_turno = $_POST['id_turno'];
    $hora_inicio = mysqli_real_escape_string($conn, $_POST['hora_inicio']);
    $hora_final = mysqli_real_escape_string($conn, $_POST['hora_final']);*/

    $accionAgregar="";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    $accion= (isset($_POST['accion']))?$_POST['accion']:"";
    switch($accion){
        case "btnAgregar":
                    $insert = "INSERT INTO turno(id_turno, hora_inicio, hora_final) VALUES('$id_turno','$hora_inicio', '$hora_final')";
                    mysqli_query($conn, $insert);

                    echo "<script> alert('Registro exitoso')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_turno.php');
            break;
            case "btnModificar":
                    //TERMINADO.
                    $update = "UPDATE turno SET hora_inicio='$hora_inicio', hora_final='$hora_final' WHERE id_turno = '$id_turno' ";
                    mysqli_query($conn, $update);
                    echo "<script> alert('¡El registro se ha MODIFICADO correctamente!')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_turno.php');
            break;
        case "btnEliminar":
                //Completado mensaje de confirmación.
                $delete = "DELETE FROM turno WHERE id_turno = '$id_turno'";
                mysqli_query($conn,$delete);
                header('location: ../../vista/adm/dashboard/tabla_turno.php');
            break;
        case "btnCancelar":
            header('location: ../../vista/adm/dashboard/tabla_turno.php');
            break;

        case "Seleccionar":
            $pass="disabled";
            $accionAgregar="disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal= true;
            break;
    }
?>