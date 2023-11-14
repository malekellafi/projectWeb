

<?php

include("../../config.php");

if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $Username = $_POST['email'];
    $Password = $_POST['mdp'];

    $db = config::getConnexion();
    
    // Use prepared statement
    $query = "SELECT * FROM `utilisateur` WHERE `email` = :email AND `mdp` = :mdp";
    $stmt = $db->prepare($query);

    // Bind parameters
    $stmt->bindParam(':email', $Username);
    $stmt->bindParam(':mdp', $Password);

    // Execute the query
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location:../back office/admin/index.html");
    } else {
        echo '<div class="error">Échec de la connexion</div>';
    }
}
?>
