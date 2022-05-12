<?php
//    include_once '../../config.php';
    include_once '../../controller/Produit.php';
    include_once '../../controller/Categorie.php';
    include_once '../../controller/ProduitC.php';
    include_once '../../controller/CategorieC.php';
    $categorieC=new categorieC();
	$listeCategories=$categorieC->affichercategorie(); 
    $produitC=new produitC();
	$listeproduit=$produitC->afficherproduitfront();
    
    

$pdo = config::getConnexion();
$query = $pdo -> prepare('SELECT count(id) as cpt  FROM produit');
$query->execute();	
$nbrproduit =  $query-> fetchAll(PDO::FETCH_ASSOC);

$chercher=$_GET['chercher'] ?? '';

/*if($chercher){
    $pdo = config::getConnexion();
    $query = $pdo -> prepare('SELECT * FROM produit where marque LIKE :marque');
    $query -> execute(['marque' => $chercher]);

}
else{
if(isset($_GET['page'])){
$page=(int)$_GET['page'] ;
}else{
$page=1;
}*/
//$nbr_ele_par_page=3;
$nbr_page=ceil($nbrproduit[0]['cpt']/3);
//$debut=$nbr_ele_par_page*($page-1);

/*$pdo = config::getConnexion();
$query = $pdo -> prepare('SELECT * FROM produit LIMIT :debut,:nbr_ele_par_page; ');

$query->bindValue(':debut' ,$debut , PDO::PARAM_INT);
$query->bindValue(':nbr_ele_par_page' , $nbr_ele_par_page , PDO::PARAM_INT);
*/

//$query -> execute(['debut' => $debut]);
//$query -> execute(['nbr_ele_par_page' => $nbr_ele_par_page]);


//}
//$query->execute();
//$listeProduits= $query-> fetchAll(PDO::FETCH_OBJ);

/*$page=(int)$_GET["page"] ;
if($page=="" || $page=="1")
{
    $page1=0;
}
else
{
    $page1=($page*3)-3;
}    


$nbr_page=ceil($nbrproduit[0]['cpt']/3);

$pdo = config::getConnexion();
$query = $pdo -> prepare('SELECT * FROM produit LIMIT $page1,3 ');
*/
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <style>
            body {
  height: 100vh;
}


[class="heart"] {
  position: absolute;
  left: -100vw;
}

[class="tt"] {
  color: #aab8c2;
  cursor: pointer;
  font-size: 1em;
  align-self: center;  
  transition: color 0.2s ease-in-out;
}

[class="tt"]:hover {
  color: grey;
}

[class="tt"]::selection {
  color: none;
  background: transparent;
}

[class="tt"]::moz-selection {
  color: none;
  background: transparent;
}

[class="heart"]:checked + label {
  color: #e2264d;
  will-change: font-size;
  animation: heart 1s cubic-bezier(.17, .89, .32, 1.49);
}



@keyframes heart {0%, 17.5% {font-size: 0;}}
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!----Title of website---->
        <title>Samsara</title>
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
        <link rel="stylesheet" href="assets/css/sab.scss">
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
    </head>
    <body id="reportsPage">
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
                            <li><a href="blogs.php">Blogs</a>
                            </li>
                            <li class="active"><a href="vehicle.php">Vehicles</a>
                            </li>
                        </ul>
                        <h1 id="car-1-logo"><a href="assets/index.html"><img src="assets/images/logooooS.png"></a></h1>
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
                                <h3 class="animate-box">LOUER UN VÉHICULE EXOTIQUE <span></span></h3>
                                <h4 class="animate-box fadeInUp animated">Conduire une voiture de luxe permet toujours de bénéficier d’une expérience supérieure.   
                                    <br> Performance, confort, sécurité, infotainment, technologies… Tout doit être au top pour justifier les prix des véhicules premium.
                                    <br> Et vu les exigences des consommateurs qui déboursent de tels montants, la concurrence est féroce.
                                    <br> Voici une liste des meilleures voitures de luxe que l’on peut conduire aujourd’hui en Tunisie.
                                
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-1-learn-more animate-box">
                    <a href="#" class="scroll-btn">
                    <?php 
                        require_once 'compteur/compteurr.php';
                         ajouter_vue(); ?>
                     
            <i class="fa fa-eye" aria-hidden="true"><?= nombre_vue();?></i><span class="text">personne</span>
                    <span class="text">See Our Vehicles</span>
                    <span class="arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </a>
                </div>
            </section>


            


            <?php
				foreach($listeproduit as $produit){
			?>
<section id="car-1-features-2" class="holiday-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-sm-push-6">
                            <figure class="car-1-feature-image animate-box audi-car">
                                  <img src="../Back/<?=$produit['image']?> " alt="">
                                  <!--<img src="images/<$produit['image']?> " alt="">-->      
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
                                    <li class="animate-box">Categorie<span>
                                        <?php 
                                    $ida=$produit['id_c'];
                                    $sql="SELECT * FROM categorie where id=:id ";
                                    $db = config::getConnexion();
                                    $req=$db->prepare($sql);
                                   // $req->bindValue(':id', $ida);
                                    $req->execute([':id'=>$ida]);
                                    $comm = $req->fetchAll(PDO::FETCH_OBJ);

                                    foreach($comm as $cat){
                                        ?>
                                 <span> 
                               
                                  <?= $cat->nomC?>
                                </span> 
                            
                            <?php
                                            }
                                        ?>
                                        
                                    
                                </span>
                                    </li>
                                    <li class="animate-box">Prix <span><?php echo $produit['prix'];?></td> DT</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="car-1-btn-action animate-box">
                                <a href="ajoutePanierLine.php?id_produit=<?php echo $produit['id'];?>&prix=<?php echo $produit['prix'];?>" class="btn btn-primary btn-cta">Add to Cart</a>
                                
                                </div>
                                </div>
                                </div>

                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6272c0eb7311823a"></script>

               <!-- <div class="col-md-3 col-sm-3 animate-box col-xs-12 full-width">
                                <div class="car-1-footer-widget ft-col">
                                    <h3>Partager sur : <span class="pls pull-right"><i class="fa fa-plus"></i></span></h3>
                                    <ul class="car-1-social ac-ul">
                                        <li><a href="http://twitter.com/home?status=En train de lire <?php //echo $produit['marque']; ?> " rel="nofollow"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        </li>
                                        <li><input id="<=$produit['id']?>" type="checkbox" class="heart" />
                                        <label for="<=$produit['id']?>" class="tt">❤</label></li>
                                    </ul>
                                </div>
                            </div>-->

                            
                        
                    
                </div>

            </section>
<hr>
            <?php
				}
			?>  




<!-- 
<?php // if(!$chercher){?>
:
                <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label"></span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                    <div id="app">


                                        <?php
                                        
                                        for($i=1 ; $i<=$nbr_page ; $i++) : ?>
                                    <li class="animate-box page-item ">
                                        <a class="btn btn-primary  animate-box page-link" 
                                        style="background-color:#3384f6;;color:white;" 
                                        href="vehicle.php?page=<?= $i?>">
                                        <?php //echo $i ?></a></li>
                                          <?php  endfor ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>  

<?php //};?>   -->  
 
<?php  if(!$chercher){?>

<div class="tm-table-actions-col-right">
                <span class="tm-pagination-label"></span>
                <nav aria-label="Page navigation" class="d-inline-block">
                    <ul class="pagination tm-pagination">
                        <?php
                        
                        for($i=1 ; $i<=$nbr_page ; $i++) : ?>
                    <li class="animate-box page-item ">
                        <a class="btn btn-primary  animate-box page-link" 
                        style="background-color:#3384f6;;color:white;" 
                        href="vehicle.php?page=<?= $i?>">
                        <?php  echo $i ?></a></li>
                          <?php  endfor ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>  

<?php  };?>             
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
                                            <a href="#">samsara@yahoo.com</a>
                                            <br> tunisie
                                            <br>
                                            <a href="tel:51700337">51 700 337</a>
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
                                <p class="car-1-left"><small>&copy; 2022 All Rights Reserved.</small>
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






















          // DEBOUNCE HELPER

const debounce = (callback, time) => {
    let timeout;

    return function(...args) {
        const fnCall = () => callback.apply(this, args);
        clearTimeout(timeout);
        timeout = setTimeout(fnCall, time);
    };
};


/**
 * Pagination
 *
 * @component
 * @example
 * {
 *   data: {
 *     page: 4,
 *   },
 *   template: `
 *     <app-pagination :length="24" :total-visible="7" v-model="page">
 *       <template #prev-icon>
 *         <i class="fa fa-chevron-left"></i>
 *       </template>
 *       <template #next-icon>
 *         <i class="fa fa-chevron-right"></i>
 *       </template>
 *     </app-pagination>
 *   `,
 * }
 */
const AppPagination = {
    name: 'app-pagination',
    props: {
        // v-model value
        value: {
            type: Number,
            required: true,
        },
        length: {
            type: Number,
            default: 0,
            validator: (val) => val % 1 === 0,
        },
        // when number of page buttons exceeds the parent container, 
        // it will truncate the buttons automatically  
        totalVisible: Number,
        disabled: Boolean,
    },

    data: () => ({
        maxButtons: 0,
    }),

    computed: {
        isValueLast() {
            return this.value >= this.length;
        },

        isValueFirst() {
            return this.value <= 1;
        },

        items() {
            const maxLength = this.totalVisible > this.maxButtons
                ? this.maxButtons
                : this.totalVisible || this.maxButtons;

            if (this.length <= maxLength || maxLength < 1) {
                return this.getRange(1, this.length);
            }

            const even = maxLength % 2 === 0 ? 1 : 0;
            const left = Math.floor(maxLength / 2);
            const right = this.length - left + 1 + even;

            if (this.value > left && this.value < right) {
                const start = this.value - left + 2;
                const end = this.value + left - 2 - even;

                return [1, '...', ...this.getRange(start, end), '...', this.length];
            }
            else if (this.value === left) {
                const end = this.value + left - 1 - even;

                return [...this.getRange(1, end), '...', this.length];
            }
            else if (this.value === right) {
                const start = this.value - left + 1;

                return [1, '...', ...this.getRange(start, this.length)];
            }
            else {
                return [...this.getRange(1, left), '...', ...this.getRange(right, this.length)];
            }
        },
    },

    mounted() {
        this.setMaxButtons();

        window.addEventListener('resize', this.debouncedOnResize);
    },
    
    beforeDestory() {
        window.removeEventListener('resize', this.debouncedOnResize);
    },

    methods: {
        goNext(e) {
            e.preventDefault();
            this.$emit('input', this.value + 1);
            this.$emit('next');
        },

        goPrevious(e) {
            e.preventDefault();
            this.$emit('input', this.value - 1);
            this.$emit('previous');
        },

        getRange(from, to) {
            const range = [];

            from = from > 0 ? from : 1;

            for (let i = from; i <= to; i++) {
                range.push(i);
            }

            return range;
        },
        
        setMaxButtons() {
            const containerWidth = this.$el && this.$el.parentElement
                ? this.$el.parentElement.clientWidth
                : window.innerWidth;

            const navButton = this.$refs.navNext.getBoundingClientRect();
            
            // width of the items considering navItem.height = item.width
            const itemWidth = navButton.height;
            const navItemsWidth = navButton.width * 2;

            this.maxButtons = Math.floor(
                (containerWidth - navItemsWidth) / itemWidth
            );
        },

        debouncedOnResize: debounce(function() {
            this.setMaxButtons();
        }, 200),
    },

    template: `
        <ul :class="['pagination', { disabled: disabled }]">
            <li ref="navPrev">
                <button
                    :class="['pagination-navigation', { disabled: isValueFirst }]"
                    v-on="isValueFirst ? {} : { click: goPrevious }"
                >
                    <slot name="prev-icon">$prev</slot>
                </button>
            </li>

            <li v-for="(item, index) in items" :key="'paging_' + index"> 
                <span
                    v-if="isNaN(Number(item))"
                    class="pagination-more"
                >{{ item }}</span>

                <button
                    v-else
                    type="button"
                    :class="['pagination-item', { active: item === value }]"
                    @click="$emit('input', item)"
                >{{ item }}</button>
            </li>

            <li ref="navNext">
                <button
                    type="button"
                    :class="['pagination-navigation', { disabled: isValueLast }]"
                    v-on="isValueLast ? {} : { click: goNext }"
                >
                    <slot name="next-icon">$next</slot>
                </button>
            </li>
        </ul>
    `,
};


new Vue({
    el: '#app',
    data: {
        page: 3,
        length: 124,
        totalVisible: 7,
        containerWidth: 768, // for resizing example
    },
    watch: {
        containerWidth() {
            // trigger pagination resize
            this.$nextTick(() => {
                window.dispatchEvent(new Event('resize'));
            });
        },
    },
    components: {
        AppPagination,
    },
});
        </script>

        
    </body>
</html>