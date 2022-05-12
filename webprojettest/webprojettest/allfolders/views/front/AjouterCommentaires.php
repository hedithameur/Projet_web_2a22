<?php require_once 'header_main.php';
?>

<!-- header -->
<?php require_once 'header.php'; ?>



<?php
include "../../controller/CommentairesC.php";
include_once "../../model/Commentaire.php";



$error = "";


// create comment
$commentaire = null;

$today = date("y.m.d");

//if (isset($_POST['texte']) && !empty($_POST['texte'])) {
$commentaireC = new CommentairesC();
if (
    isset($_POST["texte"])
) {
    if (
        !empty($_POST["texte"])
    ) {
        $commentaire = new Commentaire(
            $_POST['texte'],
            $today
        );
        $idUsers = 1;
        $commentaireC->ajouterCommentaire($commentaire, 7, $idUsers);
        //$commentairesC->ajouterCommentaire($commentaire, $_GET['idNewsArticle'], $idUsers);

    } else ?>
    <?php echo "Missing information" ?> </p> <?php
                                            }
                                                ?>







<form method="post" action="">
    <div class="form-group">
        <label for="texte"><b>Commentaires : </b></label>
        <input type="text" class="form-control" name="texte" id="texte" placeholder="Entrer le commentaire">
    </div>

    <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>

</form>





<?php
//}
require_once 'footer.php';
?>

<!-- idCommentaire,texte,dateCommentaire,idNewsArticle,idUsers,nameUsers,lastnameUsers,titre-->