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
		<title>Articles : Détails | سوق واثق</title>
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
		<link rel = "stylesheet" href = "css/rate.css">;
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
			<div class = "banner_inner banner_inner_5 d-flex align-items-center">
				<div class = "container">
				<div class = "banner_content text-center">
					<h2>Détails de l'article</h2>
					<div class = "page_link">
					<a href = "index.php">Accueil</a>
					<a href = "javascript: void(0)">Catégorie </a>
					<a href = "javascript:void()">Détails</a>
					</div>
				</div>
				</div>
			</div>
        </section>   
		<div class = "product_image_area">
			<div class = "container">
				<div class = "row s_product_inner">
					<div class = "col-lg-6">  
						<div class = "s_product_img">
							<div id = "carouselExampleIndicators" class = "carousel slide" data-ride = "carousel">
								<?php
									getImagesArticles($_GET['article'],$_GET['id']);
								?>
							</div>
						</div>
					</div>
				<div class = "col-lg-5 offset-lg-1">
					<?php
						getDetailArticle($_GET['article'],$_GET['id']);
					?>
					<?php getInformationsVendeurPourContacter($_GET['article'],$_GET['id'],$email_like); ?>
				</div>
				
			</div>
		</div>
		<section class = "product_description_area">
			<div class = "container">
				<ul class = "nav nav-tabs" id = "myTab" role = "tablist">
					<li class = "nav-item">
						<a class = "nav-link" id = "home-tab" data-toggle = "tab" href = "#home" role = "tab" aria-controls = "home" aria-selected = "true">Details</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link" id = "profile-tab" data-toggle = "tab" href = "#profile" role = "tab" aria-controls = "profile" aria-selected = "false">Spécifications</a>
					</li>
					<li class  ="nav-item">
						<a class = "nav-link active" id = "review-tab" data-toggle = "tab" href = "#review" role = "tab" aria-controls = "review" aria-selected = "false">Avis</a>
					</li>
				</ul>
				<div class = "tab-content" id = "myTabContent">
					<div class = "tab-pane fade" id = "home" role = "tabpanel" aria-labelledby = "home-tab">
						<p><?php getDetailDescription($_GET['article'],$_GET['id']); ?></p>
					</div>
					<div class = "tab-pane fade" id = "profile" role = "tabpanel" aria-labelledby = "profile-tab">
						<div class = "table-responsive">
							<table class = "table">
								<?php getSpecifications($_GET['article'],$_GET['id']); ?>
							</table>
						</div>
					</div>
					<div class = "tab-pane fade show active" id = "review" role = "tabpanel" aria-labelledby = "review-tab">
						<div class = "row">
							<div class = "col-lg-6">
								<div class = "row total_rate">
									<div class = "col-6">
										<div class = "box_total">
											<?php nombreAvis($_GET['article'],$_GET['id']); ?>
										</div>
									</div>
									<div class = "col-6">
										<div class = "rating_list">
											<h3>Vos avis</h3>
											<ul class = "list">
												<?php getNbrStarParTable($_GET['article'],$_GET['id']);?>
											</ul>
										</div>
									</div>
								</div>
								<div class = "review_list">
									<?php getComment($_GET['id'],$_GET['article']);?>
								</div>
							</div>
						<div class = "col-lg-6">
							<div class = "review_box">
								<h4>Ajouter votre commentaire</h4>
								<p>Votre commentaire aide les autres clients à évaluer l'article..</p>								
								<?php 
									if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
										commentaireActiver($_SESSION['email']);
										
									}
									else {
										commentaireDesactiver();
									}
								?>
								<div id = "load" class = "load"></div>
							</div>
						</div>
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
						<form action = "#" method = "POST" class = "subscription relative" onsubmit = "return formulaireNotification();">
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
	<script src = "js/rate.js"></script>
	<script>
		$(function () {
			$("#rateYo").rateYo({
				fullStar: true,
				starWidth: "20px",
				ratedFill: "#fbd600",
				onSet:function(avis,rateYolnstance){
					$("#avis").val(avis);
				}
			});
		});

        function ajouterAvis(){
        	var nom = $('#nom').val();
            var message = $('#message_avis').val();
			var avis = $('#avis').val();

			email = "<?php echo $email_like;?>";
			id_article = "<?php echo $_GET['id'];?>";
			article = "<?php echo $_GET['article'];?>";			
                
            $.ajax({
                url:"php/fonctions.php",
                method:"POST",
                data:{nom:nom, message:message, avis:avis, email:email, id:id_article, table:article, actionAvis:'insert'},
                success:function(data){
					setTimeout(function(){
						$('.load').html(data).hide().fadeIn('6000').delay(6000).fadeOut();
						 
					},10);
					setInterval(function(){location.reload(true);},6000);
				}			
    		})
        }	
	</script>
	<script>
		var id = "<?php echo $_GET['id'];?>";
		article = "<?php echo $_GET['article'];?>";
		$(document).ready(function(){
			$(document).on('click','#btn_more',function(){
				var last_comment_id = $(this).data('cid');
				$('#btn_more').html("loading..");
				$.ajax({
					url:'php/fonctions.php',
					method:'POST',
					data:{
						id:id,last_comment_id:last_comment_id,article:article,loadComment:'load'
					},
					dataType:'text',
					success:function(data){
						if(data.trim() != ''){
							$('#remove_row').remove();
							$('#review_item').append(data.trim());
						}
						else{
							$('#btn_more').text('Rien à afficher..');
							$('#btn_more').addClass('disabled_btn_more');
						}
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
	</script>

</html>