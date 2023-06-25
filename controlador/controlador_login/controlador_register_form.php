<?php

@include '../../modelo/config.php';
error_reporting(0);

if(isset($_POST['submit'])){
   $dni_cliente = mysqli_real_escape_string($conn, $_POST['dni_cliente']);
   $nombre_cliente = mysqli_real_escape_string($conn, $_POST['nombre_cliente']);
   $apellido_cliente = mysqli_real_escape_string($conn, $_POST['apellido_cliente']);
   $genero_cliente = mysqli_real_escape_string($conn, $_POST['genero_cliente']);
   $direccion_cliente = mysqli_real_escape_string($conn, $_POST['direccion_cliente']);
   $telefono_cliente = mysqli_real_escape_string($conn, $_POST['telefono_cliente']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM cliente WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Usuario ya exixte!';

   }else{

      if($pass != $cpass){
         $error[] = 'La contraseña no coincide!';
      }else if (!preg_match("/^[\d]{1,3}\.?[\d]{3,3}\.?[\d]{3,3}$/", $_POST['dni_cliente'])){
         $error[] = 'El Dni tiene que ser de 7 a 9 dígitos numericos!';

       }else if (!preg_match("/^[a-zA-ZÀ-ÿ\s]{3,40}$/", $_POST['nombre_cliente'])){
         $error[] = 'El nombre debe ser de 3 a 40 caracteres!';

       }else if (!preg_match("/^[a-zA-ZÀ-ÿ\s]{3,40}$/", $_POST['apellido_cliente'])){
         $error[] = 'El apellido debe ser de 3 a 40 caracteres!';

       }else if (!preg_match("/^[a-zA-Z0-9\ \-\_]{4,16}$/", $_POST['direccion_cliente'])){
         $error[] = 'Ha introducido una direccion no valida!';

       }else if (!preg_match("/^\d{7,14}$/", $_POST['telefono_cliente'])){
         $error[] = 'El telefono debe ser de 3 a 40 dígitos!';

       }else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST['email'])){
         $error[] = 'Ha introducido un correo no valido!';

       }else if (!preg_match("/^.{3,12}$/", $_POST['password'])){
         $error[] = 'La contraseña de ser de 3 a 12 digitos!';
       }else{
         $insert = "INSERT INTO cliente(dni_cliente, nombre_cliente, apellido_cliente, genero_cliente, direccion_cliente, telefono_cliente, email, password, user_type) VALUES('$dni_cliente','$nombre_cliente','$apellido_cliente','$genero_cliente','$direccion_cliente','$telefono_cliente','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         echo "<script> alert('Registro exitoso')</script>";
         header('location:login_form.php');
      }
   }

};


?>