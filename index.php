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
		<title>Accueil | سوق واثق</title>
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
		<link rel = "stylesheet" href = "css/slide_index.css">
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
	<section class = "home_banner_area">
		<div class = "overlay"></div>
		<div class = "banner_inner d-flex align-items-center">
			<div class = "container">
				<div class = "banner_content row">
					<div class = "offset-lg-2 col-lg-8">
						<h3>Trouver votre article de rêve ici</h3>
						<p>Souq Watheq ouvre ses portes de son paradis et vous offre chaque jour ses nouveaux annonces avec plusieurs catégories disponible.</p>
						<a class = "white_bg_btn" href = "general.php">Commencer</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class = "hot_deals_area section_gap">
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-lg-6">
					<div class = "hot_deal_box">
						<img class = "img-fluid" src = "img/wallpaper/background_application.png" alt = "Image" style = "width:100%;">
						<div class="content">
							<h2>Annonces de mois</h2>
							<p>Vérifier</p>
						</div>
						<a class = "hot_deal_link" href = "annonce_cet_mois.php"></a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class = "hot_deal_box">
					<img class = "img-fluid" src = "img/wallpaper/background_application.png" alt = "Image" style = "width:100%;">
						<div class="content">
							<h2>Annonces de mois</h2>
							<p>Vérifier</p>
						</div>
						<a class = "hot_deal_link" href = "annonce_cet_mois.php"></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class = "clients_logo_area">
		<div class = "container-fluid">
			<div class = "clients_slider owl-carousel">
				<div class = "item">
					<img src = "img/logo/immobilier.jpg" alt = "Image">
				</div>
				<div class = "item">
                <img src = "img/logo/financement.png" alt = "Image">
				</div>
				<div class = "item">
					<img src = "img/logo/mobile.png" alt = "Image">
				</div>
				<div class = "item">
                    <img src = "img/logo/voiture.png" alt = "Image">
				</div>
				<div class = "item">
                    <img src = "img/logo/quade.png" alt = "Image">
                </div>
                <div class = "item">
                    <img src = "img/logo/camion.png" alt = "Image">
				</div>
				<div class = "item">
                    <img src = "img/logo/piece.png" alt = "Image">
				</div>
			</div>
		</div>
	</section>
	<h1 id = "text-index">Ce qui nous offrons</h1>
	<div class = "slideshow-container">
		<div class = "mySlides fade">
  			<div class = "numbertext">1 / 4</div>
  			<img src = "img/wallpaper/background_categorie.jpg" style = "width:100%">
  			<div class = "text">Plusieurs catégories</div>
		</div>
		<div class = "mySlides fade">
  			<div class = "numbertext" style = "color:white">2 / 4</div>
  			<img src = "img/wallpaper/background_annonce_index.jpg" style = "width:100%">
  			<div class = "text" style = "color:white">Infinités des articles</div>
		</div>
		<div class = "mySlides fade">
  			<div class = "numbertext" style = "color:white">3 / 4</div>
  			<img src = "img/wallpaper/backhround_gestion_compte.png" style = "width:100%">
  			<div class = "text">Une gestion de compte</div>
		</div>
		<div class = "mySlides fade">
  			<div class = "numbertext">4 / 4</div>
  			<img src = "img/wallpaper/background_communication.jpg" style = "width:100%">
  			<div class = "text">Un espace de communiction</div>
		</div>
		<br>
		<div style = "text-align:center">
  			<span class = "dot"></span> 
  			<span class = "dot"></span> 
			<span class = "dot"></span> 
			<span class = "dot"></span> 
		</div>
	</div>
	<br>
	<section class = "feature_product_area section_gap">
		<div class = "main_box">
			<div class = "container-fluid">
				<div class = "row">
					<div class = "main_title">
						<h2>Produits à la une</h2>
						<p>Chaque jour vous trouverez des nouvelles annonces publiés.</p>
					</div>
				</div>
				<div class = "row" id = "filter_data">
					
				<div>
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
							<input type = "email" name = "email" id = "email" placeholder = "Saisissez votre adresse e-mail.." required value = "<?php echo $email_like; ?>">
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
	<script src = "js/bootstrap-validate.js"></script>
  	<script>
		bootstrapValidate('#email','email:Veuillez saisir une adresse e-mail valide..')
		$(document).ready(function(){
        get_data();

        function get_data(){
            var email_like = "<?php echo $email_like;?>";
                
            $.ajax({
                url:"php/fonctions.php",
                method:"POST",
                data:{email:email_like,actionCurentDay:'filter'},
                    success:function(data){
                        $('#filter_data').html(data).show();
                    }
                });
            }

            $(document).on('click', '.like', function(){ 
                var email = "<?php echo $email_like;?>";
                var id = $(this).data("id");
                var table = $(this).attr("data-table");
                
                $.ajax({
                    type:"POST",
                    url:"php/fonctions.php",
                    context:this,
                    data:{
                        id:id,
                        email:email,
                        table:table,
                        actionReaction:'like'
                    },
                    success: function(data){
                        $(this).removeClass('lnr lnr-heart'); 
                        $(this).addClass('lnr lnr-heart-pulse');
                    }
                });
            });
		});
		
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

		var slideIndex = 0;
		showSlides();

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
  			slideIndex++;
  			if(slideIndex > slides.length) {
				slideIndex = 1
			}    
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" activee", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " activee";
  			setTimeout(showSlides, 3000);
		}
	</script>
</html>