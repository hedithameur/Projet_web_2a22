<?php
include_once '../../model/Articles.php';
include_once '../../controller/ajouterArticle.php';

$error = "";

// create article
$article = null;

// create an instance of the controller
$articleC = new articleC();
if (
    isset($_POST["titre"]) &&
    isset($_POST["texte"]) &&
    isset($_POST["auteur"]) &&
    isset($_POST["source"]) &&
    isset($_POST["urlImage"]) &&
    isset($_POST["notifCreateur"]) &&
    isset($_POST["Datearticle"])

) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["texte"]) &&
        !empty($_POST["auteur"]) &&
        !empty($_POST["source"]) &&
        !empty($_POST["urlImage"]) &&
        isset($_POST["notifCreateur"]) &&
        isset($_POST["Datearticle"])

    ) {
        $article = new article(
            $_POST['titre'],
            $_POST['texte'],
            $_POST['auteur'],
            $_POST['source'],
            $_POST['urlImage'],
            $_POST['notifCreateur'],
            $_POST['Datearticle']

        );
        if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['titre'])) {
            header("Location: AjouterArticle.php?error=invalidtitre");
            exit();
        } else {
            $articleC->ajouterArticle($article);
            header('Location:../front/blogs.php');
        }
    } else ?>
    <p class="p-3 mb-0 bg-danger text-white "> <?php echo "Missing information" ?> </p> <?php
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

    <title>ajouter article</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>

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
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="titre"><b>Titre</b></label>
                                <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrer le titre du sujet">
                            </div>

                            <div class="form-group">
                                <label for="texte"><b>Contenu</b></label>
                                <textarea class="form-control" name="texte" rows="10"></textarea>
                            </div>



                            <div class="form-group">
                                <label for="auteur"><b>Auteur</b></label>
                                <input type="text" class="form-control" name="auteur">
                            </div>
                            <div class="form-group">
                                <label for="source"><b>Source</b></label>
                                <input type="text" class="form-control" name="source">
                            </div>
                            <div class="form-group">
                                <label for="urlImage"><b>Ajouter Image</b></label>
                                <input type="file" class="form-control-file" name="urlImage">
                            </div>

                            <div class="form-group">
                                <label for="notifCreateur"><b>Notifications </b></label>
                                <select class="form-control" name="notifCreateur">
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                </select>
                            </div>
                            <input name="Datearticle" value="<?php echo date("Y-m-d"); ?>">
                            <!--<div class="form-group">
                                <label for="Datearticle">Datearticle</label>
                                <input name="Datearticle" type="date">
                            </div>-->




                            <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                    <script>
                        CKEDITOR.replace('texte');
                    </script>





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