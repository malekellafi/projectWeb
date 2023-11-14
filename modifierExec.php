<?php
require('../../controller/ExecurtionC.php');

$execC = new ExecurtionC();
if(isset($_GET['id']))
$exec = $execC->recupererExec($_GET['id']);

if( isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['date_depart']) && isset($_POST['duree']) && isset($_POST['prix']) && isset($_POST['place']) && isset($_POST['image']) ){
    if(empty($_POST['image']))
    $exec = new Execurtion($_POST['nom'],$_POST['description'],$_POST['date_depart'],$_POST['duree'],$_POST['prix'],$_POST['secondImg'],$_POST['place']);
    else
    $exec = new Execurtion($_POST['nom'],$_POST['description'],$_POST['date_depart'],$_POST['duree'],$_POST['prix'],$_POST['image'],$_POST['place']);
    $execC->modifierExec($_POST['id'],$exec);
    header('Location: afficherBackExec.php');
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <style>
            body {
  font-family: Arial, sans-serif;
  background-color: #fff;
  color: #fff;
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}
            .container {
  background-color: #343a40;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 8px;
}

input,
textarea {
  padding: 10px;
  margin-bottom: 16px;
  border: 1px solid #fff;
  border-radius: 4px;
  background-color: #fff;
  color: #343a40;
}

input[type="submit"] {
  background-color: #fff;
  color: #343a40;
  cursor: pointer;
  transition: background-color 0.3s;
}

input[type="submit"]:hover {
  background-color: #ccc;
}
        </style>
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
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="afficherBackExec.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Exécurtion Liste
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
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
            <br>
            <div id="layoutSidenav_content">
                <main>                
                    <div class="container" style="margin-top: 3cm;">
                    <h2>Modifier une exécurtion</h2>
                    <br>
                        <form action="modifierExec.php" method="post" id="execForm">
                          <label for="nom">Nom :</label>
                          <input type="text" id="nom" name="nom" value="<?php echo $exec['nom']; ?>">
                          <span id="errorNom"></span>
                          <label for="description">Description :</label>
                          <textarea id="description" name="description"><?php echo $exec['description']; ?></textarea>
                          <span id="descriptionError"></span>
                          <label for="date_depart">Date de départ :</label>
                          <input type="date" id="date_depart" name="date_depart" value="<?php echo $exec['date_depart']; ?>">
                          <span id="dateError"></span>
                          <label for="duree">Durée :</label>
                          <input type="text" id="duree" name="duree" value="<?php echo $exec['duree']; ?>">
                          <span id="dureeError"></span>
                          <label for="prix">Prix :</label>
                          <input type="text" id="prix" name="prix" value="<?php echo $exec['prix']; ?>">
                          <span id="prixError"></span>
                          <label for="place">Place :</label>
                          <input type="text" id="place" name="place" value="<?php echo $exec['place']; ?>">
                          <span id="placeError"></span>
                          <label for="image"  class="btn btn-primary mr-2">Choisir un image</label> 
                          <input type="file" id="image" accept="image/jpeg, image/png, image/jpg" name="image" style="display:none">
                          <span id="errorimg"></span>
                          <div id="display-image"></div>
                          <input type="text" value="<?php echo $exec['id']; ?>" name="id" hidden>
                          <input type="text" name="secondImg" value="<?php echo $exec['image']; ?>" hidden>
                          <input type="submit" value="Modifier">
                        </form>
                        <script> 
                     // cntrl de saisie
                     let myForm = document.getElementById('execForm');
                    
                    myForm.addEventListener('submit' , function(e){
                      let nom = document.getElementById('nom');
                      let description = document.getElementById('description');
                      let date = document.getElementById('date_depart');
                      let duree = document.getElementById('duree');
                      let prix = document.getElementById('prix');
                      let place = document.getElementById('place');
                      let image = document.getElementById('image');
                    
                      if(nom.value=='')
                      {
                        let error = document.getElementById('errorNom');
                        error.innerHTML = "Le champs nom est obligatoire";
                        error.style.color = 'red';
                        e.preventDefault();
                      }
                      if(description.value=='')
                      {
                        let error = document.getElementById('descriptionError');
                        error.innerHTML = "Le champs description est obligatoire";
                        error.style.color = 'red';
                        e.preventDefault();
                      }
                      if(date.value=='')
                      {
                        let error = document.getElementById('dateError');
                        error.innerHTML = "Le champs date départ est obligatoire";
                        error.style.color = 'red';
                        e.preventDefault();
                      }
                      if((duree.value == "") || !/^[0-9,]+$/.test(duree.value) )
                      {
                        let error = document.getElementById('dureeError');
                        error.innerHTML = "Le champs durée est obligatoire et doit contenir que des chiffres";
                        error.style.color = 'red';
                        e.preventDefault();
                      }
                      if(prix.value=='' || !(/^[0-9]+$/.test(prix.value)))
                      {
                        let error = document.getElementById('prixError');
                        error.innerHTML = "Le champs prix est obligatoire et doit contenir que des chiffres";
                        error.style.color = 'red';
                        e.preventDefault();
                      }
                      if(place.value=='' || !(/^[0-9]+$/.test(place.value)))
                      {
                        let error = document.getElementById('placeError');
                        error.innerHTML = "Le champs place est obligatoire et doit contenir que des chiffres";
                        error.style.color = 'red';
                        e.preventDefault();
                      }
                    
                    });
                    </script>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
