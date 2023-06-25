<?php

    @include '../../modelo/configuracion.php';
    @include '../../modelo/conexion.php';

    $db = new Database();
    $con = $db->Conexion();
    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);
    
    echo '<pre>';
    print_r($datos);    
    echo '</pre>';


    if(is_array($datos)){

        $id_cliente = $_SESSION['id_login'];
        $id_transaccion = $datos['detalles']['id'];
        $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
        $status = $datos['detalles']['status'];
        $fecha = $datos['detalles']['update_time'];
        $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
        $email = $datos['detalles']['payer']['email_address'];
        $id_cliente_paypal = $datos['detalles']['payer']['payer_id'];

        $sql = $con->prepare("INSERT INTO compra (id_transaccion, id_cliente, fecha_compra, status, email, id_cliente_paypal, total) VALUES (?,?,?,?,?,?,?)");
        $sql->execute([$id_transaccion, $id_cliente, $fecha_nueva, $status, $email, $id_cliente_paypal, $total]);
        $id = $con->lastInsertId();

        if($id > 0){
            $productos = isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;

            if($productos != null){
                foreach ($productos as $clave => $cantidad){
                    $sql = $con->prepare("SELECT id_producto, nombre_producto, descripcion_producto, precio_producto, descuento FROM producto WHERE id_producto=? AND activo=1");
        
                    $sql->execute([$clave]);
                    $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

                    $precio = $row_prod['precio_producto'];
                    $descuento = $row_prod['descuento'];
                    $precio_desc = $precio - (($precio * $descuento) / 100);

                    $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES (?,?,?,?,?)");
                    $sql_insert->execute([$id, $clave, $row_prod['nombre_producto'], $precio_desc, $cantidad]);
                }
                /* include 'enviar_email.php'; */
            }
            unset($_SESSION['carrito']);
        }
    }
?>