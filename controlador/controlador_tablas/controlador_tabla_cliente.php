<?php
    @include '../../modelo/config.php';
    error_reporting(0);

    $id_cliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : "";
    $dni_cliente = (isset($_POST['dni_cliente'])) ? $_POST['dni_cliente'] : "";
    $nombre_cliente = (isset($_POST['nombre_cliente'])) ? $_POST['nombre_cliente'] : "";
    $apellido_cliente = (isset($_POST['apellido_cliente'])) ? $_POST['apellido_cliente'] : "";
    $genero_cliente = (isset($_POST['genero_cliente'])) ? $_POST['genero_cliente'] : "";
    $direccion_cliente = (isset($_POST['direccion_cliente'])) ? $_POST['direccion_cliente'] : "";
    $telefono_cliente = (isset($_POST['telefono_cliente'])) ? $_POST['telefono_cliente'] : "";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $pass = md5($_POST['password']);
    $user_type = (isset($_POST['user_type'])) ? $_POST['user_type'] : "";

    $accionAgregar = "";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
    switch ($accion) {
        case "btnAgregar":
            $select = "SELECT * FROM cliente WHERE dni_cliente = '$dni_cliente' AND email = '$email'";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                echo "<script> alert('¡Cuenta existente!')</script>";
                header('location: ../../vista/adm/dashboard/tabla_cliente.php');
            } else {
                $insert = "INSERT INTO cliente(dni_cliente, nombre_cliente, apellido_cliente, genero_cliente, direccion_cliente, telefono_cliente, email, password, user_type) VALUES ('$dni_cliente', '$nombre_cliente', '$apellido_cliente', '$genero_cliente', '$direccion_cliente', '$telefono_cliente', '$email', '$pass', '$user_type')";
                mysqli_query($conn, $insert);

                echo "<script> alert('Registro exitoso')</script>";
                header('location: ../../vista/adm/dashboard/tabla_cliente.php');
            }
            break;

        case "btnModificar":
            $update = "UPDATE cliente SET dni_cliente = '$dni_cliente', nombre_cliente = '$nombre_cliente', apellido_cliente = '$apellido_cliente', genero_cliente = '$genero_cliente', direccion_cliente = '$direccion_cliente', telefono_cliente = '$telefono_cliente', email = '$email' WHERE id_cliente = '$id_cliente'";
            mysqli_query($conn, $update);
            echo "<script> alert('¡El registro se ha MODIFICADO correctamente!')</script>";
            header('location: ../../vista/adm/dashboard/tabla_cliente.php');
            break;

        case "btnEliminar":
            $delete = "DELETE FROM cliente WHERE email = '$email'";
            mysqli_query($conn, $delete);
            header('location: ../../vista/adm/dashboard/tabla_cliente.php');
            break;

        case "btnCancelar":
            header('location: ../../vista/adm/dashboard/tabla_cliente.php');
            break;

        case "Seleccionar":
            $pass = "readonly";
            $accionAgregar = "disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal = true;
            break;
    }
?>