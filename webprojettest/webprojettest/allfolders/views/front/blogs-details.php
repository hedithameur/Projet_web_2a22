<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php
session_start();
?>

<!-- header -->
<?php
function current_url()
{
    $url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
    $validURL = str_replace("&", "&amp", $url);
    return $validURL;
}
//echo " Page url is : " . current_url();
$newstring = current_url();
$pos = strrpos($newstring, '/', 26);
//echo " Pose est : " . $pos;

$fstring = substr($newstring, $pos + 1, 12);

//echo " la page name est : " . $fstring;

?>

<!--header-->

<html lang="en">

<head>
    <title>Virupedia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<style>
    .button-clicked {
        background: red;
    }
</style>
<script>
    $("#button").click(function() {
        $("#button").addClass('button-clicked');
    });
</script>
<!-- //header -->

<?php
include "../../controller/ajouterArticle.php";
include_once "../../model/Articles.php";

$r = 2;

$articleC = new articleC();
$idarticle = $_GET['idNewsArticle'];
$idUsers = 4;





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
    } else
        echo "Missing information";
}

?>


<?php
//commentaires 
include "../../controller/CommentairesC.php";
include_once "../../model/Commentaire.php";

// create comment

$commentaire = null;
$today = date("y.m.d");
$commentaireC = new CommentairesC();

if (
    isset($_POST["textecomment"])
) {
    if (
        !empty($_POST["textecomment"])
    ) {

        if ($commentaireC->verifierCommentaire($_POST['textecomment']) == 0) {
?> <p class="p-3 mb-0 bg-danger text-white ">
                <?php echo "beep : You can't write that" ?> </p>
        <?php
        } else {


            $commentaire = new Commentaire(
                $_POST['textecomment'],
                $today
            );
            //  $idUsers = 3;
            // $commentaireC->ajouterCommentaire($commentaire, 7, $idUsers);

            $commentaireC->ajouterCommentaire($commentaire, $idarticle, $idUsers);
        } ?>



        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    <?php } else ?>

    <?php //echo "Missing information" 
    ?> </p> <?php
        }

            ?>

<?php

//likes
// create like
include "../../controller/likeC.php";

$likeC = new likeC();

if (isset($_POST['like'])) {
    // echo "like button pressed";
    $likeC->ajouterlike($idarticle, $idUsers);
    // echo "error add like";
}
if (isset($_POST['dislike'])) {
    $likeC->supprimerlike($idarticle, $idUsers);
    $r = 0;
}



$countlike = $likeC->countlike($idarticle);


//$listelike = $likeC->userlikes($idUsers);
//foreach ($listelike as $row) {
//  echo $row->idNewsArticle;
//   echo "<br>";
//}

// foreach ($listelike as $row) {
//     if (($row->idNewsArticle) == $idarticle) {
//         $r = 1;
//         break;
//     } else {
//         $r = 0;
//     }
// }


?>


<!-- Page Content -->
<div class="container">

    <div id="error">
        <?php echo $error; ?>
    </div>


    <div class="row">

        <?php
        if (isset($_GET['idNewsArticle'])) {
            $article = $articleC->recupererarticle($_GET['idNewsArticle']);

        ?>

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <form method="POST" action="">




                    <!-- Title -->
                    <h1 class="mt-4"><?php echo $article['titre']; ?></h1>

                    <!-- Author -->
                    <p class="lead">
                        by
                        <a href="#"><?php echo $article['auteur']; ?></a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p> Date Publication : <?php echo $article['Datearticle'];  ?></p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" src="images/<?php echo $article['urlImage']; ?>" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead"><?php echo $article['texte']; ?></p>

                    <blockquote class="blockquote">
                        <footer class="blockquote-footer">Someone famous in
                            <cite title="Source Title"><?php echo $article['source']; ?></cite>
                        </footer>
                        <?php /*if ($r == 0 || $r == 2) { ?>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <button id="button" class="btn btn-primary" name="like">Like</button>
                        <?php }
                        if ($r == 1) {
                        ?>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <button id="button" class="btn btn-primary" name="dislike">DisLike</button>
                        <?php
                        }
                        */?>

                        <!-- <button type="button" class="btn btn-info">// echo "Number of views : " . $article['nbrvue']; ?></button>-->
                        <!-- <button type="button" class="btn btn-info"><?php //echo "Number of Likes : " . $countlike->sum; ?></button> -->

                    </blockquote>



                    <hr>

                </form>






                <!--<form method="post" action="">
                    <div class="form-group">
                        <label for="texte"><b>Commentaires : </b></label>
                        <input type="text" class="form-control" name="texte" id="texte" placeholder="Entrer le commentaire">
                    </div>

                    <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>

                </form>-->


                <?php
                $listecomment = $commentaireC->afficherCommentairesarticle($idarticle); ?>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="textecomment" id="textecomment" value='<?php echo isset($_POST['textecomment']) ? $_POST['textecomment'] : ''; ?> '></textarea>

                            </div>
                            <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>


                <?PHP

                foreach ($listecomment as $comment) {
                ?>

                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <img width="100" class="d-flex mr-3 rounded-circle" src="images/login.jpg" alt="">
                        <div class="media-body">
                            <h5 class="mt-0"><?PHP echo $comment->nameUsers; ?></h5>
                            <h5 class="mt-0"><?PHP echo $comment->lastnameUsers; ?></h5>
                            <h5 class="mt-0"><?PHP echo $comment->texte; ?></h5>
                            <?PHP echo $comment->idUsers; ?>
                            <?PHP echo $comment->idNewsArticle; ?>
                            <?PHP echo $comment->dateCommentaire; ?>
                            <?php if ($comment->idUsers == $idUsers) { ?>

                                <a onclick="return confirm('Vous êtes sure de supprimer votre commentaire ?');" href="../../controller/supprimerCommentaires.php?idCommentaire=<?php echo $comment->idCommentaire; ?>&idUsers=<?php echo $comment->idUsers; ?>&idNewsArticle=<?php echo $comment->idNewsArticle; ?>">
                                    <input value="supprimer" type="submit" class="btn btn-danger deleteCommentaire">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </a>
                            <?php        } ?>
                        </div>
                    </div>

                <?PHP
                }

                ?>

                

            </div>


    </div>
    <!-- /.row -->

    <!-- /.container -->



<?php
        } else {
            echo "error ";
        }
?>