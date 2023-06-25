<?php

    @include '../../modelo/conexion.php';
    error_reporting(0);
    $db = new Database();
    $con = $db->Conexion();
    
    $administrador  = current($con->query("SELECT COUNT(id_adm) FROM administrador")->fetch());
    $cliente        = current($con->query("SELECT COUNT(id_cliente) FROM cliente")->fetch());
    $clinica        = current($con->query("SELECT COUNT(id_clinica) FROM clinica")->fetch());
    $historial      = current($con->query("SELECT COUNT(id_historial) FROM historial_mascota")->fetch());
    $mascota        = current($con->query("SELECT COUNT(id_mascota) FROM mascota")->fetch());
    $reserva        = current($con->query("SELECT COUNT(id_reserva) FROM reserva")->fetch());
    $servicio       = current($con->query("SELECT COUNT(id_servicio) FROM servicio")->fetch());
    $turno          = current($con->query("SELECT COUNT(id_turno) FROM turno")->fetch());
    $veterinario    = current($con->query("SELECT COUNT(id_veterinario) FROM veterinario")->fetch());
    $compra         = current($con->query("SELECT COUNT(id_compra) FROM compra")->fetch());
    $detalleCompra  = current($con->query("SELECT COUNT(id_detalle_compra) FROM detalle_compra")->fetch());
    $producto       = current($con->query("SELECT COUNT(id_producto) FROM producto")->fetch());

?>