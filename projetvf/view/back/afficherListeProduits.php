<?php
	include_once '../../controller/ProduitC.php';
  include_once '../../controller/CategorieC.php';
	$produitC=new produitC();
	
  $categorieC=new categorieC();
	$listeCategories=$categorieC->affichercategorie(); 

  $chercherr=$_GET['chercherr'] ?? '';
  $trie=$_GET["trie"] ?? '';

  if($chercherr){
    $pdo = config::getConnexion();
			$query = $pdo -> prepare('SELECT * FROM produit WHERE marque = :marque');
			$query -> execute(['marque' => $chercherr]);
	    $listeProduits= $query-> fetchAll();
   
   // $statement->execute();
   // $listeProduits = $statement->fetchAll(PDO::FETCH_OBJ);

  }else if ($trie){
    $pdo = config::getConnexion();
    $query = $pdo -> prepare('SELECT * FROM produit ORDER BY prix DESC');
    $query->execute();
    $listeProduits= $query-> fetchAll();
    
  }else{
    
    $listeProduits=$produitC->afficherproduit(); 

  }



?>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>product</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->   
	</head>
	<body id="reportsPage">
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

        
           
            
            <li class="nav-item">
              <a class="nav-link active" href="afficherListeProduits.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="accounts.php">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Commandes.php">
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
                            <a class="dropdown-item" href="AjouterArticle.php">Ajouter Article</a>
                            <a class="dropdown-item" href="editerarticle.php">Editer Article</a>
                            <a class="dropdown-item" href="statistiquescomments.php">Statistiques Comments</a>
                            <!-- <a class="dropdown-item" href="statistiqueslikes.php">Statistiques Likes</a>
                            <a class="dropdown-item" href="envoyermail.php">Envoyer Mail</a> -->
                            </div>
                        </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
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


                        


	<div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">



			<h2 class="tm-block-title">Liste des voitures</h2>

      <form action="" method="get">
                          <div style="width: 200px;" class="input-group mb-3">
                          <input style="width: 200px; margin-left:30px;margin-top:1px; margin-right:20px; color:orange;" type="text" class="form-control" placeholder="Chercher voiture" name="chercherr" aria-label="Recipient's username" aria-describedby="basic-addon2">
                          </div>
                          <button type="submit" class="btn btn-small btn-primary" > Chercher</button>

    
          <a  class="btn btn-small btn-primary" href="afficherListeProduits.php?trie=1">Trier par prix</a>
    </form>    

   <!-- <a href="genpdf.php" class="btn btn-small btn-primary">PDF</a> -->
      
		<table class="table table-hover tm-table-small tm-product-table" border="1" align="center">

		<thead>
			<tr>
			<!--	<th scope="col">&nbsp;</th>  -->
				<th scope="col">ID</th>
				<th scope="col">Marque</th>
				<th scope="col">Modele</th>
        <th scope="col">Images</th>
				<th scope="col">Prix</th>
				<th scope="col">Categorie</th>
				<th scope="col">&nbsp;</th>
				

			</tr>
		</thead>
    <tbody>
		
			<?php
				foreach($listeProduits as $produit){
			?>
			<tr>
<!--			<th scope="row"><input type="checkbox" /></th>  -->
                    <td class="tm-product-name"><?php echo $produit['id']; ?></td>
                    <td><?php echo $produit['marque']; ?></td>
                    <td><?php echo $produit['modele']; ?></td>
                    <th scope="col"><img src="<?php echo $produit['image']; ?>" alt="" style="length:100px;width:100px"></th>
                    <td><?php echo $produit['prix'];?></td>
                    <td>
                   

                      <?php
                      $ida=$produit['id_c'];
                      $sql="SELECT * FROM categorie where id=:id ";
                      $db = config::getConnexion();
                      $req=$db->prepare($sql);
                     // $req->bindValue(':id', $ida);
                      $req->execute([':id'=>$ida]);
                      $comm = $req->fetchAll(PDO::FETCH_OBJ);
                      
                     
				foreach($comm as $cat){
			?>
     <p> 
     (<?php echo $produit['id_c'];?>)
      <?= $cat->nomC?>
    </p> 

<?php
				}
			?>
                  
                  </td>
				
        <td>
				  <a href="modifierproduit.php?id=<?php echo $produit['id']; ?>">Modifier</a>
			
					<a href="supprimerproduit.php?id=<?php echo $produit['id']; ?>">Supprimer</a>
				</td>
			</tr>
        </tbody>
			<?php
				}
			?>
		</table>

    
    
  </div>










  <a
              href="ajouterproduit.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Ajouter Produit</a>
<!--            <button class="btn btn-primary btn-block text-uppercase">
              Delete selected products
            </button>  -->

          </div>
        </div>



  <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">

              <thead>
			<tr>
			<!--	<th scope="col">&nbsp;</th>  -->
				<th scope="col">ID</th>
				<th scope="col">Nom categorie</th>
				<th scope="col">&nbsp;</th>
				<th scope="col">&nbsp;</th>

        

			</tr>
		</thead>

    <tbody>
    <?php
				foreach($listeCategories as $categorie){
			?>

  <tr>
          <td class="tm-product-name"><?php echo $categorie['id']; ?></td>
          <td ><?php echo $categorie['nomC']; ?></td>         
          <td>
				  <a href="modifiercategorie.php?idC=<?php echo $categorie['id']; ?>">Modifier</a>
				</td>
				<td>
					<a href="supprimercategorie.php?idC=<?php echo $categorie['id']; ?>">Supprimer</a>
				</td>
                  </tr>
                </tbody>
                <?php
				}
			?>
                
              </table>
            </div>
            <a
              href="ajoutercategorie.php"
              class="btn btn-primary btn-block text-uppercase mb-3">
              Ajouter categorie</a>

          </div>
        </div>
      </div>
    </div>



		<footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2022</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>
		<script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "modifierproduit.php";
        });
      });
    </script>

	</body>
</html>
