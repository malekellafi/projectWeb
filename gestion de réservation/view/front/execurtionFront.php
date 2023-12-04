<?php
require('../../controller/ExecurtionC.php');
    $execC = new ExecurtionC();
    $plusVisite = $execC->plusReserve();
// pagination 
$per_page_record = 3;  // Number of entries to show in a page.   
// Look for a GET variable page if not found default is 1.        
if (isset($_GET["page"])) {    
    $page  = $_GET["page"];    
} else {    
    $page = 1;    
}    
$start_from = ($page - 1) * $per_page_record;

/////////LIMIT
if (isset($_POST['tri'])) {
    if ($_POST['tri'] == "All") {
        $sqlSearch = "SELECT * FROM execurtion LIMIT $start_from, $per_page_record";
    } else {
        $tri = $_POST['tri'];
        $sqlSearch = "SELECT * FROM execurtion ORDER BY $tri LIMIT $start_from, $per_page_record";
    }
} else if (isset($_POST['rechercheRDv'])) {
    $search = $_POST['rechercheRDv'];
    $sqlSearch = "SELECT * FROM execurtion WHERE id = '$search' OR nom = '$search' LIMIT $start_from, $per_page_record";
} else {
    $sqlSearch = "SELECT * FROM execurtion LIMIT $start_from, $per_page_record";
}
$query = $execC->paginationLIMIT($sqlSearch);
////////////COUNTER
$sql = "SELECT COUNT(*) FROM execurtion";
$total_records = $execC->paginationCOUNTER($sql);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tourathna- Products</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>
        <link rel="stylesheet" href="css/search.css"/>
        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                        <strong>Tourathna</strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                        <a href="#" class="bi-bag custom-icon"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Acceuil</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="REC.html">Reclamation</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="execurtionFront.php">Nos musées</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq.html">boutique</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="reservationList.php">Mes réservations</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                            <a href="product-detail.html" class="bi-bag custom-icon"></a>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Choisir votre</span>
                                <span class="d-block text-dark">meilleur Places</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>
            <section class="products section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-5">Le plus reservée</h2>
                        </div>
                        <?php
                               foreach($plusVisite as $e) { 
                                $exec = $execC->recupererExec($e['execurtion']);
                                        ?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="detailsExecurtion.php?id=<?php echo $exec['id']; ?>">
                                    <img src="images/product/<?php echo $exec['image']; ?>" class="img-fluid product-image" alt="">
                                </a>
                                <div class="product-top d-flex">

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>
                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="detailsExecurtion.php?id=<?php echo $exec['id']; ?>" class="product-title-link"><?php echo $exec['nom']; ?></a>
                                        </h5>
                                        <p class="product-p"><?php echo $exec['description']; ?></p>
                                        <small class="product-price text-muted ms-auto"><?php echo $exec['prix']; ?> TND</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="products section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12">
                            <h2 class="mb-5">Nos musées</h2>
                            <form action="execurtionFront.php" method="post">
                            <input type="text" class="input" name="rechercheRDv" placeholder="Search">
                            <button type="submit"><i class="ri-search-2-line"></i></button>
                            </form>
                            <div align="right" style="margin-right: 4cm;">
                                <form action="execurtionFront.php" method="post" id="triForm">
                                <select class="select" id="tri" name="tri" oninput="submitForm()">
                                    <option value="#">None</option>
                                    <option value="nom">Nom</option>
                                    <option value="date_depart">Date</option>
                                    <option value="prix">Prix</option>
                                    <option value="All">All Execurtion</option>
                                </select> 
                                </form>
                            </div>
                            <br>
                            <br>
                        </div>
                        <?php
                               foreach($query as $exec) { 
                                        ?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="detailsExecurtion.php?id=<?php echo $exec['id']; ?>">
                                    <img src="images/product/<?php echo $exec['image']; ?>" class="img-fluid product-image" alt="">
                                </a>
                                <div class="product-top d-flex">

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>
                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="detailsExecurtion.php?id=<?php echo $exec['id']; ?>" class="product-title-link"><?php echo $exec['nom']; ?></a>
                                        </h5>
                                        <p class="product-p"><?php echo $exec['description']; ?></p>
                                        <small class="product-price text-muted ms-auto"><?php echo $exec['prix']; ?> TND</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  } ?>
                        <div class="pagination" style="padding-left:40%;">    
      <?php      
        $total_records =$execC->paginationCOUNTER($sql);      
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='execurtionFront.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='execurtionFront.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='execurtionFront.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='execurtionFront.php?page=".($page+1)."'>  Next </a>";   
        }  
  
      ?>    
      </div> 
      <style>
  .pagination {
    padding-left: 40%;
    margin-top: 20px; 
  }

  .pagination a {
    color: black;
    background-color: white;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    margin: 0 4px;
  }

  .pagination a.active {
    background-color: #dc3545;
    color: white;
  }
</style>
                        <script>
                        function submitForm() {
    document.getElementById("triForm").submit();
    }
            </script>
                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">Tourathna</a></h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Tourathna</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="index.html" class="footer-menu-link">Acceuil</a></li>

                            <li class="footer-menu-item"><a href="REC.html" class="footer-menu-link">Reclamation</a></li>

                            <li class="footer-menu-item"><a href="products.html" class="footer-menu-link">Nos musées</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Boutique</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
