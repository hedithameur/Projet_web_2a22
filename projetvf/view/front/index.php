<?php
require '../db.php';
$message="";
$messagee="";


if(isset ($_POST['email']) && !empty ($_POST['email']) ){

    $email = $_POST['email'];
    
$sql = 'SELECT count(idclient) as cpt FROM client where email=:email';
$statement = $connection->prepare($sql);
$statement->execute([':email'=>$email]);
$nbrclient = $statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($nbrclient);
//var_dump($nbrclient[0]["cpt"]);
if($nbrclient[0]["cpt"]==0){
  
    $email = $_POST['email'];
    $pass = $_POST["pass"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $tel = $_POST["tel"];
    
    $token = uniqid(); //genere code token 

    
    $sql = 'INSERT INTO client (nom, prenom , password , email , telephone, token , statut ) VALUES(:nom  , :prenom , :pass, :email, :tel, :token, :statut  )';
    $statement = $connection->prepare($sql);      
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
                                                      
    if ($statement->execute([':nom' => $nom , ':prenom' => $prenom  , ':pass' => $pass , ':email' => $email , ':tel' => $tel, ':token'=> $token , ':statut' => 0 ] )) {
      $message = 'Votre client a été ajouter .';

      //send mail de confirmation 
      $url = "http://localhost:8081/projetvf/view/front/activation?token=$token";
      $subject = 'Activation de compte';
       $text = "Bonjour , voici votre lien pour activer votre compte : $url";
       $headers = 'Content-Type: text/plain; charset="utf-8"' . "";
       $headers = "From:safa.racheh@esprit.tn";
       mail($_POST['email'], $subject, $text, $headers);
  

    }

}else if($nbrclient[0]["cpt"]==1) {

    $message = 'Votre email est deja utiliser.';
 
}
}



 else if(isset($_POST["login"]) && !empty($_POST["login"]) )  
  {  
       if(empty($_POST["login"]) || empty($_POST["pas"]))  
       {  
            $messagee = '<label>All fields are required</label>';  
       }  
       else  
       {  
        $hashedPassword = password_hash($_POST['pas'], PASSWORD_DEFAULT); //crypter password

            $query = "SELECT * FROM client WHERE email = :login AND password = :pas AND statut = :statut";  
            $statement = $connection->prepare($query);  
            $statement->execute(  
                 array(  
                      'login'     =>     $_POST["login"],  
                      'pas'     =>      $_POST['pas'] ,
                      'statut'     =>    true ,
                      
                 )  
            );  
            $count = $statement->rowCount();  

           

            if($count > 0)  
            {  
                 $_SESSION["pas"] = $_POST["pas"];  
                 header("location:vehicle.php");  
            }
            
          
            else  
            {  
                 $messagee = '<label>Wrong Data</label>';  
            }  
       }  
  }  

    
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!----Title of website---->
        <title>Samsara</title>
        <!----Google fonts---->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
        <!----Stylesheets---->
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="js/controle.js"></script>
    </head>
    <body>
        <!-- Loader -->
        <div class="car-1-loader"></div>
        <div id="car-1-page">
            <!--Header-->
            <section id="car-1-header">
                <div class="container">
                    <nav role="navigation">
                        <!--<ul class="pull-left left-menu">
                            <li><a href="about.html">About Us</a>
                            </li>
                            <li><a href="services.html">Services</a>
                            </li>
                            <li><a href="vehicle.html">Vehicles</a>
                            </li>
                        </ul>-->
                        <h1 id="car-1-logo"><a href="index.html"><img src="images/logo1.png"></a></h1>

                         <!--*****************vue******************-->
                <?php 
                        require_once 'compteur/compteurr.php';
                         ajouter_vue(); ?>
                         <H6>Nombre de vue</H6>
            <i class="fa fa-eye" aria-hidden="true"><?= nombre_vue();?></i>
                  

                    <!--*****************fin vue******************-->
                       <!-- <ul class="pull-right right-menu">
                            <li><a href="contact.html">Contact us</a>
                            <li class="active"><a href="login.html">Login</a>
                            </li>
                            <li class="car-1-cta-btn"><a href="login.html">Sign up</a>
                            </li>
                        </ul>-->
                    </nav>
                </div>
            </section>
           
               
            <section id="login-sec">
                <div class="container login-sec">

               


                    <form class="login-form" method="post" name="myForm" id="myform" onsubmit="return verif()">
                        <ul>
                        <?php if(!empty($messagee)): ?>
        <div class="alert alert-success">
          <?= $messagee; ?>
        </div>
      <?php endif; ?>
                            <h2>Login</h2>
                            <li><input type="text" name="login" placeholder="Email" class="login-txt"></li>
                            <li><input type="password" name="pas" placeholder="Password" class="login-txt"></li>
                            
                            <li><button type="submit" class="btn btn-primary login-btn" value="Login">Login</button></li>
                            <!--<a href="vehicle.php" class="btn btn-primary">login</a>-->
                            <li><a href="forget_password.php">Mot de passe oublié ?</a></li>
                        </ul>
                        <span>or</span>
                        <ul>
                        <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      
                            <h2>Signup</h2>
                            <li><input type="text" name="nom" placeholder="Nom" class="login-txt"></li>
                            <p style="color: red;" id="erreur"></p>
                            <li><input type="text" name="prenom" placeholder="Prenom" class="login-txt"></li>
                            <p style="color: red;" id="erreurp"></p>
                            <li><input type="number" name="tel" placeholder="Telephone" class="login-txt"></li>
                            <p style="color: red;" id="erreurt"></p>
                            <li><input type="text" name="email" placeholder="Email" class="login-txt"></li>
                            <p style="color: red;" id="erreure"></p>
                            <li><input type="text" name="pass" placeholder="Password" class="login-txt"></li>
                            <p style="color: red;" id="erreurpa"></p>
                            <li><button type="submit" class="btn btn-primary login-btn" value="Login">singup</button></li>
                        </ul>
                    </form>
                </div>
            </section>
            
            <footer id="car-1-footer">
                <div class="footer-sec">
                    <div class="car-1-overlay plan-overlay"></div>
                    <div class="container">
                        <div class="row row-bottom-padded-md">
                            <div class="col-md-3 col-sm-3 animate-box col-xs-12 full-width">
                                <div class="car-1-footer-widget ft-col">
                                    <h3>Company <span class="pls pull-right"><i class="fa fa-plus"></i></span></h3>
                                    <ul class="car-1-links ac-ul">
                                        <li><a href="#">About Us</a>
                                        </li>
                                        <li><a href="#">Luxury cars</a>
                                        </li>
                                        <li><a href="#">Feature Cars</a>
                                        </li>
                                        <li><a href="#">Pricing</a>
                                        </li>
                                        <li><a href="#">Team</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 animate-box col-xs-12 full-width">
                                <div class="car-1-footer-widget ft-col">
                                    <h3>Support <span class="pls pull-right"><i class="fa fa-plus"></i></span></h3>
                                    <ul class="car-1-links ac-ul">
                                        <li><a href="#">Knowledge Base</a>
                                        </li>
                                        <li><a href="#">24/7 Call Support</a>
                                        </li>
                                        <li><a href="#">Video Demos</a>
                                        </li>
                                        <li><a href="#">Terms of Use</a>
                                        </li>
                                        <li><a href="#">Privacy Policy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 animate-box col-xs-12 full-width">
                                <div class="car-1-footer-widget ft-col">
                                    <h3>Contact Us <span class="pls pull-right"><i class="fa fa-plus"></i></span></h3>
                                    <ul class="ac-ul">
                                        <p>
                                            <a href="#">info@yourwebsite.com</a>
                                            <br> 123 East Street,
                                            <br> New York NY 10016
                                            <br>
                                            <a href="tel:+1234567890">+12 34  567 890</a>
                                        </p>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 animate-box col-xs-12 full-width">
                                <div class="car-1-footer-widget ft-col">
                                    <h3>Follow Us <span class="pls pull-right"><i class="fa fa-plus"></i></span></h3>
                                    <ul class="car-1-social ac-ul">
                                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-1-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="car-1-left"><small>&copy; 2016 All Rights Reserved.</small>
                                </p>
                                <p class="car-1-right"><small class="car-1-right"></small>
                                </p>
                            </div>
                        </div>
                         <div class="premium-tagline">
                             <p>Created By: <a href="https://www.premium-themes.co/" target="_blank">Premium Themes</a></p>
                             <a href="../product-admin-master/login.php">Admin</a>
                        </div>
                       
                    </div>
                </div>
            </footer>
        </div>
        <!--Jquery-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script src="js/jquery.style.switcher.js"></script>
        <script type="text/javascript">
            if ($(window).width() < 767) {
                 $(document).ready(function () {
                      $('.ft-col h3').click(function () {
                          $('ul.ac-ul').slideUp('500');
                          $('h3').children('span').html('<i class="fa fa-plus"></i>');  
                          var text = $(this).parent().children('ul.ac-ul');
            
                          if (text.is(':hidden')) {
                            text.slideDown('500');
                            $(this).children('span').html('<i class="fa fa-minus"></i>');   
                          } else {
                            text.slideUp('500');
                            $(this).children('span').html('<i class="fa fa-plus"></i>');    
                          }
                    
                        });
            
                      });
            
                  }
                    
        </script>   
        <script>
            $(function() {
                $('#colour-variations ul').styleSwitcher({
                    defaultThemeId: 'theme-switch',
                    hasPreview: false,
                    cookie: {
                        expires: 30,
                        isManagingLoad: true
                    }
                });
                $('.option-toggle').click(function() {
                    $('#colour-variations').toggleClass('sleep');
                });
            });
        </script>
        <script src="js/main.js"></script>
        <script src="js/jquery.cookie.js"></script>
        <script>
            $(function() {
            
                if ($.cookie('layoutCookie') != '') {
                    $('body').addClass($.cookie('layoutCookie'));
                }
            
                $('a[data-layout="boxed"]').click(function(event) {
                    event.preventDefault();
                    $.cookie('layoutCookie', 'boxed', {
                        expires: 7,
                        path: '/'
                    });
                    $('body').addClass($.cookie('layoutCookie')); // the value is boxed.
                });
            
                $('a[data-layout="wide"]').click(function(event) {
                    event.preventDefault();
                    $('body').removeClass($.cookie('layoutCookie')); // the value is boxed.
                    $.removeCookie('layoutCookie', {
                        path: '/'
                    }); // remove the value of our cookie 'layoutCookie'
                });
            });
        </script>
    </body>
</html>