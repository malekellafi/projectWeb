<?php
    require '../../Controller/ReponseC.php';

    $reponse = new reponseC();
    $reponse->supprimerreponse($_GET['id']);
    header('Location:Reponses.php');
?>

