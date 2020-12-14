<?php
    session_start();
    require_once 'php/fonctions.php';
    verificationSession();
    verificationTest();
    if($_GET['email'] != $_SESSION['test']){
        header('Location: changer_mot_de_passe.php?email='.$_SESSION['test']);
    }
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
		<meta charset = "utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href = "img/favicon.png" type = "image/png">
        <title>Changer le mot de passe | سوق واثق</title>
		<link rel = "stylesheet" href = "css/bootstrap.css">
        <link rel = "stylesheet" href = "vendors/linericon/style.css">
        <link rel = "stylesheet" href = "css/font-awesome.min.css">
        <link rel = "stylesheet" href = "vendors/owl-carousel/owl.carousel.min.css">
        <link rel = "stylesheet" href = "vendors/lightbox/simpleLightbox.css">
        <link rel = "stylesheet" href = "vendors/nice-select/css/nice-select.css">
        <link rel = "stylesheet" href = "vendors/animate-css/animate.css">
        <link rel = "stylesheet" href = "css/style.css">
        <link rel = "stylesheet" href = "css/responsive.css">
        <link rel = "stylesheet" href = "css/sweetalert2.css">
    </head>
    <body>
        <header class = "header_area">
            <div class = "top_menu row m0">
                <div class = "container-fluid">
                    <div class = "float-left">
                        <p>Appeler nous : 0599 994 012</p>
                    </div>
                    <div class = "float-right">
                        <?php
                            menuNormal();
                        ?>
                    </div>
                </div>
            </div>
            <div class = "main_menu">
                <nav class = "navbar navbar-expand-lg navbar-light">
                    <?php globalNavbar();?>
                </nav>
            </div>
        </header>
        <section class = "banner_area">
            <div class = "banner_inner banner_inner_5 d-flex align-items-center">
                <div class = "container">
                    <div class = "banner_content text-center">
                        <h2>Changer le mot de passe</h2>
                        <div class = "page_link">
                            <a href = "index.php">Accueil</a>
                            <a href = "javascript: void(0)">Changer le mot de passe</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class = "tracking_box_area p_120">
            <div class = "container">
                <div class = "tracking_box_inner">
                    <img src = "img/logo/change_password.png" class = "logo-image-change-password"></img>
                    <p> Modifier votre mot de passe pour compléter la procédure de récupération du compte. 
                        <br>
                        Eviter de saisir l'ancien mot de passe s'il vous plait pour garder votre compte en plein sécurité..
                    </p>
                    <form class = "row tracking_form" action = "javascript: void(0)" method = "POST" onsubmit = "return changerPassword();">
                        <div class = "col-md-12 form-group">
                            <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez votre mot de passe.." required maxlength = 10>
                            <span class = "fa fa-eye" id = "eye-forget" name = "eye-forget" onclick = "showHidePasswordForgert();"></span>
                        </div>
                        <div class = "col-md-12 form-group">
                            <input type = "password" class = "form-control" id = "repeter_password" name = "repeter_password" placeholder = "Répétez votre mot de passe.." required maxlength = 10>
                        </div>
                        <div class = "col-md-12 form-group">
                            <button type = "submit" class = "btn submit_btn">Changer le mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <footer class = "footer-area section_gap">
            <?php footer(); ?>
        </footer>
    </body>
    <script src = "js/jquery-3.2.1.min.js"></script>
    <script src = "js/popper.js"></script>
    <script src = "js/bootstrap.min.js"></script>
    <script src = "js/stellar.js"></script>
    <script src = "vendors/lightbox/simpleLightbox.min.js"></script>
    <script src = "vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src = "vendors/isotope/isotope-min.js"></script>
    <script src = "vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src = "vendors/jquery-ui/jquery-ui.js"></script>
    <script src = "vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src = "vendors/counter-up/jquery.counterup.js"></script>
    <script src = "js/sweetalert2.all.min.js"></script>
    <script src = "js/fonctions.js"></script>
</html>