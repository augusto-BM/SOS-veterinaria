
<?php
   include "../../controlador/controlador_login/controlador_register_form.php"
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../imagenes/principal/logo.ico" type="image/x-icon">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link href="../css/incio.css" type="text/css" rel="stylesheet" />
   <link rel="stylesheet" href="../css/principal/registrar_usuario.css">
   <script src="https://kit.fontawesome.com/73c70fe811.js" crossorigin="anonymous"></script>
   <title>Crear Usuario</title>
</head>
<body>
<!-- --------------------------------------   BARRA DE NAVEGACION   ------------------------------------ -->
<section>
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
                        <li class="nav-item h5 ms-4"><a class="nav-link" href="../principal/productos.php">Productos</a></li>
                    
                    </ul>
                </div>
                <ul class="navbar-nav ms-3">
                    <div class="dropdown show">
                    <li class="nav-item">
                        <i class="nav-link text-nowrap fa-regular fa-user fa-2xl dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" type="button" aria-expanded="false"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="login_form.php">Inciar Sesión</a>
                            <li><a class="dropdown-item" href="register_form.php">Registrarse</a></li>
                        </ul>
                    </li>
                    </div>
                </ul>    
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link text-nowrap" href="../principal/checkout.php"><i class="fa-solid fa-cart-shopping fa-2xl"></i><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
                    </li>
                </ul>   
            </div>
        </nav>
    </div>
</section>

<div class="contenedor">
        
    <div class="form-container">
        <h3 class="titulo-Formulario">Crear Cuenta de Usuario</h3>
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            }else if($errorr){
                foreach($errorr as $errorr){
                    echo '<span class="error-msg">'.$errorr.'</span>';
                };
            };
        ?>

        <form action="" method="post" class="formulario" id="formulario">
             <!-- Grupo: Tipo de usuario -->
			 <div class="formulario__grupo 11" id="grupo__user_type">
				 <label for="user_type" class="label_select">Tipo de usuario</label>
				 <div class="formulario__grupo-input">
                    <select name="user_type" class="formulario__input" name="user_type" id="user_type">
                        <option value="user">user</option>	 
                        <option value="admin" disabled>admin</option> 
                    </select>
				 </div>
			 </div>
             <!-- Grupo: Genero -->
			 <div class="formulario__grupo 5" id="grupo__genero_cliente">
				 <label for="genero_cliente" class="label_select">Genero</label>
				 <div class="formulario__grupo-input">
                    <select name="genero_cliente" class="formulario__input" name="genero_cliente" id="genero_cliente">
                        <option value="masculino">masculino</option>
                        <option value="femenino">femenino</option>
                    </select>
				 </div>
			 </div>
			 <!-- Grupo: dni-cliente -->
			 <div class="formulario__grupo 2" id="grupo__dni_cliente">
				 <div class="formulario__grupo-input">
					 <input type="text" class="formulario__input" name="dni_cliente" id="dni_cliente" placeholder=" " value="<?php if(isset($dni_cliente)) echo $dni_cliente?>">
                     <label for="dni_cliente" class="formulario__label">DNI</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">El Dni tiene que ser de 7 a 9 dígitos.</p>
			 </div>
			 <!-- Grupo: Nombre -->
			 <div class="formulario__grupo 3" id="grupo__nombre_cliente">
				 <div class="formulario__grupo-input">
					 <input type="text" class="formulario__input" name="nombre_cliente" id="nombre_cliente" placeholder=" " value="<?php if(isset($nombre_cliente)) echo $nombre_cliente?>">
                     <label for="nombre_cliente" class="formulario__label">Nombre</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">El nombre tiene que ser de 3 a 40 dígitos y solo puede contener Letras, espacios y puede llevar acentos.</p>
			 </div>
			 <!-- Grupo: Apellido -->
			 <div class="formulario__grupo 4" id="grupo__apellido_cliente">
				 
				 <div class="formulario__grupo-input">
					 <input type="text" class="formulario__input" name="apellido_cliente" id="apellido_cliente" placeholder=" " value="<?php if(isset($apellido_cliente)) echo $apellido_cliente?>">
                     <label for="apellido_cliente" class="formulario__label">Apellido</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">El apellido tiene que ser de 3 a 50 dígitos y solo puede contener Letras, espacios y puede llevar acentos.</p>
			 </div>
			 
			 <!-- Grupo: Direccion -->
			 <div class="formulario__grupo 6" id="grupo__direccion_cliente">
				 <div class="formulario__grupo-input">
					 <input type="text" class="formulario__input" name="direccion_cliente" id="direccion_cliente" placeholder=" " value="<?php if(isset($direccion_cliente)) echo $direccion_cliente?>">
                     <label for="direccion_cliente" class="formulario__label">Direccion</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">La direccion es incorrecta</p>
			 </div>
			 <!-- Grupo: Teléfono -->
			 <div class="formulario__grupo 7" id="grupo__telefono_cliente">
				 <div class="formulario__grupo-input">
					 <input type="text" class="formulario__input" name="telefono_cliente" id="telefono_cliente" placeholder=" " value="<?php if(isset($telefono_cliente)) echo $telefono_cliente?>">
                     <label for="telefono_cliente" class="formulario__label">Teléfono</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">El telefono solo puede contener numeros y son de 7 a 14 dígitos.</p>
			 </div>
			 <!-- Grupo: Correo Electronico -->
			 <div class="formulario__grupo 8" id="grupo__correo">
				 <div class="formulario__grupo-input">
					 <input type="text" class="formulario__input" name="email" id="correo" placeholder=" " value="<?php if(isset($email)) echo $email?>">
                     <label for="email" class="formulario__label">Correo Electrónico</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo. <b><i>ejemplo@correo.com</i></b></p>
			 </div>
			 <!-- Grupo: Contraseña -->
			 <div class="formulario__grupo 9" id="grupo__password">
				 <div class="formulario__grupo-input">
					 <input type="password" class="formulario__input" name="password" id="password" placeholder=" ">
                     <label for="password" class="formulario__label">Contraseña</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">La contraseña tiene que ser de 3 a 12 dígitos.</p>
			 </div>
			 <!-- Grupo: Contraseña 2 -->
			 <div class="formulario__grupo 10" id="grupo__password2">
				 <div class="formulario__grupo-input">
					 <input type="password" class="formulario__input" name="cpassword" id="cpassword" placeholder=" ">
                     <label for="cpassword" class="formulario__label">Repetir Contraseña</label>
					 <i class="formulario__validacion-estado fas fa-times-circle"></i>
				 </div>
				 <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			 </div>
			 
			 <!-- <div class="formulario__grupo" id="grupo__"></div> -->
			 <!-- Grupo: Terminos y Condiciones -->
			 <!-- <div class="formulario__grupo grupo__terminos 12" id="grupo__terminos">
				 <label class="formulario__label">
					 <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					 <span class="terminos">Acepto los Terminos y Condiciones </span>
				 </label>
			 </div> -->
			 <div class="formulario__mensaje" id="formulario__mensaje">
				 <p><i class="fas fa-exclamation-triangle"></i> <!-- <b>Error:</b> --> Rellena todo el formulario correctamente.</p>
			 </div>
	 
			 <div class="formulario__grupo formulario__grupo-btn-enviar 13">
				<button type="submit" class="formulario__btn" name="submit" id="enviar" >Crear Cuenta</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
	 
	         <!-- <input type="submit" name="submit" value="Crear cuenta" class="form-btn"> -->
			 
		</form>
        <div class="tienes-cuenta">
            <p>Ya tienes una cuenta? <a href="login_form.php">Inicia Sesion</a></p>
        </div>
    </div>
</div>
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
                            <a href="./../../index.html" class="text-white text-decoration-none">Inicio</a>
                        </li>
                        <li>
                            <a href="../principal/SOBRE.html" class="text-white text-decoration-none">Sobre Nosotros</a>
                        </li>
                        <li>
                            <a href="../principal/SERVICIOS.HTML" class="text-white text-decoration-none">Servicios</a>
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
<script src="../js/validar_formulario_registrar_user.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="../js/animacionLogin.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>