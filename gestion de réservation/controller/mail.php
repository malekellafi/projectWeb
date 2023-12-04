<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:\xampp\htdocs\gestion de réservation\vendor\autoload.php';

         function sendemail($email ,$email_content){
            $mail = new PHPMailer(true);
            //$mail->SMTPDebug = 2;                                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'hibatallah.jlassi@esprit.tn';          //SMTP username
            $mail->Password   = 'nvsh mcrk gmbe jfjm';                            //SMTP password
            $mail->SMTPSecure = "ssl";                                  //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS      
            //Recipients
            $mail->setFrom('hibatallah.jlassi@esprit.tn', "Tourathna");
            $mail->addAddress($email);                     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML           
            $mail->Subject = $email_content['Subject'];      
            $mail->Body = $email_content['body'];           
            $mail->send();
        }
?>