<?php
    @include '../../modelo/config.php';
    $id_veterinario = (isset($_POST['id_veterinario']))?$_POST['id_veterinario']:"";
    $id_turno = (isset($_POST['id_turno']))?$_POST['id_turno']:"";
    $id_clinica = (isset($_POST['id_clinica']))?$_POST['id_clinica']:"";
    $dni_veterinario = (isset($_POST['dni_veterinario']))?$_POST['dni_veterinario']:"";
    $nombre_veterinario = (isset($_POST['nombre_veterinario']))?$_POST['nombre_veterinario']:"";
    $apellido_veterinario = (isset($_POST['apellido_veterinario']))?$_POST['apellido_veterinario']:"";
    $genero_veterinario = (isset($_POST['genero_veterinario']))?$_POST['genero_veterinario']:"";
    $telefono_veterinario = (isset($_POST['telefono_veterinario']))?$_POST['telefono_veterinario']:"";

    /*$id_veterinario = $_POST['id_veterinario'];
    $id_turno = mysqli_real_escape_string($conn, $_POST['id_turno']);
    $id_clinica = mysqli_real_escape_string($conn, $_POST['id_clinica']);
    $dni_veterinario = mysqli_real_escape_string($conn, $_POST['dni_veterinario']);
    $nombre_veterinario = mysqli_real_escape_string($conn, $_POST['nombre_veterinario']);
    $apellido_veterinario = mysqli_real_escape_string($conn, $_POST['apellido_veterinario']);
    $genero_veterinario = mysqli_real_escape_string($conn, $_POST['genero_veterinario']);
    $telefono_veterinario = mysqli_real_escape_string($conn, $_POST['telefono_veterinario']);*/

    $accionAgregar="";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

        $accion= (isset($_POST['accion']))?$_POST['accion']:"";
        switch($accion){
            
            case "btnAgregar":
                $select = " SELECT * FROM veterinario WHERE dni_veterinario= '$dni_veterinario'";
                $result = mysqli_query($conn, $select);
                
                if(mysqli_num_rows($result) > 0){
                    echo "<script> alert('¡Cuenta existente!')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_veterinario.php');
                }else{
                    $insert = "INSERT INTO veterinario(id_turno, id_clinica, dni_veterinario, nombre_veterinario, apellido_veterinario, genero_veterinario, telefono_veterinario) VALUES( '$id_turno', '$id_clinica', '$dni_veterinario', '$nombre_veterinario', '$apellido_veterinario', '$genero_veterinario', '$telefono_veterinario')";
                    mysqli_query($conn, $insert);

                    echo "<script> alert('Registro exitoso')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_veterinario.php');
                }
                break;
            case "btnModificar":
                    //TERMINADO.
                    $update = "UPDATE veterinario SET id_turno='$id_turno', id_clinica='$id_clinica', dni_veterinario='$dni_veterinario', nombre_veterinario='$nombre_veterinario', apellido_veterinario='$apellido_veterinario', genero_veterinario='$genero_veterinario', telefono_veterinario='$telefono_veterinario' WHERE id_veterinario = '$id_veterinario'";
                    mysqli_query($conn,$update);
                    echo "<script> alert('Seleccionó el botón Modificar')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_veterinario.php');
                break;
            case "btnEliminar":
                    //Completado mensaje de confirmación.
                    $delete = "DELETE  FROM veterinario WHERE id_veterinario = $id_veterinario";
                    mysqli_query($conn,$delete);
                    header('location: ../../vista/adm/dashboard/tabla_veterinario.php');
                break;
            case "btnCancelar":
                header('location: ../../vista/adm/dashboard/tabla_veterinario.php');
                break;

            case "Seleccionar":
                $accionAgregar="disabled";
                $accionModificar = $accionEliminar = $accionCancelar = "";
                $mostrarModal= true;
                break;
        }
?>






