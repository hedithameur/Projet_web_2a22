<?php


include_once ('../../controller/commandeC.php');
$commandeC = new commandeC();

$id_user = 1; // id panier de user connecté ($_SESSION['id_panier])

$listeU = $commandeC->affichercommande();


if (isset($_POST['ASC'])) {
    $listeU=$commandeC->TriASC();
}else if (isset($_POST['search'])) {
   // $listeU=$commandeC->recherche($_POST['recherche']);
   $listeU=$commandeC->search($_POST['search']);
} else if (isset($_POST['DESC'])) {
    $listeU=$commandeC->TriDESC();
} else {
    $listeU=$commandeC->affichercommande();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.html">
                    <h1 class="tm-site-title mb-0">commandes</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                
                       
                      
                        <li class="nav-item">
                            <a class="nav-link" href="afficherListeProduits.php">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li>
                      
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commandes.php">
                                <i class="far fa-file-alt"></i>
                                Commandes
                            </a>
                        </li>
                        <li class="nav-item dropdown show">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fa-brands fa-blogger"></i>
                                <span>
                                    Blogs <i class="fas fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu show" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="AjouterArticle.php">Ajouter Article</a>
                            <a class="dropdown-item" href="editerarticle.php">Editer Article</a>
                            <a class="dropdown-item" href="statistiquescomments.php">Statistiques Comments</a>
                            <!-- <a class="dropdown-item" href="statistiqueslikes.php">Statistiques Likes</a>
                            <a class="dropdown-item" href="envoyermail.php">Envoyer Mail</a> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="login.html">
                                Admin, <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <a href="export.php"><i class="fa fa-plus" >export</i></a> <br>
                        <form method="POST">
                            <input type="submit" name="ASC" value="Tri croissant">
                            <input type="submit" name="DESC" value="Tri decroissant">
                        </form>
                        <br>
                        <form method="POST">
                            <input type="text" name="search" required>
                            <input type="submit" value="recherche">
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Mode de paiment</th>
                                    <th scope="col">date</th>
                                    <th scope="col">status</th>
                                    <th scope="col">prix</th>
                                    <th scope="col">DELETE</th>
                                    <th scope="col">MODIFIER</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($listeU as $commande) {
                            ?>
                                <tr>
                                <td><?php echo $commande['id']; ?></td>
                                <td>paiement a livraison</td>
                                <td><?php echo $commande['date']; ?></td>
                                <td>en cours de traitement</td>
                                <td><?php echo $commande['prix']; ?></td>
                                <td><a href="supprimerCommande.php?id=<?php echo $commande['id']; ?>"><i class="fa fa-trash"></i></a></td>
                                <td><a href=""><i class="fa fa-edit"></i></a></td>

                            </tr>
                                <?php 
                            }
                            ?> 
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved. 
                    
                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>