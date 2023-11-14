<?php
include("C:/xampp/htdocs/siteWEB/controller/utilisateurC.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    
   

    $utilisateur = new UtilisateurC();
    $utilisateur->addUtilisateur($nom, $prenom, $email, $mdp);

    // Redirection vers 
    header("Location:../../front office/index.php");
    exit;
}
?>


