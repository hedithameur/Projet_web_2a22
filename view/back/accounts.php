<?php
require '../db.php';
$message="";


$chercherr=$_GET['chercherr'] ?? '';
$tri=$_GET["tri"] ?? '';
if($chercherr){
  $sql = 'SELECT * FROM admin where email LIKE :email';
  $statement = $connection->prepare($sql);
  $statement->bindValue(':email' , "%$chercherr%");
}
else if ($tri){
  $sql = 'SELECT * FROM admin ORDER BY date DESc ';
  $statement = $connection->prepare($sql);
  
}
else {
$sql = 'SELECT * FROM admin  ';
$statement = $connection->prepare($sql);

}
$statement->execute();
$admin = $statement->fetchAll(PDO::FETCH_OBJ);



 ?>

<?php



$sql = 'SELECT count(idclient) as cpt  FROM client';
$statement = $connection->prepare($sql);
$statement->execute();
$nbrclient = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<?php


$chercher=$_GET['chercher'] ?? '';

if($chercher){
  $sql = 'SELECT * FROM client where nom LIKE :nom';
  $statement = $connection->prepare($sql);
  $statement->bindValue(':nom' , "%$chercher%");
}
else{


//pagination

if(isset($_GET['page'])){
$page=(int)$_GET['page'] ;
}else{
$page=1;
}
$nbr_ele_par_page=3;
$nbr_page=ceil($nbrclient[0]['cpt']/$nbr_ele_par_page);
$debut=$nbr_ele_par_page*($page-1);


$sql = 'SELECT * FROM client LIMIT :debut,:nbr_ele_par_page; ';
$statement = $connection->prepare($sql);
$statement->bindValue(':debut' ,$debut , PDO::PARAM_INT);
$statement->bindValue(':nbr_ele_par_page' , $nbr_ele_par_page , PDO::PARAM_INT);


}
$statement->execute();
$client = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
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
                aria-expanded="false">
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
              <a class="nav-link " href="products.html">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="accounts.html">
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
          <H3>Admin</H3>
        <form action="" method="post">
          <a class="btn btn-small btn-primary" href="accounts.php?tri=1">tri</a>
        </form>
          

          
      
          <form action="" method="get">
                           <div style="width: 200px;" class="input-group mb-3">
                          <input style="width: 200px; margin-left:30px;margin-top:1px; margin-right:20px; color:orange;" type="text" class="form-control" placeholder="Search email" name="chercherr" aria-label="Recipient's username" aria-describedby="basic-addon2">
                          </div>
                          <button type="submit" class="btn btn-small btn-primary" > Chercher</button>
                            </form>
            <div class="tm-product-table-container">
            
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Date ajout</th>
                 
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($admin as $rox) :  ?>
                  <tr>
                  <td><?= $rox->idadmin ?></td>
                    <td class="tm-product-name"><?= $rox->email ?></td>
                    <td><?= $rox->password ?></td>
                    <td><?= $rox->date ?></td>
                 
                    <td>
                      <a href="delete-admin.php?id=<?= $rox->idadmin ?>" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>

                      <a href="edit-admin.php?id=<?= $rox->idadmin ?>" class="tm-product-delete-link">
                        <i class="fa fa-cog tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach;?>
      
                 
              
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add-product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new Admin</a>
           
          </div>
        </div>
       
      </div>
    </div>

    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          
          <div class="tm-bg-primary-dark tm-block tm-block-products">
          <H3>users</H3>
          <form action="" method="GET">
                           <div style="width: 200px;" class="input-group mb-3">
                          <input style="width: 200px; margin-left:30px;margin-top:30px; margin-right:20px; color:orange;" type="text" class="form-control" placeholder="Search nom" name="chercher" aria-label="Recipient's username" aria-describedby="basic-addon2">
                          </div>
                          <button type="submit" class="btn btn-small btn-primary"> Chercher</button>
                            </form>

            <div class="tm-product-table-container">
           
              <a href="genpdf.php" class="btn btn-small btn-primary">PDF</a>
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Penom</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                 
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($client as $rox) :  ?>
                  <tr>
                  <td><?= $rox->idclient ?></td>
                    <td class="tm-product-name"><?= $rox->nom ?></td>
                    <td><?= $rox->prenom ?></td>
                    <td><?= $rox->telephone ?></td>
                    <td><?= $rox->email ?></td>
                    <td><?= $rox->password ?></td>
                 
                    <td>
                      <a href="delete-client.php?id=<?= $rox->idclient ?>" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>

                      <a href="edit-client.php?id=<?= $rox->idclient ?>" class="tm-product-delete-link">
                        <i class="fa fa-cog tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach;?>
      
                 
              
                </tbody>
              </table>
            </div>
            <?php if(!$chercher){?>

<!--********************************PAGINATION********************************************-->                        
<div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <?php
                                        
                                        for($i=1 ; $i<=$nbr_page ; $i++) : ?>
                                    <li class="page-item "><a class="page-link" style="background-color:orange;color:white;" href="?page=<?= $i?>"><?php echo $i ?></a></li>
                                          <?php  endfor ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>  
    <!--********************************END PAGINATION********************************************-->   

    <?php };?>
            <!-- table container -->
            <a
              href="add-client.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new Client</a>
           
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
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>
  </body>
</html>