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
        <title>Créer un compte | سوق واثق</title>
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
                        <h2>Créer un compte</h2>
                        <div class = "page_link">
                            <a href = "index.php">Accueil</a>
                            <a href = "creer_compte.php">Créer un compte</a>
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
								<h4>Vous avez un compte déja ?</h4>
								<p>S'authentifier avec votre adresse e-mail et votre mot de passe pour bénéficier plus de nos services.</p>
								<a class = "main_btn" href = "login.php">Connexion</a>
							</div>
						</div>
					</div>
					<div class = "col-lg-6">
						<div class = "login_form_inner reg_form">
							<h3>Créer un nouveau compte</h3>
							<form class = "row login_form" action = "javascript: void(0)" method = "POST" id = "contactForm" onsubmit = "return formulaireCreerCompte();">
								<div class = "col-md-12 form-group">
									<input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez votre nom.." required >
								</div>
								<div class = "col-md-12 form-group">
									<input type = "email" class = "form-control" id = "email_creer" name = "email_creer" placeholder = "Saisissez votre adresse e-mail.." required>
								</div>
								<div class = "col-md-12 form-group">
									<input type = "number" class = "form-control" id = "numero" name = "numero" placeholder = "Saisissez votre numéro mobile.." required>
								</div>
								<div class = "col-md-6 form-group">
									<select id = "sexe" name = "sexe" required>
										<option selected disabled value = "Genre">Genre..</option>
										<option value = "Homme">Homme</option>
										<option value = "Femme">Femme</option>
									</select>
								</div>
								<div class = "col-md-6 form-group">
									<select id = "pays" name = "pays" required>
										<option selected disabled value = "Pays">Pays..</option>
										<option value = "Arabie Saoudite">Arabie Saoudite</option>
									</select>
								</div>
								<div class = "col-md-6 form-group">
									<select id = "gouvernorat" name = "gouvernorat" required onchange = "choisirVille()">
										<option selected disabled value = "">Gouvernorat..</option>
										<option value = "منطقة عسير">منطقة عسير</option>
										<option value = "المنطقة الشرقية">المنطقة الشرقية</option>
										<option value = "منطقة حائل">منطقة حائل</option>
										<option value = "منطقة الجوف">منطقة الجوف</option>
										<option value = "منطقة جازان">منطقة جازان</option>
										<option value = "منطقة مكة">منطقة مكة</option>
										<option value = "منطقة نجران">منطقة نجران</option>
										<option value = "منطقة القصيم">منطقة القصيم</option>
										<option value = "منطقة تبوك">منطقة تبوك</option>
										<option value = "منطقة الباحة">منطقة الباحة</option>
										<option value = "منطقةالحدود الشمالية">منطقةالحدود الشمالية</option>
										<option value = "منطقة المدينة">منطقة المدينة</option>
										<option value = "منطقة الرياض">منطقة الرياض</option>
									</select>
								</div>
								<div class = "col-md-6 form-group">
									<select id = "ville" name = "ville" required>
										<option selected disabled value = "Ville">Ville..</option>
									</select>
								</div>
								<div class = "col-md-12 form-group">
									<input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez votre mot de passe.." required maxlength = 10>
									<span class = "fa fa-eye" id = "eye" name = "eye" onclick = "showHidePasswordCreerCompte();"></span>
								</div>
								<div class = "col-md-12 form-group">
									<input type = "password" class = "form-control" id = "repter_password" name = "repter_password" placeholder = "Répéter votre mot de passe.." required maxlength = 10>
								</div>
								<div class = "col-md-12 form-group">
									<div class = "creat_account">
										<input type = "checkbox" id = "condition" name = "condition" onchange = "enableBouton()">
										<label for = "condition">J'accepte les <strong>conditions d'utilisation</strong></label>
									</div>
								</div>
								<div class = "col-md-12 form-group">
									<button type = "submit" class = "btn submit_btn" id = "creer" name = "creer" disabled>Créer ce compte</button>
								</div>
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
	<script src = "js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate('#email_creer','email:Veuillez saisir une adresse e-mail valide..')
		bootstrapValidate('#numero','min:8:Le numéro mobile doit être de 8 chiffres..')
		bootstrapValidate('#numero','max:8:Le numéro mobile doit être de 8 chiffres..')
    </script> 
