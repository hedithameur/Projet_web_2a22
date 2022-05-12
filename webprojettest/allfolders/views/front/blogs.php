<?php
$x = null;
if (!isset($_COOKIE['showstuff'])) {
    setcookie('showstuff', true, time() + 60 * 60 * 24); ?>


<?php
    $x = true;
} ?>

<?php

require_once 'C://xampp/htdocs/webprojettest/allfolders/controller/MailC.php';

$error = "";
// create mail
$mail = null;

// create an instance of the controller
$mailC = new MailC();

if (
    !empty($_POST["emailuser"])
) {
    $mail = new Mail(
        $_POST['emailuser']
    );
    $mailC->ajouterMail($mail);
} else {
    $error = "Missing information";
}

?>

<?php

require_once 'header_main.php';
?>

<!-- header -->
<?php require_once 'header.php'; ?>

<!--//popup -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/stylepop.css" rel='stylesheet' type='text/css' />
<!--//popup -->


<!-- //header -->

<!-- dropdown -->
<?php require_once 'dropdown.php'; ?>


<!-- //dropdown -->

<?php require_once "../../controller/ajouterArticle.php";


$articleC = new articleC();
$listearticles = $articleC->afficherarticle();
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    if ($num == 1) {
        $listearticles = $articleC->sortdate1();
    } else if ($num == 2) {
        $listearticles = $articleC->sortlikes();
    }
}







?>

<?php

?>


<!-- Page Features -->


<div class="row text-center ">

    <?PHP

    foreach ($listearticles as $row) {
    ?>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 bg-white text-black border-danger">
                <img class="card-img-top" src="images/<?PHP echo $row['urlImage']; ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold mb-2">
                        <?PHP echo $row['titre']; ?>
                    </h4>
                    <?PHP $out = strlen($row['texte']) > 150 ? substr($row['texte'], 0, 150) . "..." : $row['texte'];  ?>
                    <p class="card-text "><?PHP echo $out  ?></p>
                    <ul class="list-group list-group-flush">
                        <p class="list-group-item text-danger"><?PHP echo $row['auteur'];  ?></p>
                        <p class="list-group-item"><?PHP echo $row['source'];  ?></p>
                    </ul>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Date publication: <?php echo $row['Datearticle'] ?></small>
                    <a class="btn btn-danger" name="readmore" href="blogs-details.php?idNewsArticle=<?PHP echo $row['idNewsArticle']; ?>">Read More!</a>
                </div>
            </div>
        </div>
    <?PHP }

    ?>



</div>

<!--jQuery-->
<!-- newsletter modal -->
<!-- Modal -->

<script src="js/jquery-2.2.3.min.js"></script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-5 mx-auto mw-100">
                <h6>Subscribe</h6>
                <h3>By subscribing to our mailing list you will always get latest news and updates from us.</h3>
                <div class="login newsletter">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="mb-2">Email address</label>
                            <input type="email" class="form-control" name="emailuser" aria-describedby="emailHelp" placeholder="" required="">
                        </div>
                        <button type="submit" class="btn btn-primary submit mb-4">Subscribe</button>
                    </form>
                    <p class="text-center">
                        <a href="blogs.php">No thanks</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- // modal -->


<?php
if ($x) {
?>
    <script>
        $(document).ready(function() {
            $("#myModal").modal();
        });
    </script>


<?php
} ?>


<script src="js/bootstrap.js"></script>
<!-- js file -->
<!-- /.row -->

<!-- /.container -->





<?php require_once 'footer.php';
?>