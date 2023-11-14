<?php
include("C:/xampp/htdocs/siteWEB/controller/utilisateurC.php");
$c= new utilisateurC();
$tab=$c->listUtilisateur();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Liste des utilisateurs - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Tourathna</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Liste des utilisateurs
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Tourathna
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="container mt-4">
                <h2>Liste des utilisateurs</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            
                            <th>Email</th>
                            <th>Mot de passe</th>
                            <th>modifier</th>
                            <th>Supprimer</th>
                            <th>Ajouter</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Boucle PHP pour afficher les utilisateurs existants -->
                <!-- Chaque ligne doit inclure un bouton pour modifier et supprimer le compte -->
                <?php
                 
                 foreach($tab as $utilisateur)
                { ?>
                    <tr>
                        <td> <?= $utilisateur["id"]; ?></td>
                        <td> <?= $utilisateur["nom"]; ?></td>
                        <td> <?= $utilisateur["prenom"]; ?></td>
                        <td> <?= $utilisateur["email"]; ?></td>
                        <td> <?= $utilisateur["mdp"]; ?></td>
                        <td> <a href="supprimerUser.php?id=<?php echo $utilisateur['id'];?>">Delete</a></td> 
  
                        <td> <a href="modif.php?id=<?php echo $utilisateur['id'];?>&nom=<?php echo $utilisateur['nom'];?>&prenom=<?php echo $utilisateur['prenom'];?>&email=<?php echo $utilisateur['email'];?>&mdp=<?php echo $utilisateur['mdp'];?>"> Update </a> </td>
                        <!--<td> <button class="edit-button">Modifier</button></td>
                        <td><button class="delete-button">Supprimer</button></td> -->
                       
                        
                    </tr>
                <?php } ?>
                    </tbody>
                </table>
                
            </div>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Tourathna 2023</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>

