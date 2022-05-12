<?php
	include '../../Controller/CategorieC.php';
	$categorieC=new categorieC();
	$listecategories=$categorieC->affichercategorie(); 
?>
<html>
	<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Category</title>
	</head>
	<body>
	    <button><a href="ajoutercategorie.php">Ajouter un Categorie</a></button>
		<center><h1>Liste des categories</h1></center>
		<table border="1" align="center">
			<tr>
				<th>ID</th>
				<th>Nom du categorie</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listecategories as $categorie){
			?>
			<tr>
				<td><?php echo $categorie['id']; ?></td>
				<td><?php echo $categorie['nomC']; ?></td>
				<td>
				  <a href="modifiercategorie.php?idC=<?php echo $categorie['id']; ?>">Modifier</a>
				</td>
				<td>
					<a href="supprimercategorie.php?idC=<?php echo $categorie['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
