<?php
require_once '../../Model/Reponse.php';
require_once '../../Controller/ReponseC.php';
require_once '../../vendor/autoload.php';

use Vonage\Client;
use Vonage\Client\Credentials\Basic;

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_reponse = $_POST['id_rep'];

    // Get the details of the selected seance
    $reponseC = new reponseC();

$reponseDetails = $reponseC->getresponsebyID($id_reponse);
}

// Vos identifiants Vonage
$key    = "0ef3583b"; // Remplacez par votre clé Vonage
$secret = "Nksf8XNOThaajqol"; // Remplacez par votre secret Vonage

// Créer un client Vonage
$basic  = new Basic($key, $secret);
$client = new Client($basic);

// Get the details for SMS body
$mail      = $reponseDetails['mail'] ?? '';
$message      = $reponseDetails['message'] ?? '';



// Vérifier les valeurs vides
/*if (empty($id_matiereseance) && empty($date_seance) && empty($heure_d) && empty($heure_f) && empty($description)) {
    echo "Les données sont vides. Impossible de composer le message.";
} else {*/
    // Composer le corps du SMS
    $messageBody = "Votre Email: $mail, Message: $message";

    try {
        // Envoyer le SMS via Vonage
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("21693544940", 'Reponse', $messageBody) // Remplacez par les détails appropriés
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "Le message a été envoyé avec succès\n";
        } else {
            echo "Le message a échoué avec le statut: " . $message->getStatus() . "\n";
        }
    } catch (Exception $e) {
        echo 'Erreur lors de l\'envoi du SMS: ' . $e->getMessage();
    }
//}
?>
