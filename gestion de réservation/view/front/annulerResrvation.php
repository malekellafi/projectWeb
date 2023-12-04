<?php
require('../../controller/ReservationC.php');
require('../../controller/ExecurtionC.php');
$resC = new ReservationC();
$execC = new ExecurtionC();
$exec = $execC->recupererExec($_GET['id_exec']);
$nbr = $exec['place'] + $_GET['nbrPlace'];
$resC->supprimerReservation($_GET['id']);
$resC->nbrPlaceSet($exec['id'],$nbr);
header('Location: reservationList.php');
?>