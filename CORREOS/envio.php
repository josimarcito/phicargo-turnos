<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.office365.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'L17021607@veracruz.tecnm.mx';                     
    $mail->Password   = 'Choforo3d';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                    

    $mail->setFrom('L17021607@veracruz.tecnm.mx', 'TRANSPORTES BELCHEZ S.A. DE C.V.');
    $mail->addAddress('josymarcastro311998@gmail.com', '');    

    $mail->isHTML(true);                                  
    $mail->Subject = 'STATUS DE POSICIONAMIENTO';
    $mail->Body    = 'LATITUD: ';
    $mail->AltBody = '';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}