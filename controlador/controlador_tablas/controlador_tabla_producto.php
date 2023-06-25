<?php
    @include '../../modelo/config.php';

    $id_producto = (isset($_POST['id_producto']))?$_POST['id_producto']:"";
    $nombre_producto = (isset($_POST['nombre_producto']))?$_POST['nombre_producto']:"";
    $descripcion_producto = (isset($_POST['descripcion_producto']))?$_POST['descripcion_producto']:"";
    $precio_producto = (isset($_POST['precio_producto']))?$_POST['precio_producto']:"";
    $descuento = (isset($_POST['descuento']))?$_POST['descuento']:"";
    $id_categoria = (isset($_POST['id_categoria']))?$_POST['id_categoria']:"";
    $activo = (isset($_POST['activo']))?$_POST['activo']:"";

    $accionAgregar="";
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    $accion= (isset($_POST['accion']))?$_POST['accion']:"";
    switch($accion){
        case "btnAgregar":
                $select = "SELECT * FROM producto WHERE nombre_producto = '$nombre_producto'";
                $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result) > 0){
                    echo "<script> alert('¡Cuenta existente!')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_producto.php');
                }else{
                    
                    $insert = "INSERT INTO producto(nombre_producto, descripcion_producto, precio_producto, descuento, id_categoria, activo) VALUES('$nombre_producto', '$descripcion_producto', '$precio_producto', '$descuento', '$id_categoria', '$activo')";
                    mysqli_query($conn, $insert);

                    echo "<script> alert('Registro exitoso')</script>";
                    header('location: ../../vista/adm/dashboard/tabla_producto.php');
                }
            break;
            case "btnModificar":
                //falta implementar más...

                $update = "UPDATE producto SET nombre_producto='$nombre_producto', descripcion_producto='$descripcion_producto', precio_producto='$precio_producto', descuento='$descuento', id_categoria='$id_categoria', activo='$activo' WHERE id_producto='$id_producto'";
                mysqli_query($conn, $update);

                echo "<script> alert('Seleccionó el botón Modificar')</script>";
                header('location: ../../vista/adm/dashboard/tabla_producto.php');
            break;
        case "btnEliminar":
                //Listo.
                $delete = "DELETE FROM producto WHERE id_producto = '$id_producto'";
                mysqli_query($conn,$delete);
                header('location: ../../vista/adm/dashboard/tabla_producto.php');
            break;
        case "btnCancelar":
            header('location: ../../vista/adm/dashboard/tabla_producto.php');
            break;

        case "Seleccionar":
            $pass="disabled";
            $accionAgregar="disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal= true;
            break;
    }
?>