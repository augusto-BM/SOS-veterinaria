<?php
    @include '../../modelo/config.php';
    error_reporting(0);

    $id_compra = (isset($_POST['id_compra'])) ? $_POST['id_compra'] : "";
    $id_transaccion = (isset($_POST['id_transaccion'])) ? $_POST['id_transaccion'] : "";
    $id_cliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : "";
    $fecha_compra = (isset($_POST['fecha_compra'])) ? $_POST['fecha_compra'] : "";
    $status = (isset($_POST['status'])) ? $_POST['status'] : "";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $id_cliente_paypal = (isset($_POST['id_cliente_paypal'])) ? $_POST['id_cliente_paypal'] : "";
    $total = (isset($_POST['total'])) ? $_POST['total'] : "";


    $accionAgregar = "";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
    switch ($accion) {
        case "btnAgregar":
            $insert = "INSERT INTO compra(id_transaccion, id_cliente, fecha_compra, status, email, id_cliente_paypal, total) VALUES('$id_transaccion','$id_cliente','$fecha_compra','$status','$email','$id_cliente_paypal','$total')";
            mysqli_query($conn, $insert);

            echo "<script> alert('Registro exitoso')</script>";
            header('location: ../../vista/adm/dashboard/tabla_compra.php');
            break;
        case "btnModificar":
            $update = "UPDATE compra SET id_transaccion='$id_transaccion', id_cliente='$id_cliente', fecha_compra='$fecha_compra', status='$status', email='$email', id_cliente_paypal='$id_cliente_paypal', total='$total' WHERE id_compra='$id_compra'";
            mysqli_query($conn, $update);
            echo "<script> alert('¡El registro se ha MODIFICADO correctamente!')</script>";
            header('location: ../../vista/adm/dashboard/tabla_compra.php');
            break;
        case "btnEliminar":
            $delete = "DELETE FROM compra WHERE id_compra='$id_compra'";
            mysqli_query($conn, $delete);
            header('location: ../../vista/adm/dashboard/tabla_compra.php');
            break;
        case "btnCancelar":
            header('location: ../../vista/adm/dashboard/tabla_compra.php');
            break;
        case "Seleccionar":
            $pass="readonly";
            $accionAgregar = "disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal = true;
            break;
    }
?>