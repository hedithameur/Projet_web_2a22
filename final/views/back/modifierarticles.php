<?php include_once "C://xampp/htdocs/webprojettest/allfolders/model/Articles.php";
    include_once "C://xampp/htdocs/webprojettest/allfolders/controller/AjouterArticle.php";
    
    $articleC = new articleC();
    $error = "";
if (
        isset($_POST["titre"]) &&
        isset($_POST["texte"]) &&
        isset($_POST["auteur"]) &&
        isset($_POST["source"]) &&
        isset($_POST["urlImage"]) &&
        isset($_POST["notifCreateur"]) &&
        isset($_POST["Datearticle"]))
{
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
} ?>


<?php require_once "head_section.php" ?>

    <body>
    <?php require_once "navbar.php" ?>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['idNewsArticle'])) {
        $article = $articleC->recupererarticle($_GET['idNewsArticle']);
    ?>
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                <div class="col-12">
                    <h2 class="tm-block-title d-inline-block">Modifier Blog</h2>
                </div>
                </div>
                <div class="row tm-edit-product-row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <form method="post" class="tm-edit-product-form">
                        <div class="form-group mb-3">
                            <label
                            for="titre"
                            >ID
                            </label>
                            <input
                            type="text" name="idNewsArticle" id="idNewsArticle" value="<?php echo $article['idNewsArticle']; ?>"
                            class="form-control validate"
                            disabled
                            />
                        </div>
                        <div class="form-group mb-3">
                            <label
                            for="titre"
                            >Titre
                            </label>
                            <input
                            type="text" name="titre" id="titre" value="<?php echo $article['titre']; ?>"
                            class="form-control validate"
                            required
                            />
                        </div>
                        <div class="form-group mb-3">
                            <label
                            for="texte"
                            >Contenu</label
                            >
                            <textarea
                            class="form-control validate" 
                            rows="3"
                            name="texte"
                            required
                            > <?php echo $article['texte']; ?> </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label
                            for="auteur"
                            >Auteur
                            </label>
                            <input
                            type="text" name="auteur" value="<?php echo $article['auteur']; ?>"
                            class="form-control validate"
                            required
                            />
                        </div>
                        <div class="form-group mb-3">
                            <label
                            for="source"
                            >Source
                            </label>
                            <input
                            type="text" name="source" value="<?php echo $article['source']; ?>"
                            class="form-control validate"
                            required
                            />
                        </div>
                        <div class="form-group mb-3">
                            <label
                            for="category"
                            >Notifications</label
                            >
                            <select
                            class="custom-select tm-select-accounts" 
                            name="notifCreateur"
                            >
                            <option value="1" value="<?php echo $article['notifCreateur']; ?> ">Oui</option>
                            <option value="0" value="<?php echo $article['notifCreateur']; ?> ">Non</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label
                            for="Datearticle"
                            >Titre
                            </label>
                            <input
                            type="text" name="Datearticle" id="Datearticle" value="<?php echo date("Y-m-d"); ?>"
                            class="form-control validate"
                            required
                            />
                        </div>
                        
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="form-group mb-3">
                            <div class="custom-file mt-3 mb-3">
                            <label for="urlImage">Modifier Image</label>
                                <input
                                type="file"
                                class="btn btn-primary btn-block mx-auto"
                                value="<?php echo $article['urlImage']; ?>"
                                name="urlImage"
                                />
                            </div>
                        </div>

                        </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Edit Blog Now</button>
                        </div>
                        <?php } ?>
                    </form>
                </div>
                </div>
            </div>
        </div>
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
