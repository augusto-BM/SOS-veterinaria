<?php
    @include '../../modelo/config.php';

    $id_clinica = (isset($_POST['id_clinica']))?$_POST['id_clinica']:"";
    $ruc_clinica = (isset($_POST['ruc_clinica']))?$_POST['ruc_clinica']:"";
    $nombre_clinica = (isset($_POST['nombre_clinica']))?$_POST['nombre_clinica']:"";
    $telefono_clinica = (isset($_POST['telefono_clinica']))?$_POST['telefono_clinica']:"";
    $direccion_clinica = (isset($_POST['direccion_clinica']))?$_POST['direccion_clinica']:"";

    /*$id_clinica = $_POST['id_clinica'];
    $ruc_clinica = mysqli_real_escape_string($conn, $_POST['ruc_clinica']);
    $nombre_clinica = mysqli_real_escape_string($conn, $_POST['nombre_clinica']);
    $telefono_clinica = mysqli_real_escape_string($conn, $_POST['telefono_clinica']);
    $direccion_clinica = mysqli_real_escape_string($conn, $_POST['direccion_clinica']);*/

    $accionAgregar="";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    $accion= (isset($_POST['accion']))?$_POST['accion']:"";
    switch($accion){
        case "btnAgregar":
                $select = "SELECT * FROM clinica WHERE direccion_clinica = '$direccion_clinica'";
                $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result) > 0){
                    echo "<script> alert('¡Cuenta existente!')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_clinica.php');
                }else{
                    
                    $insert = "INSERT INTO clinica(ruc_clinica, nombre_clinica, telefono_clinica, direccion_clinica) VALUES('$ruc_clinica', '$nombre_clinica', '$telefono_clinica', '$direccion_clinica')";
                    mysqli_query($conn, $insert);

                    echo "<script> alert('Registro exitoso')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_clinica.php');
                }
            break;
            case "btnModificar":
                $update = "UPDATE clinica SET ruc_clinica='$ruc_clinica', nombre_clinica='$nombre_clinica', telefono_clinica='$telefono_clinica', direccion_clinica='$direccion_clinica' WHERE id_clinica='$id_clinica'";
                mysqli_query($conn, $update);
                echo "<script> alert('Seleccionó el botón Modificar')</script>";
                header('location: ../../vista/adm/dashboard/tabla_clinica.php');
            break;
        case "btnEliminar":
                //Completado mensaje de confirmación.
                $delete = "DELETE FROM clinica WHERE direccion_clinica = '$direccion_clinica'";
                mysqli_query($conn,$delete);
                header('location: ../../vista/adm/dashboard/tabla_clinica.php');
            break;
        case "btnCancelar":
            header('location: ../../vista/adm/dashboard/tabla_clinica.php');
            break;

        case "Seleccionar":
            $pass="disabled";
            $accionAgregar="disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal= true;
            break;
    }
?>