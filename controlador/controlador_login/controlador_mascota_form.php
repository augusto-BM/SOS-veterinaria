<?php
$conexion = mysqli_connect("localhost","root","","veterinaria");

session_start();

$id_reserva = $_POST["id_reserva"];
$tipo_mascota = $_POST["tipo_mascota"];
$nombre_mascota = $_POST["nombre_mascota"];
$edad_mascota = $_POST["edad_mascota"];
$raza_mascota = $_POST["raza_mascota"];


if($_FILES["archivo"]) {
    $nombre_base = basename($_FILES["archivo"]["name"]);
    $nombre_final = date("m-d-y") . "-" . date("H-i-s"). "-" . $nombre_base;
    $ruta = "archivo/" . $nombre_final;

    //$subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
    //if($subirarchivo){ EL IF ME OBLIGA A QUE SI O SI SE SUBA EL ARCHIVO PARA GUARDAR LA INFO EN LA BD

        $insertarSQL = "INSERT INTO mascota(id_reserva,tipo_mascota,nombre_mascota,edad_mascota,raza_mascota) 
        VALUES ('$id_reserva','$tipo_mascota','$nombre_mascota','$edad_mascota','$raza_mascota')";

        $resultado = mysqli_query($conexion,$insertarSQL);

        if($resultado){
            echo "<script> alert('Se ha enviado su cita'); window.location='../../vista/login/resumen.html' </script>";
        }else{
        printf("Errormessage: %s\n" , mysqli_error($conexion));
        }
    }
//}else{
    echo"Error al subir archivo";
//}
?>
