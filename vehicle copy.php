<?php
    include_once '../../config.php';
    include_once '../../Model/Produit.php';
    include_once '../../Model/Categorie.php';
    include_once '../../Controller/ProduitC.php';
    include_once '../../Controller/CategorieC.php';

    require "vote.php";

    $categorieC=new categorieC();
	$listeCategories=$categorieC->affichercategorie(); 
    $produitC=new produitC();
	$listeproduit=$produitC->afficherproduit(); 

    $vote=false;
    if(isset($_SESSION['user_id']))
    {
        $req=$pdo->prepare('SELECT * FROM vote WHERE ref=? AND ref_id=? AND user_id = ?');
        $req->execute(['produit',$_GET['id'],$_SESSION['uder_id']]);
        $vote =$req->fetch();
    }

    $req=$pdo->prepare("SELECT * FROM produit WHERE matricule = ?");
    $req->execute([$_GET['id']]);
    $vote =$req->fetch();  


?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!----Title of website---->
        <title>Cartasy</title>
        <!----Google fonts---->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
        <!----Stylesheets---->
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/flexslider.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!-- Loader -->
        <div class="car-1-loader"></div>
        <div id="car-1-page">
            <!--Header-->
            <section id="car-1-header">
                <div class="container">
                    <nav role="navigation">
                        <ul class="pull-left left-menu">
                            <li><a href="assets/about.html">About Us</a>
                            </li>
                            <li><a href="assets/services.html">Services</a>
                            </li>
                            <li class="active"><a href="vehicle.php">Vehicles</a>
                            </li>
                        </ul>
                        <h1 id="car-1-logo"><a href="assets/index.html"><img src="assets/images/logo_samsara.png"></a></h1>
                        <ul class="pull-right right-menu">
                             <li><a href="contact.html">Contact us</a>
                            <li><a href="login.html">Login</a>
                            </li>
                            <li class="car-1-cta-btn"><a href="assets/login.html">Sign up</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
            <!--Banner-->
            <section id="car-1-hero" class="no-js-fullheight" style="background-image: url(images/slider-5.jpg);" data-next="yes">
                <div class="car-1-overlay"></div>
                <div class="container">
                    <div class="car-1-intro no-js-fullheight">
                        <div class="car-1-intro-text">
                            <div class="car-1-center-position">
                                <h3 class="animate-box">Rent an Exotic <span>Vehicle</span></h3>
                                <h4 class="animate-box fadeInUp animated">Lorem Ipsum is simply dummy text of the printing. Lorem Ipsum is simply<br> dummy text of the printing and typesetting industry.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-1-learn-more animate-box">
                    <a href="#" class="scroll-btn">
                    <span class="text">See Our Vehicles</span>
                    <span class="arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </a>
                </div>
            </section>


            <section id="car-1-features-2" class="holiday-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-sm-push-6">
                            <figure class="car-1-feature-image animate-box audi-car">
                                <img src="assets/images/audi.png" alt="">
                            </figure>
                        </div>
                        <div class="col-sm-5 col-sm-pull-7">
                            <h2 class="car-1-lead animate-box">AUDI A5</h2>
                            <div class="vehicle-info">
 <!--                              <p class="animate-box">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                <ul>
                                    <li class="animate-box">Matricule <span>4 Hours</span>
                                    </li>
-->                                     
                                    <li class="animate-box">Marque <span>Audi</span>
                                    </li>
                                    <li class="animate-box">Modele <span>A5</span>
                                    </li>
                                    <li class="animate-box">Categorie<span>nouvelle arrivee</span>
                                    </li>
                                    <li class="animate-box">Prix <span>200 900 DT</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="car-1-btn-action animate-box">
                                <a href="login.html" class="btn btn-primary btn-cta">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <hr>


            <?php
				foreach($listeproduit as $produit){
			?>
<section id="car-1-features-2" class="holiday-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-sm-push-6">
                            <figure class="car-1-feature-image animate-box audi-car">
  <!--                                 <img src="assets/images/audi.png" alt="">          -->  
                            </figure>
                        </div>
                        <div class="col-sm-5 col-sm-pull-7">
                            <h2 class="car-1-lead animate-box"><?php echo $produit['marque']; ?> - <?php echo $produit['modele']; ?></h2>
                            <div class="vehicle-info">
 <!--                              <p class="animate-box">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                <ul>
                                    <li class="animate-box">Matricule <span>4 Hours</span>
                                    </li>
-->                                     
                                    <li class="animate-box">Marque <span><?php echo $produit['marque']; ?></span>
                                    </li>
                                    <li class="animate-box">Modele <span><?php echo $produit['modele']; ?></span>
                                    </li>
                                    <li class="animate-box">Categorie<span><?php 
                                    foreach($listeCategories as $categorie){
                                    if($produit['categorie']==$categorie['idC'])
                                    {echo $categorie['nomC'];}} ?></span>
                                    </li>
                                    <li class="animate-box">Prix <span><?php echo $produit['prix_pr'];?></td> DT</span>
                                    </li>
                                </ul>
                            </div>
                            
                
            


    <div class="vote <? vote::getclass($vote); ?>">
    <div class="vote_bar">
        <div class="vote_progress" 
        style="width: <?= ($post->like_count + $post->like_count) == 0 ? 100: round(100*($post->like_count /($post->like_count + $post->like_count)));?> %; "></div>
    </div>     
    <div class="vote_btns animate-box">
        <form action="like.php?ref=produit&ref_id=1001-1&vote=1" method="POST">
        <button type="submit" class="vote_btn vote_like  btn btn-primary ">
            <i class="fa fa-thumbs-up"></i> <?php echo $produit['like_count']; ?></button>
            </form>                                

        <form action="like.php?ref=produit&ref_id=1001-1&vote=-1" method="POST">
        <button type="submit" class="vote_btn vote_dislike btn btn-primary">
            <i class="fa fa-thumbs-down"></i> <?php echo $produit['like_count']; ?></button>
            </form> 
    </div>                                    
    </div> 






                            <div class="car-1-btn-action animate-box">
                                <a href="login.html" class="btn btn-primary btn-cta">Book Now</a>
                            </div>
                        </div>
                    </div>
    </div>
    </section>
                 
    


<hr>
            <?php
				}
			?>  







<!--           <section id="car-1-pricing" class="vehicles">
                <div class="container">
                    <ul>
                        <li class="col-lg">
                            <div class="vehicle-img" style="background-image: url(images/slider-5.jpg);">
                                <div class="vehicle-ovrlay">
                                    <p>Lorem ipsum
                                        <br>
                                        <a href="login.html">Book now</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm">
                            <div class="vehicle-img" style="background-image: url(images/rent-car-1.jpg);">
                                <div class="vehicle-ovrlay">
                                    <p>Lorem ipsum
                                        <br>
                                        <a href="login.html">Book now</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm">
                            <div class="vehicle-img" style="background-image: url(images/trip-img-1.jpg);">
                                <div class="vehicle-ovrlay">
                                    <p>Lorem ipsum
                                        <br>
                                        <a href="login.html">Book now</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg">
                            <div class="vehicle-img" style="background-image: url(images/slider-2.jpg);">
                                <div class="vehicle-ovrlay">
                                    <p>Lorem ipsum
                                        <br>
                                        <a href="login.html">Book now</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg">
                            <div class="vehicle-img" style="background-image: url(images/slider-5.jpg);">
                                <div class="vehicle-ovrlay">
                                    <p>Lorem ipsum
                                        <br>
                                        <a href="login.html">Book now</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm">
                            <div class="vehicle-img" style="background-image: url(images/rent-car-2.jpg);">
                                <div class="vehicle-ovrlay">
                                    <p>Lorem ipsum
                                        <br>
                                        <a href="login.html">Book now</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

-->            
            
            <section id="car-1-subscribe">
                <div class="container">
                    <h3 class="animate-box"><label for="email">Subscribe to our newsletter</label></h3>
                    <form action="#" method="post" class="animate-box">
                        <i aria-hidden="true" class="fa fa-paper-plane car-1-icon"></i>
                        <input type="email" class="form-control" placeholder="Enter your email" id="email" name="email">
                        <input type="submit" value="Send" class="btn btn-primary">
                    </form>
                </div>
            </section>
            <!--Footer-->
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
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!--Jquery-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.flexslider-min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/magnific-popup-options.js"></script>
        <script src="assets/js/jquery.style.switcher.js"></script>
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
        <script src="assets/js/main.js"></script>
        <script src="assets/js/jquery.cookie.js"></script>
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