<?php
    @include '../../modelo/configuracion.php';
    @include '../../modelo/conexion.php';
    error_reporting(0);

     
    //session_destroy();
    $db = new Database();
    $con = $db->Conexion();

    $productos = isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;
/*     print_r($_SESSION);*/    
    $lista_carrito = array();

    if($productos != null){
        foreach ($productos as $clave => $cantidad){
            $sql = $con->prepare("SELECT id_producto, nombre_producto, descripcion_producto, precio_producto, descuento, $cantidad as cantidad FROM producto WHERE id_producto=? AND activo=1");

            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }else{
        header("location: pago.php");
        exit;
    }

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
                            <li class="nav-item h5 ms-4"><a  class="nav-link" href="user_page.php">Inicio</a></li>
                            <li class="nav-item h5 ms-4"><a class="nav-link" href="SOBRE.php">Sobre Nosotros</a></li>
                            <li class="nav-item h5 ms-4"><a class="nav-link" href="SERVICIOS.php">Servicios</a></li>
                            <li class="nav-item h5 ms-4"><a class="nav-link" href="productos.php">Productos</a></li>
                        </ul>
                    </div>
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item h5 ms-5 ml-5"><a  class="nav-link" href="#">Bienvenido <?php echo $_SESSION['user_name'] ?></a></li>
                        <div class="dropdown show">
                            <i class="nav-link text-nowrap fa-regular fa-user fa-2xl dropdown-toggle mt-2 ms-3" data-toggle="dropdown" aria-haspopup="true" type="button" aria-expanded="false"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
                            </ul>
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

    <!-- -------------------------------------   CONTENEDORES productos   ------------------------------------ -->
    <main>
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h4>Detalles de pago</h4>
                    <div id="paypal-button-container"></div>
                </div>
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if($lista_carrito == null){
                                        echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                                    } else {
                                        
                                        $total = 0;
                                        foreach($lista_carrito as $producto){
                                            $_id = $producto['id_producto'];
                                            $nombre = $producto['nombre_producto'];
                                            $precio = $producto['precio_producto'];
                                            $descuento = $producto['descuento'];
                                            $cantidad = $producto['cantidad'];
                                            $precio_desc = $precio - (($precio * $descuento) / 100);
                                            $subtotal = $cantidad * $precio_desc;
                                            $total += $subtotal;
                                        ?>
                                            <tr>
                                                <td><?php echo $nombre; ?></td>
                                                <td>
                                                    <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2, '.', ','); ?></div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                            <tr>
                                                <td colspan="2">
                                                    <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                                                </td>
                                            </tr>

                                </tbody>
                                    <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6" id="paypal-button-container"></div>
            </div>
        </div>
    </main>

    <!-- ---------------------------------------------------------------------------------------------------->

    <!-- --------------------------------------   FOOTER   ----------------------------------------------- -->
    <footer class="bg-dark text-center text-white mt-5">
        <!-- Grid container -->
        <div class="container p-5">
        
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                <!--Grid column-->
                
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Horarios de Atención</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a  class="text-white text-decoration-none">Baños y estetica</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Clinica y veterinaria</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Hospedaje de mascota</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Tramite de viajes para mascotas</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Cremacion de mascotas</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Comidas premiun</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
            
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Enlaces de sitio</h5>
            
                        <ul class="list-unstyled mb-0">
                        <li>
                            <a href="../../index.html" class="text-white text-decoration-none">Inicio</a>
                        </li>
                        <li>
                            <a href="SOBRE.html" class="text-white text-decoration-none">Sobre Nosotros</a>
                        </li>
                        <li>
                            <a href="SERVICIOS.HTML" class="text-white text-decoration-none">Servicios</a>
                        </li>
                        </ul>
                    </div>
                    <!--Grid column-->
            
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Servicios</h5>
            
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a  class="text-white text-decoration-none">Baños y estetica</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Clinica y veterinaria</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Hospedaje de mascota</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Tramite de viajes para mascotas</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Cremacion de mascotas</a>
                            </li>
                            <li>
                                <a  class="text-white text-decoration-none">Comidas premiun</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
            
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Contacto</h5>
            
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white text-decoration-none"><i class="fa-solid fa-envelope"></i> sosvet@gmail.com</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white text-decoration-none"><i class="fa-solid fa-phone"></i> 254 7898 / 919 435 055</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white text-decoration-none"><i class="fa-solid fa-location-dot"></i> Av. Alameda Los Cedros Nº 185 - Of. 205 y 206 - Chorrillos</a>
                            </li>
                        </ul>
                    </div>
                <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-facebook-f fa-xl"></i
                ></a>
        
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-twitter fa-xl"></i
                ></a>
        
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-google fa-xl"></i
                ></a>
        
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-instagram fa-xl"></i
                ></a>
        
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-linkedin-in fa-xl"></i
                ></a>
        
                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-tiktok"></i
                ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
    
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white text-decoration-none">SOS Veterinaria - Todos los derechos reservados.</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- ---------------------------------------------------------------------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY;?>">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return   actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total; ?>
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                let url = '../../controlador/carrito/captura.php'
                actions.order.capture().then(function(detalles){
                    // window.location.href="completado.html";
                    console.log(detalles)

                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    }).then(function(response){
                        window.location.href = "../principal/completado.php?key=" +detalles['id'];  // $datos['detalles']['id']; ===> Pertenece al archivo captura
                    })
                });
            },

            onCancel: function(data){
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>