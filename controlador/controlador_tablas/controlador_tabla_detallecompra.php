<?php
    @include '../../modelo/config.php';
    error_reporting(0);
    session_start();

    $id_detalle_compra = $_POST['id_detalle_compra'];
    $id_compra = $_POST['id_compra'];
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $accionAgregar = "";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
    switch ($accion) {

        case "btnAgregar":
            $insert = "INSERT INTO detalle_compra(id_compra, id_producto, nombre, precio, cantidad) VALUES ('$id_compra', '$id_producto', '$nombre', '$precio', '$cantidad')";
            mysqli_query($conn, $insert);

            echo "<script> alert('Registro exitoso')</script>";
            header('location: ../../vista/adm/dashboard/tabla_detallecompra.php');
            break;
        case "btnModificar":
            $update = "UPDATE detalle_compra SET id_compra='$id_compra', id_producto='$id_producto', nombre='$nombre', precio='$precio', cantidad='$cantidad' WHERE id_detalle_compra='$id_detalle_compra'";
            mysqli_query($conn, $update);

            echo "<script> alert('Modificación exitosa')</script>";
            header('location: ../../vista/adm/dashboard/tabla_detallecompra.php');
            break;
        case "btnEliminar":
            $delete = "DELETE FROM detalle_compra WHERE id_detalle_compra='$id_detalle_compra'";
            mysqli_query($conn, $delete);

            echo "<script> alert('Eliminación exitosa')</script>";
            header('location: ../../vista/adm/dashboard/tabla_detallecompra.php');
            break;
        case "btnCancelar":
            header('location: ../../vista/adm/dashboard/tabla_detallecompra.php');
            break;
        case "Seleccionar":
            $pass="readonly";
            $accionAgregar = "disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal = true;
            break;
    }
?>
