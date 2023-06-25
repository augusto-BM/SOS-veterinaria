<?php

@include '../../modelo/config.php';
error_reporting(0);

if(isset($_POST['submit'])){

    $id_clinica = $_POST['id_clinica'];
    $dni_adm = mysqli_real_escape_string($conn, $_POST['dni_adm']);
    $nombre_adm = mysqli_real_escape_string($conn, $_POST['nombre_adm']);
    $apellido_adm = mysqli_real_escape_string($conn, $_POST['apellido_adm']);
    $genero_adm = mysqli_real_escape_string($conn, $_POST['genero_adm']);
    $direccion_adm = mysqli_real_escape_string($conn, $_POST['direccion_adm']);
    $telefono_adm = mysqli_real_escape_string($conn, $_POST['telefono_adm']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM administrador WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'Usuario ya existe!';
 
    }else{
 
       if($pass != $cpass){
          $error[] = 'La contraseña no coincide!';
       }else if (!preg_match("/^[\d]{1,3}\.?[\d]{3,3}\.?[\d]{3,3}$/", $_POST['dni_adm'])){
         $error[] = 'El Dni tiene que ser de 7 a 9 dígitos!';

       }else if (!preg_match("/^[a-zA-ZÀ-ÿ\s]{3,40}$/", $_POST['nombre_adm'])){
         $error[] = 'El nombre debe ser de 3 a 40 caracteres!';

       }else if (!preg_match("/^[a-zA-ZÀ-ÿ\s]{3,40}$/", $_POST['apellido_adm'])){
         $error[] = 'El apellido debe ser de 3 a 40 caracteres!';

       }else if (!preg_match("/^[a-zA-Z0-9\ \-\_]{4,16}$/", $_POST['direccion_adm'])){
         $error[] = 'Ha introducido una direccion no valida!';

       }else if (!preg_match("/^\d{7,14}$/", $_POST['telefono_adm'])){
         $error[] = 'El telefono debe ser de 3 a 40 dígitos!';

       }else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST['email'])){
         $error[] = 'Ha introducido un correo no valido!';

       }else if (!preg_match("/^.{3,12}$/", $_POST['password'])){
         $error[] = 'La contraseña de ser de 3 a 12 digitos!';
       }
       else{
          $insert = "INSERT INTO administrador(id_clinica, dni_adm, nombre_adm, apellido_adm, genero_adm, direccion_adm, telefono_adm, email, password, user_type) VALUES('$id_clinica','$dni_adm','$nombre_adm','$apellido_adm','$genero_adm','$direccion_adm','$telefono_adm','$email','$pass','$user_type')";
          mysqli_query($conn, $insert);
          echo "<script> alert('Registro exitoso')</script>";
          header('location:../adm/dashboard/dashboard.php');
       }
    }

};
?>