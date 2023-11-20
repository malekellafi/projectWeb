<?php

class Reponse
{
    private $id_rep;
    private $mail;
    private $message;
    private $reclamation;

    public function __construct($id_rep, $mail, $message, $reclamation)
    {
        $this->id_rep = $id_rep;
        $this->mail = $mail;
        $this->message = $message;
        $this->reclamation = $reclamation;
    }

    public function getIdRep()
    {
        return $this->id_rep;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getReclamation()
    {
        return $this->reclamation;
    }

    public function setReclamation($reclamation)
    {
        $this->reclamation = $reclamation;
    }
}