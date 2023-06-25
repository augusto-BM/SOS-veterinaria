<?php
@include '../../modelo/config.php';
error_reporting(0);
session_start();

$id_mascota = $_POST['id_mascota'];
$id_reserva = mysqli_real_escape_string($conn, $_POST['id_reserva']);
$tipo_mascota = mysqli_real_escape_string($conn, $_POST['tipo_mascota']);
$nombre_mascota = mysqli_real_escape_string($conn, $_POST['nombre_mascota']);
$edad_mascota = mysqli_real_escape_string($conn, $_POST['edad_mascota']);
$raza_mascota = mysqli_real_escape_string($conn, $_POST['raza_mascota']);

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = false;

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
switch ($accion) {

    case "btnAgregar":
        $insert = "INSERT INTO mascota (id_reserva, tipo_mascota, nombre_mascota, edad_mascota, raza_mascota) VALUES ('$id_reserva','$tipo_mascota','$nombre_mascota','$edad_mascota','$raza_mascota')";
        mysqli_query($conn, $insert);

        echo "<script> alert('Registro exitoso')</script>";
        header('location: ../../vista/adm/dashboard/tabla_mascota.php');
        break;
    case "btnModificar":
        $update = "UPDATE mascota SET id_reserva='$id_reserva', tipo_mascota='$tipo_mascota', nombre_mascota='$nombre_mascota', edad_mascota='$edad_mascota', raza_mascota='$raza_mascota' WHERE id_mascota='$id_mascota'";
        mysqli_query($conn, $update);

        echo "<script> alert('Registro actualizado')</script>";
        header('location: ../../vista/adm/dashboard/tabla_mascota.php');
        break;
    case "btnEliminar":
        $delete = "DELETE FROM mascota WHERE id_mascota = '$id_mascota'";
        mysqli_query($conn, $delete);
        header('location: ../../vista/adm/dashboard/tabla_mascota.php');
        break;
    case "btnCancelar":
        header('location: ../../vista/adm/dashboard/tabla_mascota.php');
        break;
    case "Seleccionar":
        $pass = "readonly";
        $accionAgregar = "disabled";
        $accionModificar = $accionEliminar = $accionCancelar = "";
        $mostrarModal = true;
        break;
}
?>