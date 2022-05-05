<?php include_once "C://xampp/htdocs/webprojettest/allfolders/controller/AjouterArticle.php"; ?>
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

<?php require_once "head_section.php" ?>

<body>
    <?php require_once "navbar.php" ?>
        <div class="container tm-mt-big tm-mb-big">
            <?PHP
                $articleC = new articleC();
                if ($_SESSION['attnum1'] > $_SESSION['attnum2']) {

                    $listearticle = $articleC->sortdate1();
                } else if ($_SESSION['attnum1'] < $_SESSION['attnum2']) {
                    $listearticle = $articleC->sortdate2();
                } else {
                    //  $listearticle = $articleC->afficherarticle();
                } ?>

            
                
            <form method="get" action="editerarticle.php">
                <input type="text" class=" btn btn-dark float-right" name="recherche" placeholder=" Articles">
                <input type="submit" class="btn btn-dark float-right" value="Chercher">
            </form>
            <table class="table">
                <thead>
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
                <tbody>
                    <?PHP


                    foreach ($listearticle as $row) {
                    ?>
                    <tr >
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
                    </tr>
                    
                    
                    
                </tbody>
            </table>
            <!--pagination begin-->
            <?php

            // }
            for ($x = 1; $x <= $totalP; $x++) :

            ?>

                <a class="btn btn-primary" href="?page=<?php echo $x; ?>&per-page=<?php echo $perpage; ?>"><?php echo $x; ?></a>

            <?php endfor; ?>
            <!--pagination end-->
        </div>   
        <?php require_once "footer.php" ?>

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
</body>
</html>