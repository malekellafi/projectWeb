<?php
require_once "../../config.php";
require_once "../../Model/Reclamation.php"; 




Class ReclamationC {

    function getAllReclamations()
    {
        $requete = "select * from reclamation";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

    function ajouterReclamation($Reclamation)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            INSERT INTO reclamation
            (id,firstName,lastName,country,subject)
            VALUES
            (:id,:firstName,:lastName,:country,:subject)
            ');
            $querry->execute([
                'id'=>$Reclamation->getId(),
                'firstName'=>$Reclamation->getFirstName(),
                'lastName'=>$Reclamation->getLastName(),
                'country'=>$Reclamation->getCountry(),
                'subject'=>$Reclamation->getSubject(),

            ]);
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function modifierReclamation($Reclamation)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            UPDATE reclamation SET
             id=:id,firstName=:firstName,lastName=:lastName,country=:country,subject=:subject
            where id=:id
            ');
            $querry->execute([
                'id'=>$Reclamation->getId(),
                'firstName'=>$Reclamation->getFirstName(),
                'lastName'=>$Reclamation->getLastName(),
                'country'=>$Reclamation->getCountry(),
                'subject'=>$Reclamation->getSubject()

                
            ]);
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

    
    function getreclamationbyID($id)
    {
        $requete = "select * from reclamation where id=:id";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id'=>$id
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

   

    function supprimerReclamation($id)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            DELETE FROM reclamation WHERE id =:id
            ');
            $querry->execute([
                'id'=>$id
            ]);
            
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
   
    
           

           
    
}




?>