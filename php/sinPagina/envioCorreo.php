<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './../PHPMailer/src/Exception.php';
require './../PHPMailer/src/PHPMailer.php';
require './../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(false);

try {
    //linea para mostrar el log del correo
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';//no se modifica
    $mail->SMTPAuth   = true;//autentificacion
    $mail->Username   = 'galardonado.rss@gmail.com';
    $mail->Password   = 'uurgusnlfpzgpwso';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->addAddress($email);

    
    /*//ejemplo de mandar archivos
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name*/

    //Content
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;

    $mail->send();
} catch (Exception $e) {

}