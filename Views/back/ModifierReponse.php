<?php
    require_once     '../../Controller/ReponseC.php';
    require_once '../../Model/Reponse.php' ;
    require_once     '../../Controller/ReclamationC.php';


            
    $reclamationC = new ReclamationC();
    $reclamations = $reclamationC->getAllReclamations();  

    if (isset($_GET['id_rep'])) {
        $reponseC = new reponseC();
        $reponse = $reponseC->getresponsebyID($_GET['id_rep']);
    }
    
    if (isset($_POST['mail']) && isset($_POST['message']) && isset($_POST['reclamation'])) {
        $reponse = new reponse($_POST['id_rep'], $_POST['mail'], $_POST['message'], $_POST['reclamation']);
        $reponseC = new reponseC();
        $reponseC->modifierreponse($reponse);
                header('Location:Reponses.php');
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
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">modifier Reponse</h6>
                            <form action="" id="form" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <input type="hidden" class="form-control"  name="id_rep" value="<?php echo $_GET['id_rep'] ?>">

                           
                            <div class="mb-3">
                                    <label for="mail" class="form-label">email</label>
                                    <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $reponse['mail'] ?>">
                            </div>
                            <div class="mb-3">
                                    <label for="message" class="form-label">message</label>
                                    <input type="text" class="form-control" id="message" name="message" value="<?php echo $reponse['message'] ?>">
                            </div>

                            <label for="reclamation">Sélectionnez une réclamation :</label>
                                <select name="reclamation" id="reclamation">
                                    <option value="" disabled selected>Sélectionnez une réclamation</option>
                                    <?php foreach ($reclamations as $reclamation) : ?>
                                        <option value="<?php echo $reclamation['id']; ?>"><?php echo $reclamation['firstName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            
                            <div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
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
    function validateForm() {
        var reclamation = document.getElementById("reclamation").value;
        var mail = document.getElementById("mail").value;
        var message = document.getElementById("message").value;

        if (reclamation === "") {
            alert("Veuillez sélectionner une réclamation.");
            return false;
        }

        if (!/^.+@.+\.(com|tn)$/.test(mail)) {
    alert("Le champ email doit être au format valide (exemple@domaine.com ou exemple@domaine.tn).");
    return false;
}

        // Vous pouvez ajouter d'autres validations selon vos besoins

        return true; // Si toutes les validations sont réussies, le formulaire est soumis
    }
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
