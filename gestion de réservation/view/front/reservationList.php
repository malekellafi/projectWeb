<?php
require('../../controller/ReservationC.php');
    $resC = new ReservationC();
    $listRes = $resC->afficherReservation();
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

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
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
                                <a class="nav-link" href="execurtionFront.php">Nos musées</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="faq.html">boutique</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="reservationList.php">Mes réservations</a>
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
                            <h2 class="mb-5">Listes des réservations</h2>
                        </div>
                        <?php
                                   foreach($listRes as $r) {
                                        $res = $resC->joinReservation($r['id_rsv']);
                                        ?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                    <img src="images/product/<?php echo $res['image']; ?>" class="img-fluid product-image" alt="">
                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                        <?php echo $res['utilisateur']; ?> / <?php echo $res['nom']; ?>
                                        </h5>
                                    </div>
                                </div>
                                <small class="product-price text-muted ms-auto">Date réservation : <?php echo $res['date_reservation']; ?></small><br>
                                <small class="product-price text-muted ms-auto">Date Départ : <?php echo $res['date_depart']; ?></small><br>
                                <small class="product-price text-muted ms-auto">Place : <?php echo $r['place']; ?></small><br>
                                <small class="product-price text-muted ms-auto"><?php echo $res['prix']; ?> TND</small>
                            </div>
                            <br>
                            <div class="col-lg-3 col-3">
                            <a class="form-control" href="modifierReservation.php?id=<?php echo $res['id_rsv']; ?>&id_exec=<?php echo $res['id']; ?>">Modifier</a>
                            <a class="form-control" href="annulerResrvation.php?id=<?php echo $res['id_rsv']; ?>&id_exec=<?php echo $res['id']; ?>&nbrPlace=<?php echo $r['place']; ?>">Annuler</a>
                            </div>
                        </div>
                        <?php } ?>

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
