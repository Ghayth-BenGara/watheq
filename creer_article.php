<?php
  session_start();
  require_once 'php/fonctions.php';
  verificationSessionInverse();
  $row = getInformationProfil($_SESSION['email']);
  if($_GET['email'] != $_SESSION['email']){
    header('Location: 404.php');
  }
?>
<!DOCTYPE html>
<html lang = "en">   
  <head>
    <meta charset = "utf-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "icon" href = "img/favicon.png" type = "image/png">
    <title>Créer un article | سوق واثق</title>
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
              $nom = getNom($_SESSION['email']);
              menuVendeur($nom,$_SESSION['email']);
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
            <h2>Articles</h2>
            <div class = "page_link">
              <a href = "index.php">Accueil</a>
              <a href = "javascript: void(0)">Login</a>
              <a href = "creer_article.php?email=<?php echo $_SESSION['email'];?>">Créer un article</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class = "blog_area">
      <div class = "container">
        <div class = "row">
          <div class = "col-lg-8">
            <div class = "blog_left_sidebar">
              <article class = "row blog_item">
                <div class = "col-md-3">
                  <div class = "blog_info">
                    <ul class = "blog_meta list">
                      <?php   
                        menuCompteVendeur($_SESSION['email']);
                      ?>
                    </ul>
                  </div>
                </div>
                <div class = "col-md-9">
                    <div class = "blog_post">
                        <div class = "blog_details">
                            <div class = "row">
                                <div class = "col-lg-12 col-md-12">
                                    <h3>Créer un nouvel article</h3>
                                    <form class = "row contact_form" action = "javascript: void(0)" method = "POST" enctype = "multipart/form-data" onsubmit = "return ajouterArticle();">
                                        <input type = "hidden" name = "email" id = "email" value = "<?php echo $_SESSION['email'];?>" required>
                                        <div class = "col-md-8 form-group p_star">
                                            <input type = "text" class = "form-control" id = "titre" name = "titre" required placeholder = "Saisissez le titre de l'article..">
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <select class = "country_select" name = "article" id = "article" onchange = "choisirNomMarque()">
                                                <option value = "article"selected disabled>Articles</option>
                                                <option id = "camions" value = "Camions">Camions</option>
                                                <option id = "catégorie général" value = "Catégorie général">Catégorie général</option>
                                                <option id = "financement et versement" value = "Financement et Versement">Financement et Versement</option>
                                                <option id = "immobilier" value = "Immobiliers">Immobiliers</option>
                                                <option id = "materiaux" value = "Matériaux">Matériaux</option>
                                                <option id = "piéces" value = "Piéces de réchange">Piéces de réchange</option>
                                                <option id = "quades" value = "Quades">Quades</option>
                                                <option id = "voiture" value = "Voitures">Voitures</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <select class = "country_select" name = "list" id = "list">
                                                <option id = "Liste des articles"selected disabled>Liste des articles</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <input type = "number" class = "form-control" id = "prix" name = "prix" required placeholder = "Saisissez le prix de l'article..">
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <textarea class = "form-control" name = "description" id = "descrption" rows = "1" placeholder = "Saisissez la description de l'article.." required></textarea>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <select class = "country_select" name = "negociation" id = "negociation">
                                                <option value = "negociation" selected disabled>Négociable</option>
                                                <option id = "Oui">Oui</option>
                                                <option id = "Oui">Non</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <select class = "country_select" name = "etat" id = "etat">
                                                <option value = "etat" selected disabled>Etat de l'article</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <input type = "file" class = "form-control" id = "image1" name = "image1" required>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <input type = "file" class = "form-control" id = "image2" name = "image2" required>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <input type = "file" class = "form-control" id = "image3" name = "image3" required>
                                        </div>
                                        <div class = "col-md-8 form-group p_star">
                                            <button type = "submit" class = "btn submit_btn" id = "add" name = "add" >Creer un article</button>
                                        </div>
                                    </form>
                                    <br>
                                    <div id = "alert_message" class = "alert_message">

                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
              </article>  
            </div>
          </div>
          <div class = "col-lg-4">
            <div class = "blog_right_sidebar">
              <aside class = "single_sidebar_widget author_widget">
                <?php imageAndDetail($_SESSION['email']);?>
                <br>
                <p>Région :<b id = "local" name = "local">Région</b></p>
                <div class = "br"></div>
              </aside>
              <aside class = "single_sidebar_widget post_category_widget">
                <h4 class = "widget_title">Informations</h4>
                <ul class = "list cat-list">
                  <li>
                    <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                      <p>Nom</p>
                      <p><?php echo $row['nom']; ?></p>
                    </a>
                  </li>
                  <li>
                    <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                      <p>Email</p>
                      <p><?php echo $row['email']; ?></p>
                    </a>
                  </li>
                  <li>
                    <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                      <p>Genre</p>
                      <p><?php echo $row['genre']; ?></p>
                    </a>
                  </li>
                  <li>
                    <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                      <p>Numéro</p>
                      <p><?php echo $row['numero']; ?></p>
                    </a>
                  </li>
                  <li>
                    <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                      <p>Pays</p>
                      <p><?php echo $row['pays']; ?></p>
                    </a>
                  </li>
                  <li>
                    <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                      <p>Gouvernorat</p>
                      <p><?php echo $row['gouvernorat']; ?></p>
                    </a>
                  </li>
                  <li>
                    <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                      <p>Ville</p>
                      <p><?php echo $row['ville']; ?></p>
                    </a>
                  </li>
                </ul>
                <div class = "br"></div>
              </aside>
              <aside class = "single_sidebar_widget popular_post_widget">
                <h3 class = "widget_title">Annonces populaires</h3>
                <?php articlePopulaire($_SESSION['email']); ?>
              </aside>
              <aside class = "single-sidebar-widget newsletter_widget">
              <h4 class = "widget_title">Notifications</h4>
              <p>        
                Ici, je me concentre sur une gamme d'articles et de fonctionnalités que nous utilisons dans la vie sans leur donner une seconde pensée.
              </p>            
              <form method = "POST" action = "javascript: void(0)" onsubmit = "return desabonner()">
                <div class = "form-group d-flex flex-row">
                  <div class = "input-group">
                    <div class = "input-group-prepend">
                      <div class = "input-group-text">
                        <i class = "fa fa-envelope" aria-hidden = "true"></i>
                      </div>
                    </div>
                    <input type = "email" class = "form-control" id = "email_des" placeholder = "Saisissez votre e-mail.." required name = "email" value = "<?php echo $_SESSION['email'];?>">
                  </div>
                  <button href = "#" class = "bbtns" type = "submit">Désabonner</button>
                </div>
              </form>
              <p class = "text-bottom">Vous pouvez désabonner à tout moment</p>
            <div class="br"></div>
          </aside>
          <aside id = "load" class = "load">
          
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
      afficherLocalisation();
    });

    function desabonner(){
		  var test = validateEmail($('#email_des').val());
      if(test == false){
        alertEmailNonValide();
      }
      else{
        var session = "<?php echo $_SESSION['email'];?>";
        if(session != $('#email_des').val()){
          alertErreurEmail();
        }
        else{
          $('.load').html('<div id = "loading2"></div>');
          var email = $('#email_des').val();	
          $.ajax({
            url:"php/fonctions.php",
            method:"POST",
            data:{email:email,actionDesabonner:'delete'},
            success:function(data){
            setTimeout(function(){
              $('.load').html(data).hide().fadeIn('12000').delay(12000).fadeOut();
            },2000);
            setInterval(function(){location.reload(true);},14000);
            }			
          })
        }
      }
    }	
  </script>
  <script>
    function updateUserStatus(){
      $.ajax({
        url:'php/fonctions.php',
        method:'POST',
        data:{
          email:"<?php echo $_SESSION['email']?>",
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