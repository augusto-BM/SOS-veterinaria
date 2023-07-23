<?php

class Database{
    function Conexion(){
        $server="localhost";
        $user= "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$server;dbname=veterinaria", $user, $password);
            
        }catch (PDOException $e) {
            echo ':( Error al conectar en la bd';
            echo 'Error conexion' . $e->getMessage();
             exit;
        }
        return $conn;
    }
}

//Se crea la función Conexión que permitirá realizar la conexión a la BD.
//PDO: Es una extensión de php para poder acceder a BD (PHP DATA OBJECTS) 
    
?>