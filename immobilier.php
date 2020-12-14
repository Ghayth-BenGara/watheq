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
		<title>Immobiliers | سوق واثق</title>
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
			<div class = "banner_inner banner_inner_5 d-flex align-items-center">
				<div class = "container">
				<div class = "banner_content text-center">
					<h2>Immobiliers</h2>
					<div class = "page_link">
					<a href = "index.php">Accueil</a>
					<a href = "javascript: void(0)">Catégorie </a>
					<a href = "immobilier.php">Immobiliers</a>
					</div>
				</div>
				</div>
			</div>
        </section>   
		<section class = "cat_product_area section_gap">
            <div class = "container-fluid">
                <div class =" row flex-row-reverse">   
                    <div class = "col-lg-9"> 
                        <div class = "product_top_bar">               
                            <div class = "col-md-6 form-group p_star col-lg-4">
                                <select class = "country_select show tri" name = "tri" id = "tri" required>
                                    <label><option class = "show tri" value = "5">  05 articles</label>
                                    <label><option class = "show tri" value = "10"> 10 articles</label>
                                    <label><option class = "show tri" value = "15"> 15 articles</label>
                                    <label><option class = "show tri" value = "20"> 20 articles</label>
                                    <label><option class = "show tri" value = "25"> 25 articles</label>
                                    <label><option class = "show tri" value = "30"> 30 articles</label>
                                </select>
                            </div>
                        </div>
                        <div class = " filter_data"></div>
                    </div>
                    <div class = "col-lg-3">
                        <div class = "left_sidebar_area">
                            <aside class = "left_widgets cat_widgets">
							    <div class = "l_w_title">
								    <h3>Catégories</h3>
                                </div>
                                <div class = "widgets_inner">
                                    <?php menuCategorie();?>
                                </div>
                            </aside> 
							<aside class = "left_widgets p_filter_widgets">
								<div class="l_w_title">
									<h3>Immobiliers</h3>
								</div>
								<div class = "widgets_inner">
									<h4>Type</h4>
									<ul class = "list">
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Appartements à louer">Appartements à louer</label>
										</li>
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Appartements à vendre">Appartements à vendre</label>
										</li>
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Bâtiments à louer">Bâtiments à louer</label>
										</li>
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Bâtiments à vendre">Bâtiments à vendre</label>
										</li>
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Ferme à louer">Ferme à louer</label>
										</li>
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Ferme à vendre">Ferme à vendre</label>
										</li>
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Maison à louer">Maison à louer</label>
										</li>
										<li>
											<label><input type = "checkbox" class = "common_selector nom" value = "Maison à vendre">Maison à vendre</label>
										</li>
									</ul>
								</div>
							</aside>
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
                                <input type = "email" name = "email" id = "email" placeholder = "Saisissez votre adresse e-mail.." required value = "<?php echo $email_like; ?>">
                                <button type = "submit" class = "newsl-btn">S'abonner</button>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</section>
    </body>
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
	<script>
        $(document).ready(function(){
            filter_data();
            function filter_data(page){
                $('.filter_data').html('<div id = "loading"></div>');
                var action = 'fetch_data';
                var nom = get_filter('nom');
                var tri = get_filter_tri('tri');
                var table = 'article_immobiliers';
                var email_like = "<?php echo $email_like;?>";
                
                $.ajax({
                    url:"php/fonctions.php",
                    method:"POST",
                    data:{action:action, type:nom, table:table,tri:tri,page:page,email:email_like,actionFilterAnnonce:'filter'},
                    success:function(data){
                        setTimeout(function(){
                            $('.filter_data').html(data).show();
                        }, 1000);
                    }
                });
            }

            function get_filter(class_name){
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            function get_filter_tri(class_name){
                $('.'+class_name+':selected').each(function(){
                    filter = $(this).val();
                });
                return filter;
            }

            $('.common_selector').click(function(){
                filter_data();
            });

            $('.show').change(function(){
                filter_data();
            });

            $(document).on('click', '.page-link', function(){  
                var page = $(this).attr("id");  
                filter_data(page);
            });
            
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
</script>
</html>