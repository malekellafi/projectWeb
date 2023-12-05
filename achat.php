<?php
include "../backoffice/article.php";
$id=$_GET['id'];
$qte=$_GET['qte'];

$c=new article();
$tab=$c->achatart($id,$qte);
if($qte==0){
header("location:../backoffice/mail_admin.php?id=".$id);

}
else 
header("location:../frontoffice/presentation.php");
?>



