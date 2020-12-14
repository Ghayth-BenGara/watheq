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
        <title>Contact | سوق واثق</title>
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
                        <h2>Contacter nous</h2>
                        <div class = "page_link">
                            <a href = "index.php">Accueil</a>
                            <a href = "contact.php">Contacter nous</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class = "contact_area p_120">
            <div class = "container">
                <div id = "mapBox" class = "mapBox" data-lat = "23.8336786" data-lon = "36.0368183" data-zoom = "5" data-info = "Arabie Saoudite"
                    data-mlat = "23.8336786" data-mlon = "36.0368183">
                </div>
                <div class = "row">
                    <div class = "col-lg-3">
                        <div class = "contact_info">
                            <div class = "info_item">
                                <i class = "lnr lnr-home"></i>
                                <h6>Royaume Arabie saoudite</h6>
                                <p>Jedda</p>
                            </div>
                            <div class = "info_item">
                                <i class = "lnr lnr-phone-handset"></i>
                                <h6>
                                    <a href = "javascript: void(0)">0599 994 012</a>
                                </h6>
                                <p>Disponible 24 heures</p>
                            </div>
                            <div class = "info_item">
                                <i class = "lnr lnr-envelope"></i>
                                <h6>
                                    <a href = "javascript: void(0)">admin@sooqwatheq.co</a>
                                </h6>
                                <p>Envoyer-nous à tout moment !</p>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-9">
                        <form class = "row contact_form" action = "javascript: void(0)" method = "POST" id = "contactForm" name = "contactForm" onsubmit = "return formulaireContact();">
                            <div class = "col-md-6">
                                <div class = "form-group">
                                    <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez votre nom.." required>
                                </div>
                                <div class = "form-group">
                                    <input type = "email" class = "form-control" id = "email_contact" name = "email_contact" placeholder = "Saisissez votre adresse e-mail.." required>
                                </div>
                                <div class = "form-group">
                                    <input type = "text" class = "form-control" id = "sujet" name = "sujet" placeholder = "Saisissez votre sujet.." required>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class = "form-group">
                                    <textarea class = "form-control" name = "message" id = "message" rows = "1" placeholder = "Saisissez votre message.." required></textarea>
                                </div>
                            </div>
                            <div class = "col-md-12 text-right">
                                <button type = "submit" class = "btn submit_btn">Envoyer ce message</button>
                            </div>
                        </form>
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
    <script src = "js/google_map.js"></script>
    <script src = "js/gmaps.min.js"></script>
    <script src = "js/theme.js"></script>
    <script src = "js/sweetalert2.all.min.js"></script>
    <script src = "js/fonctions.js"></script>    
    <script src = "js/jquery-confirm.min.js"></script>      
    <script src = "js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate('#email_contact','email:Veuillez saisir une adresse e-mail valide..')
    </script>        
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