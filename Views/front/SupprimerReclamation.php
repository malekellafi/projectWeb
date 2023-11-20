<?php
    require '../../Controller/ReclamationC.php';

    $reclamation = new reclamationC();
    $reclamation->supprimerReclamation($_GET['id']);
    header('Location:Reclamations.php');
?>

