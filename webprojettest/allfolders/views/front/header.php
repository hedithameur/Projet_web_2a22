<?php
function current_url()
{
    $url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
    $validURL = str_replace("&", "&amp", $url);
    return $validURL;
}
//echo " Page url is : " . current_url();
$newstring = current_url();
$pos = strrpos($newstring, '/', 26);
//echo " Pose est : " . $pos;

$fstring = substr($newstring, $pos + 1, 12);

//echo " la page name est : " . $fstring;

?>

<!--header-->

<html lang="en">

<head>
    <title>Virupedia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<div class="site-wrap">


    <div class="site-navbar py-2">

        <div class="search-wrap">
            <div class="container">
                <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                </form>
            </div>
        </div>
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="index.php" class="js-logo-clone"><strong class="text-primary">Viru</strong>pedia</a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">


                            <!--   <?php // if (strcmp($fstring, "index.php")) {
                                    ?> <li class="active"><a href="index.php">Home</a></li>
                            <?php // } 
                            ?> -->



                            <li <?php if (strcmp($fstring, "index.php")) { ?> class="desactive" <?php  } else { ?> class="active" <?php  } ?>><a href="index.php">Home</a></li>



                            <li <?php if (strcmp($fstring, "shop.php")) { ?> class="desactive" <?php  } else { ?> class="active" <?php  } ?>><a href="shop.php">Store</a></li>
                            <li class="has-children">

                                <a href="#">Products</a>
                                <ul class="dropdown">
                                    <li><a href="products.php">Product's List</a></li>
                                </ul>
                            </li>

                            <li <?php if (strcmp($fstring, "blogs.php")) { ?> class="desactive" <?php  } else { ?> class="active" <?php  } ?>><a href="blogs.php">Blogs</a></li>
                            <li <?php if (strcmp($fstring, "events.php")) { ?> class="desactive" <?php  } else { ?> class="active" <?php  } ?>><a href="events.php">Events</a></li>
                            <li <?php if (strcmp($fstring, "suggestion.php")) { ?> class="desactive" <?php  } else { ?> class="active" <?php  } ?>><a href="suggestion.php">suggestion</a></li>
                            <li <?php if (strcmp($fstring, "about.php")) { ?> class="desactive" <?php  } else { ?> class="active" <?php  } ?>><a href="about.php">About</a></li>
                            <li <?php if (strcmp($fstring, "contact.php")) { ?> class="desactive" <?php  } else { ?> class="active" <?php  } ?>><a href="contact.php">Contact</a></li>

                        </ul>
                    </nav>
                </div>

                <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                    <a href="cart.php" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        <span class="number">2</span>
                    </a>
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                </div>
            </div>
        </div>
    </div>


    <!-- //header -->