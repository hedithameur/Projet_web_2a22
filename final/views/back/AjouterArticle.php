<?php include_once "C://xampp/htdocs/webprojettest/allfolders/model/Articles.php";
      include_once "C://xampp/htdocs/webprojettest/allfolders/controller/AjouterArticle.php";
      
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
              // if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['titre'])) {
              //     header("Location: AjouterArticle.php?error=invalidtitre");
              //     exit();
              //} else {
                  $articleC->ajouterArticle($article);
                  header('Location:../front/blogs.php');
              }
           else  ?>
          <p class="p-3 mb-0 bg-danger text-white "> <?php echo "Missing information" ?> </p> <?php  } ?>


<?php require_once "head_section.php" ?>

  <body>
  <?php require_once "navbar.php" ?>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Ajouter Blog</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form method="post" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="titre"
                      >Titre
                    </label>
                    <input
                    type="text" name="titre" id="titre"
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
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="auteur"
                      >Auteur
                    </label>
                    <input
                    type="text" name="auteur"
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
                    type="text" name="source"
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
                      <option value="1">Oui</option>
                      <option value="0">Non</option>
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
                      <label for="urlImage">Ajouter Image</label>
                        <input
                          type="file"
                          class="btn btn-primary btn-block mx-auto"
                          value="UPLOAD BLOG IMAGE"
                          name="urlImage"
                        />
                    </div>
                  </div>

                  </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Blog Now</button>
                    </div>
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
