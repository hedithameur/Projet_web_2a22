<?php
    include_once '../../Model/Livraison.php';
    include_once '../../Controller/LivraisonC.php';

    $error = "";

    // create Livraison
    $Livraison = null;

    // create an instance of the controller
    $LivraisonC = new LivraisonC();
    if (
        
		    isset($_POST["ID"]) &&	
        isset($_POST["NOM"]) &&		
        isset($_POST["ADRESSE"]) &&
		    isset($_POST["PHONE"]) 
        
        
    ) {
        if (
            !empty($_POST['ID']) &&
			      !empty($_POST['NOM']) &&
            !empty($_POST["ADRESSE"]) && 
			      !empty($_POST["PHONE"]) 
             
            
        ) {
            $Livraison = new Livraison(
              $_POST['ID'], 
              $_POST['ID'],
                $_POST['NOM'],
				        $_POST['ADRESSE'],
                $_POST['PHONE']
				        
                
            );
            $LivraisonC->ajouterLivraison($Livraison);
            header('Location:ordercomplete.php');
        }
        else
            $error = "Missing information";
    }
    
?>
 <?php
	include_once ('../../Controller/panierC.php');
	$panierC = new panierC();

    $id_panier = 1; // id panier de user connecté ($_SESSION['id_panier])
    
    $listeU = $panierC->afficherpanierline($id_panier);
    $subTotale = 0;
  //  $couponValue=0;
    
    
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
    <style>
     body {
    font-family: "Roboto", Arial, sans-serif;
    font-size: 16px;
    line-height: 28px;
    font-weight: 300;
    color: #fff;
    height: 100%;
    position: relative;
    background: #333333;
}
.cart-container {
  border: 1px solid rgba(0, 0, 0, 0.05);
  padding: 30px;
}
.cart-container .cart-body {
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  padding: 30px 0 20px;
  margin: 20px 0 30px;
}

    </style>
</head>


    <!-- Loader -->
    <div class="car-1-loader"></div>
    <div id="car-1-page">
        <!--Header-->
        <section id="car-1-header">
            <div class="container">
                <nav role="navigation">
                    <ul class="pull-left left-menu">
                        <li><a href="about.html">About Us</a>
                        </li>
                        <li class="active"><a href="services.html">Services</a>
                        </li>
                        <li><a href="vehicle.html">Vehicles</a>
                        </li>
                    </ul>
                    <h1 id="car-1-logo"><a href="index.html"><img src="images/logo1.png"></a></h1>
                    <ul class="pull-right right-menu">
                        <li><a href="login.html">Login</a>
                        </li>
                        <li class="car-1-cta-btn"><a href="login.html">Sign up</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section id="car-1-hero" class="no-js-fullheight" style="background-image: url(images/slider-4.jpg);" data-next="yes">
            <div class="car-1-overlay"></div>
            <div class="container">
                <div class="car-1-intro no-js-fullheight">
                    <div class="car-1-intro-text slider-contnt">
                        <div class="car-1-center-position">
                            <h3 class="animate-box"> <span>Checkout</span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="car-1-learn-more animate-box">
                <a href="#" class="scroll-btn">
                    <span class="text">Explore more</span>
                    <span class="arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                </a>
            </div>
        </section>
        <!--checkout-area start-->
        
                                <div class="col-lg-12">
					            <p>Returning customer? <a href="#">Click here</a> to login</p>
				                   </div>
                                  
                               
                        <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">ajouter livraison</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form method="post" class="tm-edit-product-form">
                  
                
                   <div class="form-group mb-3">
                    <label
                      for="NOM"
                      >name
                    </label>
                    <input
                      id="NOM"
                      name="NOM"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                    
                  
                  <div class="form-group mb-3">
                    <label
                      for="ADRESSE"
                      >ADRESSE
                    </label>
                    <input
                      id="ADRESSE"
                      name="ADRESSE"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  
                  
                    <div class="form-group mb-3">
                    <label
                      for="ID"
                      >ID
                    </label>
                    <input
                      id="ID"
                      name="ID"
                      type="int"
                      class="form-control validate"
                      required
                    />
                   </div>
                  
                  
                      <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="PHONE"
                            >phone number
                          </label>
                          <input
                            id="PHONE"
                            name="PHONE"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                            />
                          
                        </div>
                        <div class="order-details-inner">
						
                        <table>
                            <thead>
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                 foreach($listeU as $panier)
                                  {
                                   ?>
                                  <tr>
                                    <td><?PHP echo $panier['id']; ?></td>
                                    <td><strong><?PHP echo $panier['prix']; ?></strong></td>
                                </tr>
                                <?php
                                  }
                                  ?>
                                  </tbody>

                        </table>
                  </div>
                  
              </div>
              
              
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="submit">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>

        <section id="car-1-projects" class="service-sec">
            <div class="container">
                <div class="row row-bottom-padded-md">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
            <div class="container">
                <div class="contentbar">
                    <!-- Start row -->
                    
        <div id="car-1-info" class="exotic-sec">
            <div class="car-1-overlay plan-overlay"></div>
            <div class="container">
                <h2 class="car-1-lead animate-box">Experience the Exotic Car collection</h2>
                <p class="car-1-sub-lead animate-box">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    <br>has been the industry's standard.
                </p>
            </div>
        </div>
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
                                        <a href="tel:+1234567890">+12 34 567 890</a>
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
            $(document).ready(function() {
                $('.ft-col h3').click(function() {
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