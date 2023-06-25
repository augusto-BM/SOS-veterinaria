/* use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception}; */

/* require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php'; */

//Create an instance; passing `true` enables exceptions
/* $mail = new PHPMailer(true);

try { */
    //Server settings
    /* $mail->SMTPDebug = SMTP::DEBUG_SERVER; //SMTP::DEBUG_OFF                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'augustolion18@gmail.com';                     //SMTP username
    $mail->Password   = '18petroperu1998';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;   */                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    /* $mail->setFrom('augustolion18@gmail.com', 'TIENDA ALIGN STYLE'); */
   /*  $mail->addAddress('augustocat18@gmail.com', 'Augusto bm');  */    //Add a recipient
    

    //Content
    /* $mail->isHTML(true);   */                                //Set email format to HTML
    /* $mail->Subject = 'Destalles de su compra';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es <b>'. $id_Transaccion .'</b></p>';

    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra.';

    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
} */
