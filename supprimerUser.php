<?php
include("C:/xampp/htdocs/siteWEB/controller/utilisateurC.php");
$utilisateur=new UtilisateurC();
$utilisateur->deleteUtilisateur($_GET["id"]);
header("Location:tables.php");

?>