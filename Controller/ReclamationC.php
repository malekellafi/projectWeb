<?php
require_once "../../config.php";
require_once "../../Model/Reclamation.php"; 




Class ReclamationC {


    function getTotalReclamations()
    {
        $requete = "SELECT COUNT(*) AS total FROM reclamation";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetch();
           
        } catch (PDOException $th) {
            $th->getMessage();
        }
        return $result['total'];
    }

    function getAllReclamations1()
    {
        $requete = "SELECT * FROM reclamation";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result;
        } catch (PDOException $th) {
            $th->getMessage();
        }
    }
    function getAllReclamations($page)
    {
        $offset = ($page - 1) * 4;
        $requete = "SELECT * FROM reclamation LIMIT 4 OFFSET :offset";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->bindParam(':offset', $offset, PDO::PARAM_INT);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result;
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


    function trierLn()
{
    $sql = "SELECT * from reclamation ORDER BY lastName ASC";
    $db = config::getConnexion();
    try {
        $req = $db->query($sql);
        return $req;
    } catch (Exception $e)
    {
        die('Erreur: ' . $e->getMessage());
    }
}

function trierCountry()
{
    $sql = "SELECT * from reclamation ORDER BY country ASC";
    $db = config::getConnexion();
    try {
        $req = $db->query($sql);
        return $req;
    } catch (Exception $e)
    {
        die('Erreur: ' . $e->getMessage());
    }
}
function trierFn()
{
    $sql = "SELECT * from reclamation ORDER BY firstName ASC";
    $db = config::getConnexion();   
    try {
        $req = $db->query($sql);
        return $req;
    } catch (Exception $e)
    {
        die('Erreur: ' . $e->getMessage());
    }
}

function searchReclamation($sh)
{
    $requete = "select * from reclamation where (firstName like '%$sh%' or lastName like '%$sh%') ";
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
           
    
}




?>