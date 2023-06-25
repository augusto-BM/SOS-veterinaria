<?php

    @include '../../modelo/configuracion.php';
    @include '../../modelo/conexion.php';
    if(isset($_POST['action'])){

        $action = $_POST['action'];
        $id = isset($_POST['id_producto']) ? $_POST['id_producto'] : 0;

        if($action == 'agregar'){
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
            $respuesta = agregar($id, $cantidad);

            if($respuesta > 0){
                $datos['ok'] = true;
            }else{
                $datos['ok'] = false;
            }

            $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
        }else if($action = 'eliminar'){
            $datos['ok'] = eliminar($id);
        }else{
            $datos['ok'] = false;
        }
    }else{
            $datos['ok'] = false;
    }

    echo json_encode($datos);

    function agregar($id, $cantidad){

        $res = 0;
        if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
            if(isset($_SESSION['carrito']['producto'][$id])){
                $_SESSION['carrito']['producto'][$id] = $cantidad;

                $db = new Database();
                $con = $db->Conexion();

                $sql = $con->prepare("SELECT precio_producto, descuento FROM producto WHERE id_producto=? AND activo=1 LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $precio = $row['precio_producto'];
                $descuento = $row['descuento'];
                $precio_desc = $precio - (($precio * $descuento) / 100);
                $res = $cantidad * $precio_desc;    

                return $res;
            }
        }else{
            return $res;
        }
    }

    function eliminar($id){
        if($id > 0){
            if (isset($_SESSION['carrito']['producto'][$id])){
                unset($_SESSION['carrito']['producto'][$id]);
                return true;
            }
        }else{
            return false;
        }
    }

?>