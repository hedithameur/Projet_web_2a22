<?php require_once "../../controller/ajouterArticle.php" ?>



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



                <div class="page-container">
                    <!--/content-inner-->
                    <div class="left-content">
                        <div class="mother-grid-inner">



                            <!-- Write Code Here -->
                            <?php
                            include_once '../../controller/CommentairesC.php';

                            $commentairesC = new CommentairesC();
                            $liste = $commentairesC->afficherCommentaires();

                            ?>


                            <div class="container-fluid bg-white py-4 px-4 my-2">

                                <table class="table">
                                    <tbody>
                                        <?php foreach ($liste as $commentaire) { ?>

                                            <tr class="table-row">
                                                <td class="table-img">
                                                    <img width="100" src="imagesback/avatar.png" class="img-responsive" alt="">
                                                </td>
                                                <td class="table-img">
                                                    <img width="100" src="../front/images/<?PHP echo $commentaire['urlImage']; ?> "> </td>

                                                <td>
                                                    <p><?php echo $commentaire['titre']; ?></p>

                                                </td>
                                                <td class="table-text">
                                                    <h6> <?php echo $commentaire['nameUsers'] . ' ' . $commentaire['lastnameUsers']; ?></h6>
                                                    <p><?php echo $commentaire['texte']; ?></p>
                                                </td>

                                                <td class="march">
                                                    <?php echo $commentaire['dateCommentaire']; ?>
                                                </td>

                                                <td>
                                                    <a onclick="return confirm('Vous êtes sure de supprimer cetter commentaire ?');" href="../../controller/supprimerCommentaires.php?idCommentaire=<?php echo $commentaire['idCommentaire']; ?>">
                                                        <input value="supprimer" type="submit" class="btn btn-danger deleteCommentaire">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                                <center>
                                    <a href="index.php" class="btn btn-primary"> retour</a>
                                    <a href="statistiquescomments.php" class="btn btn-primary"> Statistiques des Commentaires</a>


                                </center>
                            </div>




                            <!-- //Write Code Here -->

                            <!--inner block end here-->
                            <!--copy rights start here-->

                            <!--COPY rights end here-->
                        </div>
                    </div>
                    <!--//content-inner-->
                    <!--/sidebar-menu-->

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