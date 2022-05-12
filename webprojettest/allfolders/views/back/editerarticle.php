<?php require_once "../../controller/ajouterArticle.php" ?>
<?php
session_start();
// Page was not reloaded via a button press
if (!isset($_POST['add1'])) {
    $_SESSION['attnum1'] = 0; // Reset counter
}
if (!isset($_POST['add2'])) {
    $_SESSION['attnum2'] = 0; // Reset counter
}

?>
<?php

//pagination

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;

//echo $page;
//echo $perpage;

$articlee = new articleC();

$listearticle = $articlee->AfficherArticlePaginer($page, $perpage);
$totalP = $articlee->calcTotalRows($perpage);
?>


<?php
//la recherche

if (isset($_GET['recherche'])) {
    $search_value = $_GET["recherche"];
    $listearticle = $articlee->recherche($search_value);
}
?>









<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edite article</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once 'maincolum.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once 'topbar.php';
                ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div>
                        <?PHP
                        $articleC = new articleC();
                        if ($_SESSION['attnum1'] > $_SESSION['attnum2']) {

                            $listearticle = $articleC->sortdate1();
                        } else if ($_SESSION['attnum1'] < $_SESSION['attnum2']) {
                            $listearticle = $articleC->sortdate2();
                        } else {
                            //  $listearticle = $articleC->afficherarticle();
                        }

                        ?>




                        <form method="get" action="editerarticle.php">
                            <input type="text" class=" btn btn-dark float-right" name="recherche" placeholder=" Articles">
                            <input type="submit" class="btn btn-dark float-right" value="Chercher">
                        </form>


                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Texte</th>
                                    <th scope="col">Auteur</th>
                                    <th scope="col">Source</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Notification</th>
                                    <th scope="col">Datearticle</th>


                                    <th>
                                        <form method='post'>
                                            <input name='add1' type="submit" value='OrderAsc' class="btn btn-success">
                                            <?php $_SESSION['attnum1']++; ?>
                                        </form>
                                    </th>
                                    <th>
                                        <form method='post'>
                                            <input name='add2' type="submit" value='OrderDesc' class="btn btn-success">
                                            <?php $_SESSION['attnum2']++; ?>
                                        </form>
                                    </th>
                                </tr>
                            </thead>



                            <?PHP


                            foreach ($listearticle as $row) {
                            ?>
                                <tr class="table-primary">
                                    <td><?PHP echo $row['idNewsArticle']; ?></td>
                                    <td><?PHP echo $row['titre']; ?></td>
                                    <td><?PHP echo $row['texte']; ?></td>
                                    <td><?PHP echo $row['auteur']; ?></td>
                                    <td><?PHP echo $row['source']; ?></td>
                                    <td><img width="100" src="../front/images/<?PHP echo $row['urlImage']; ?> "> </td>
                                    <td><?PHP echo $row['notifCreateur']; ?></td>
                                    <td><?PHP echo $row['Datearticle']; ?></td>



                                    <td>
                                        <form method="POST" action="../../controller/supprimerarticle.php">
                                            <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                                            <input type="hidden" value=<?PHP echo $row['idNewsArticle']; ?> name="idNewsArticle">
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="modifierarticles.php?idNewsArticle=<?PHP echo $row['idNewsArticle']; ?>">Modifier </a>
                                    </td>
                                </tr>
                            <?PHP
                            }

                            ?>
                        </table>

                        <!--pagination begin-->
                        <?php

                        // }
                        for ($x = 1; $x <= $totalP; $x++) :

                        ?>

                            <a href="?page=<?php echo $x; ?>&per-page=<?php echo $perpage; ?>"><?php echo $x; ?></a>

                        <?php endfor; ?>
                        <!--pagination end-->



                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>