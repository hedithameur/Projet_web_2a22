<?php
    include_once '../../Controller/Categorie.php';
    include_once '../../Controller/CategorieC.php';

    function randomsting( $length ) {  
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  
        $size = strlen( $chars );  
       
        for( $i = 0; $i < $length; $i++ ) {  
        $str= $chars[ rand( 0, $size - 1 ) ];  
        return $str;  
        }  
        }  

    $error = "";

    // create Categorie
    $categorie = null;

    // create an instance of the controller
    $categorieC = new CategorieC();
    if (
        isset($_POST["idC"]) &&
		isset($_POST["nomC"])  
    ) {
        if (
            !empty($_POST["idC"]) && 
			!empty($_POST["nomC"])
        ) {
            $categorie = new categorie(
                $_POST['idC'],
				$_POST['nomC']
            );
            $categorieC->modifiercategorie($categorie, $_POST["idC"]);
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
    <title>edit category</title>
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
                <h2 class="tm-block-title d-inline-block">Edit Category</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_GET['idC'])){
			$categorie = $categorieC->recuperercategorie($_GET['idC']);
            
				
		?>
        
        <form action="" class="tm-edit-product-form" method="POST">
        <table class="table table-hover tm-table-small tm-product-table" border="1" align="center">   
            
        <tr>
                    <td>
                        <label for="idC">ID Categorie:
                        </label>
                    
                        </td>
                    <td> <input type="number" name="idC"  id="idC"  value="<?php echo $categorie['id']; ?>"  >
                    </tr>      
                    <tr>		
                    <td>
                        <label for="nomC">Nom Categorie:
                        </label>
                    </td>
                    <td><input type="text" name="nomC" id="nomC" value="<?php echo $categorie['nomC']; ?>" maxlength="20"></td>
                    </tr>

                         
            
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary btn-block text-uppercase " value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" class="btn btn-primary btn-block text-uppercase " value="Annuler" >
                    </td>
                    </table>
        </form>
        </div class="col-12">
            <a
              href="afficherListeProduits.php"
              class="btn btn-primary btn-block text-uppercase mb-3">
              Retour à la liste des categories</a>
          </div>

		<?php
		}
		?>
    </body>
</html>