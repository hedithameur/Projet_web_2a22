<?php
    include_once '../Model/Livraison.php';
    include_once '../Controller/LivraisonC.php';

    $error = "";

    // create Livraison
    $Livraison = null;

    // create an instance of the controller
    $LivraisonC = new LivraisonC();
    if (
        
		    isset($_POST["ID"]) &&	
        isset($_POST["NOM"]) &&		
        isset($_POST["ADRESSE"]) &&
		    isset($_POST["PHONE"]) && 
        isset($_POST["PRODUCT"])
        
    ) {
        if (
            !empty($_POST['ID']) &&
			      !empty($_POST['NOM']) &&
            !empty($_POST["ADRESSE"]) && 
			      !empty($_POST["PHONE"]) && 
            !empty($_POST["PRODUCT"]) 
            
        ) {
            $Livraison = new Livraison(
              $_POST['ID'], 
              $_POST['ID'],
                $_POST['NOM'],
				        $_POST['ADRESSE'],
                $_POST['PHONE'],
				        $_POST['PRODUCT']
                
            );
            $LivraisonC->ajouterLivraison($Livraison);
            header('Location:afficherListeLivraison.php');
        }
        else
            $error = "Missing information";
    }
    
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add livraison - Dashboard HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.html">
          <h1 class="tm-site-title mb-0">livraison Admin</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="fas fa-tachometer-alt"></i> Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" href="livraison.php">
                <i class="fas fa-shopping-cart"></i> Livraison
              </a>
            </li>

            
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="login.html">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">ajouter livraison</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form method="post" class="tm-edit-product-form">
                  
                
                   <div class="form-group mb-3">
                    <label
                      for="NOM"
                      >name
                    </label>
                    <input
                      id="NOM"
                      name="NOM"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                    
                  
                  <div class="form-group mb-3">
                    <label
                      for="ADRESSE"
                      >ADRESSE
                    </label>
                    <input
                      id="ADRESSE"
                      name="ADRESSE"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  
                  
                    <div class="form-group mb-3">
                    <label
                      for="ID"
                      >ID
                    </label>
                    <input
                      id="ID"
                      name="ID"
                      type="int"
                      class="form-control validate"
                      required
                    />
                   </div>
                  
                  
                      <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="PHONE"
                            >phone number
                          </label>
                          <input
                            id="PHONE"
                            name="PHONE"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                            />
                          
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="PRODUCT"
                            >product ID
                          </label>
                          <input
                            id="PRODUCT"
                            name="PRODUCT"
                            type="PRODUCT"
                            class="form-control validate"
                            required
                          />
                        </div>
                  </div>
                  
              </div>
              
              
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="submit">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
        </div>
    </footer> 

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
