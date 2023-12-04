<?php
require('../../controller/ExecurtionC.php');

if( isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['date_depart']) && isset($_POST['duree']) && isset($_POST['prix']) && isset($_POST['place']) && isset($_POST['image'])){
    $execC = new ExecurtionC();
    $exec = new Execurtion($_POST['nom'],$_POST['description'],$_POST['date_depart'],$_POST['duree'],$_POST['prix'],$_POST['image'],$_POST['place']);
    $execC->ajouterExec($exec);
    header('Location: afficherBackExec.php');
}
?>