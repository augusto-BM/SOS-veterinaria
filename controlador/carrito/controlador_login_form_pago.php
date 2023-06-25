<?php

@include '../../modelo/config.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM cliente WHERE email = '$email' && password = '$pass' ";
   $correo_cliente = " SELECT * FROM cliente WHERE email = '$email'";
   $contra_cliente = " SELECT * FROM cliente WHERE password = '$pass' ";


   $result = mysqli_query($conn, $select);
   $result_correo_cliente = mysqli_query($conn, $correo_cliente);
   $result_contra_cliente  = mysqli_query($conn, $contra_cliente);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      echo $row['id_cliente'];
      var_dump($row);

      if($row['user_type'] == 'user'){
         
         $_SESSION['user_name'] = $row['nombre_cliente'];
         $_SESSION['id_login'] = $row['id_cliente'];
         echo "<script> alert('Login exitoso')</script>";
         header('location:../login/pago.php');

      }
   }else{
      if((trim($_POST['email']) === '') and (trim($_POST['password']) === '')){
         $error[] = 'No puede haber campos vacios!';
      }else if(trim($_POST['email']) === ''){
         $error[] = 'email no puede estar vacio!';
      }else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST['email'])){
         $error[] = 'Ha introducido un email no valido!';
      }else if ((!mysqli_num_rows($result_correo_cliente) > 0)){
         $error[] = 'email no existente!';
      }else if(trim($_POST['password']) === ''){
         $error[] = 'Contraseña no puede estar vacio!';
      }else if (!preg_match("/^.{3,15}$/", $_POST['password'])){
         $error[] = 'Contraseña no valido!';
      }else if((!mysqli_num_rows($result_contra_cliente) > 0)){
         $error[] = 'contraseña equivocada!';
       }
   }

};
?>