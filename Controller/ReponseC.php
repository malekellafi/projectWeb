<?php
require_once "../../config.php";
require_once "../../Model/Reponse.php"; 




Class reponseC {

    function getAllreponses()
    {
        $requete = "select * from reponse";
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



    function getresponsebyID($id)
    {
        $requete = "select * from reponse where id_rep=:id_rep";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id_rep'=>$id
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    
   
    

    function ajouterReponse($reponse)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            INSERT INTO reponse
            (id_rep,mail,message,reclamation)
            VALUES
            (:id_rep,:mail,:message,:reclamation)
            ');
            $querry->execute([
                'id_rep'=>$reponse->getIdRep(),
                'mail'=>$reponse->getMail(),
                'message'=>$reponse->getMessage(),
                'reclamation'=>$reponse->getReclamation()
            ]);
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function modifierreponse($reponse)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            UPDATE reponse SET
          id_rep=:id_rep,mail=:mail,message=:message,reclamation=:reclamation

            where id_rep=:id_rep
            ');
            $querry->execute([
                'id_rep'=>$reponse->getIdRep(),
                'mail'=>$reponse->getMail(),
                'message'=>$reponse->getMessage(),
                'reclamation'=>$reponse->getReclamation()

                
            ]);
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

    

   

    function supprimerreponse($id)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            DELETE FROM reponse WHERE id_rep =:id_rep
            ');
            $querry->execute([
                'id_rep'=>$id
            ]);
            
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
   
    
           

           
    
}



?>