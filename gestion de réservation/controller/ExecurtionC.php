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
public function chercherExec($data)
{
    $sql="SELECT * FROM execurtion WHERE id = :data OR nom = :data";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindValue(":data",$data);
        $query->execute();
        $list=$query->fetchAll();
        return $list;
    }
    catch(Exception $e){
       $e->getMessage();
    }
}
public function triExec($tri){
    $sql = "SELECT * FROM execurtion ORDER BY $tri";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute();
        $liste = $query->fetchAll();
        return $liste;
    }
    catch(Exception $e){
       echo "Error: " . $e->getMessage();
    }
}

public function paginationLIMIT($sql)
{
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
}  

public function paginationCOUNTER($sql)
{
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        $row=$liste->fetch(PDO::FETCH_NUM);
        $total=$row[0];
        return $total;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
} 
public function plusReserve(){
    try{
        $db = config::getConnexion();
        $qb1= $db->query("SELECT execurtion, count(execurtion) AS nbr FROM reservations
        GROUP BY execurtion ORDER BY nbr DESC LIMIT 3");
        $qb1->execute();
        $list= $qb1->fetchAll();
        return $list;
    }catch(Exception $e){
        $e->getMessage();
    }
}
}
?>