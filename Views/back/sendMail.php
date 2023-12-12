<?php
require '../../PHPMailer/PHPMailerAutoload.php';
require_once     '../../Controller/ReclamationC.php';
require_once '../../Model/Reclamation.php' ;



if (isset($_GET['mail']) && isset($_GET['reclamation'])) {

    $reclamationC = new reclamationC();
    $reclamation = $reclamationC->getreclamationbyID($_GET['reclamation']);


$mail = new PHPMailer;


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ellafi.malek@esprit.tn';                 // SMTP username
$mail->Password = 'gfblsfycqfjfbsjy';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('Tourathna@support.com', 'no-reply');
$mail->addAddress($_GET['mail']);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Reponse de la reclamation';
$mail->Body    = 'vous avez recu une reponse au reclamation <b>'.$reclamation['subject'].'</b><br>this is an automatic mail please do not respond';
$mail->AltBody = '';
//$mail->send();
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('Location:Reponses.php');
    echo 'Message has been sent';
}
}


//

