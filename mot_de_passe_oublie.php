<?php
  session_start();
  require_once 'php/fonctions.php';
  verificationSession();
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
		<meta charset = "utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href = "img/favicon.png" type = "image/png">
        <title>Mot de passe oublié | سوق واثق</title>
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
                        <h2>Mot de passe oublié</h2>
                        <div class = "page_link">
                            <a href = "index.php">Accueil</a>
                            <a href = "mot_de_passe_oublie.php">Mot de passe oublié</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class = "checkout_area section_gap">
		    <div class = "container">
                <div class = "cupon_area">
				    <div class = "check_title">
					    <h2>Pas besoin de cette récupération?
						    <a href = "login.php">Cliquez ici pour s'authentifier</a>
                        </h2>
                    </div>
                    <br>
                    <p>Merci de saisir votre adresse e-mail pour recevoir votre code de sécurité.. </p> 
                    <form  action = "javascript: void(0)" method = "POST" id = "f" name ="f" onsubmit = "return formulairePasswordOublie();">
				        <input type = "email" id = "email_forget" name = "email_forget" placeholder = "Saisissez votre adresse e-mail.." required>
				        <button class = "tp_btn buton_a" type = "submit">Envoyer</button>
                    </form>
                    <img src = "img/wallpaper/background_proteger.jpg"></img>
                </div>
			</div>
        </section>
        <section class = "subscription-area section_gap">
			<div class = "container">
				<div class = "row justify-content-center">
					<div class = "col-lg-8">
						<div class = "section-title text-center">
                            <h2>Notifications</h2>
							<span>Abonnez-vous pour être notifié des nouvelles annonces..</span>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class = "col-lg-6">
						<div id = "mc_embed_signup">
                            <form action = "javascript: void(0)" method = "POST" class = "subscription relative" onsubmit = "return formulaireNotification();">
                                <input type = "email" name = "email" id = "email" placeholder = "Saisissez votre adresse e-mail.." required>
                                <button type = "submit" class = "newsl-btn">S'abonner</button>
                            </form>
						</div>
					</div>
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
    <script src = "js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate('#email_forget','email:Veuillez saisir une adresse e-mail valide..')
        bootstrapValidate('#email','email:Veuillez saisir une adresse e-mail valide..')
    </script> 
</html>