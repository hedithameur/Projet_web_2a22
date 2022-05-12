<?php
include_once "C://xampp/htdocs/webprojettest/allfolders/model/Articles.php";
require_once "C://xampp/htdocs/webprojettest/allfolders/controller/AjouterArticle.php";
require_once "C://xampp/htdocs/webprojettest/allfolders/controller/CommentairesC.php";

session_start();
// Page was not reloaded via a button press

$articleC = new articleC();
$num = 1;
$maction = 'afficher';
$par = "";
if (isset($_GET['maction'])) {
    $maction = $_GET['maction'];
}
if ($maction == 'trier') {
    $par = $_GET['par'];
    $listeCommentaire = $cc->trier($par);
} else if ($maction == 'stat') {
    $num = $_GET['num'];
}

?>

<?php require_once "head_section.php" ?>

<body>
    <?php require_once "navbar.php" ?>
    <div class="container tm-mt-big tm-mb-big">
            <?PHP
            $listearticle = $articleC->afficherarticle();
            $commentairesC = new CommentairesC();
            $nbrCommentairesTotale = $commentairesC->nbrCommentairesTotale();
            echo "Nbr de commentaires total :" . $nbrCommentairesTotale->sum; 
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nbrcommentaires</th>
                    </tr>

                </thead>
                <tbody>
                    <?PHP
                    foreach ($listearticle as $row) {
                        $nbrCommentairesbyarticle = $commentairesC->nbrCommentairesbyarticle($row['idNewsArticle']);
                    ?>
                    
                    <tr>
                                    <td><?PHP echo $row['idNewsArticle']; ?></td>
                                    <td><?PHP echo $row['titre']; ?></td>
                                    <td><img width="100" src="../front/images/<?PHP echo $row['urlImage']; ?> "> </td>
                                    <td><?PHP echo $nbrCommentairesbyarticle->sum; ?></td>

                                </tr>
                            <?PHP
                            }
                            $k = 0;
                            ?>
                    </tr>
                    
                    
                    
                </tbody>
            </table>

            </div>
                <div class="card-header d-flex align-items-center">
                        <h1 class="tm-site-title mb-0">statistiques Commentaires</h1>
                    </div>
                    <div class="card-body">
                        <div class="dropdown">

                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                STAT 
                                <i class="fas fa-angle-down" aria-hidden="true"></i></a>

                            <div class="dropdown-menu show " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="statistiquescomments.php?maction=stat&num=1">Number of comments by article</a>
                                <a class="dropdown-item " href="statistiquescomments.php?maction=stat&num=2">Number of comments by article last 24 hours</a>


                            </div>
                        </div>
                        <div class="table-responsive">
                            <?php
                            if ($num == 1)
                                require_once 'statistique.php';
                            else if ($num == 2)
                                require_once 'statistiquecommentsbyday.php';
                            ?>
                        </div>


                    </div>
                </div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <!-- https://jquery.com/download/ -->
        <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
        <!-- https://jqueryui.com/download/ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- https://getbootstrap.com/ -->
        <script>
        $(function() {
            $("#expire_date").datepicker();
        });
        </script>
</html>
</body>