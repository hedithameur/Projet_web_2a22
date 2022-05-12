<?php


include_once '../Model/Livraison.php';
include '../Controller/LivraisonC.php';

	
  $LivraisonC=new LivraisonC();
$liv=$LivraisonC->afficherLivraison(); 
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
 border-color:black;
 
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
 
        
    <img class="logo" style="margin-left:200px;
    margin-top:5px;
    width:300px;
    length:2000px;" src="img/logooooS.png" alt="">
   




    

    <h1>Liste des Livraisons</h1>
    

    <table>
    <tbody>
          <tr>
          <th>ID</th>
          <th>nom</th>
          <th>adresse</th>
          <th>telephone</th>
          <th>produit</th>
         
         
         
          
          
        </tr>
        <?php foreach($liv as $type): ?>
          <tr>
            <td><?php echo $type["ID"] ; ?></td>
            <td><?php echo $type["NOM"] ; ?></td>      
            <td><?php echo $type["ADRESSE"] ; ?></td>    
            <td><?php echo $type["PHONE"] ; ?></td>        
            <td><?php echo $type["PRODUCT"] ; ?></td> 
            
           
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>