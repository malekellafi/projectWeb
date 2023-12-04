<?php
require('../../controller/ExecurtionC.php');
require_once('../../controller/ReservationC.php');
require('../../controller/mail.php');

$execC = new ExecurtionC();
if(isset($_GET['id']))
$exec = $execC->recupererExec($_GET['id']);
if(isset($_POST['id_exec']) && isset($_POST['utilisateur']) && isset($_POST['nbrPlaceDispo']) && isset($_POST['nbrPlace']))
{
    $resC = new ReservationC();
    $nbr = $_POST['nbrPlaceDispo'];
    $nbr -= $_POST['nbrPlace'];
    $res = new Reservation($_POST['utilisateur'],$_POST['id_exec'],$_POST['nbrPlace'],date("Y-m-d H:i:s"));
    $resC->ajouterReservation($res);
    $resC->nbrPlaceSet($_POST['id_exec'],$nbr);
    $email_content['Subject'] = "Service execurtion";
    $email_content['body'] = "
    Merci de nous avoir choisis. <br>
    
    Nous vous annonçons que votre réservation pour l'excursion, enregistrée sous l'identifiant ".$_POST['id_exec'].", a été enregistrée.
    
    Cordialement.";
    sendemail($_POST['email'],$email_content);
    header('Location: reservationList.php');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tooplate's Little Fashion - Product Detail</title>
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

                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
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
                                <span class="d-block text-primary">We provide you</span>
                                <span class="d-block text-dark">Fashionable Stuffs</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <img src="images/product/<?php echo $exec['image']; ?>" class="img-fluid product-image" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?php echo $exec['nom']; ?></h2>
                                </div>
                            </div>
                            <div class="product-description">
                                <small class="product-price text-muted ms-auto mt-auto mb-5"><?php echo $exec['prix']; ?> TND</small><br>
                                <small class="product-price text-muted ms-auto mt-auto mb-5">NBR Place : <?php echo $exec['place']; ?></small><br>
                                <small class="product-price text-muted ms-auto mt-auto mb-5">Date : <?php echo $exec['date_depart']; ?></small>
                                <strong class="d-block mt-4 mb-2">Description</strong>

                                <p class="lead mb-5"><?php echo $exec['description']; ?></p>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

           
            <section class="contact section-padding text-center">
                <div class="col-lg-6 col-12 mx-auto">
                    <h2 class="mb-4">Reser<span>vation</span></h2>
  <form class="contact-form me-lg-5 pe-lg-3" action="detailsExecurtion.php" method="post" id="myForm">
    <div class="form-floating">
        <input type="text" name="utilisateur" id="utilisateur" class="form-control" placeholder="Utilisateur">
        <label for="utilisateur">Utilisateur</label>
        <span id="userError"></span>
    </div>
    <br>
    <div class="form-floating">
        <input type="email" name="email" id="email" placeholder="Email ( example@example.com )" class="form-control">
        <label for="email">Email</label>
        <span id="emailErr"></span>
    </div>
    <br>
    <div class="form-floating">
        <input type="number" name="nbrPlace" id="nbrPlace" class="form-control">
        <label for="nbrPlace">Nombre place</label>
        <span id="nbrError"></span>
    </div>
    <input type="text" name="id_exec" value="<?php echo $exec['id']; ?>" hidden>
    <input type="number" name="nbrPlaceDispo" id="nbrPlaceDispo" value="<?php echo $exec['place']; ?>" hidden> 
    <input type="date" name="date_exec" id="date_exec" value="<?php echo $exec['date_depart']; ?>" hidden>
    <br>
    <div class="col-lg-5 col-6">
        <button type="submit" class="form-control">Confirmer la Reservation</button>
    </div>
    <div class="col-lg-5 col-6">
        <button type="reset" class="form-control">Annuler la Reservation</button>
    </div>
</form>
<script>
    let myForm = document.getElementById("myForm");
    myForm.addEventListener("submit", function(e) {
        let user = document.getElementById("utilisateur");
        let date_exec = document.getElementById("date_exec");
        let nbrPlace = document.getElementById("nbrPlace");
        let nbrPlaceDispo = document.getElementById("nbrPlaceDispo");
        let email = document.getElementById("email");

        let date = new Date();

        if (parseInt(nbrPlace.value) > parseInt(nbrPlaceDispo.value)){
            alert("Nombre de place insuffisant");
            e.preventDefault();           
        }
        if (user.value == "" || !(/^[0-9]+$/.test(user.value))) {
            let error = document.getElementById("userError");
            error.innerHTML = "Le champs utilisateur est obligatoire et doit contenir que des chiffres";
            error.style.color = "red";
            e.preventDefault();
        }
        if(nbrPlace.value == "" || nbrPlace.value < 1 || !(/^[0-9]+$/.test(nbrPlace.value))){
            let error = document.getElementById("nbrError");
            error.innerHTML = "Nombre de place est obligatoire et doit etre supérieur à 1";
            error.style.color = "red";
            e.preventDefault();
        }
        if (new Date(date_exec.value) < date) { 
            alert("Execution date déjà passée !");
            e.preventDefault();
        }
        if(email.value == "" || !(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/.test(email.value))){
            let error = document.getElementById("emailErr");
            error.innerHTML = "Email est obligatoire et doit respecter le format email";
            error.style.color = "red";
            e.preventDefault();
        }

    });
</script>
                </div>
            </section>           
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">Little</a> Fashion</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

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

        <!-- CART MODAL -->
        <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <img src="images/product/evan-mcdougall-qnh1odlqOmk-unsplash.jpeg" class="img-fluid product-image" alt="">
                            </div>

                            <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                <h3 class="modal-title" id="exampleModalLabel">Tree pot</h3>

                                <p class="product-price text-muted mt-3">$25</p>

                                <p class="product-p">Quatity: <span class="ms-1">4</span></p>

                                <p class="product-p">Colour: <span class="ms-1">Black</span></p>

                                <p class="product-p pb-3">Size: <span class="ms-1">S/S</span></p>

                                <div class="border-top mt-4 pt-3">
                                    <p class="product-p"><strong>Total: <span class="ms-1">$100</span></strong></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row w-50">
                            <button type="button" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>