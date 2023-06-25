<?php
@include '../../modelo/config.php';
error_reporting(0);

$id_reserva = $_POST['id_reserva'];
$id_cliente = mysqli_real_escape_string($conn, $_POST['id_cliente']);
$fecha_reserva = mysqli_real_escape_string($conn, $_POST['fecha_reserva']);
$hora_reserva = mysqli_real_escape_string($conn, $_POST['hora_reserva']);
$tipo_reserva = mysqli_real_escape_string($conn, $_POST['tipo_reserva']);
$modalidad_reserva = mysqli_real_escape_string($conn, $_POST['modalidad_reserva']);
$comentarios = mysqli_real_escape_string($conn, $_POST['comentarios']);

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = false;

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
switch ($accion) {
    case "btnAgregar":
        $insert = "INSERT INTO reserva (id_cliente, fecha_reserva, hora_reserva, tipo_reserva, modalidad_reserva, comentarios) VALUES ('$id_cliente', '$fecha_reserva', '$hora_reserva', '$tipo_reserva', '$modalidad_reserva', '$comentarios')";
        mysqli_query($conn, $insert);

        echo "<script> alert('Registro exitoso')</script>";
        header('location: ../../vista/adm/dashboard/tabla_reserva.php');
        break;

    case "btnModificar":
        $update = "UPDATE reserva SET id_cliente='$id_cliente', fecha_reserva='$fecha_reserva', hora_reserva='$hora_reserva', tipo_reserva='$tipo_reserva', modalidad_reserva='$modalidad_reserva', comentarios='$comentarios' WHERE id_reserva='$id_reserva'";
        mysqli_query($conn, $update);

        echo "<script> alert('Registro actualizado')</script>";
        header('location: ../../vista/adm/dashboard/tabla_reserva.php');
        break;

    case "btnEliminar":
        $delete = "DELETE FROM reserva WHERE id_reserva='$id_reserva'";
        mysqli_query($conn, $delete);
        header('location: ../../vista/adm/dashboard/tabla_reserva.php');
        break;

    case "btnCancelar":
        header('location: ../../vista/adm/dashboard/tabla_reserva.php');
        break;

    case "Seleccionar":
        $pass = "readonly";
        $accionAgregar = "disabled";
        $accionModificar = $accionEliminar = $accionCancelar = "";
        $mostrarModal = true;
        break;
}
?>