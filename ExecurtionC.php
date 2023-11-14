<?php
require_once ('C:\xampp\htdocs\gestion de réservation\config.php');
include('C:\xampp\htdocs\gestion de réservation\model\Execurtion.php');

class ExecurtionC{
public function afficherExec()
{
    $sql="SELECT * FROM execurtion";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
       $e->getMessage();
    }
}
public function supprimerExec($id){
    $sql="DELETE FROM execurtion WHERE id=:id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id' , $id);
    try{
        $req->execute();
    }
    catch(Exception $e){
        $e->getMessage();
    }
}
public function ajouterExec($execurtion){
    $sql = "INSERT INTO execurtion (nom,description,date_depart,duree,prix,place,image)
    VALUES (:nom, :description, :date_depart, :duree, :prix, :place,:image)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
        'nom'=> $execurtion->getNom(),
        'description'=> $execurtion->getDescription(),
        'date_depart'=> $execurtion->getDateDepart(),
        'duree'=> $execurtion->getDuree(),
        'prix'=> $execurtion->getPrix(),
        'place'=> $execurtion->getPlace(),
        'image'=> $execurtion->getImage(),
        ]);
    } catch (Exception $e){
        $e->getMessage();
    }
}
public function recupererExec($id){
    $sql="SELECT * from execurtion where id=:id";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindValue(':id' , $id);
        $query->execute();
        $execurtion=$query->fetch();
        return $execurtion;
    }catch (Exception $e){
        $e->getMessage();
    }
}
public function modifierExec($id,$execurtion){
    try{
        $db = config::getConnexion();
        $query = $db->prepare('UPDATE execurtion SET nom = :nom, description = :description, date_depart = :date_depart, duree = :duree, prix = :prix, place = :place, image=:image WHERE id = :id');
        $query->execute([
            'nom'=> $execurtion->getNom(),
            'description'=> $execurtion->getDescription(),
            'date_depart'=> $execurtion->getDateDepart(),
            'duree'=> $execurtion->getDuree(),
            'prix'=> $execurtion->getPrix(),
            'place'=> $execurtion->getPlace(),
            'image'=> $execurtion->getImage(),
            'id'=> $id
        ]);
    } catch (Exception $e){
        $e->getMessage();
}

}
}
?>