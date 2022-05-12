<?php
include "../../controller/ajouterArticle.php";
include_once "../../model/Articles.php";


$articleC = new articleC();
$error = "";
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
            $_POST['Datearticle'],
            $_POST['nbrvue'],
            $_POST['nbrlike']
        );
        $articleC->modifierarticle($article, $_GET['idNewsArticle']);
        header('Location:../front/blogs.php');
    } else
        echo "Missing information";
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

    <title>Editer article</title>

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

                <div id="error">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_GET['idNewsArticle'])) {
                    $article = $articleC->recupererarticle($_GET['idNewsArticle']);
                ?>


                    <div class="container-fluid">

                        <div>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="idNewsArticle">idArticle</label>
                                    <input type="text" class="form-control" name="idNewsArticle" id="idNewsArticle" value="<?php echo $article['idNewsArticle']; ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" name="titre" id="titre" value="<?php echo $article['titre']; ?> ">
                                </div>


                                <div class="form-group">
                                    <label for="texte">Contenu</label>
                                    <textarea class="form-control" name="texte" rows="10"> <?php echo $article['texte']; ?>  </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="auteur">Auteur</label>
                                    <input type="text" class="form-control" name="auteur" value="<?php echo $article['auteur']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="source">Source</label>
                                    <input type="text" class="form-control" name="source" value="<?php echo $article['source']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="urlImage">Ajouter Image</label>
                                    <input type="file" class="form-control-file" name="urlImage" value="<?php echo $article['urlImage']; ?> ">
                                </div>

                                <div class="form-group">
                                    <label for="Datearticle">Datearticle</label>
                                    <input name="Datearticle" type="date" value="<?php echo $article['Datearticle'];
                                                                                    ?>">
                                </div>

                                <div class="form-group">
                                    <label for="notifCreateur">Notifications </label>
                                    <select class="form-control" name="notifCreateur">
                                        <option value="1" value="<?php echo $article['notifCreateur']; ?> ">Oui</option>
                                        <option value="0" value="<?php echo $article['notifCreateur']; ?> ">Non</option>
                                    </select>
                                </div>



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
<?php
                } else {
                    echo "error ";
                }
?>
</body>

</html>