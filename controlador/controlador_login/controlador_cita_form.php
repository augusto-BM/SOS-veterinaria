<?php
$conexion = mysqli_connect("localhost","root","","veterinaria");

session_start();

$id_cliente = $_POST["id_cliente"];
$tipo_reserva = $_POST["tipo_reserva"];
$fecha_reserva = $_POST["fecha_reserva"];
$hora_reserva = $_POST["hora_reserva"];
$modalidad_reserva = $_POST["modalidad_reserva"];
$comentarios = $_POST["comentarios"];

$query = "SELECT MAX(id_reserva)+1 AS id_reserva FROM reserva";
$result = mysqli_query($conexion, $query);

if($_FILES["archivo"]) {
    $nombre_base = basename($_FILES["archivo"]["name"]);
    $nombre_final = date("m-d-y") . "-" . date("H-i-s"). "-" . $nombre_base;
    $ruta = "archivo/" . $nombre_final;
    
    $row = mysqli_fetch_array($result);
    echo $row['id_reserva'];
    //$subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
    //if($subirarchivo){ EL IF ME OBLIGA A QUE SI O SI SE SUBA EL ARCHIVO PARA GUARDAR LA INFO EN LA BD
        $insertarSQL = "INSERT INTO reserva(id_cliente,fecha_reserva,hora_reserva, tipo_reserva, modalidad_reserva,comentarios) 
        VALUES ('$id_cliente','$fecha_reserva','$hora_reserva','$tipo_reserva','$modalidad_reserva','$comentarios')";
        $resultado = mysqli_query($conexion,$insertarSQL);
        if($resultado){
            $_SESSION['id_cita'] = $row['id_reserva'];
            echo "<script> window.location='../../vista/login/mascota.php' </script>";
        }else{
        printf("Errormessage: %s\n" , mysqli_error($conexion));
        }
    }
//}else{
    echo"Error al subir archivo";
//}
?>
