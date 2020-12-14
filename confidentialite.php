<?php
    session_start();
    require_once 'php/fonctions.php';
    if ((!isset($_SESSION['email'])) || (empty($_SESSION['email']))){
        $email_like = "";
    }
    else{
        $email_like = $_SESSION['email'];
    }
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href = "img/favicon.png" type = "image/png">
        <title>Confidentialité | سوق واثق</title>
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
        <link rel = "stylesheet" href = "css/jquery-confirm.min.css">
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
                            if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
                                $nom = getNom($_SESSION['email']);
                                menuVendeur($nom,$_SESSION['email']);
                            }
                            else{
                                menuNormal();
                            }
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
            <div class = "banner_inner banner_inner_2 d-flex align-items-center">
                <div class = "container">
                    <div class = "banner_content text-center">
                        <h2>Confidentialité</h2>
                        <div class = "page_link">
                            <a href = "index.php">Accueil</a>
                            <a href = "confidentialite.php">Confidentialité</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class = "section-top-border">
            <div class = "container">
                <div class = "row">
					<div class = "col-md-4">
                        <div class = "single-defination">
                            <h4 class = "mb-20">Régle 01</h4>
                            <h5 class = "mb20"><i class = "fa fa-bullhorn" aria-hidden = "true"></i> Annonces</h5>
                            <p>Vous engagez à ne pas publier des annonces non sérieuses</p>
                        </div>
                    </div>
                    <div class = "col-md-4">
                        <div class = "single-defination">
                            <h4 class = "mb-20">Régle 02</h4>
                            <h5 class = "mb20"><i class = "fa fa-smile-o" aria-hidden = "true"></i> Critique</h5>
                            <p>Vous engagez à ne pas critiquer les articles des autres</p>   
                        </div>
                    </div>
                    <div class = "col-md-4">
                        <div class = "single-defination">
                            <h4 class = "mb-20">Régle 03</h4>
                            <h5 class = "mb20"><i class = "fa fa-users" aria-hidden = "true"></i> Identification</h5>
                            <p>Vous engagez à ne pas faire des publicités avec plusieurs comptes</p>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class = "row">
                    <div class = "col-md-4">
                        <div class = "single-defination">
                            <h4 class = "mb-20">Régle 04</h4>
                            <h5 class = "mb20"><i class = "fa fa-exclamation-circle" aria-hidden = "true"></i> L'interdiction</h5>
                            <p>Vous engagez à ne pas faire des publicités pour des produits interdits</p>
                        </div>
                    </div>  
                    <div class = "col-md-4">
                        <div class = "single-defination">
                            <h4 class = "mb-20">Régle 05</h4>
                            <h5 class = "mb20"><i class = "fa fa-lock" aria-hidden = "true"></i> Sécurité</h5>
                            <p>Vous engagez à ne partager vos informations à aucun personne</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class = "footer-area section_gap">
            <?php footer(); ?>
        </footer>
    </body>
    <script src = "js/jquery-3.2.1.min.js"></script>
	<script src = "js/popper.js"></script>
	<script src = "js/bootstrap.min.js"></script>
	<script src = "js/stellar.js"></script>
	<script src = "vendors/lightbox/simpleLightbox.min.js"></script>
	<script src = "vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src = "vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src = "vendors/isotope/isotope-min.js"></script>
	<script src = "vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src = "vendors/jquery-ui/jquery-ui.js"></script>
	<script src = "vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src = "vendors/counter-up/jquery.counterup.js"></script>
	<script src = "js/theme.js"></script>
	<script src = "js/sweetalert2.all.min.js"></script>
	<script src = "js/fonctions.js"></script>
    <script src = "js/jquery-confirm.min.js"></script>
    <script>
        function updateUserStatus(){
            $.ajax({
                url:'php/fonctions.php',
                method:'POST',
                data:{
                    email:"<?php echo $email_like?>",
                    actionUpdateStatut:'update'
                },
                success:function(data){}
            })
        }

        setInterval(function(){
            updateUserStatus();
        }, 5000);
    </script>
</html>