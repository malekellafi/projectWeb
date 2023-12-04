<?php
require_once ('C:\xampp\htdocs\gestion de réservation\config.php');
include('C:\xampp\htdocs\gestion de réservation\model\Reservation.php');

class ReservationC{
public function afficherReservation()
{
    $sql="SELECT * FROM reservations";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
       $e->getMessage();
    }
}
public function supprimerReservation($id){
    $sql="DELETE FROM reservations WHERE id_rsv=:id";
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
public function ajouterReservation($reservation){
    $sql = "INSERT INTO reservations (utilisateur,place,execurtion,date_reservation)
    VALUES (:utilisateur, :place, :execurtion, :date_reservation)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
        'utilisateur'=> $reservation->getUser(),
        'execurtion'=> $reservation->getExec(),
        'place' => $reservation->getPlace(),
        'date_reservation'=> $reservation->getDate()
        ]);
    } catch (Exception $e){
        $e->getMessage();
    }
}
public function modifierReservation($id,$reservation)
{
    try{
        $db = config::getConnexion();
        $query = $db->prepare('UPDATE reservations SET place = :place WHERE id_rsv = :id');
        $query->execute([
            'place' => $reservation->getPlace(),
            'id' => $id
        ]);
    } catch (Exception $e){
        $e->getMessage();
}}
public function recupererReservation($id){
    $sql="SELECT * from reservations where id_rsv=:id";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindValue(':id' , $id);
        $query->execute();
        $rsrv = $query->fetch();
        return $rsrv;
    }catch(Exception $e){
        $e->getMessage();
    }   
}
public function joinReservation($id){
    $sql="SELECT * FROM reservations INNER JOIN execurtion on reservations.execurtion = execurtion.id WHERE reservations.id_rsv = :id";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindValue(':id' , $id);
        $query->execute();
        $reserv=$query->fetch();
        return $reserv;
    }
    catch(Exception $e){
        die('Erreur:' . $e->getMessage());
    }
}
public function joinExec($id)
{
    $sql="SELECT * FROM reservations INNER JOIN execurtion on reservations.execurtion = execurtion.id WHERE execurtion.id = $id";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:' . $e->getMessage());
    }
}
public function nbrPlaceSet($id,$nbr)
{
    try{
        $db = config::getConnexion();
        $sql = "UPDATE execurtion SET place = :place WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute([
            'place' => $nbr,
            'id' => $id
        ]);
    }catch(Exception $e){
        die('Erreur:' . $e->getMessage());
    }
}
}
?>