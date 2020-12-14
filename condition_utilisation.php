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
        <title>Conditions d'utilisation | سوق واثق</title>
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
                        <h2>Conditions d'utilisation</h2>
                        <div class = "page_link">
                            <a href = "index.php">Accueil</a>
                            <a href = "condition_utilisation.php">Conditions d'utilisation</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class = "blog_categorie_area">
            <div class = "container">
                <div class = "row">
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_legal.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 01</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>Il est interdit d'utiliser le service d'une manière qui enfreint les lois du Royaume d'Arabie Saoudite</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_application.png" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 02</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>L'utilisation de ce service non humain est interdite, à l'exception les sociétés suivantes :
                                    GOOGLE | FACEBOOK | TWITER</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_watheq.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 03</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Tous les contenus de ce service sont réservés à <br>"Watheq"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_communication.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 04</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Il n'est pas permis d'utiliser les moyens de communication avec les annonceur sauf dans le but d'acheter l'article</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_partage.png" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 05</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Il n'est pas permis d'utiliser le service dans le but de collecter des informations des personnes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_comercial.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 06</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Le site ne fournit aucune garantie pour toute <br>opération commerciale</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_user.png" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 07</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Un nom approprié doit être choisi lors du processus d'inscription</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_partage.png" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 08</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Un membre est obligé de ne pas partager ses informations avec aucun personne</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_proteger.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 09</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>"Watheq" s'engage à adopter les normes nécessaires pour protéger les données</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_echange.png" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 10</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Le service échange certaines informations avec votre appareil dans le but de vous fournir le service "Watheq"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_google_analytic.png" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 11</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Le site utilise des programmes statistiques tels que Google Analytics pour développer et améliorer le service</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_annonce.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 12</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Le matériel annoncé doit être uniquement un produit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_interdit.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 13</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Il est interdit de faire des publicités pour tout article trouvés dans la liste des produits interdits</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_categorie.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 14</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>La publicité doit être bien détaillée et dans la bonne catégorie</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_delete.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 15</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Le site a le droit de supprimer toute publicité sans indiquer les causes de la suppression</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_copie.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 16</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>Ne copiez aucune publicité du site</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_annonce.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 17</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>L'annonceur est tenu que les images ajoutées dans la publicité soient les mêmes que le produit annoncé</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_image_3.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 18</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>L'annonceur est tenu de ne pas ajouter plus de 3 annonces sur le site pour le même article</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_reponse.jpg" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 19</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>N'ajouter pas des réponses qui relève de la liste des réponses interdites</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-4">
                        <div class = "categories_post">
                            <img src = "img/wallpaper/background_message.png" alt = "Image">
                            <div class = "categories_details">
                                <div class = "categories_text">
                                    <a href = "javascript: void(0)">
                                        <h5>Terme 20</h5>
                                    </a>
                                    <div class = "border_line"></div>
                                    <p>N'envoyer pas des messages qui relève de la liste des messages interdits</p>
                                </div>
                            </div>
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