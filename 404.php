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
        <title>Page introuvable | سوق واثق</title>
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
            <div class = "banner_inner banner_inner_4 d-flex align-items-center">
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