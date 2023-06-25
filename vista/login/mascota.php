<?php

@include '../../modelo/config.php';

session_start();

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
   <title>Cita</title>

   <!-- custom css file link  -->
   <link href="../css/cita.css" type="text/css" rel="stylesheet" />

</head>
<BODY>
        <FORM ACTION="../../controlador/controlador_login/controlador_mascota_form.php" CLASS="form-register" method="POST" enctype="multipart/form-data">

            <H1 CLASS="form__title">Datos de Mascota</H1>

            <DIV CLASS="container--flex">
            <label for="" CLASS="form__label">Id reserva</label>
            <input type="number" name="id_reserva" CLASS="form__input" value="<?php echo $_SESSION['id_cita']?>" readonly>
            </DIV>

            <DIV CLASS="container--flex">
            <label for="" CLASS="form__label">Tipo de mascota</label>
            <input TYPE="text" CLASS="form__input" NAME="tipo_mascota" required>
            </div>

            <DIV CLASS="container--flex">
                <LABEL FOR="" CLASS="form__label">Nombre de mascota</LABEL>
                <input TYPE="text" CLASS="form__input" NAME="nombre_mascota" required>
            </DIV>

            <DIV CLASS="container--flex">
                <label for="" CLASS="form__label">Edad de mascota</label>
                <input TYPE="text" CLASS="form__input" NAME="edad_mascota" required>
            </DIV>
 
            <DIV CLASS="container--flex">
                <label for="" CLASS="form__label">Raza de mascota</label>
                <input TYPE="text" CLASS="form__input" NAME="raza_mascota" required>
            </DIV>

            <input TYPE="file" NAME="archivo" CLASS="form__file">
            <input TYPE="submit" CLASS="form__submit ">

        
        </FORM>   
    </BODY>
</html>
