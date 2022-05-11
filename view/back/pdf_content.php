<?php
require '../db.php';

$sql = 'SELECT * FROM client';
$statement = $connection->prepare($sql);
$statement->execute();
$client = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>



<?php
require '../db.php';

$sql = 'SELECT count(idclient) as cpt  FROM client';
$statement = $connection->prepare($sql);
$statement->execute();
$nbrclient = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    <th><img class="logo" src="img/logooooS.png" alt=""></th>
    <th><p style='margin-top:30px;'><?php 
$DateAndTime = date('m-d-Y h:i:s', time());  
echo "The Download PDF date $DateAndTime.";?></p>
      <p></p>
</th>
</table>
    
<h1>Totale des clients : <?php echo $nbrclient[0]["cpt"]; ?></h1>


    

    <h1>Liste des clients</h1>
    

    <table>
    <tbody>
          <tr>
          <th>ID</th>
          <th>nom</th>
          <th>prenom</th>
          <th>password</th>
          <th>email</th>
          <th>telephone</th>
         
         
          
          
        </tr>
        <?php foreach($client as $type): ?>
          <tr>
            <td><?= $type->idclient ; ?></td>
            <td><?= $type->nom; ?></td>      
            <td><?= $type->prenom; ?></td>    
            <td><?= $type->password; ?></td>        
            <td><?= $type->email; ?></td> 
            <td><?= $type->telephone; ?> </td> 
           
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>