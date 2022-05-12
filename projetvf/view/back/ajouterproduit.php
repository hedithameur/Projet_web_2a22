<?php
    //include_once '../../config.php';
    include_once '../../Controller/Produit.php';
    include_once '../../Controller/Categorie.php';
    include_once '../../Controller/ProduitC.php';
    include_once '../../Controller/CategorieC.php';
    $categorieC=new categorieC();
	$listeCategories=$categorieC->affichercategorie(); 

  function randomsting( $length ) {  
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  
    $size = strlen( $chars );  
   
    for( $i = 0; $i < $length; $i++ ) {  
    $str= $chars[ rand( 0, $size - 1 ) ];  
    return $str;  
    }  
    }  

    $error = "";

    // create produit
    $produit = null;

    // create an instance of the controller
    $produitC = new produitC();
    if (
        isset($_POST["id"]) &&
		isset($_POST["marque"]) &&		
        isset($_POST["modele"]) &&
		isset($_POST["prix"])
       
    ) {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST['marque']) &&
            !empty($_POST["modele"]) && 
			!empty($_POST["prix"])
        ) {
         
  $img=$_FILES['img']['name'] ;
  $upload= "img/".$img;

  $image='img/'.$img;

       move_uploaded_file($_FILES['img']['tmp_name'] , $upload);

         
            $produit = new produit(
                $_POST['id'],
				$_POST['marque'],
                $_POST['modele'], 
               $image,
				$_POST['prix'], 
		        		$_POST['id_c']
            );
            $produitC->ajouterproduit($produit);
            header('Location:afficherListeProduits.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>add product</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="assets/jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
    
</head>
    <body>


    
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.html">
          <h1 class="tm-site-title mb-0">Product Admin</h1>
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
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="far fa-file-alt"></i>
                <span> Reports <i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Daily Report</a>
                <a class="dropdown-item" href="#">Weekly Report</a>
                <a class="dropdown-item" href="#">Yearly Report</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="afficherproduit.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="accounts.html">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fas fa-cog"></i>
                <span> Settings <i class="fas fa-angle-down"></i> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Billing</a>
                <a class="dropdown-item" href="#">Customize</a>
              </div>
            </li>
          </ul>
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
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">







            



        
              <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" class="tm-edit-product-form" method="POST" id="myform" enctype="multipart/form-data" >
            <table class="table table-hover tm-table-small tm-product-table" border="1" align="center">
                <tr>
                    <td>
                        <label for="matricule">id produit 
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="marque">Marque
                        </label>
                    </td>
                    <td><input type="text" name="marque" id="marque" maxlength="20"></td>
                    <p id="errormarque" class="erreur" ></p>
                </tr>
                <tr>
                    <td>
                        <label for="modele">Modele
                        </label>
                    </td>
                    <td><input type="text" name="modele" id="modele" maxlength="20"></td>
                    <p id="errormodele" class="erreur" ></p>
                </tr>
                <tr>
                    <td>
                        <label for="prix_pr">Prix
                        </label>
                    </td>
                    <td>
                        <input type="float" name="prix" id="prix" maxlength="20" >
                    </td>
                </tr>      
                
                <tr>
                    <td>
                        <label for="img">image
                        </label>
                    </td>
                    <td>
                        <input type="file" name="img"  >
                    </td>
                </tr> 
                <tr>
                    <td></td>
                    
                    <td>
                        <input type="reset" 
                        class="btn btn-primary btn-block text-uppercase "
                        value="Annuler" >
                    </td>
                </tr>





                
                
            </table>
<hr>





           

            
              <div class="form-group mb-3">
                    <label
                      for="categorie"
                      >Categorie : </label
                    >
                    <select id="id_c" name="id_c" >
                      <option  selected>Selecter categorie</option>
            <?php
				foreach($listeCategories as $categorie){
			?>

                      <option value="<?php echo $categorie['id']?>"><?php echo $categorie['nomC']; ?></option>
            <?php
				}
			?>  
                    </select>
              </div>
      
      

      




 
      
<span id="error"></span>


                <div class="col-12">
                <button href="afficherListeProduits.php" name="valider"
                onclick="ajout(event)"
                type="submit" class="btn btn-primary btn-block text-uppercase" >
                Ajouter produit</button>
                </div>


</form>

              



                <hr>
                </div class="col-12">
            <a
              href="afficherListeProduits.php"
              class="btn btn-primary btn-block text-uppercase mb-3">
              Retour à la liste des produits</a>
          </div>
            
          <hr>
        




<script>

  /* 
                let myform = document.getElementById('myform');
                let myregex = /^[A-Za-z-_\s]+$/;
                
                
                
             
                
                
                myform.addEventListner('submit',function(e)
                {
                  let myinput = document.getElementById('marque');
                    if(myinput.value.trim() == "")
                    {
                      let myerror = document.getElementById('error');
                      myerror.innerHTML ="champ requis.";
                      myerror.style.color ='red';
                      e.preventDefault();
                    }
                    else if(myregex.test(myinput.value)==false)
                    {
                      let myerror = document.getElementById('error');
                      myerror.innerHTML ="lettre et tirret uniquement.";
                      myerror.style.color ='red';
                      e.preventDefault();
                    }

                });


    */            
                </script>

                <script>
    
    function saisirmarque() {
                var marque = document.getElementById('marque').value;
                var regex = /^[A-Za-z-\s]+$/;


                if (!(regex.test(marque))) {
                    document.getElementById("errormarque").textContent = "marque has to be composed of letters only!";
                    document.getElementById("errormarque").style.color = "red";
                    return 0;
                } 
                 else {
                    document.getElementById("errormarque").textContent = "marque Verified";
                    document.getElementById("errormarque").style.color = "green";
                    return 1;
                }
    }


    function saisirmodele() {
                var modele = document.getElementById('modele').value;
                var regex = /^[A-Za-z1-9-\s]+$/;


                if (!(regex.test(modele))) {
                    document.getElementById("errormodele").textContent = "modele has to be composed of letters or numbers only!";
                    document.getElementById("errormodele").style.color = "red";
                    return 0;
                } 
                 else {
                    document.getElementById("errormodele").textContent = "modele Verified";
                    document.getElementById("errormodele").style.color = "green";
                    return 1;
                }
    }




    
    function ajout(event) {
    if ( saisirmarque() == 0 || saisirmodele() == 0 )
    
        event.preventDefault();
    }

  </script>








        
            
       
        
    </body>
</html>