<?php
    @include '../../modelo/configuracion.php';
    @include '../../modelo/conexion.php';
    error_reporting(0);
    //session_destroy();

    $db = new Database();
    $con = $db->Conexion();

    $id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

    $error = '';
    if($id_transaccion == ''){
        $error = 'Error al procesar la peticion';
    }else{
        $sql = $con->prepare("SELECT count(id_compra) FROM compra WHERE id_transaccion=? AND status=?");
            $sql->execute([$id_transaccion, 'COMPLETED']);

            if($sql->fetchColumn() > 0){

                $sql = $con->prepare("SELECT id_compra, id_cliente, fecha_compra, email, total FROM compra WHERE id_transaccion=? AND status=? LIMIT 1");
                $sql->execute([$id_transaccion, 'COMPLETED']);
                $row = $sql->fetch(PDO::FETCH_ASSOC);

                $idCompra = $row['id_compra'];
                $id_cliente = $row['id_cliente'];
                $total = $row['total'];
                $fecha = $row['fecha_compra'];

                $sqlDet = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
                $sqlDet->execute([$idCompra]);
            }else{
                $error = 'Error al comprobar la compra';
            }
    }
    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Servicios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="../imagenes/principal/logo.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c174601175.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Asap:wght@800&family=Lobster&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');
    </style>
    <link href="../css/principal/servicios.css" type="text/css" rel="stylesheet"/>
    <link href="../css/principal/productos.css" type="text/css" rel="stylesheet"/>

    
</head>

<body>

    <!-- --------------------------------------   BARRA DE NAVEGACION   ------------------------------------ -->
        <div class="sticky-top">
            <nav class="navbar navbar-expand-lg bg-danger navbar-dark border-5 border-bottom border-primary">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand ms-3"><img class="img-logo" src="../imagenes/logo.PNG" width="100"></a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="MenuNavegacion" class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-3">
                            <li class="nav-item h5 ms-4"><a  class="nav-link" href="../../index.html">Inicio</a></li>
                            <li class="nav-item h5 ms-4"><a class="nav-link" href="../principal/SOBRE.html">Sobre Nosotros</a></li>
                            <li class="nav-item h5 ms-4"><a class="nav-link" href="../principal/SERVICIOS.HTML">Servicios</a></li>
                            <li class="nav-item h5 ms-4"><a class="nav-link" href="productos.php">Productos</a></li>

                        
                        </ul>
                    </div>
                    <ul class="navbar-nav ms-3">
                        <div class="dropdown show">
                        <li class="nav-item">
                            <i class="nav-link text-nowrap fa-regular fa-user fa-2xl dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" type="button" aria-expanded="false"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="../login/login_form.php">Inciar Sesión</a>
                                <li><a class="dropdown-item" href="../login/register_form.php">Registrarse</a></li>
                            </ul>
                        </li>
                        </div>
                    </ul>    
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-nowrap" href="checkout.php"><i class="fa-solid fa-cart-shopping fa-2xl"></i><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
                        </li>
                    </ul>   
                </div>
            </nav>
        </div>   
    <!-- --------------------------------------------------------------------------------------------------- -->
    <main>
        <div class="container">

        <?php if(strlen($error) > 0){ ?>

            <div class="row">
                <div class="col">
                    <h3><?php echo $error; ?></h3>
                </div>
            </div>

            <?php } else { ?>
            
                <div class="row">
                    <div class="col">
                        <b>Folio de la compra: &#160;</b><?php echo $id_transaccion; ?><br>
                        <b>Fecha de compra &nbsp;&nbsp;: &#160;</b><?php echo $fecha; ?><br>
                        <b>Id del cliente &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;: &#160;</b><?php echo $id_cliente; ?><br>
                        <b>Total &nbsp;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;: &nbsp;</b><?php echo MONEDA . number_format($total, 2, '.', ','); ?><br>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px; font-size: 14px; border-radius: 10px;" >
                    <div class="col">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php while($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)){ 
                                    
                                    $importe = $row_det['precio'] * $row_det['cantidad']; ?>
                                    <tr>
                                        <td><?php echo $row_det['cantidad']; ?></td>
                                        <td><?php echo $row_det['nombre']; ?></td>
                                        <td><?php echo $importe; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto" style="width: 200px;">
        <a class="btn btn-dark btn-lg " href="../../controlador/carrito/salir_completado.php" role="button">SALIR</a>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
