<?php
require('../../controller/ExecurtionC.php');
$execC = new ExecurtionC();
$execC->supprimerExec($_GET['id']);
header('Location: afficherBackExec.php');
?>