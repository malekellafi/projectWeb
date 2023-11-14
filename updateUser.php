
<?php  
include("C:/xampp/htdocs/siteWEB/controller/utilisateurC.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
   
   $Utilisateur=new UtilisateurC();
   $Utilisateur->updateUtilisateur($id,$nom,$prenom,$email,$mdp);

    header("Location:tables.php");
    exit();
}
  
?>