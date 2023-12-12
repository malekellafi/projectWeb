<?php
    require_once     '../../Controller/ReponseC.php';
    require_once '../../Model/Reponse.php' ;
    require_once     '../../Controller/ReclamationC.php';
    require_once '../../Model/Reclamation.php' ;


         
    $reclamationC = new ReclamationC();
    $reclamations = $reclamationC->getAllReclamations1();  
    $nomReclamation = $_GET['reclamation'];
    
    if (isset($_POST['mail'] ) && isset($_POST['message'] ) && isset($_POST['reclamation'] ) ) 
    {
            
                $reponse = new Reponse(0,$_POST['mail'] ,$_POST['message'],$_POST['reclamation']);
                $reponseC = new reponseC();
                $reponseC->ajouterReponse($reponse);
                header("Location:sendMail.php?mail=".$_POST['mail']."&reclamation=".$_POST['reclamation']);
    } 

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Gestions</div>
                            <a class="nav-link collapsed" href="Reclamations.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reclamations
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Reclamations.php">Nos Reclamations</a>
                            
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reponses
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Reponses.php">Nos Reponses</a>
                            
                                </nav>
                            </div>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="AjouterReponse.php">Ajouter Reponse</a>
                            
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                   


                    
               <div class="container-fluid pt-4 px-4" >
               <h1>ADD RESPONSE</h1> 
      
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">



                        

                        <form action="" id="form" method="POST" enctype="multipart/form-data" >
    <label for="reclamation">Sélectionnez une réclamation :</label>
    <select name="reclamation" id="reclamation">
    <?php foreach ($reclamations as $reclamation) : ?>
        <option value="<?php echo $reclamation['id']; ?>" <?php if ($reclamation['firstName'] === $nomReclamation) echo 'selected'; ?>>
            <?php echo $reclamation['firstName']; ?>
        </option>
    <?php endforeach; ?>
</select>

    <div class="mb-3">
        <label for="mail" class="form-label">Mail</label>
        <input type="email" class="form-control" id="mail" name="mail"   required  >
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <input type="text" class="form-control" id="message" name="message">
    </div>

    <br>
    <br>

    <div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>
                        </div>
                    </div>
                </div>
            </div>


                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>





        <script>
document.addEventListener("DOMContentLoaded", function () {
    // Fonction de validation du formulaire
    function validateForm() {
        // Récupérer les champs du formulaire
        var emailDest = document.getElementById("mail").value;
        var message = document.getElementById("message").value;
        var reclamation = document.getElementById("reclamation").value;

        // Réinitialiser les messages d'erreur
        document.getElementById("error-email").innerText = "";
        document.getElementById("error-message").innerText = "";
        document.getElementById("error-reclamation").innerText = "";

        // Valider le champ email
        if (emailDest.trim() === "") {
            document.getElementById("error-email").innerText = "Veuillez entrer une adresse e-mail.";
            return false;
        } var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailDest)) {
            document.getElementById("error-email").innerText = "Veuillez entrer une adresse e-mail valide.";
            return false;
        }

        // Valider le champ message
        if (message.trim() === "") {
            document.getElementById("error-message").innerText = "Veuillez entrer un message.";
            return false;
        }

        // Valider le champ réclamation
        if (reclamation === "") {
            document.getElementById("error-reclamation").innerText = "Veuillez sélectionner une réclamation.";
            return false;
        }

        // Si toutes les validations sont réussies
        return true;
    }

    // Ajouter un gestionnaire d'événements pour le formulaire
    document.getElementById("form").addEventListener("submit", function (event) {
        // Annuler la soumission du formulaire si la validation échoue
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});
</script>

<script>
function remplirChampReclamation() {
  var nomReclamation = "Nom de la réclamation";
  var champReclamation = document.getElementById('reclamation');

  champReclamation.value = nomReclamation;
}
    // Get the select element
    var selectReclamation = document.getElementById('reclamation');

    // Get the email input element
    var emailInput = document.getElementById('mail');

    // Add an event listener to the select element
    selectReclamation.addEventListener('change', function() {
        // Get the selected option
        var selectedOption = selectReclamation.options[selectReclamation.selectedIndex];

        // Update the email input value with the data-email attribute of the selected option
        emailInput.value = selectedOption.getAttribute('data-email');

    });
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>



