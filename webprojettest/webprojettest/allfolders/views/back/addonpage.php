
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
                            <input type="text" class="form-control" name="titre" id="titre"  value="<?php echo $article['titre']; ?> ">
                        </div>

                        <div class="form-group">
                            <label for="texte">Contenu</label>
                            <textarea class="form-control" name="texte" rows="10" value="<?php echo $article['texte']; ?> "></textarea>
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
                            <input type="file" class="form-control-file" name="urlImage" value="<?php echo $article['urlImage']; ?> " >
                        </div>
                        <div class="form-group">
                            <label for="notifCreateur">Notifications </label>
                            <select class="form-control" name="notifCreateur">
                                <option value="1" value="<?php echo $article['notifCreateur']; ?> ">Oui</option>
                                <option value="0" value="<?php echo $article['notifCreateur']; ?> ">Non</option>
                            </select>
                        </div>



                        <button type="submit" value="Modifier" name="modifer" class="btn btn-primary">Submit</button>

                    </form>
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
