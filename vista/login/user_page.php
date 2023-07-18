<?php

@include '../../modelo/config.php';
@include '../../modelo/configuracion.php'; 

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../imagenes/principal/logo.ico" type="image/x-icon">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <link rel="stylesheet" href="../css/login.css">
   <script src="https://kit.fontawesome.com/73c70fe811.js" crossorigin="anonymous"></script>
   <title>Veterinaria</title>
</head>
<body>
    <header>
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
    </header>
   
<section id="hero">
    <div id="slider">
        <figure>
            <img src="../imagenes/gato.PNG">
            <img src="../imagenes/comida.PNG">
            <img src="../imagenes/perro.PNG">
            
        </figure>
    </div>
</section>
<section id="principal">
    <section id="nuestro">
        <div class="titutlo-a"><h5>Veterinaria SOS<br><i>A tu servicio, siempre</i></h5></div>
    <section id="NuestrosProductos">
        <div class="gallery-container">
        <div class="gallery-item">
        <img alt="" src="https://cdn.shopify.com/s/files/1/0044/2289/3697/files/sos3_78b7bf40-434a-4ad9-9fb8-7f539ef040aa.png?v=1592539550">
        <img alt="" src="https://cdn.shopify.com/s/files/1/0044/2289/3697/files/sos2_3bedbfe7-4653-4799-a3bb-2b0b9fbbde64.png?v=1592539638">
        <img alt="" src="https://cdn.shopify.com/s/files/1/0044/2289/3697/files/sos1_6b2a2802-1709-4e31-be62-181d8c344667.png?v=1592539668">
        </div>
        </div>
    </section>
    <section id="Nuestros-Productos">
        <div class="titutlo-a"><h5>Nuestros Productos<br><i>Para consentir a tus mascotas</i></h5></div>
        <div class="container">
            <div class="row row row-cols-6 mb-5">
                <div class="col-4">
                    <img src="https://cdn.shopify.com/s/files/1/0044/2289/3697/products/SOSWEB0000411_360x.png?v=1615227363" class="mt-5 d-block w-100 img-prod">
                    <br>
                    <p><b>LO MÁS BUSCADO</b></p>
                    <p class="parrafo-p">Poseemos una amplia variedad variedad de productos.</p>
                </div>
                <div class="col-4">
                    <img src="https://cdn.shopify.com/s/files/1/0044/2289/3697/products/SOSWEB0000426_360x.png?v=1615227386" class="mt-5 d-block w-100 img-prod">
                    <br>
                    <p><b>LO MÁS VENDIDO</b></p>
                    <p class="parrafo-p">Traemos lo más pedido por nuestros clientes.</p>
                </div>
                <div class="col-4">
                    <img src="https://cdn.shopify.com/s/files/1/0044/2289/3697/products/SOSWEB0000279_77991d1e-36a9-4480-9a28-19bb39c14d9f_360x.png?v=1630772505" class=" mt-5 d-block w-100 img-prod">
                    <br>
                    <p><b>LA MEJOR CALIDAD</b></p>
                    <P class="parrafo-p">Siempre asegurando el mejor rendimiento para su mascota.</P>
                </div>
        </div>
    </section>
    <section id="Blog">
        <div class="titutlo-a mb-5"><h5>Preguntas Frecuentes<br><i></i></h5></div>
        <div class=container>
            <a class="text-decoration-none text-black">¿Cómo cuidar a nuestras mascotas en cuarentena?</a>
            <br>
            <h6 class="mt-2 mb-3">Ahora que debemos estar	en casa, podemos disfrutar de la compañia de nuestra mascota, mas que nunca y seguro que nuestro cachorro o minino estaran encantados de tenernos tanto tiempo en casa, o tal vez no</h6>
            <a href="https://www.sosveterinaria.com/blogs/noticias/como-cuidar-a-nuestra-mascota-en-cuarentena">
                <button class="mb-4">Leer más</button>
            </a>
            <img class="responsive" src="https://img.freepik.com/psd-gratis/retrato-grupo-adorables-cachorros_53876-73962.jpg">
            <br>
        </div>
    </section>
    <!-- --------------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------   FOOTER   ------------------------------------ -->
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
                        <a class="text-white text-decoration-none">Lunes a Sábados</a>
                    </li>
                    <li>
                        <a class="text-white text-decoration-none">08:00 - 14:00 hrs</a>
                    </li>
                    <li>
                        <font style="font-size:0px"><a display="none" href="#!" class="text-white">aa</a></font>
                    </li>
                    <li>
                        <a class="text-white text-decoration-none">Domingos</a>
                    </li>
                    <li>
                        <a class="text-white text-decoration-none">09:00 - 20:00 hrs</a>
                    </li>
                    </ul>
                </div>
                <!--Grid column-->
        
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Enlaces de sitio</h5>
        
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="user_page.php" class="text-white text-decoration-none">Inicio</a>
                    </li>
                    <li>
                        <a href="SOBRE.php" class="text-white text-decoration-none">Sobre Nosotros</a>
                    </li>
                    <li>
                        <a href="SERVICIOS.php" class="text-white text-decoration-none">Servicios</a>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="../js/animacionPrincipal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>