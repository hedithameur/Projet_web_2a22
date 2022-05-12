<?php
include_once '../Model/Livraison.php';
include '../Controller/LivraisonC.php';

	
  $LivraisonC=new LivraisonC();
$listeLivraisons=$LivraisonC->afficherLivraison(); 

  $chercherr=$_GET['chercherr'] ?? '';

  $tri=$_GET['tri'] ?? '';

  if($chercherr){
    $pdo = config::getConnexion();
			$query = $pdo -> prepare('SELECT * FROM crud WHERE NOM = :nom');
			$query -> execute(['nom' => $chercherr]);
	    $listeLivraisons= $query-> fetchAll();

     
   
   // $statement->execute();
   // $listeProduits = $statement->fetchAll(PDO::FETCH_OBJ);

  }else if($tri)
  {
    $pdo = config::getConnexion();
    $query = $pdo -> prepare('SELECT * FROM crud order by adresse desc');
    $query -> execute();
    $listeLivraisons= $query-> fetchAll();

  }
  
  else{
    $listeLivraisons=$LivraisonC->afficherLivraison(); 

  }

  $adresse=new LivraisonC();
  $add=$adresse->afficheradresse(); 

  $adre=$_POST['adre'] ?? '';

  if($adre){
    $pdo = config::getConnexion();
			$query = $pdo -> prepare('SELECT count(ID) as cpt FROM crud WHERE ADRESSE = :adre');
      
			$query -> execute(['adre' => $adre]);
	    $nbr= $query-> fetchAll(PDO::FETCH_ASSOC);

    

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>livraison Page</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="templatemo-style.css"/>
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
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
              <a class="nav-link active" href="products.html">
                <i class="fas fa-shopping-cart"></i> livraison
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link active" href="../../../afficherListeProduits.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../../../accounts.php">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../commandes.php">
                <i class="far fa-file-alt"></i> Commandes
              </a>
            </li>

            <li class="nav-item dropdown show">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fa-brands fa-blogger"></i>
                                <span>
                                    Blogs <i class="fas fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu show" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../../AjouterArticle.php">Ajouter Article</a>
                            <a class="dropdown-item" href="../../../editerarticle.php">Editer Article</a>
                            <a class="dropdown-item" href="../../../statistiquescomments.php">Statistiques Comments</a>
                            <!-- <a class="dropdown-item" href="statistiqueslikes.php">Statistiques Likes</a>
                            <a class="dropdown-item" href="envoyermail.php">Envoyer Mail</a> -->
                            </div>
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
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
          <a href="genpdf.php" class="btn btn-small btn-primary">PDF</a>
          <form action="" method="get">
                           <div style="width: 200px;" class="input-group mb-3">
                          <input style="width: 200px; margin-left:30px;margin-top:1px; margin-right:20px; color:orange;" type="text" class="form-control" placeholder="Search name" name="chercherr" aria-label="Recipient's username" aria-describedby="basic-addon2">
                          </div>
                          <button type="submit" class="btn btn-small btn-primary" > Chercher</button>
                            </form>

                            <form action="" method="post">
          <a class="btn btn-small btn-primary" href="AfficherListeLivraison.php?tri=1">Trie</a>
        </form>
          
        <form action="" method="POST">

        <select name="adre" id="">
              <?php
				foreach($add as $adresse) {
          ?>
     <option value="<?php echo $adresse['ADRESSE']; ?>"><?php echo $adresse['ADRESSE']; ?></option>
     <?php  }?>

     
              </select>
             <?php
         if(isset($nbr)){ ?>

         <p style="color:white;">Le nombre de livraisons a <?php echo $adre; ?> est <?php echo $nbr[0]["cpt"]; ?></p>
<?php  }?>
           
              <button type="submit">Statistique</button>


              </form>

              

            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                  <th scope="col"></th>  
                  <th scope="col">ID</th>
                    <th scope="col">IDENTITY</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ADRESSE</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                <?php
				foreach($listeLivraisons as $Livraison) {
          ?>
			
      <tr>
			<td><?php echo $Livraison['AUTO_ID']; ?></td>	
      <td><?php echo $Livraison['ID']; ?></td>
				<td><?php echo $Livraison['NOM']; ?></td>
				<td><?php echo $Livraison['ADRESSE']; ?></td>
				<td><?php echo $Livraison['PHONE']; ?></td>
				<td><?php echo $Livraison['PRODUCT']; ?></td>
                <td>
                      <!--<a href="modifierLivraison.php?updateid='.$AUTO_ID.'" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>-->
                      <form method="POST" action="modifierLivraison.php" >
						          <input type="submit" name="Modifier" value="Modifier">
						          <input type="hidden" value="<?PHP echo $Livraison['AUTO_ID']; ?>" name="AUTO_ID"> 
                        
				            	</form>
               </td>
               <td>
                      <a href="supprimerLivraison.php?AUTO_ID=<?php echo $Livraison['AUTO_ID']; ?>" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a> 
              </td>
				
	
                
                <?php  }?>

                
            
                </tbody>
              </table>
            </div>
            


        
            <!-- table container -->
            <a
              href="ajouterLivraison.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
            
          </div>

             <!--*******************************************************-->

             


             


        </div>

       

        
        <script src="js/jquery-3.3.1.min.js"></script>
        <!-- https://jquery.com/download/ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- https://getbootstrap.com/ -->
        
        </script>
  </body>
</html>