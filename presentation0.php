<meta http-equiv="content-type" content="text/html; charset=latin1" />
 
	<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
		
    <link rel="stylesheet" type="text/css" media="screen" href="../css/grid_12.css">
   
<?php 

include "../backoffice/article.php";
$c=new article();
$tab=$c->listearticle();


//////////////////////////
?>

<style>
.styled-select {
     height: 40px;
   overflow: hidden;
   width: 240px;
   background:url(images/fleche.png) no-repeat center right;
  }
.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 40px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 240px;
      font-family: Cursive;
	 
}
.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 40px;
   height: 25px;
   width: 240px;
   font-family: Cursive;
   background-color: #3b8ec2;
}
/* -------------------- Rounded Corners */
.rounded {
   -webkit-border-radius: 10px;
   -moz-border-radius: 10px;
   border-radius: 10px;
}
.semi-square {
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border-radius: 5px;
}

/* -------------------- Colors: Background */

.blue    { background-color: #3b8ec2;  }

/* -------------------- Colors: Text */

.blue select    { color: #fff; 


}

.stoption {background-color:#00CCFF;}

</style>


<div >

     <div  align="center" class="grid_12">
	 
	 						   <div  class="pad-0 border-1" >               			

	


    <h2 align="center"  class="top-1 p0 " style="background:url(images/bg_line0.png) no-repeat"><h10><?php echo 'Nos Produits';?></h10></h2>

							   </div>
     <div  style="padding-left:70px;"></div>

<?php 
///////////////////////////////////////// presentation ////////////////////////////////////////
				$gam="";
				$inc=1;
			
			 foreach ($tab as $article) { 
				if($inc==1) echo "<div class='wrap block-1 '>";
					?>
	
			
				
            <div  align="center" >
					     <h7>
					       <div align="center"><?php echo strtoupper($article['nomArt']); ?></div>
					     </h7>              
	<div align="center"><img src="..\backoffice\image\<?php echo $article['image']; ?>" alt="" width="270" height="154" class="img-border">
                           
                       </div>
						  
                         <p><div><?php echo $article['Libelle'];?></div></p>
		
     	<div style="width:250px; height:25px;">
		 
	<a href="#"><button class="sleeve" >Prix   <span class="insert rouge"><?php echo $article['prix'].'   ';?>DT</span>    </button></a>
		
	  </div>
		 </div>
      
				<?php
				if($inc==3) {
				echo "</div>";
				$inc=1;
				}else
				 $inc=$inc+1;
			
		}
		
?>	 		
