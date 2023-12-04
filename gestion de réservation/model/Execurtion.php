<?php
class Execurtion{
    private  $id;
    private  $nom;
    private  $description;
    private  $date_depart;
    private  $duree;
    private  $prix;
    private $place;
    private  $image;

    public function __construct($nom,$description, $date_depart, $duree, $prix, $image, $place){
        $this->nom=$nom;
        $this->description=$description;
        $this->date_depart=$date_depart;
        $this->duree=$duree;
        $this->prix=$prix;
        $this->image=$image;
        $this->place=$place;
    }




    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getDateDepart(){
        return $this->date_depart;
    }
    public function getDuree(){
        return $this->duree;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function getImage(){
        return $this->image;
    }
    public function getPlace(){
        return $this->place;
    }
}

?>