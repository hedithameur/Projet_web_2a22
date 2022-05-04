<?php
	include_once ('../../Controller/commandeC.php');
	$commandeC = new commandeC();

    $id_panier = 1; // id panier de user connecté ($_SESSION['id_panier])
    
    $listeU = $commandeC->affichercommande();
    $subTotale = 0;
    
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
     body{
    background: #f4f5f7;
    margin-top:20px;
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

<body>
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
                            <h3 class="animate-box"> <span>Panier</span></h3>
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
        <section id="car-1-projects" class="service-sec">
            <div class="container">
                <div class="row row-bottom-padded-md">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <h2 class="car-1-lead animate-box">Mon Panier</h2>
                        <p class="car-1-sub-lead animate-box">Les articles seront réservés pendant 60 minutes</p>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
            <div class="container">
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row">
                        <!-- Start col -->
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-header">
                                    <h5 class="card-title">Cart</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10 col-xl-8">
                                            <div class="cart-container">
                                                <div class="cart-head">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Action</th>
                                                                    <th scope="col">mode de paiement</th>
                                                                    <th scope="col">date</th>
                                                                    <th scope="col">status</th>
                                                                    <th scope="col" class="text-right">prix</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                foreach($listeU as $panier) {
                                                                    $prix = $panier['prix']; 
                                                                    
                                                             ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $panier['id']; ?></th>
                                                                    <td><a href="supprimerCommande.php?id=<?php echo $panier['id']; ?>" class="text-danger"><i class="ri-delete-bin-3-line"></i></a>
                                                                    
                                                                    <td><?php echo $panier['mode_paiement']; ?></td>
                                                                    <td>
                                                                    <?php echo $panier['date']; ?>
                                                                </td>
                                                                
                                                                    <td>en cours de traitement</td>
                                                                    <td class="text-right">$<?php echo $prix; ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                    </div>
                    <!-- End row -->
                </div>
            </div>
        </section>
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