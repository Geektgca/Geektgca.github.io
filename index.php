<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: user.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['SendMessage'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
   
    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    
    
   
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO SitePro(name,telephone,message) VALUES('" . $name . "','" . $telephone . "','" . $message . "' )")) {
            $successmsg = "Message envoyé avec succès!";
        } else {
            $errormsg = "Erreur dans l'envoi du message! Merci de réessayer!";
        }
    }
}


if (isset($_POST['Subscribe'])) {
   
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
   
    
    //name can contain only alpha characters and space
   
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Veuillez entrer un email valide";
    }
   
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO SitePro(email,name,telephone,message) VALUES('" . $email . "','" . $name . "','" . $telephone . "','" . $message . "' )")) {
            $successmsg = "Votre souscription a été effective!";
        } else {
            $errormsg = "Erreur de souscription! Merci de réessayer!";
        }
    }
}


?>



















<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>GeekLife inc. officiel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.ico">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/slick-theme.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/bootsnav.css">
        


        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href="assets/css/plugins.css" />-->

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style1.css">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div><!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->


            <nav class="navbar navbar-default navbar-fixed white no-background bootsnav">
                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->

                <div class="container">    
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            
                           
                            <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                        </ul>
                    </div>        
                    <!-- End Atribute Navigation -->

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="#brand">

                            <img src="assets/images/logoGG.png" class="logo logo-display m-top-10" alt="">
                            <img src="assets/images/logoG.png" class="logo logo-scrolled" alt="">

                        </a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li><a href="#hello">Bonjour</a></li>                    
                            <li><a href="#about">À propos</a></li>                    
                            <li><a href="#service">Services offerts</a></li>                    
                            <li><a href="#portfolio">Portefeuille</a></li>                    
                            <li><a href="#pricing">Tarification</a></li>                    
                            <li><a href="#blog">Blog</a></li>                    
                            <li><a href="#contact">Contact</a></li>  
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>  


                <!-- Start Side Menu -->
                <div class="side">
                    <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                    <div class="widget">
                        <h6 class="title">Pages personnalisées</h6>
                        <ul class="link">
                            <li><a href="#about">Bonjour</a></li>
                            <li><a href="#service">Services offerts</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#portofolio">Portefeuille</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h6 class="title">Liens Additionnels</h6>
                        <ul >
                            <li><a href="http://www.facebook.com">Expresso Delivery</a></li>
                            <li><a href="#">Amah Magazine</a></li>
                            <li><a href="#">les delices de Jessy</a></li>
                            <li><a href="#"> Hair by be </a></li>
                            <li><a href="#"> Logex</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Side Menu -->

            </nav>


            <!--Home Sections-->

            <section id="hello" class="home bg-mega">
                      
                <div class="overlay"> </div>
                <div class="container">
                     
                    <div class="row">
                           
                        <div class="main_home" >
                            <div class="home_text">
                                    
                                <h1 class="text-white">Quand la technologie rime avec la simplicité </h1> <br />   <h2 class="text-white">  Solutions web, mobiles et logicielles <br />   Réparations d'ordinateurs et services informatiques chez vous  </h2>  <br />  <h3 class="text-white"> Service rapide, professionnel et courtois </h3>
                            </div>

                            <div class="home_btns m-top-40">
                                <a href="#service" class="btn btn-primary m-top-20">Commencer avec nous</a>
                                <a href="#about" class="btn btn-default m-top-20">Apprendre à nous connaître </a>
                            </div>

                        </div>
                    </div><!--End off row-->
                </div><!--End off container -->
            </section> <!--End off Home Sections-->


            <!--About Sections-->
            <section id="about" class="about roomy-100">
                <div class="container">
                    <div class="row">
                        <div class="main_about">
                            <div class="col-md-6">
                                <div class="about_content">
                                    <h2>À PROPOS DE NOUS </h2>
                                    <div class="separator_left"></div>

                                    <p> <h4> Vos experts en Informatique à Lomé et à Montréal depuis 2016</h4> <br/>  GeekLome inc. est une PME établie depuis 2016 par un entrepreneur togolais résident à Montréal.  <br/>  Dévoués à offrir un service de qualité à l'ordre international et fiable, nous avons fait notre marque en offrant un service personnalisé  à nos clients implantés à Lomé selon leur besoins. <br/>
                                         Que ce soit résidentiel, travailleur autonome ou petite entreprise, nous savons ajuster les solutions adéquatement  
                                       
                                         
                                    </p>

                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about_accordion wow fadeIn">
                                    <div id="faq_main_content" class="faq_main_content">
                                        <h6><i class="fa fa-angle-right"></i> SOLUTION WEB UNIQUE </h6>
                                        <div>
                                            <div class="content">
                                                <p>Nous offrons des solutions web comme la création d'applications Web ou 
                                                    encore mobiles de façon unique adaptables à n'importe quel type d'écrans  </p>

                                            </div>
                                        </div> <!-- End off accordion item-1 -->

                                        <h6 class="open"><i class="fa fa-angle-right"></i> EXPERIENCE À L'ÉCHELLE INTERNATIONNALE</h6>
                                        <div class="open">
                                            <div class="content">
                                                <p> les membres de l'équipe de développement sont des développeurs inspirés et compétents
                                                     togolais qui sont formés et coachés par des informaticiens canadiens. 
                                                 </p>
                                            </div>
                                        </div> <!-- End off accordion item-2 -->

                                        <h6> <i class="fa fa-angle-right"></i> SERVICE EXCELLENT </h6>
                                        <div>
                                            <div class="content">
                                                <p> Nous travaillons en étroite collaboration avec des informaticiens canadiens. <br/>
                                                     Nous garantissons un service exceptionnel respectant les normes canadiennes .  </p>
                                            </div>
                                        </div> <!-- End off accordion item-3 -->

                                        <h6><i class="fa fa-angle-right"></i> SERVICES DE MISE À JOUR GRATUIT </h6>
                                        <div>
                                            <div class="content">
                                                <p>En plus d'offrir un service de qualité, nous sommes prêts à vous accompagner dans les 
                                                    mises à jours et maintenance  gratuitement. </p>
                                            </div>
                                        </div> <!-- End off accordion item-4 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End off row-->
                </div><!--End off container -->
                <br />
                <br />
                <br />
                <br />
                <hr />
                <br />
                <br />
                <div class="container">
                    <div class="row">
                        <div class="about_bottom_content">
                            <div class="col-md-4">
                                <div class="about_bottom_item m-top-20">
                                    <div class="ab_head">
                                        <div class="ab_head_icon">
                                            <i class="icofont icofont-fire-burn"></i>
                                        </div>
                                        <h6 class="m-top-20"> NOUS SOMMES CRÉATIFS</h6>
                                    </div>
                                    <p class="m-top-20">  Simplifiez vos affaires grâce au développement de solutions web, mobiles et logicielles.  </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="about_bottom_item m-top-20">
                                    <div class="ab_head">
                                        <div class="ab_head_icon">
                                            <i class="icofont icofont-speech-comments"></i>
                                        </div>
                                        <h6 class="m-top-20">NOUS SOMMES TRES AMICAL</h6>
                                    </div>
                                    <p class="m-top-20"> Nous avons à votre disposition, une équipe de consulants capables de vous aider et vous assister  dans l'analyse 
                                        de vos besoins techniques. </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="about_bottom_item m-top-20">
                                    <div class="ab_head">
                                        <div class="ab_head_icon">
                                            <i class="icofont icofont-heart"></i>
                                        </div>
                                        <h6 class="m-top-20">NOUS AIMONS PARTAGER</h6>
                                    </div>
                                    <p class="m-top-20"> Nous aidons les PME à comprendre l'intérêt du retour sur investissement   </p>
                                </div>
                            </div>
                        </div>
                    </div><!--End off row-->
                </div><!--End off container -->
            </section> <!--End off About section -->


            <!--Video section-- commenté pour l'instant
            <section  class="video">
                
                <div class="overlay"></div>
                <div class="main_video roomy-100 m-top-100 m-bottom-100 text-center">
                    <div class="video_text text-center">     
                        <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-link"><span class="fa fa-play"></span></a>
                    </div>
                </div>
            </section>       -->

            


            <div class="container">
                <div class="row">
                    <div class="main_featured m-top-100">
                        <div class="col-sm-12">
                            <div class="head_title text-center">
                                <h2>TRAVAIL FUTUR</h2>
                                <div class="separator_auto"></div>
                                <p>Nous travaillons actuellement sur la mise en place des projets les plus innovants dans le secteur du numérique </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="featured_slider">
                <div>
                    <div class="featured_img">
                        <img src="assets/images/fprojects/x1.jpg" alt="" />
                        <a href="assets/images/fprojects/x1.jpg" class="popup-img"></a>
                    </div>
                </div>
                <div>
                    <div class="featured_img">
                        <img src="assets/images/fprojects/main.png" alt="" />
                        <a href="assets/images/fprojects/main.png" class="popup-img"></a>
                    </div>
                </div>
                <div>
                    <div class="featured_img">
                        <img src="assets/images/fprojects/aider.png" alt="" />
                        <a href="assets/images/fprojects/aider.png" class="popup-img"></a>
                    </div>
                </div>
                <div>
                    <div class="featured_img">
                        <img src="assets/images/fprojects/x2.jpg" alt="" />
                        <a href="assets/images/fprojects/x2.jpg" class="popup-img"></a>
                    </div>
                </div>
                <div>
                    <div class="featured_img">
                        <img src="assets/images/fprojects/decouvrir1.png" alt="" />
                        <a href="assets/images/fprojects/decouvrir1.png" class="popup-img"></a>
                    </div>
                </div>
            </div><!-- End off featured slider -->



            <!--Service Section-->
            <section id="service" class="service">
                <div class="container">
                    <div class="row">
                        <div class="main_service roomy-100">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                                <div class="head_title text-center">
                                    <h2>NOS SERVICES</h2>
                                    <div class="separator_auto"></div>
                                    <p>Nous offrons une multitude de services ayant trait à l'informatique </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="service_item">
                                    <i class="icofont icofont-light-bulb"></i>
                                    <h6 class="m-top-30">SOLUTIONS DE COMMERCE EN LIGNE / PLATEFORMES WEB</h6>
                                    <div class="separator_small"></div>
                                    <p>Nous créons des solutions technologiques sur-mesure pour simplifier et optimiser vos affaires.
                                            <br/> Les possibilités du web sont pratiquement infinies. Que ce soit pour développer un site aux fonctionnalités complexes, un intranet ou un outil sur-mesure, nous pouvons imaginer et développer une solution web qui répondra à vos enjeux d’affaires.
                                            <br/> Lancez votre entreprise sur le web ou améliorez votre plateforme actuelle pour maximiser vos ventes. </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service_item">
                                    <i class="icofont icofont-imac"></i>
                                    <h6 class="m-top-30">OUTILS DE BUREAU - MAINTENANCE - REPARATION</h6>
                                    <div class="separator_small"></div>
                                    <p> 
                                            Service informatique pour les PME, travailleurs autonome et Organismes à but non lucratif.
                                            Nos services sont offerts dans tout LOME.
                                            Nous offrons un service rapide sur place pour tout vos besoins en informatique.
                                            
                                            <p> Avec une clientèle très variée, nous connaissons les plateformes de travail spécifiques (logiciels, progiciels) et les besoins souvent pressant pour du service informatique en entreprise.</p>

                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service_item">
                                    <i class="icofont icofont-light-bulb"></i>
                                    <h6 class="m-top-30">APPLICATION IOS/ANDROID</h6>
                                    <div class="separator_small"></div>
                                    <p>Les consommateurs ont maintenant accès au monde entier au bout de leurs doigts. 
                                        Exploitez cette opportunité intelligemment en adaptant votre offre au service de plateforme mobile. </p>
                                </div>
                            </div>
                        </div>
                    </div><!--End off row -->
                </div><!--End off container -->
            </section> <!--End off Featured section-->


            <!--Impress section-->
            <section id="impress" class="impress roomy-100">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="main_impress text-center">
                            <div class="col-sm-8 col-sm-offset-2">
                                <h2 class="text-white text-uppercase">IMPRESSIONÉ?  TRAVAILLONS ENSEMBLE</h2>
                                <p class="m-top-40 text-white">Batissons ensemble l'avenir numérique et vivons dans la tranquilité d'esprit</p>

                               
                            </div>
                        </div>
                    </div><!--End off row -->
                </div><!--End off container -->
            </section><!-- End off Impress section-->




            <!--Portfolio Section-->
            <section id="portfolio" class="portfolio lightbg">
                <div class="container">
                    <div class="row">
                        <div class="main_portfolio roomy-100">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="head_title text-center">
                                    <h2>NOTRE PORTEFEUILLE</h2>
                                    <div class="separator_auto"></div>
                                    <p>Nous avons travaillé en utilisant  les nouvelles technologies dans différents domaines informatioques avec nos clients </p>
                                </div>
                            </div>

                            <div class="portfolio_content">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portfolio_item">
                                                <img src="assets/images/Portfolio/p1.png" alt="" />
                                                <div class="portfolio_hover text-center">
                                                    <h6 class="text-uppercase text-white">Calorie Assist</h6>
                                                    <p class=" text-white">Une plateforme Web d'assistance alimentaire</p>
                                                    <div class="portfolio_hover_icon">
                                                        <a href="assets/images/Portfolio/p1.png" class="popup-img"><i class="fa fa-expand"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-6 m-top-30">
                                            <div class="portfolio_item portfolio_item2">
                                                <img src="assets/images/Portfolio/p2.png" alt="" />
                                                <div class="portfolio_hover text-center">
                                                    <h6 class="text-uppercase text-white">SmartBiz</h6>
                                                    <p class=" text-white">une plateforme pour afficher ses compétences d'affaires</p>
                                                    <div class="portfolio_hover_icon">
                                                        <a href="assets/images/Portfolio/p2.jpg" class="popup-img"><i class="fa fa-expand"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 m-top-30">
                                            <div class="portfolio_item portfolio_item2">
                                                <img src="assets/images/Portfolio/p3.png" alt="" />
                                                <div class="portfolio_hover text-center">
                                                    <h6 class="text-uppercase text-white"></h6>
                                                    <p class=" text-white"></p>
                                                    <div class="portfolio_hover_icon">
                                                        <a href="assets/images/Portfolio/p3.png" class="popup-img"><i class="fa fa-expand"></i></a>
                                                        <a href=""><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="portfolio_item portfolio_item3 sm-m-top-30">
                                        <img src="assets/images/Portfolio/p4.png" alt="" />
                                        <div class="portfolio_hover text-center">
                                            <h6 class="text-uppercase text-white">ASSUANCE VOYAGE</h6>
                                            <p class=" text-white">Application Mobile d'assurance voyage</p>
                                            <div class="portfolio_hover_icon">
                                                <a href="assets/images/Portfolio/p4.png" class="popup-img"><i class="fa fa-expand"></i></a>
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 m-top-30">
                                    <div class="portfolio_item portfolio_item2">
                                        <img src="assets/images/Portfolio/p5.png" alt="" />
                                        <div class="portfolio_hover text-center">
                                            <h6 class="text-uppercase text-white">Mon Hub Intelligent</h6>
                                            <p class=" text-white">Interface de collaboration entre employés de la banque</p>
                                            <div class="portfolio_hover_icon">
                                                <a href="assets/images/Portfolio/p5.png" class="popup-img"><i class="fa fa-expand"></i></a>
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 m-top-30">
                                    <div class="portfolio_item">
                                        <img src="assets/images/Portfolio/p3.png" alt="" />
                                        <div class="portfolio_hover text-center">
                                            <h6 class="text-uppercase text-white">Besoin d'aide</h6>
                                            <p class=" text-white">plateforme d'aide en ligne</p>
                                            <div class="portfolio_hover_icon">
                                                <a href="assets/images/Portfolio/p3.png" class="popup-img"><i class="fa fa-expand"></i></a>
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!--End off row -->
                </div><!--End off container -->
            </section><!-- End off Portfolio section-->


            <!--Skill Sections-->
            <section id="skill" class="skill roomy-100">
                <div class="container">
                    <div class="row">
                        <div class="main_skill">
                            <div class="col-md-6">
                                <div class="skill_content wow fadeIn">
                                    <h2>NOS COMPÉTENCES</h2>
                                    <div class="separator_left"></div>

                                    <p> Notre équipe de développement maitrise plusieurs framework, des langages de programmations modernes comme HTML5,
                                        CSS3, Javascript, Android, kotlin, Java, PHP, C++, .NET , PowerApps. <br/>
                                        Nous sommes également spécialisé dans la mise en place des outils Microsoft de gestion sur mesure comme Teams, Excel, PowerShell, PowerPoint, Azure, etc.
                                        <br/> En plus, nous maitrisons tous la maintenance et la réparation de tout type d'ordinateurs.

                                        
                                    </p>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="skill_bar sm-m-top-50">    
                                    <div class="teamskillbar clearfix m-top-20" data-percent="80%">
                                        <h6>DEVELOPPEMENT WEB</h6>
                                        <div class="teamskillbar-bar"></div>
                                    </div> <!-- End Skill Bar -->

                                    <div class="teamskillbar clearfix m-top-50" data-percent="75%">
                                        <h6>MAINTENANCE ET REPARATION</h6>
                                        <div class="teamskillbar-bar"></div>
                                    </div> <!-- End Skill Bar -->

                                    <div class="teamskillbar clearfix m-top-50" data-percent="90%">
                                        <h6>DEVLOPPEMENT MOBILE</h6>
                                        <div class="teamskillbar-bar"></div>
                                    </div> <!-- End Skill Bar -->
                                </div>
                            </div>
                        </div>
                    </div><!--End off row-->
                </div><!--End off container -->
                <br />
                <br />
                <br />
                <hr />
                <br />
                <br />
                <br />
                <div class="container">
                    <div class="row">
                        <div class="skill_bottom_content text-center">
                            <div class="col-md-3">
                                <div class="skill_bottom_item">
                                    <h2 class="statistic-counter">16</h2>
                                    <div class="separator_small"></div>
                                    <h5><em>Projets finis</em></h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="skill_bottom_item">
                                    <h2 class="statistic-counter">38</h2>
                                    <div class="separator_small"></div>
                                    <h5><em>Clients Contents </em></h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="skill_bottom_item">
                                    <h2 class="statistic-counter">8</h2>
                                    <div class="separator_small"></div>
                                    <h5><em>Heures de travail</em></h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="skill_bottom_item">
                                    <h2 class="statistic-counter">3468</h2>
                                    <div class="separator_small"></div>
                                    <h5><em>Partages</em></h5>
                                </div>
                            </div>
                        </div>
                    </div><!--End off row-->
                </div><!--End off container -->
            </section> <!--End off Skill section -->



            <!--Testimonial Section
            <section id="testimonial" class="testimonial fix">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="main_testimonial roomy-100">
                            <div class="head_title text-center">
                                <h2 class="text-white">OUR TESTIMONIALS</h2>
                            </div>
                            <div class="testimonial_slid text-center">
                                <div class="testimonial_item">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper 
                                            suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                        <div class="test_authour m-top-30">
                                            <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial_item">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper 
                                            suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                        <div class="test_authour m-top-30">
                                            <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial_item">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper 
                                            suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                        <div class="test_authour m-top-30">
                                            <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial_item">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper 
                                            suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                        <div class="test_authour m-top-30">
                                            <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End off row-->
                </div><!--End off container -->
            </section> <!--End off Testimonial section -->


            <!--Pricing Section-->
            <section id="pricing" class="pricing lightbg">
                <div class="container">
                    <div class="row">
                        <div class="main_pricing roomy-100">
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="head_title text-center">
                                    <h2>NOTRE TARIFICATION</h2>
                                    <div class="separator_auto"></div>
                                    <p>Une idée des tarifs offers par service </p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="pricing_item">
                                    <div class="pricing_head p-top-30 p-bottom-100 text-center">
                                        <h3 class="text-uppercase">Plateformes Web</h3>
                                    </div>
                                    <div class="pricing_price_border text-center">
                                        <div class="pricing_price">
                                            <h6 class="text-white">À PARTIR DE 100.000 CFA </h6>
                                            
                                        </div>
                                    </div>

                                    <div class="pricing_body bg-white p-top-110 p-bottom-60">
                                        <ul>
                                            <li><i class="fa fa-check-circle text-primary"></i> <span>38</span> utilisateurs</li>
                                            

                                        </ul>
                                        
                                    </div>
                                </div>
                            </div><!-- End off col-md-4 -->

                            <div class="col-md-4 col-sm-12">
                                <div class="pricing_item sm-m-top-30">
                                    <div class="pricing_top_border"></div>
                                    <div class="pricing_head p-top-30 p-bottom-100 text-center">
                                        <h3 class="text-uppercase">MAINTENANCE</h3>
                                    </div>
                                    <div class="pricing_price_border text-center">
                                        <div class="pricing_price">
                                            <h6 class="text-white">À PARTIR DE 10.000 CFA </h6>
                                            
                                        </div>
                                    </div>

                                    <div class="pricing_body bg-white p-top-110 p-bottom-60">
                                        <ul>
                                            <li><i class="fa fa-check-circle text-primary"></i> <span>50</span> utilisateurs</li>
                                           
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div><!-- End off col-md-4 -->

                            <div class="col-md-4 col-sm-12">
                                <div class="pricing_item sm-m-top-30">
                                    <div class="pricing_head p-top-30 p-bottom-100 text-center">
                                        <h3 class="text-uppercase">MOBILE ANDROID/IOS</h3>
                                    </div>
                                    <div class="pricing_price_border text-center">
                                        <div class="pricing_price">
                                            <h6 class="text-white"> À PARTIR DE 200.000 CFA</h6>
                                            
                                        </div>
                                    </div>

                                    <div class="pricing_body bg-white p-top-110 p-bottom-60">
                                        <ul>
                                            <li><i class="fa fa-check-circle text-primary"></i> Utilisateurs illimités</li>
                                            
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div><!-- End off col-md-4 -->

                        </div>
                    </div><!--End off row-->
                </div><!--End off container -->
            </section> <!--End off Pricing section -->



            <!--client brand section

            <section id="cbrand" class="cbrand">
                <div class="container">
                    <div class="row">
                        <div class="main_cbrand text-center roomy-100">
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="cbrand_item m-bottom-10">
                                    <a href=""><img src="assets/images/clients/1.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="cbrand_item m-bottom-10">
                                    <a href=""><img src="assets/images/clients/2.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="cbrand_item m-bottom-10">
                                    <a href=""><img class="" src="assets/images/clients/5.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="cbrand_item m-bottom-10">
                                    <a href=""><img src="assets/images/clients/4.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="cbrand_item m-bottom-10">
                                    <a href=""><img src="assets/images/clients/3.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="cbrand_item m-bottom-10">
                                    <a href=""><img src="assets/images/clients/1.jpg" alt="" /></a> 
                                </div>
                            </div>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off Cbrand section -->


            <!--Subscribe section-->
            <section id="subscribe" class="subscribe roomy-100 fix">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="main_subscribe text-center">
                            <div class="col-sm-8 col-sm-offset-2">
                                <h2 class="text-white">SOUSCRIRE</h2>
                                <p class="m-top-30 text-white">Envie de recevoir les nouvelles par rapport au développement technologique à lomé?</p>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="subscribe_btns m-top-40">

                                    <form class="form-inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="inputEmail2" placeholder="Adresse Email" required value="<?php if($error) echo $name; ?>">
                                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="Subscribe">SOUSCRIRE</button>
                                    </form>

                                    <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                                    <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                                </div>
                            </div>

                        </div>
                    </div><!--End off row -->
                </div><!--End off container -->
            </section><!-- End off Impress section-->



            <!--Blog Section-


            <section id="blog" class="blog">
                <div class="container">
                    <div class="row">
                        <div class="main_blog text-center roomy-100">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="head_title text-center">
                                    <h2>RECENT BLOGS</h2>
                                    <div class="separator_auto"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                        sed diam nonummy nibh euismod tincidunt tation ullamcorper 
                                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="blog_item m-top-20">
                                    <div class="blog_item_img">
                                        <img src="assets/images/Blog/1.jpg" alt="" />
                                    </div>
                                    <div class="blog_text roomy-40">
                                        <h6>PLEASUARE WITHOUT CONSCIENCE</h6>
                                        <p><em><a href="">May 15, 2016</a> /<a href="">admin</a>/<a href=""> Co-working</a></em></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="blog_item m-top-20">
                                    <div class="blog_item_img">
                                        <img src="assets/images/Blog/2.jpg" alt="" />
                                    </div>
                                    <div class="blog_text roomy-40">
                                        <h6>PLEASUARE WITHOUT CONSCIENCE</h6>
                                        <p><em><a href="">May 15, 2016</a> /<a href="">admin</a>/<a href=""> Co-working</a></em></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="blog_item m-top-20">
                                    <div class="blog_item_img">
                                        <img src="assets/images/Blog/3.jpg" alt="" />
                                    </div>
                                    <div class="blog_text roomy-40">
                                        <h6>PLEASUARE WITHOUT CONSCIENCE</h6>
                                        <p><em><a href="">May 15, 2016</a> /<a href="">admin</a>/<a href=""> Co-working</a></em></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End off row -->
                </div><!--End off container -->
            </section><!-- End off Blog section-->



            <!--Maps Section-

            <div class="main_maps text-center fix">
                <div class="overlay"></div>
                <div class="maps_text">
                    <h3 class="text-white" onclick="showmap()">FIND US ON THE MAP <i class="fa fa-angle-down"></i></h3>
                    <div id="map_canvas" class="mapheight"></div>
                </div>
            </div><!-- End off Maps Section-->



            <!--Contact Us Section-->
            <section id="contact" class="contact bg-mega fix">
                <div class="container">
                    <div class="row">
                        <div class="main_contact roomy-100 text-white">
                            <div class="col-md-4">
                                <div class="rage_widget">
                                    <div class="widget_head">
                                        <h3 class="text-white">GeekTogo inc.</h3>
                                        <div class="separator_small"></div>
                                    </div>
                                    <p> <h6 class="text-white">  
                                         Nous sommes impatient de pouvoir travailler avec vous <br/> Tel : +228 93 65 81 02 - +1 514 975 0001 <br/>email : Geekinc@gmail.com </h6>
                                    
                                    </p>

                                    <div class="widget_socail m-top-30">
                                        <ul class="list-inline">
                                            <li><a href="https://www.facebook.com/jeanpierre.amores1"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href=" https://twitter.com/GeekINC4"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://www.linkedin.com/feed/?trk=onboarding-landing"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="https://twitter.com/GeekINC4"><i class="fa fa-vimeo"></i></a></li>
                                            <li><a href="https://twitter.com/GeekINC4"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 sm-m-top-30">
                                <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group"> 
                                                <input id="first_name" name="Nom" type="text" placeholder="Nom" class="form-control" required="<?php if($error) echo $name; ?>">
                                                <span class="text-danger"><?php if (isset($name_error)) echo $email_error; ?></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">  
                                                <input id="phone" name="Téléphone" type="text" placeholder="Téléphone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">  
                                                <textarea class="form-control" rows="6" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group text-center">
                                            
                                             <a href="index.php" class="btn btn-primary"  > Envoyer message </a>
                                            </div>
                                        </div>

                                    </div>

                                </form>

                                <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                                <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                            </div>
                        </div>
                    </div><!--End off row -->
                </div><!--End off container -->
            </section><!--End off Contact Section-->


            <!-- scroll up-->
            <div class="scrollup">
                <a href="#"><i class="fa fa-chevron-up"></i></a>
            </div><!-- End off scroll up -->


            <footer id="footer" class="footer bg-black">
                <div class="container">
                    <div class="row">
                        <div class="main_footer text-center p-top-40 p-bottom-30">
                            <p class="wow fadeInRight" data-wow-duration="1s">
                                Fait avec
                                <i class="fa fa-heart"></i>
                                par
                                <a target="_blank" href="#">Geek inc. - Jean-Pierre Aklah</a> 
                                2019. Tout droit réservé
                            </p>
                        </div>
                    </div>
                </div>
            </footer>




        </div>

            <!-- JS includes -->

            <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
            <script src="assets/js/vendor/bootstrap.min.js"></script>

            <script src="assets/js/jquery.magnific-popup.js"></script>
            <script src="assets/js/jquery.easing.1.3.js"></script>
            <script src="assets/js/slick.min.js"></script>
            <script src="assets/js/jquery.collapse.js"></script>
            <script src="assets/js/bootsnav.js"></script>


            <!-- paradise slider js -->


            <script src="http://maps.google.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8"></script>
            <script src="assets/js/gmaps.min.js"></script>

            <script>
                            function showmap() {
                                var mapOptions = {
                                    zoom: 8,
                                    scrollwheel: false,
                                    center: new google.maps.LatLng(-34.397, 150.644),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };
                                var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
                                $('.mapheight').css('height', '350');
                                $('.maps_text h3').hide();
                            }

            </script>





            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>
