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
        <title>Connexion | سوق واثق</title>
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
            <div class = "banner_inner banner_inner_3 d-flex align-items-center">
                <div class = "container">
                    <div class = "banner_content text-center">
                        <h2>Connexion</h2>
                        <div class = "page_link">
                            <a href = "index.php">Accueil</a>
                            <a href = "login.php">Connexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<section class = "login_box_area p_120">
			<div class = "container">
				<div class = "row">
					<div class = "col-lg-6">
						<div class = "login_box_img">
							<img class = "img-fluid" src = "img/wallpaper/background_login_login.jpg" alt = "Image">
							<div class = "hover">
								<h4>Nouveau sur le site ?</h4>
								<p>Créer un nouveau compte pour suivre les nouvelles annonces sur notre site.</p>
								<a class = "main_btn" href = "creer_compte.php">Creer un nouveau compte</a>
							</div>
						</div>
					</div>
					<div class = "col-lg-6">
						<div class = "login_form_inner">
							<h3>Authentification</h3>
							<form class = "row login_form" action = "javascript: void(0)" method = "POST" id = "contactForm" onsubmit = "return formulaireLogin();">
								<div class = "col-md-12 form-group">
									<input type = "email" class = "form-control" id = "email_login" name = "email_login" placeholder = "Saisissez votre adresse e-mail.." required>
								</div>
								<div class="col-md-12 form-group">
									<input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez votre mot de passe .." required>
									<span class = "fa fa-eye" id = "eye" name = "eye" onclick = "showHidePassword();"></span>
								</div>
								<div class = "col-md-12 form-group">
									<div class = "creat_account">
										<input type = "checkbox" id = "f-option2" name = "selector" checked>
										<label for = "f-option2">Sauvegarder</label>
									</div>
								</div>
								<div class = "col-md-12 form-group">
									<button type = "submit" class = "btn submit_btn">Se connecter</button>
									<a href = "mot_de_passe_oublie.php">Mot de passe oublié ?</a>
								</div>
							</form>
						</div>
					</div>
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
        bootstrapValidate('#email_login','email:Veuillez saisir une adresse e-mail valide..')  
		bootstrapValidate('#email','email:Veuillez saisir une adresse e-mail valide..')
    </script> 
</html>