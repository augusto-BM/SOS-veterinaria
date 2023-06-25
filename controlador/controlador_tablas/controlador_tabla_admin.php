<?php
    @include '../../modelo/config.php';
    error_reporting(0);

    $id_adm = (isset($_POST['id_adm']))?$_POST['id_adm']:"";
    $id_clinica = (isset($_POST['id_clinica']))?$_POST['id_clinica']:"";
    $dni_adm = (isset($_POST['dni_adm']))?$_POST['dni_adm']:"";
    $nombre_adm = (isset($_POST['nombre_adm']))?$_POST['nombre_adm']:"";
    $apellido_adm = (isset($_POST['apellido_adm']))?$_POST['apellido_adm']:"";
    $genero_adm = (isset($_POST['genero_adm']))?$_POST['genero_adm']:"";
    $direccion_adm = (isset($_POST['direccion_adm']))?$_POST['direccion_adm']:"";
    $telefono_adm = (isset($_POST['telefono_adm']))?$_POST['telefono_adm']:"";
    $email = (isset($_POST['email']))?$_POST['email']:"";
    $pass = md5($_POST['password']);
    $user_type = (isset($_POST['user_type']))?$_POST['user_type']:"";

    /*$id_clinica = mysqli_real_escape_string($conn, $_POST['id_clinica']);
    $dni_adm = mysqli_real_escape_string($conn, $_POST['dni_adm']);
    $nombre_adm = mysqli_real_escape_string($conn, $_POST['nombre_adm']);
    $apellido_adm = mysqli_real_escape_string($conn, $_POST['apellido_adm']);
    $genero_adm = mysqli_real_escape_string($conn, $_POST['genero_adm']);
    $direccion_adm = mysqli_real_escape_string($conn, $_POST['direccion_adm']);
    $telefono_adm = mysqli_real_escape_string($conn, $_POST['telefono_adm']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_type = $_POST['user_type'];*/

    $accionAgregar="";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    
        $accion= (isset($_POST['accion']))?$_POST['accion']:"";
        switch($accion){
            
            case "btnAgregar":
                $select = " SELECT * FROM administrador WHERE dni_adm= '$dni_adm' AND email = '$email'";
                $result = mysqli_query($conn, $select);
                
                if(mysqli_num_rows($result) > 0){
                    echo "<script> alert('¡Cuenta existente!')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_admin.php');
                }else{
                    //EL ID_CLINICA DEBE EXISTIR EN LA TABLA CLÍNICA, SINO NO AGREGA
                    $insert = "INSERT INTO administrador(id_clinica, dni_adm, nombre_adm, apellido_adm, genero_adm, direccion_adm, telefono_adm, email, password, user_type) VALUES('$id_clinica','$dni_adm','$nombre_adm','$apellido_adm','$genero_adm','$direccion_adm','$telefono_adm','$email','$pass','$user_type')";
                    mysqli_query($conn, $insert);

                    echo "<script> alert('Registro exitoso')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_admin.php');
                }
                break;
            case "btnModificar":
                    //COMPLETADO.
                    $update = "UPDATE administrador SET id_clinica='$id_clinica', dni_adm='$dni_adm', nombre_adm='$nombre_adm', apellido_adm='$apellido_adm', genero_adm='$genero_adm', direccion_adm='$direccion_adm', telefono_adm='$telefono_adm', email='$email' WHERE id_adm='$id_adm'";
                    mysqli_query($conn, $update);
                    echo "<script> alert('¡El registro se ha MODIFICADO correctamente!')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_admin.php');
                break;
            case "btnEliminar":
                    //Completado mensaje de confirmación.
                    $delete = "DELETE FROM administrador WHERE email = '$email'";
                    mysqli_query($conn,$delete);
                    header('location: ../../vista/adm/dashboard/tabla_admin.php');
                break;
            case "btnCancelar":
                header('location: ../../vista/adm/dashboard/tabla_admin.php');
                break;

            case "Seleccionar":
                $pass="readonly";
                $accionAgregar="disabled";
                $accionModificar = $accionEliminar = $accionCancelar = "";
                $mostrarModal= true;
                break;
        }
?>






