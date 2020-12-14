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
		<title>Annonces de mois | سوق واثق</title>
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
                    <h2>Annonce de mois</h2>
                    <div class = "page_link">
                        <a href = "index.php">Accueil</a>
                        <a href = "annonce_cet_mois.php">Annonce de mois</a>
                    </div>
                </div>
            </div>
        </div>
        </section>   
        <section class = "cat_product_area section_gap">
            <div class = "container-fluid">
                <div class =" row flex-row-reverse">   
                    <div class = "col-lg-9"> 
                        <div class = "latest_product_inner row" id = "filter_data">

                        </div>
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
    <script>
        $(document).ready(function(){
            filter_data();

            function filter_data(){
                var email_like = "<?php echo $email_like;?>";
                
                $.ajax({
                    url:"php/fonctions.php",
                    method:"POST",
                    data:{email:email_like,actionAnnonceCeMois:'filter'},
                    success:function(data){
                        $('#filter_data').html(data).show(); 
                    }
                });
            }

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