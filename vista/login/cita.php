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
        <FORM ACTION="../../controlador/controlador_login/controlador_cita_form.php" CLASS="form-register" method="POST" enctype="multipart/form-data">

            <H1 CLASS="form__title">Genere una Reserva</H1>

            <DIV CLASS="container--flex">
            <label for="" CLASS="form__label">Id cliente</label>
            <input type="number" name="id_cliente" CLASS="form__input" value="<?php echo $_SESSION['id_login']?>" readonly>
            </DIV>

            <DIV CLASS="container--flex">
            <label for="" CLASS="form__label">Tipo de Reserva</label>
            <select name="tipo_reserva" CLASS="form__input" required>
            <option value="BAÑOS Y ESTETICA">BAÑOS Y ESTETICA</option>
      	    <option value="CLINICA VETERINARIA">CLINICA VETERINARIA</option>
  		    <option value="HOSPEDAJE DE MASCOTA">HOSPEDAJE</option>
  		    <option value="TRAMITE DE VIAJES PARA MASCOTAS">TRAMITE DE VIAJES</option>
  		    <option value="CREMACION DE MASCOTAS">CREMACION</option>
  		    <option value="COMIDAS PREMIUM">COMIDAS PREMIUM</option>
            </select>
            </div>

            <DIV CLASS="container--flex">
                <LABEL FOR="" CLASS="form__label">Fecha</LABEL>
                <input TYPE="date" CLASS="form__input" NAME="fecha_reserva" required>
            </DIV>

            <DIV CLASS="container--flex">
                <label for="" CLASS="form__label">Hora</label>
                <select name="hora_reserva" CLASS="form__input">
                <option value="08:00 - 09:00 am">08:00 - 09:00 am</option>
                <option value="09:00 - 10:00 am">09:00 - 10:00 am</option>
                <option value="10:00 - 11:00 am">10:00 - 11:00 am</option>
                <option value="11:00 - 12:00 am">11:00 - 12:00 am</option>
                <option value="12:00 - 14:00 pm">12:00 - 14:00 pm</option>
                </select>
            </DIV>
 
            <DIV CLASS="container--flex">
                <label for="" CLASS="form__label">Modalidad</label>
                <select name="modalidad_reserva" CLASS="form__input">
                <option value="virtual">virtual</option>
                <option value="presencial">presencial</option>
                </select>
            </DIV>

            <DIV CLASS="container--flex">
                <label for="" CLASS="form__label">Descripcion</label>
                <input TYPE="text" CLASS="form__input" NAME="comentarios">
            </DIV>

            <input TYPE="file" NAME="archivo" CLASS="form__file">
            <input TYPE="submit" NAME="archivo"  CLASS="form__submit">
        </FORM>
    </BODY>
</html>
