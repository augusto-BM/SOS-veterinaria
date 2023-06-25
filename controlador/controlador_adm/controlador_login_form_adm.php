<?php

@include '../../modelo/config.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){

   $emailAdm = mysqli_real_escape_string($conn, $_POST['email']);
   $passAdm = md5($_POST['password']);
   $cpassAdm = md5($_POST['cpassword']);
   $user_typeAdm = $_POST['user_type'];

   $select = " SELECT * FROM administrador WHERE email = '$emailAdm' && password = '$passAdm' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['nombre_adm'];
         echo "<script> alert('Login exitoso')</script>";
         header('location:../adm/dashboard/dashboard.php');

      }elseif($row['user_type'] == 'user'){
         
         $_SESSION['user_name'] = $row['nombre_cliente'];
         echo "<script> alert('Login exitoso')</script>";
         header('location:user_page.php');

      }
   }else{
      if(trim($_POST['email']) === ''){
         $errorr[] = 'email no puede estar vacio!';
      }else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST['email'])){
         $errorr[] = 'Ha introducido un email no valido!';
      }else if(trim($_POST['password']) === ''){
         $errorr[] = 'Contraseña no puede estar vacio!';
       }else{
         $errorr[] = 'Correo o contraseña equivocada!';
       }
   }
};
?>