<?php
$conexion = mysqli_connect("localhost","root","michimiau12","veterinaria");

session_start();

        if($resultado){
            echo "<script> alert('Se ha enviado su informe'); window.location='../../vista/login/SERVICIOS.php' </script>";
        }else{
        printf("Errormessage: %s\n" , mysqli_error($conexion));
        }

?>
