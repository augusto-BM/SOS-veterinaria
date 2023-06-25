<?php
@include '../../modelo/config.php';
error_reporting(0);
session_start();

$id_mascota = $_POST['id_mascota'];
$diagnostico = (isset($_POST['diagnostico'])) ? $_POST['diagnostico'] : "";
$tratamiento = (isset($_POST['tratamiento'])) ? $_POST['tratamiento'] : "";
$evolucion = (isset($_POST['evolucion'])) ? $_POST['evolucion'] : "";
$vacuna = (isset($_POST['vacuna'])) ? $_POST['vacuna'] : "";
$fecha_historial = (isset($_POST['fecha_historial'])) ? $_POST['fecha_historial'] : "";
$nivel_gravedad = (isset($_POST['nivel_gravedad'])) ? $_POST['nivel_gravedad'] : "";
$conclusiones = (isset($_POST['conclusiones'])) ? $_POST['conclusiones'] : "";

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = false;

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
switch ($accion) {
    case "btnAgregar":
        $insert = "INSERT INTO historial_mascota (id_mascota, diagnostico, tratamiento, evolucion, vacuna, fecha_historial, nivel_gravedad, conclusiones) VALUES ('$id_mascota','$diagnostico','$tratamiento','$evolucion','$vacuna','$fecha_historial','$nivel_gravedad','$conclusiones')";
        mysqli_query($conn, $insert);

        echo "<script> alert('Registro exitoso')</script>";
        header('location: ../../vista/adm/dashboard/tabla_historial.php');
        break;
    case "btnModificar":
        // Implement logic for modifying the pet's history here
        echo "<script> alert('Seleccionó el botón Modificar')</script>";
        header('location: ../../vista/adm/dashboard/tabla_historial.php');
        break;
    case "btnEliminar":
        // Implement logic for deleting the pet's history here
        echo "<script> alert('Seleccionó el botón Eliminar')</script>";
        header('location: ../../vista/adm/dashboard/tabla_historial.php');
        break;
    case "btnCancelar":
        header('location: ../../vista/adm/dashboard/tabla_historial.php');
        break;
    case "Seleccionar":
        $pass = "readonly";
        $accionAgregar = "disabled";
        $accionModificar = $accionEliminar = $accionCancelar = "";
        $mostrarModal = true;
        break;
}
?>