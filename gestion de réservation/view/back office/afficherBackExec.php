<?php
require('../../controller/ExecurtionC.php');
    $execC = new ExecurtionC();
    $listExec = $execC->afficherExec();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- bib nécessaire pour calendrier --> 
        <!-- CSS for full calender -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
        <!-- JS for jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- JS for full calender -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
        <!-- bootstrap css and js -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- stat bib --> 
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
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
                    <<input class="form-control" type="text" id="search_exec" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" oninput="searchFun()" />
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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Listes des exécurtions</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="ajoutExecurtion.php">Ajouter une exécurtion</a></li>
                            <li class="breadcrumb-item active">Listes des exécurtions</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Date Départ</th>
                                            <th>Durée</th>
                                            <th>Prix</th>
                                            <th>Place</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    foreach($listExec as $exec) {
                                        ?>
                                        <tr>
                                            <td><?php echo $exec['id']; ?></td>
                                            <td><?php echo $exec['nom']; ?></td>
                                            <td><?php echo $exec['description']; ?></td>
                                            <td><?php echo $exec['date_depart']; ?></td>
                                            <td><?php echo $exec['duree']; ?></td>
                                            <td><?php echo $exec['prix']; ?></td>
                                            <td><?php echo $exec['place']; ?></td>
                                            <td><?php echo $exec['image']; ?></td>
                                            <td><a href="modifierExec.php?id=<?php echo $exec['id']; ?>">Modifier</a> <a href="supprimerExec.php?id=<?php echo $exec['id']; ?>">Supprimer</a> <a href="reservationExec.php?id=<?php echo $exec['id']; ?>">Réservations</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <script>
                            function searchFun() {
                                var input, filter, table, tr, td, i, j, txtValue;
                                input = document.getElementById("search_exec");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("datatablesSimple");
                                tr = table.getElementsByTagName("tr");
                                for (i = 1; i < tr.length; i++) {
                                    var display = "none";
                                    for (j = 0; j < tr[i].cells.length; j++) {
                                        td = tr[i].cells[j];
                                        if (td) {
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                display = "";
                                                break;
                                            }
                                        }
                                    }
                                    tr[i].style.display = display;
                                }
                            }
                        </script>
                            </div>
                   </div>
             </div>
            <!-- calendrier --> 
            <br>
            <h1 class="mt-4">Calendrier Exécurtion</h1>
            <br>
            <div id="calendar"></div>
			<script>
			$(document).ready(function() {
				display_events();
			}); // end document.ready block
			function display_events() {
				var events = new Array();
			$.ajax({
				url: 'display_event.php',  
				dataType: 'json',
				success: function (response) {
					
				var result=response.data;
				$.each(result, function (i, item) {
					events.push({
						event_id: result[i].event_id,
						title: result[i].title,
						start: result[i].start,
						end: result[i].end,
						color: result[i].color,
						url: result[i].url
					}); 	
				})
				var calendar = $('#calendar').fullCalendar({
					defaultView: 'month',
					timeZone: 'local',
					editable: true,
					selectable: true,
					selectHelper: true,
					select: function(start, end) {
							alert(start);
							alert(end);
							$('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
							$('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
							$('#event_entry_modal').modal('show');
						},
					events: events,
					eventRender: function(event, element, view) { 
						element.bind('click', function() {
								alert(event.event_id);
							});
					} 
					}); //end fullCalendar block	
				},//end success block
				error: function (xhr, status) {
				alert(response.msg);
				}
				});//end ajax block	
			}
			</script>
                    <style> 
        .graphBox{
position:relative ;
width: 100%;
padding:20px;
display:grid;
grid-template-columns: 1fr 2fr; /* 2fr est plus grand que 1fr qui est la taille de groupe box*/
grid-gap:30px;
min-width:200px;
min-height:200px;
margin-left: 10cm;

}
.graphBox .box{
position:relative ;
background: #fff;/*couleur du groupe box*/
padding:20px;
width: 100%;/* group box largeur */
box-shadow: 0 7px 25px rgba(0,0,0,0.08);
border-radius: 20px;
max-width:600px;
max-height:300px;
min-width:600px;
min-height:300px;

}
.graphBox .box1{
position:relative ;
background: #fff;/*couleur du groupe box*/
padding:20px;
width: 100%;/* group box largeur */
box-shadow: 0 7px 25px rgba(0,0,0,0.08);
border-radius: 20px;
max-width:400px;
max-height:400px;
min-width:350px;
min-height:350px;
margin-left: 100px;

}
</style>
<div style="width: 80%; margin: auto;">
        <canvas id="barChart"></canvas>
        </div>
    </div>
    <script>
        <?php
            $list = $execC->plusReserve();
        ?>
        var labels = [], data = [];
        <?php foreach ($list as $l) {
            $e = $execC->recupererExec($l['execurtion']);
            ?>
            labels.push('<?php echo $e['nom']; ?>');
            data.push(<?php echo $l['nbr']; ?>);
        <?php } ?>
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de réservation',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
