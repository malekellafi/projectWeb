<?php

class Reservation{
    private int $id;
    private int $user;
    private int $place;
    private int $execurtion;
    private $date_reservation;

    public function __construct($user,$exec,$place,$date){
        $this->user = $user;
        $this->execurtion = $exec;
        $this->place = $place;
        $this->date_reservation = $date;
        $this->place = $place;
    }

    public function getId(){
        return $this->id;
    }
    public function getUser(){
        return $this->user;
    }
    public function getPlace(){
        return $this->place;
    }
    public function getExec(){
        return $this->execurtion;
    }
    public function getDate(){
        return $this->date_reservation;
    }
}

?>