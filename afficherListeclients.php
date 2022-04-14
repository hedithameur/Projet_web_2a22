<?php
	include '../Controller/clientC.php';
	$clientC=new clientC();
	$listeclients=$clientC->afficherclients(); 
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>
	<body>
	    <button><a href="ajouterclient.php">Ajouter un client</a></button>
		<center><h1>Liste des clients</h1></center>
		<table border="1" align="center">
			<tr>
				<th>IdClient</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Email</th>
				<th>NumClient</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeclients as $client){
			?>
			<tr>
				<td><?php echo $client['IdClient']; ?></td>
				<td><?php echo $client['Nom']; ?></td>
				<td><?php echo $client['Prenom']; ?></td>
				<td><?php echo $client['Adresse']; ?></td>
				<td><?php echo $client['Email']; ?></td>
				<td><?php echo $client['NumClient']; ?></td>
				<td>
					<form method="POST" action="modifierclient.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $client['IdClient']; ?> name="IdClient">
					</form>
				</td>
				<td>
					<a href="supprimerclient.php?IdClient=<?php echo $client['IdClient']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>





		<br>
		

		<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">IdClient</th>
					<th scope="col">Nom</th>
					<th scope="col">Prenom</th>
					<th scope="col">Adresse</th>
					<th scope="col">Email</th>
					<th scope="col">NumClient</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><input type="checkbox"></th>
                    <td class="tm-product-name"><?php echo $client['IdClient']; ?></td>
					<td class="tm-product-name"><?php echo $client['Nom']; ?></td>
					<td class="tm-product-name"><?php echo $client['Prenom']; ?></td>
					<td class="tm-product-name"><?php echo $client['Adresse']; ?></td>
					<td class="tm-product-name"><?php echo $client['Email']; ?></td>
					<td class="tm-product-name"><?php echo $client['NumClient']; ?></td>
                    
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  
                  
                  
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="ajouterclient.php" class="btn btn-primary btn-block text-uppercase mb-3">Ajouter client</a>
          </div>
        </div>
	</body>
</html>
