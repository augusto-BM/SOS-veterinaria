<?php
    @include '../../modelo/configuracion.php';
    @include '../../modelo/config.php';

   if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c174601175.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Asap:wght@800&family=Lobster&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');
    </style>
    <link href="../css/principal/servicios.css" type="text/css" rel="stylesheet"/>
    
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

    <!-- -------------------------------------   CONTENEDORES GRID   ------------------------------------ -->
    <div class="titutlo-a"><h5 ">SERVICIOS<br><i>Mejores cuidados, mejores mascotas</i></h1></div>
    <div class="d-grid gap-2 col-12 mx-auto text-center btn-cita">
        <form action="cita.php">
            <button class="btn btn-lg btn-info" type="submit" >GENERAR CITA</button>
        </form>
    </div>
    <div class="container">
        <div class="puede-contactarnos">
            <h6 class=""><b>TAMBIEN PUEDES CONTACTARNOS:</b></h6>
            <p class="titutlo-p">
                Para citas de baño y estética, puedes escribirnos a whastapp al 977687815.<br>Paracitas de clínica y hospitalización puedes llamar al 4228024 o 2228967
            </p>
        </div>

        <div class="row row row-cols-6">
            <div class="col-4">
                <img src="../imagenes/principal/bañoEstetica.png" class="d-block w-100 img-prod izquierda">
                <br>
                <p><b class="titu">BAÑOS Y ESTETICA</b></p>
                <p class="parrafo-p">Baños normal y medicado.<br>Amplia variedad de cortes de pelo, segun la raza y/o gusto del cliente.<br>Limpieza de oidos, cortes de uñas, cepillado y perfumado.<br>Limpieza de gladulas perinales.<br>Lavado de clientes.<br>Servicio de recojo y entrega a domicilio.</p>
            </div>
            <div class="col-4">
                <img src="../imagenes/principal/clinicaVeterinaria.png" class="d-block w-100 img-prod medio">
                <br>
                <p><b class="titu">CLINICA VETERINARIA</b></p>
                <p class="parrafo-p">Atencion de emergencias las 24 horas, domingos y feriados.<br>Laboratorio clinico.<br>Radiografias, ecografias, resonancia magneetica.<br>Endoscopia, nebulizacion.<br>Cirujias, cirujias laparoscopica.<br>Oncologia, dermatologia, traumatologia, cardiologia, etc.<br>Cuidados post operatorios, hospitalizacion.</p>
            </div>
            <div class="col-4">
                <img src="../imagenes/principal/hospedaje.png" class="d-block w-100 img-prod derecha">
                <br>
                <p><b class="titu">HOSPEDAJE DE MASCOTA</b></p>
                <P class="parrafo-p">Amplias instalaciones.<br>Espacio de juegos y esparcimiento.<br>Ubicado en Lurin, rodeado de tranquilidad y relax.<br>Cuidado las 24 horas.<br>Servicio de recojo y entrega a domicilio.</P>
            </div>
        </div>
        <div class="row row row-cols-6">
            <div class="col-4">
                <img src="../imagenes/principal/viajesMascota.png" class="d-block w-100 img-prod izquierda">
                <br>
                <p><b class="titu">TRAMITE DE VIAJES PARA MASCOTAS</b></p>
                <P class="parrafo-p">Certificacion de vacunacion.<br>Implantacion de microchip.<br>Analisis test serologico antirrabico.<br>Documentos sanitarios de exportacion.<br>Venta de jaulas para viaje.</P>
            </div>
            <div class="col-4">
                <img src="../imagenes/principal/cremacion.png" class="d-block w-100 img-prod medio">
                <br>
                <p><b class="titu">CREMACION DE MASCOTAS</b></p>
                <P class="parrafo-p">Presencia virtual.<br>Servicio sin presencia.<br>Ventas de urnas.<br>Certificado de cremacion.<br>Servicio de recojo y entrega a domicilio.</P>
            </div>
            <div class="col-4">
                <img src="../imagenes/principal/comidas.png" class="d-block w-100 img-prod derecha">
                <br>
                <p><b class="titu">COMIDAS PREMIUN</b></p>
                <P class="parrafo-p">Pro Plan, BRIT, Nutram, Hills, Virbac,<br>Nutranuggets, Vet Life, Taste of the<br>Wild, etc.</P>

            </div>
        </div>
    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../js/animacionServicios.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>