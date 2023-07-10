<!DOCTYPE html>
<html lang="es">
										<!-- BARRA DE NAV EMPIEZA EN LA FILA 			pag 169-->
										<!-- Recuperar nombre del admninitrador 		pag 338-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/73c70fe811.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../../imagenes/principal/logo.ico" type="image/x-icon">
    <title>Administrador SOS</title>   

    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    
    <link
    
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css?sas" rel="stylesheet">
    <link href="css/reloj.css" rel="sytlesheet">

</head>

        <body id="page-top">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-fade fa-solid fa-shield-dog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SOS veterinaria<sup> Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <sub class="nav-link active" style="color: whitesmoke;">Nosotros</sub>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_clinica.php">
                <i class="fa-solid fa-hospital"></i>
                    <span>Clinica</span></a>
            </li>
            <!-- Nav Item - Dashboard  SE TIENE QUE CAMBIAR LA RUTA EN LOS HREF POR LOS ARCHIVOS DENTRO DEL FICHERO dashboard-->
            <li class="nav-item">
                <a class="nav-link" href="tabla_admin.php"><!--Al igual que tabla_admin.php hay que corregir-->
                    <i class="fa-solid fa-key"></i>
                    <span>Administrador</span>
                </a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_veterinario.php"><!--Corregir por tabla_veterinario.php-->
                <i class="fa-solid fa-user-doctor"></i>
                    <span>Veterinario</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabla_turno.php"><!--aquí también-->
                <i class="fa-solid fa-clock"></i>
                <span>Horario</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <sub class="nav-link active" style="color: whitesmoke;">Cita</sub>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_cliente.php">
                <i class="fa-sharp fa-solid fa-user"></i>
                    <span>Cliente</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_reserva.php">
                <i class="fa-solid fa-handshake"></i>
                    <span>Reserva</span></a>    
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_mascota.php">
                <i class="fa-solid fa-key"></i>
                    <span>Mascota</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <sub class="nav-link active" style="color: whitesmoke;">Carrito</sub>
            </li>
             <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_producto.php"><!--aquí también-->
                <i class="fa-sharp fa-solid fa-cookie"></i>
                <span>Productos</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_compra.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Compra</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_detallecompra.php">
                <i class="fa-sharp fa-solid fa-window-restore"></i>
                <span>Detalle de Compra</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">   
            <li class="nav-item active">
            <sub class="nav-link active" style="color: whitesmoke;">Otros</sub>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_historial.php">
                <i class="fa-regular fa-file-medical"></i>
                <span>Historial</span></a>
            </li>
            
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tabla_servicio.php">
                <i class="fa-solid fa-lock"></i>
                    <span>Servicio</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Config. del sistema</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.html">Opciones</a>
                        <a class="collapse-item" href="cards.html">Acerca de</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
    
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../../js/animacionDashboard.js"></script>  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>