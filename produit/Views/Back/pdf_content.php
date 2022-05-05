<?php
//require '../db.php';
include_once '../../config.php';

$pdo = config::getConnexion();
$query = $pdo -> prepare('SELECT * FROM produit');
$query->execute();
$produit = $query->fetchAll(PDO::FETCH_OBJ);
 ?>



<?php
//require '../db.php';
include_once '../../config.php';



$pdo = config::getConnexion();
$query = $pdo -> prepare('SELECT count(id) as cpt  FROM produit');
$query->execute();
$nbrproduit = $query->fetchAll(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        table{
            width: 100%;
            border-width:1px; 
            border-style:solid; 
            border-color:red;
 
        }
        h1{
            font-family : arial;
            color:black;
        }
        p{
            font-family : arial;
            color:red;
        }
        
        
        td { 
 border-width:1px;
 border-style:solid; 
 border-color:red;
 width:50%;
 }
 .logo{
    margin-left:10px;
    margin-top:5px;
    width:100px;
    length:600px;
 }
    </style>
</head>
<body>  <!--  style="background-image:url('back.jpg');"-->
    <table >
        <th><H1>SAMSARA</H1></th>
    <th><img class="logo" src="assets/images/logooooS.png" alt=""></th>
    <th><p style='margin-top:30px;'><?php 
$DateAndTime = date('m-d-Y h:i:s', time());  
echo "The Download PDF date $DateAndTime.";?></p>
      <p></p>
</th>
</table>
    
<h1>Totale des produits : <?php echo $nbrproduit[0]["cpt"]; ?></h1>


    

    <h1>Liste des produits </h1>
    

    <table>
    <tbody>
          <tr>
          <th>ID</th>
          <th>marque</th>
          <th>modele</th>
          <th>image</th>
          <th>prix</th>
         
         
          
          
        </tr>
        <?php foreach($produit as $type): ?>
          <tr>
            <td><?= $type->id; ?></td>
            <td><?= $type->marque; ?></td>      
            <td><?= $type->modele; ?></td>    
            <td><?= $type->image; ?></td>        
            <td><?= $type->prix; ?></td> 
           
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>