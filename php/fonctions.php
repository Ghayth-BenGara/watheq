<?php
    //envoie email de contacter nous
    if(isset($_POST['actionEnvoieEmailContact'])){
        envoyerEmailContact();
    }

    //test compte
    else if(isset($_POST['actionTest'])){
        testCompte();
    }

    //creer compte
    else if(isset($_POST['actionCreer'])){
        creerCompte();
    }

    //creer journal
    else if(isset($_POST['actionJournal'])){
        creerJournal();
    }

    //creer une session
    else if(isset($_POST['actionSession'])){
        creerSession();
    }

    //test compte vendeur
    else if(isset($_POST['actionTestVendeur'])){
        testCompteVendeur();
    }

    //envoi email vers le vendeur
    else if(isset($_POST['actionMailVendeur'])){
        envoiEmailVendeur();
    }

    //creer session pour le test
    else if(isset($_POST['actionSessionTest'])){
        creerSessionTest();
    }

    //modifier le mot de passe
    else if(isset($_POST['actionUpdatePassword'])){
        modifierPassword();
    }

    //vider la session
    else if(isset($_POST['freeSession'])){
        freeSession();
    }

    //modifier le vendeur
    else if(isset($_POST['actionUpdateVendeur'])){
        updateVendeur();
    }

    //ajouter une photo de vendeur
    else if(isset($_POST['actionAjouterPhoto'])){
        updatePhotoVendeur();
    }

    //creer un article
    else if(isset($_POST['actionUpdateArticle'])){
        creerArticle();
    }

    //afficher mes articles
    else if(isset($_POST['actionGetArticle'])){
        getMesArticles();
    }

    //supprimer un article
    else if(isset($_POST['actionDelete'])){
        supprimerArticle();
    }

    //supprimer un article
    else if(isset($_POST['actionDelete2'])){
        supprimerArticle2();
    }

    //afficher les articles selon les checkbox
    else if(isset($_POST['actionFilterData'])){
        filterData();
    }

    //afficher les articles
    else if(isset($_POST['actionFilterAnnonce'])){
        filterData2();
    }

    //update le nombre de vue
    else if(isset($_POST['actionUpdateVue'])){
        updateVue();
    }

    //ajouter un avis
    else if(isset($_POST['actionAvis'])){
        ajouterAvis();
    }

    //afficher autre commentaire
    else if (isset($_POST['loadComment'])){
        loadMoreComment();
    }

    //creer une session pour les notification
    else if(isset($_POST['actionSessionNotif'])){
        creerSessionNotification();
    }

    //remplis la liste des favoris
    else if(isset($_POST['actionAjouterListeFavoris'])){
        creerListeFavoris();
    }

    //modifier la liste de favoris
    else if(isset($_POST['actionUpdateListeFavoris'])){
        updateListeFavoris();
    }

    //desabonner
    else if(isset($_POST['actionDesabonner'])){
        desabonnerListe();
    }

    //retourné l'image et le nom
    else if(isset($_GET['actionGetData'])){
        getImageNomCompte();
    }

    //like function
    else if(isset($_POST['actionReaction'])){
        reaction();
    }

    //annonce de ce mois
    else if (isset($_POST['actionAnnonceCeMois'])){
        getAnnoncesCeMois();
    }

    // annonce d'aujourd'hui
    else if(isset($_POST['actionCurentDay'])){
        annonceCurentDay();
    }

    //supprimer le journal d'authentification
    else if(isset($_POST['actionDeleteJournal'])){
        deleteJournalAuthentification();
    }

    //echange des messages
    else if(isset($_POST['actionSendMessage'])){
        sendMessage();
    }

    //message instantané
    else if(isset($_POST['actionRealTime'])){
        messageInstantane();
    }

    //ouvrir mes messages
    else if(isset($_POST['actionListMessageAlire'])){
        getMesMessagesaLire();
    }

    //vu les messages
    else if(isset($_POST['actionVuMessage'])){
        vueMessages();
    }

    //modifier les statut des utilisateurs
    else if(isset($_POST['actionUpdateStatut'])){
        updateStatutUser();
    }

    //afficher le statut d'utilisateur
    else if(isset($_POST['actionGetUserStatut'])){
        getStatutUser();
    }

    //update les vues des notifications
    else if(isset($_POST['updateNotification'])){
        updateVueNotification();
    }

    //envoyer le code de sécurité
    else if (isset($_POST['actionMailVendeurCodeSecurite'])){
        envoieCodeSecurite();
    }

    //supprimer les notifications
    else if(isset($_POST['actionDeleteNotification'])){
        viderNotifications();
    }

    //afficher d'autres notifications
    else if(isset($_POST['loadNotif'])){
        afficherAutreNotifications();
    }

    //afficher la statut des utilisateurs
    else if(isset($_POST['actionGetStatutVendeurApresNotif'])){
        getStatutUserAvecPoint();
    }

    //Fonction pour envoyer e-mail contacter nous
    function envoyerEmailContact(){
        require_once 'phpMailer/PHPMailer.php';
        require_once 'phpMailer/SMTP.php';
        require_once 'phpMailer/POP3.php';
        require_once 'phpMailer/OAuth.php';
        require_once 'phpMailer/Exception.php';

        $from = $_POST['from'];
        $to = $_POST['to'];
        $nom = $_POST['nom'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = "ssl";
        $mail ->Host = "smtp.gmail.com";
        $mail ->Port = 465;
        $mail ->Timeout = 5;
        $mail ->IsHTML(true);
        $mail ->Username = $from;
        $mail ->Password = "miniprojet1234567";
        $mail ->SetFrom($to,$nom);
        $mail ->Subject = $sujet;
        $mail ->Sender = ($to);
        $mail ->CharSet = "UTF-8";
        $mail->AddEmbeddedImage('../img/favicon.png', 'logo','../img/favicon.png');
        $mail ->Body = "<div style = 'border:1px dotted #2E5EAB; padding:5px;margin-right:50px;margin-top:10px;'>
                            <h3>Objet : $sujet</h3>
                            <p style = 'color: #2E5EAB;'>Bonjour administration,</p>
                            <p>$message</p>
                        </div> 
                        <br>
                        <p>L'expéditeur : $nom
                        <br>
                        <div style = 'display:inline-block;'>
                            <img src = 'cid:logo' style = 'max-width: 70px;width: 70px;'></img>
                        </div> 
                        </p>";
        $mail ->AddAddress($from);
        
        if ($mail->send()){
            echo("envoye");
        }
        else {
            echo("non envoye");
        }
    }

    //Fonction pour la navbar    
    function menuNormal(){
        $output = '';
        $output .= '<ul class = "right_side">
                        <li>
                            <a href = "login.php">
                                Connexion
                            </a>
                        </li>
                        <li>
                            <a href = "creer_compte.php">
                                Créer un compte
                            </a>
                        </li>
                        <li>
                            <a href = "contact.php">
                                Contact
                            </a>
                        </li>
                    </ul>';
        echo $output;
    }

    //Fonction pour la navbar
    function globalNavbar(){
        $output = '';
        $output .= '<div class = "container-fluid">
                        <a class = "navbar-brand" href = "index.php">
                            <img src = "img/logo.png" alt = "logo du site">
                        </a>
                        <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarSupportedContent" aria-controls = "navbarSupportedContent"
                            aria-expanded = "false" aria-label = "Toggle navigation">
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                        </button>
                        <div class = "collapse navbar-collapse offset" id = "navbarSupportedContent">
                            <div class = "row w-100">
                                <div class = "col-lg-11 pr-0">
                                    <ul class = "nav navbar-nav pull-right">
                                        <li class = "nav-item">
                                            <a class = "nav-link" href = "index.php">Accueil</a>
                                        </li>
                                        <li class = "nav-item">
                                            <a class = "nav-link" href = "general.php">Catégorie général</a>
                                        </li>
                                        <li class = "nav-item">
                                            <a class = "nav-link" href = "financement.php">Financement et versements</a>
                                        </li>
                                        <li class = "nav-item submenu dropdown">
                                            <a href = "#" class = "nav-link dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">Voitures</a>
                                            <ul class = "dropdown-menu">
                                                <li class = "nav-item">
                                                        <a class = "nav-link" href = "camion.php">Camions</a>
                                                </li>
                                                <li class = "nav-item">
                                                    <a class = "nav-link" href = "piece_rechange.php">Piéces de réchange</a>
                                                </li>
                                               
                                                <li class = "nav-item">
                                                    <a class = "nav-link" href = "quade.php">Quades</a>
                                                </li> 
                                                <li class = "nav-item">
                                                    <a class = "nav-link" href = "voiture.php">Voitures</a>
                                                </li>                                                
                                            </ul>
                                        </li>
                                        <li class = "nav-item">
                                            <a class = "nav-link" href = "immobilier.php">Immobiliers</a>
                                        </li>
                                        <li class = "nav-item">
                                            <a class = "nav-link" href = "materiaux.php">Matériaux</a>
                                        </li>
                                        <li class = "nav-item submenu dropdown">
                                            <a href = "#" class = "nav-link dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">Aide</a>
                                            <ul class = "dropdown-menu">
                                            <li class = "nav-item">
                                                <a class = "nav-link" href = "condition_utilisation.php">Conditions</a>
                                            </li>
                                            <li class = "nav-item">
                                                <a class = "nav-link" href = "confidentialite.php">Condifentialité</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>';
        echo $output;
    }

    //Fonction pour la footer
    function footer(){
        $year = date("Y");
        $output = "";
        $output .= "<div class = 'container'>
                        <div class = 'row'>
                            <div class = 'col-lg-3  col-md-6 col-sm-6'>
                                <div class = 'single-footer-widget'>
                                    <h6 class = 'footer_title'>سوق واثق</h6>
                                    <p>Ce site n'est impliqué dans aucune transaction, ne gère pas les paiements, l'expédition, la fourniture de services d'entiercement ou la protection de l'acheteur.</p>
                                </div>
                            </div>
                            <div class = 'col-lg-4 col-md-6 col-sm-6'>
                                <div class = 'single-footer-widget'>
                                    <h6 class = 'footer_title'>Derniers annoces</h6>
                                    <p>Abonnez-vous pour être notifié aux nouvelles annonces.</p>
                                    <div id = 'mc_embed_signup' >
                                        <form action = javascript: void(0)' method = 'POST' class = 'subscribe_form relative'>
                                            <div class = 'input-group d-flex flex-row'>
                                                <input type = 'email' placeholder = 'Saisissez votre adresse e-mail..' name = 'email' id = 'email' required>
                                                <button class = 'btn sub-btn' type = 'submit'>
                                                    <span class = 'lnr lnr-arrow-right'></span>
                                                </button>
                                            </div>
                                            <div class = 'mt-10 info'></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class = 'col-lg-3 col-md-6 col-sm-6'>
                                <div class = 'single-footer-widget instafeed'>
                                    <h6 class = 'footer_title'>Instagram</h6>
                                    <ul class = 'list instafeed d-flex flex-wrap'>
                                    <li>
                                        <img src = 'img/instagram/Image-01.jpg' alt = 'Image'>
                                    </li>
                                    <li>
                                        <img src = 'img/instagram/Image-02.jpg' alt = 'Image'>
                                    </li>
                                    <li>
                                        <img src = 'img/instagram/Image-03.jpg' alt = 'Image'>
                                    </li>
                                    <li>
                                        <img src = 'img/instagram/Image-04.jpg' alt = 'Image'>
                                    </li>
                                    <li>
                                        <img src = 'img/instagram/Image-05.jpg' alt = 'Image'>
                                    </li>
                                    <li>
                                        <img src = 'img/instagram/Image-06.jpg' alt = 'Image'>
                                    </li>
                                    <li>
                                        <img src = 'img/instagram/Image-07.jpg' alt = 'Image'>
                                    </li>
                                    <li>
                                        <img src = 'img/instagram/Image-08.jpg' alt = 'Image'>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class = 'col-lg-2 col-md-6 col-sm-6'>
                            <div class = 'single-footer-widget f_social_wd'>
                                <h6 class = 'footer_title'>Suivez-nous</h6>
                                <p>Soyons sociaux</p>
                                <div class = 'f_social'>
                                    <a href = 'https://www.facebook.com/sooqwatheq1/'>
                                        <i class = 'fa fa-facebook'></i>
                                    </a>
                                    <a href = 'https://twitter.com/sooqwatheq'>
                                        <i class = 'fa fa-twitter'></i>
                                    </a>
                                    <a href = 'https://plus.google.com/111259664293342210225'>
                                        <i class = 'fa fa-google'></i>
                                    </a>
                                    <a href = 'https://sooqwatheq.co/#'>
                                        <i class = 'fa fa-instagram'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'row footer-bottom d-flex justify-content-between align-items-center'>
                        <p class = 'col-lg-12 footer-text text-center'>
                            Copyright &copy;".$year."&nbsp;Tous les droits sont réservés | Développé par <i class = 'fa fa-heart-o' aria-hidden = 'true'></i> <a href = '#' target = '_blank'>SEEWISE SARL</a> <i class = 'fa fa-heart-o' aria-hidden ='true'></i>
                        </p>
                    </div>
                </div>";
                echo $output;
    }

    //Fonction pour vérifier la création des session
    function verificationSession(){
        if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
            header('Location: 404.php');
        }
    }

    //Fonction pour vérifier la création des session
    function verificationSessionInverse(){
        if ((!isset($_SESSION['email'])) || (empty($_SESSION['email']))){
            header('Location: 404.php');
        }
    }

    //Fonction pour vérifier la création des session
    function verificationTest(){
        if ((!isset($_SESSION['test'])) || (empty($_SESSION['test']))){
            header('Location: 404.php');
        }
    }

    //Fonction pour créer la connexion à la base de donnéé
    function connexionDataBase(){
        return (new PDO("mysql:host=localhost;dbname=watheq", "root", "", array(PDO::ATTR_PERSISTENT => true)));
    }

    //Fonction pour tester l'existance d'un compte
    function testCompte(){
        $connect = connexionDataBase();
        $email = $_POST['email'];

        $requete = "SELECT * FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $nbr = $statement->rowCount();

        if ($nbr >0){
            echo "compte existe";
        }
    
        else {
            echo "compte non existe";
        }
    }

     //Fonction pour tester l'existance d'un compte(2)
     function testCompteGet($email){
        $connect = connexionDataBase();
    
        $requete = "SELECT * FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $nbr = $statement->rowCount();

        if ($nbr >0){
            return "compte existe";
        }
    
        else {
            return "compte non existe";
        }
    }

    //Fonction pour creer un compte
    function creerCompte(){
        $connect = connexionDataBase();
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $sexe = $_POST['sexe'];
        $pays = $_POST['pays'];
        $gouvernorat = $_POST['gouvernorat'];
        $ville = $_POST['ville'];
        $password = md5($_POST['password']);
        $curent_date = date('Y-m-d');
        $curent_time = date("H:i:s"); 
        
        $sql = "INSERT INTO vendeur(email, password, nom, genre, numero, pays, gouvernorat, ville, date_creation, heure_creation)
                VALUES ('$email', '$password', '$nom', '$sexe', '$numero', '$pays', '$gouvernorat', '$ville', '$curent_date', '$curent_time')";

        if($connect->exec($sql) == 1){
            echo 'compte creer';
        }

        else{
            echo 'compte non creer';
        }
    }

    //Fonction pour créér le journal
    function creerJournal(){
        $connect = connexionDataBase();
        $email = $_POST['email'];
        $ville = $_POST['ville'];
        $detail = $_POST['detail'];
        $curent_date = date('Y-m-d');
        $curent_time = date("H:i:s"); 

        $sql = "INSERT INTO journal(email, region, detail, date_login, time_login)
                VALUES ('$email', '$ville', '$detail', '$curent_date', '$curent_time')";

        if($connect->exec($sql) == 1){
            echo 'journal creer';
        }

        else{
            echo 'journal non creer';
        }
    }

    //Fonction pour créer une session
    function creerSession(){
        session_start();
        $_SESSION["email"] = $_POST['email'];

        if ($_SESSION['email'] == ''){
            echo ("session vide");
        }

        else {
            echo ("session creer");
        }
    }

    //Fonction pour tester un compte vendeur
    function testCompteVendeur(){
        $connect = connexionDataBase();

        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        $requete = "SELECT * FROM vendeur WHERE email = '$email' AND password = '$password'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $nbr = $statement->rowCount();
        if ($nbr >0){
            echo "vrai info";
        }
        
        else {
            echo "fause info";
        }
    }

    //Fonction pour envoyer un email au vendeur
    function envoiEmailVendeur(){
        require_once 'phpMailer/PHPMailer.php';
        require_once 'phpMailer/SMTP.php';
        require_once 'phpMailer/POP3.php';
        require_once 'phpMailer/OAuth.php';
        require_once 'phpMailer/Exception.php';

        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
        $nom = $_POST['nom'];

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = 'smtp.gmail.com';
        $mail ->Port = 465;
        $mail ->Timeout = 5;
        $mail ->IsHTML(true);
        $mail ->Username = "miniprojet.groupec@gmail.com";
        $mail ->Password = "miniprojet1234567";
        $mail ->SetFrom($email,"سوق واثق");
        $mail ->Subject = $sujet;
        $mail ->Sender = ("miniprojet.groupec@gmail.com");
        $mail->AddEmbeddedImage('../img/favicon.png', 'logo','../img/favicon.png');
        $mail ->Body = "<div style = 'border:1px dotted #2E5EAB; padding:5px;margin-right:50px;margin-top:10px;'>
                            <h3>Objet : Message de confirmation pour la création d'un nouveau compte</h3>
                            <p style = 'color: #2E5EAB;'>Bonjour $nom,</p>
                            <p>$message</p>
                        </div>
                        <br>
                        <p>Envoyé de : 
                        <br>
                        <div style = 'display:inline-block;'>
                        <img src = 'cid:logo' style = 'max-width: 70px;width: 70px;'></img>
                        </div> 
                        </p>";
        $mail ->AddAddress($email);
        $mail ->CharSet = 'UTF-8';
        $mail->send();
    }

    //Fonction pour envoyer un email contient un code de sécurité au vendeur
    function envoieCodeSecurite(){
        require_once 'phpMailer/PHPMailer.php';
        require_once 'phpMailer/SMTP.php';
        require_once 'phpMailer/POP3.php';
        require_once 'phpMailer/OAuth.php';
        require_once 'phpMailer/Exception.php';

        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
        $nom = getNom($email);

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = 'smtp.gmail.com';
        $mail ->Port = 465;
        $mail ->Timeout = 5;
        $mail ->IsHTML(true);
        $mail ->Username = "miniprojet.groupec@gmail.com";
        $mail ->Password = "miniprojet1234567";
        $mail ->SetFrom($email,"سوق واثق");
        $mail ->Subject = $sujet;
        $mail ->Sender = ("miniprojet.groupec@gmail.com");
        $mail->AddEmbeddedImage('../img/favicon.png', 'logo','../img/favicon.png');
        $mail ->Body = "<div style = 'border:1px dotted #2E5EAB; padding:5px;margin-right:50px;margin-top:10px;'>
                            <h3>Objet : Code de sécurité</h3>
                            <p style = 'color: #2E5EAB;'>Bonjour $nom,</p>
                            <p>$message</p>
                        </div>
                        <br>
                        <p>Envoyé de : 
                        <br>
                        <div style = 'display:inline-block;'>
                        <img src = 'cid:logo' style = 'max-width: 70px;width: 70px;'></img>
                        </div> 
                        </p>";
        $mail ->AddAddress($email);
        $mail ->CharSet = 'UTF-8';
        $mail->send();
    }

    //Fonction pour creer une session pour la récupération d'email
    function creerSessionTest(){
        session_start();
        $_SESSION['test'] = $_POST['email'];

        if ($_SESSION['test'] == ''){
            echo ("session vide");
        }

        else {
            echo ("session creer");
        }
    }

    //Fonction pour creer une session pour l'email de notification
    function creerSessionNotification(){
        session_start();
        $_SESSION['emailNotif'] = $_POST['emailNotif'];

        if ($_SESSION['emailNotif'] == ''){
            echo ("session vide");
        }

        else {
            echo ("session creer");
        }
    }

    //Fonction pour modifier le password
    function modifierPassword(){
        $connect = connexionDataBase();
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "UPDATE vendeur SET password = '$password' WHERE email = '$email'";
        if($connect->exec($sql) == 1){
            echo "password modifier";
        }

        else{
            "password non modifier";
        }
    }

    //Fonction pour vider la session
    function freeSession(){
        session_start();
        session_unset();
        session_destroy();
    }

    //Fonction pour vérifier l'existance de la session de notification
    function verificationSessionNotification(){
        if ((!isset($_SESSION['emailNotif'])) || (empty($_SESSION['emailNotif']))){
            header('Location: 404.php');
        }
    }

    //Fonction qui retourne le nom du vendeur
    function getNom($email){
        $connect = connexionDataBase();
    
        $requete = "SELECT nom AS nomVendeur FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
    
        foreach($result as $row){
            return ($row['nomVendeur']);
        }
    }

    //Fonction pour créé une menu de vendeur
    function menuVendeur($nom,$email){
        $output = '';
        $output .= '<ul class = "right_side">
                        <li>
                            <a href = "compte.php?email='.$email.'">'.$nom.'</a>
                        </li>
                        <li>
                            <a href = "javascript: void(0)" onclick = "logoutUtilisateur(`'.$email.'`)">
                                Déconnexion
                            </a>
                        </li>
                        <li>
                            <a href = "contact.php">
                                Contact
                            </a>
                        </li>
                    </ul>';
        echo $output;
    }

    //Fonction pour créé la menu des catégories
    function menuCompteVendeur($email){
        $output = '';
        $nbr_message = getNbrMessage($email);
        $nbr_notification = getNbrNotification($email);
        $output .= '<li>
                        <i class = "lnr lnr-cog"></i><a href = "compte.php?email='.$email.'" class = "icon-style">Compte</a>
                    </li>
                    <br>
                    <li>
                        <i class = "lnr lnr-bullhorn"></i><a href = "article.php?email='.$email.'" class = "icon-style">Articles</a>
                    </li>
                    <br>
                    <li>
                        <i class = "lnr lnr-envelope"></i><a href = "discussion.php" class = "icon-style">Messages('.$nbr_message.')</a>
                    </li>
                    <br>
                    <li>
                        <i class = "lnr lnr-alarm"></i><a href = "notification.php" class = "icon-style" onclick = updateVueNotification(`'.$email.'`);>Notifications('.$nbr_notification.')</a>
                    </li>
                    <br>
                    <li>
                        <i class = "lnr lnr-thumbs-up"></i><a href = "reactions.php?email='.$email.'" class = "icon-style">Historique</a>
                    </li>
                    <br>
                    <li>
                        <i class = "lnr lnr-star"></i><a href = "modifier_liste_favoris.php?email='.$email.'" class = "icon-style">Favoris</a>
                    </li>
                    <br>
                    <li>
                        <i class = "lnr lnr-user"></i><a href = "journal_authentification.php?email='.$email.'" class = "icon-style">Journal</a>
                    </li>
                    <br>
                    <li onclick = "logoutUtilisateur(`'.$email.'`)">
                        <i class = "lnr lnr-exit"></i><a href = "javascript: void(0)" class = "icon-style">Déconnexion</a>
                    </li>';
                    echo $output;
    }

    //Fonction qui retourne les informations du vendeur
    function getInformationProfil($email){
        $connect = connexionDataBase();
    
        $requete = "SELECT * FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
    
        foreach($result as $row){
            $genre = $row['genre'];
            $numero = $row['numero'];
            $pays = $row['pays'];
            $gouvernorat = $row['gouvernorat'];
            $ville = $row['ville'];
        }
        return $row;
    }

    //Fonction pour modifier le vendeur
    function updateVendeur(){
        $connect = connexionDataBase();

        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $genre = $_POST['genre'];
        $pays = $_POST['pays'];
        $gouvernorat = $_POST['gouvernorat'];
        $ville = $_POST['ville'];
        $numero = $_POST['numero'];
        $password = md5($_POST['password']);
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $twitter = $_POST['twitter'];
        $google = $_POST['google'];

        $requete = "UPDATE vendeur SET password = '$password', nom = '$nom', genre = '$genre', numero = '$numero', pays = '$pays', gouvernorat = '$gouvernorat', ville = '$ville', facebook = '$facebook', instagram = '$instagram', twitter = '$twitter', google = '$google' WHERE email = '$email'";
        if($connect->exec($requete) == 1){
            echo "modifié";
        }

        else{
            echo "non modifié";
        }
    }

    //Fonction pour afficher les information du vendeur
    function imageAndDetail($email){
        $output = '';

        $connect = connexionDataBase();
        $requete = "SELECT * FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row){
            if($row['photo_profil'] != NULL){
                $output .= '<img class = "photo-profil author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil" />';
            }
            else{
                $output .= '<img class = "photo-profil author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image">';
            }
            $output .= '<h4>'.$row['nom'].'</h4>
                        <p>'.$email.'</p>
                        <div class = "social_icon">
                            <a href = "'.$row['facebook'].'">
                                <i class = "fa fa-facebook"></i>
                            </a>
                            <a href = "'.$row['twitter'].'">
                                <i class = "fa fa-twitter"></i>
                            </a>
                            <a href = "'.$row['instagram'].'">
                                <i class = "fa fa-instagram"></i>
                            </a>
                            <a href = "'.$row['google'].'">
                                <i class = "fa fa-google"></i>
                            </a>
                        </div>
                        <p>Vous êtes inscrit depuis '.date('D d F Y',strtotime($row['date_creation'])).'</p>';
        }
        echo $output;
    }

    //Fonction pour ajouter l'image de vendeur
    function updatePhotoVendeur(){
        $connect = connexionDataBase();
        $email = $_POST['email'];
        $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));

        $sql = "UPDATE vendeur SET photo_profil = '$image' WHERE email = '$email'";
        if($connect->exec($sql) == 1){
           echo "photo ajouté";
        }

        else{
           echo "photo non ajouté";
        }
    }

    //Fonction pour afficher le journal d'authentification
    function getJournal($email){
        $connect = connexionDataBase();
        $output = '';

        if(isset($_GET['page'])){
            $page = $_GET['page'];
            
        }
        else{
            $page = 1;
        }

        $sql = "SELECT * FROM journal AS j, vendeur AS v WHERE j.email = '$email' AND j.email = v.email";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $count = $statement->rowCount();

        $per_page = 5;
        $no_of_page = ceil($count/$per_page);
        $start = ($page-1) * $per_page;

        $sql = "SELECT * FROM journal AS j, vendeur AS v WHERE j.email = '$email' AND j.email = v.email LIMIT $start,$per_page";
        $statement = $connect->prepare($sql);
        $statement->execute();

        $output = ' <div class = "table-head">
                        <div class = "serial">#</div>
                        <div class = "country">Région</div> 
                        <div class = "visit">Date</div>
                        <div class = "percentage">Temps</div>
                        <div class = "percentage">Description</div>
                    </div>';
        $result = $statement->fetchAll();
        $nbr = $statement->rowCount();
        if($nbr > 0){
            foreach ($result as $row){
                $output .= '<div class = "table-row">
                                <div class = "serial">'.$row['id'].'</div>
                                <div class = "country">'.$row['region'].'</div>
                                <div class = "visit">'.date('D d F Y',strtotime($row['date_login'])).'</div>
                                <div class = "percentage">'.date('H:i',strtotime($row['time_login'])).'</div>
                                <div class = "percentage">'.$row['detail'].'</div>
                            </div>';
            }
        
            $output .= '<div class = "row">
                            <nav class = "cat_page mx-auto" aria-label = "Page navigation example">
                                <ul class = "pagination">';
                                    if($page == 1){
                                        $output .= '<li class = "page-item disabled">
                                                        <a class = "page-link" href = "#">
                                                            <i class = "fa fa-chevron-left" aria-hidden = "true"></i>
                                                        </a>
                                                    </li>';
                                    }
                                    else{
                                        $left = $page-1;
                                        $output .= '<li class = "page-item">
                                                        <a class = "page-link" href = journal_authentification.php?email='.$email.'&page='.$left.'>
                                                            <i class = "fa fa-chevron-left left" aria-hidden = "true"></i>
                                                        </a>
                                                    </li>';
                                    }
                                    for($i = 1;$i<=$no_of_page;$i++){
                                        if($page == $i){
                                            $output .= '<li class = "page-item active">
                                                            <a class = "page-link" href = journal_authentification.php?email='.$email.'&page='.$i.'>'.$i.'</a>
                                                        </li>';
                                        }
                                        else{
                                            $output .= '<li class = "page-item">
                                                           <a class = "page-link" href = journal_authentification.php?email='.$email.'&page='.$i.'>'.$i.'</a>
                                                        </li>';
                                        }
                                    }

                                    if($page == $no_of_page){
                                        $output .= '<li class = "page-item disabled">
                                                        <a class = "page-link" href = "#">
                                                            <i class = "fa fa-chevron-right" aria-hidden = "true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>';
                                    }
                                    else{
                                        $right = $page+1;
                                        $output .= '<li class = "page-item">
                                                        <a class = "page-link" href = journal_authentification.php?email='.$email.'&page='.$right.'>
                                                            <i class = "fa fa-chevron-right left" aria-hidden = "true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>';
                                    }

        }
        else{
            $output .= "<p class = 'text-center text-vide'>Le journal d'authentification est vide..</h5>";
        }
        echo $output;
    }

    //Fonction pour creer un article
    function creerArticle(){
        $output = '';
        $connect = connexionDataBase();

        $email = $_POST['email'];
        $titre = $_POST['titre'];
        $article = $_POST['article'];
        $list = $_POST['list'];
        $prix = $_POST['prix'];
        $detail = $_POST['descrption'];
        $negociable = $_POST['negociation'];
        $etat = $_POST['etat'];
        $image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
        $image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
        $image3 = addslashes(file_get_contents($_FILES['image3']['tmp_name']));
        $curent_date = date('Y-m-d');
        $curent_time = date("H:i:s"); 

        if($article == 'Voitures'){
            $sql = "INSERT INTO article_voitures(titre, marque, prix, detail, negociable, etat, image1, image2, image3, date_publication, time_publication, email)
            VALUES ('$titre', '$list', '$prix', '$detail', '$negociable', '$etat', '$image1', '$image2', '$image3', '$curent_date', '$curent_time', '$email')";
            
            if($connect->exec($sql) == 1){
                $output .= "article creer";
                insertNotification($titre,$article,$prix,$negociable,$email,$curent_date,$curent_time);
            }
            else{
                $output .=  "<div class = 'alert alert-danger alert-dismissible fade show'>
                                <h3 class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> Article non crée</h3>
                                <p>Nous avons trouvés des erreur concernant votre demande.Ressayer plus tard.</p>
                                <hr>
                                <p class = 'mb-0'>Noter bien que vous pouvez créer des articles et des annonces à tout moment.</p>
                            </div>";
            }
        }
        else if($article == 'Immobiliers'){
            $sql = "INSERT INTO article_immobiliers(titre, type, prix, detail, negociable, etat, image1, image2, image3, date_publication, time_publication, email)
            VALUES ('$titre', '$list', '$prix', '$detail', '$negociable', '$etat', '$image1', '$image2', '$image3', '$curent_date', '$curent_time', '$email')";
            
            if($connect->exec($sql) == 1){
                $output .= "article creer";
                insertNotification($titre,$article,$prix,$negociable,$email,$curent_date,$curent_time);
            }
    
            else{
                $output .=  "<div class = 'alert alert-danger alert-dismissible fade show'>
                                <h3 class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> Article non crée</h3>
                                <p>Nous avons trouvés des erreur concernant votre demande.Ressayer plus tard.</p>
                                <hr>
                                <p class = 'mb-0'>Noter bien que vous pouvez créer des articles et des annonces à tout moment.</p>
                            </div>";
            }
        }
        else if($article == 'Matériaux'){
            $sql = "INSERT INTO article_materiaux(titre, marque, prix, detail, negociable, etat, image1, image2, image3, date_publication, time_publication, email)
            VALUES ('$titre', '$list', '$prix', '$detail', '$negociable', '$etat', '$image1', '$image2', '$image3', '$curent_date', '$curent_time', '$email')";
            
            if($connect->exec($sql) == 1){
                $output .= "article creer";
                insertNotification($titre,$article,$prix,$negociable,$email,$curent_date,$curent_time);
            }
    
            else{
                $output .=  "<div class = 'alert alert-danger alert-dismissible fade show'>
                                <h3 class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> Article non crée</h3>
                                <p>Nous avons trouvés des erreur concernant votre demande.Ressayer plus tard.</p>
                                <hr>
                                <p class = 'mb-0'>Noter bien que vous pouvez créer des articles et des annonces à tout moment.</p>
                            </div>";
            }
        }
        else{
            $sql = "INSERT INTO article_plus(titre, type, prix, detail, negociable, etat, image1, image2, image3, date_publication, time_publication, email)
            VALUES ('$titre', '$article', '$prix', '$detail', '$negociable', '$etat', '$image1', '$image2', '$image3', '$curent_date', '$curent_time', '$email')";
            
            if($connect->exec($sql) == 1){
                $output .= "article creer";
                insertNotification($titre,$article,$prix,$negociable,$email,$curent_date,$curent_time);
            }
    
            else{
                $output .=  "<div class = 'alert alert-danger alert-dismissible fade show'>
                                <h3 class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> Article non crée</h3>
                                <p>Nous avons trouvés des erreur concernant votre demande.Ressayer plus tard.</p>
                                <hr>
                                <p class = 'mb-0'>Noter bien que vous pouvez créer des articles et des annonces à tout moment.</p>
                            </div>";
            }
        }
        echo $output;
    }

    //fonction pour afficher la liste des article pour le vendeur
    function getMesArticles(){
        $email = $_POST['email'];
        $article = $_POST['article'];
        if($article == 'article_voitures' || $article == 'article_materiaux' || $article == 'article_immobiliers'){
            articleType1($email,$article);
        }
        
        else{
            articleType2($email,$article);
        }
    }

    //fonction pour afficher la liste des article pour le vendeur(1)
    function articleType1($email,$article){
        $connect = connexionDataBase();
        $output = '';

        $sql = "SELECT * FROM $article AS a, vendeur AS v WHERE a.email = '$email' AND a.email = v.email";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $resultat = $statement->fetchAll();
        $count = $statement->rowCount();

        if($count > 0){
            $output .= '<div class = "latest_product_inner row">';
            foreach($resultat as $row){
                $output .= '<div class = "col-lg-3 col-md-3 col-sm-6">
                                <div class = "f_p_item">
                                    <div class = "f_p_img" style = "background-color:#fff;">
                                        <div class = "p_icon">
                                            <a href = "javascript: void(0)" onclick = "confirmationDelete(`'.$row['id'].'`,`'.$row['email'].'`,`'.$article.'`)">
                                                <i class = "lnr lnr-trash"></i>
                                            </a>
                                        </div>
                                        <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" alt = "Image">
                                    </div>
                                    <a href = "#">
                                        <h4>'.$row['titre'].'</h4>
                                    </a>
                                    <h5>$'.$row['prix'].'</h5>
                                </div>
                            </div>';
            }
            $output .= '</div>';
        }
        else{
            $output .= "<p class = 'mb-30 text-vide text-left' >Vous n'avez pas encore publiés des article..</p>";
        }
        echo $output;
    }

    //fonction pour afficher la liste des article pour le vendeur(2)
    function articleType2($email,$article){
        $connect = connexionDataBase();
        $output = '';

        $sql = "SELECT * FROM article_plus AS a, vendeur AS v WHERE type = '$article' AND a.email = '$email' AND a.email = v.email";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $resultat = $statement->fetchAll();
        $count = $statement->rowCount();

        if($count > 0){
            $output .= '<div class = "latest_product_inner row">';
            foreach($resultat as $row){
                $output .= '<div class = "col col2">
                                <div class = "f_p_item">
                                    <div class = "f_p_img" style = "background-color:#fff;">
                                        <div class = "p_icon">
                                            <a href = "javascript: void(0)" onclick = "confirmationDelete2(`'.$row['id'].'`,`'.$row['email'].'`)">
                                                <i class = "lnr lnr-trash"></i>
                                            </a>
                                        </div>
                                        <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" alt = "Image">
                                        <p class = "position-date"><i class = "fa fa-calendar date"></i>'.date('d F Y',strtotime($row['date_publication'])).'</p>';
                                        if($row['photo_profil'] != NULL){
                                            $output .= '<img class = "photo-profil-article author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Image" />';
                                        }
                                        else{
                                            $output .= '<img class = "photo-profil-article author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image">';
                                        }
                                        $output .= '</div>
                                                <a href = "#">
                                                    <h4>'.$row['titre'].'</h4>
                                                </a>
                                                <h5>$'.$row['prix'].'</h5>
                                            </div>
                                        </div>';
            }
            $output .= '</div>';
        }
        else{
            $output .= "<p class = 'mb-30 text-vide text-left' >Vous n'avez pas publiés des article..</p>";
        }
        echo $output;
    }

    //Fonction qui supprime un article
    function supprimerArticle(){
        $connect = connexionDataBase();

        $id = $_POST['id'];
        $email = $_POST['email'];
        $article = $_POST['article'];

        $sql = "DELETE FROM $article WHERE id = '".$id."' AND email = '".$email."'";
        $connect->exec($sql);
    }

    //Fonction qui supprime un article
    function supprimerArticle2(){
        $connect = connexionDataBase();

        $id = $_POST['id'];
        $email = $_POST['email'];

        $sql = "DELETE FROM article_plus WHERE id = '".$id."' AND email = '".$email."'";
        $connect->exec($sql);
    }

    //Fonction pour afficher les articles d'aujourd'hui
    function annonceCurentDay(){
        $connect = connexionDataBase();
        $table = '';

        $output1 = $output2 = $output3 = $output4 = $content = '';
        $curent_date = date('Y-m-d');

        $sql1 = "SELECT * FROM article_immobiliers WHERE date_publication = '$curent_date' LIMIT 0,8";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
        $resultat1 = $statement1->fetchAll();
        $count1 = $statement1->rowCount();

        $sql2 = "SELECT * FROM article_materiaux WHERE date_publication = '$curent_date' LIMIT 0,8";
        $statement2 = $connect->prepare($sql2);
        $statement2->execute();
        $resultat2 = $statement2->fetchAll();
        $count2 = $statement2->rowCount();

        $sql3 = "SELECT * FROM article_plus WHERE date_publication = '$curent_date' LIMIT 0,8";
        $statement3 = $connect->prepare($sql3);
        $statement3->execute();
        $resultat3 = $statement3->fetchAll();
        $count3 = $statement3->rowCount();

        $sql4 = "SELECT * FROM article_voitures  WHERE date_publication = '$curent_date' LIMIT 0,8";
        $statement4 = $connect->prepare($sql4);
        $statement4->execute();
        $resultat4 = $statement4->fetchAll();
        $count4 = $statement4->rowCount();
        foreach($resultat1 as $row1){
            $table = 'article_immobiliers';
            $output1 .= ' <div class = "col col1">
                            <div class = "f_p_item">
                                <div class = "f_p_img">
                                    <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row1['image1'] ).'" alt = "Image">
                                    <div class = "p_icon">';

                                            if (empty($_POST['email'])){
                                                $output1 .= '<a href = "javascript:void(0)">
                                                                <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                            </a>';
                                            }
                                    
                                            else{
                                                if(getActionLikes($row1['id'],$table,$_POST['email']) == "true"){
                                                    $output1 .= '<a href = "javascript: void(0)">
                                                                    <i class = "lnr lnr-heart like" data-id = "'.$row1['id'].'" data-table = "'.$table.'"></i>
                                                                </a>';
                                                }
                                                else{
                                                    $output1 .= '<a href = "javascript: void(0)">
                                                                    <i class = "lnr lnr-heart-pulse like" data-id = "'.$row1['id'].'" data-table = "'.$table.'"></i>
                                                                </a>';
                                                }
                                            }
                                            $output1 .= '<a href = "description_article.php?article='.$table.'&id='.$row1['id'].'" onclick = updateVue(`'.$row1['id'].'`,`'.$table.'`);>
                                                            <i class = "lnr lnr-picture"></i>
                                                        </a>
                                    </div>
                                </div>
                                <a href = "#">
                                    <h4>'.$row1['titre'].'</h4>
                                </a>
                                <h5>$'.$row1['prix'].'</h5>
                            </div>
                            </div>';

        }
        
        foreach($resultat2 as $row2){
            $table = 'article_materiaux';
            $output2 .= '<div class = "col col2">
                            <div class = "f_p_item">
                                <div class = "f_p_img" style = "background-color:#fff;">
                                    <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row2['image1'] ).'" alt = "Image">
                                    <div class = "p_icon">';
                                        if (empty($_POST['email'])){
                                        $output2 .= '<a href = "javascript:void(0)">
                                                        <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                    </a>';
                                        }
                                
                                        else{
                                            if(getActionLikes($row2['id'],$table,$_POST['email']) == "true"){
                                                $output2 .= '<a href = "javascript: void(0)">
                                                                <i class = "lnr lnr-heart like" data-id = "'.$row2['id'].'" data-table = "'.$table.'"></i>
                                                            </a>';
                                            }
                                            else{
                                                $output2 .= '<a href = "javascript: void(0)">
                                                                <i class = "lnr lnr-heart-pulse like" data-id = "'.$row2['id'].'" data-table = "'.$table.'"></i>
                                                            </a>';
                                            }
                                        }
                                        $output2 .= '<a href = "description_article.php?article='.$table.'&id='.$row2['id'].'" onclick = updateVue(`'.$row2['id'].'`,`'.$table.'`);>
                                            <i class = "lnr lnr-picture"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href = "#">
                                    <h4>'.$row2['titre'].'</h4>
                                </a>
                                <h5>$'.$row2['prix'].'</h5>
                            </div>
                        </div>';

        }

        foreach($resultat3 as $row3){
            $table = 'article_plus';
            $output3 .= '<div class = "col col3">
                            <div class = "f_p_item">
                                <div class = "f_p_img" style = "background-color:#fff;">
                                    <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row3['image1'] ).'" alt = "Image">
                                    <div class = "p_icon">';
                                    
                                    if (empty($_POST['email'])){
                                        $output3 .= '<a href = "javascript:void(0)">
                                                        <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                    </a>';
                                    }
                                
                                    else{
                                        if(getActionLikes($row3['id'],$table,$_POST['email']) == "true"){
                                            $output3.= '<a href = "javascript: void(0)">
                                                            <i class = "lnr lnr-heart like" data-id = "'.$row3['id'].'" data-table = "'.$table.'"></i>
                                                        </a>';
                                        }
                                        else{
                                            $output3.= '<a href = "javascript: void(0)">
                                                            <i class = "lnr lnr-heart-pulse like" data-id = "'.$row3['id'].'" data-table = "'.$table.'"></i>
                                                        </a>';
                                        }
                                    }
                                        $output3 .= '<a href = "description_article.php?article='.$table.'&type='.$row3['type'].'&id='.$row3['id'].'" onclick = updateVue(`'.$row3['id'].'`,`'.$table.'`);>
                                            <i class = "lnr lnr-picture"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href = "#">
                                    <h4>'.$row3['titre'].'</h4>
                                </a>
                                <h5>$'.$row3['prix'].'</h5>
                            </div>
                        </div>';

        }

        foreach($resultat4 as $row4){
            $table = 'article_voitures';
            $output4 .= '<div class = "col col4">
                            <div class = "f_p_item">
                                <div class = "f_p_img" style = "background-color:#fff;">
                                    <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row4['image1'] ).'" alt = "Image">
                                    <div class = "p_icon">';

                                        if (empty($_POST['email'])){
                                        $output4 .= '<a href = "javascript:void(0)">
                                                        <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                    </a>';
                                        }
                                
                                        else{
                                            if(getActionLikes($row4['id'],$table,$_POST['email']) == "true"){
                                                $output4 .= '<a href = "javascript: void(0)">
                                                                <i class = "lnr lnr-heart like" data-id = "'.$row4['id'].'" data-table = "'.$table.'"></i>
                                                            </a>';
                                            }
                                            else{
                                                $output4 .= '<a href = "javascript: void(0)">
                                                                <i class = "lnr lnr-heart-pulse like" data-id = "'.$row4['id'].'" data-table = "'.$table.'"></i>
                                                            </a>';
                                            }
                                        }
                                        $output4 .= '<a href = "description_article.php?article='.$table.'&id='.$row4['id'].'" onclick = updateVue(`'.$row4['id'].'`,`'.$table.'`);>
                                            <i class = "lnr lnr-picture"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href = "#">
                                    <h4>'.$row4['titre'].'</h4>
                                </a>
                                <h5>$'.$row4['prix'].'</h5>
                            </div>
                        </div>';

        }
        if(($count1 == 0) && ($count2 == 0)  && ($count3 == 0) && ($count4 == 0)){
            $content .= "<div class = 'center-element'>
                            <p class = 'mb-30 text-vide text-center'>Pas d'annonces publiés aujourd'hui..</p>
                        </div>
                        ";
        }
        else{
            $content .= $output1.$output2.$output3.$output4;
        }
        echo $content;
    }

    //Fonction pour afficher les annonces de ce mois
    function getAnnoncesCeMois(){
        $connect = connexionDataBase();
        $output = '';

        $output1 = $output2 = $output3 = $output4 = $content = '';
        $curent_mois = date('m');

        $sql1 = "SELECT * FROM article_immobiliers ai, vendeur v WHERE MONTH(ai.date_publication) = '$curent_mois' AND ai.email = v.email";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
        $resultat1 = $statement1->fetchAll();
        $count1 = $statement1->rowCount();

        $sql2 = "SELECT * FROM article_materiaux am, vendeur v WHERE MONTH(am.date_publication) = '$curent_mois' AND am.email = v.email";
        $statement2 = $connect->prepare($sql2);
        $statement2->execute();
        $resultat2 = $statement2->fetchAll();
        $count2 = $statement2->rowCount();

        $sql3 = "SELECT * FROM article_plus ap, vendeur v WHERE MONTH(ap.date_publication) = '$curent_mois' AND ap.email = v.email";
        $statement3 = $connect->prepare($sql3);
        $statement3->execute();
        $resultat3 = $statement3->fetchAll();
        $count3 = $statement3->rowCount();

        $sql4 = "SELECT * FROM article_voitures av, vendeur v WHERE MONTH(av.date_publication) = '$curent_mois' AND av.email = v.email";
        $statement4 = $connect->prepare($sql4);
        $statement4->execute();
        $resultat4 = $statement4->fetchAll();
        $count4 = $statement4->rowCount();

        foreach($resultat1 as $row1){
            $table = 'article_immobiliers';
            $output1 .= '   <div class = "col-lg-3 col-md-3 col-sm-6">
                                <div class = "f_p_item">
                                    <div class = "f_p_img">
                                        <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row1['image1'] ).'" alt = "Image">
                                        <div class = "p_icon">';
                                            if (empty($_POST['email'])){
                                                $output1 .= '<a href = "javascript:void(0)">
                                                                <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                            </a>';
                                            }
                                    
                                            else{
                                                if(getActionLikes($row1['id'],$table,$_POST['email']) == "true"){
                                                    $output1 .= '<a href = "javascript: void(0)">
                                                                    <i class = "lnr lnr-heart like" data-id = "'.$row1['id'].'" data-table = "'.$table.'"></i>
                                                                </a>';
                                                }
                                                else{
                                                    $output1 .= '<a href = "javascript: void(0)">
                                                                    <i class = "lnr lnr-heart-pulse like" data-id = "'.$row1['id'].'" data-table = "'.$table.'"></i>
                                                                </a>';
                                                }
                                            }
                                            $output1 .= '<a href = "description_article.php?article='.$table.'&id='.$row1['id'].'" onclick = updateVue(`'.$row1['id'].'`,`'.$table.'`);>
                                                        <i class = "lnr lnr-picture"></i>
                                                    </a>
                                        </div>
                                    </div>
                                    <a href = "#">
                                        <h4>'.$row1['titre'].'</h4>
                                    </a>
                                    <h5>$'.$row1['prix'].'</h5>
                                </div>
                            </div>';

        }
            
            foreach($resultat2 as $row2){
                $table = 'article_materiaux';
                $output2 .= '   <div class = "col-lg-3 col-md-3 col-sm-6">
                                    <div class = "f_p_item">
                                        <div class = "f_p_img" style = "background-color:#fff;">
                                            <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row2['image1'] ).'" alt = "Image">
                                            <div class = "p_icon">';
                                                if (empty($_POST['email'])){
                                                $output2 .= '<a href = "javascript:void(0)">
                                                                <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                            </a>';
                                                }
                                        
                                                else{
                                                    if(getActionLikes($row2['id'],$table,$_POST['email']) == "true"){
                                                        $output2 .= '<a href = "javascript: void(0)">
                                                                        <i class = "lnr lnr-heart like" data-id = "'.$row2['id'].'" data-table = "'.$table.'"></i>
                                                                    </a>';
                                                    }
                                                    else{
                                                        $output2 .= '<a href = "javascript: void(0)">
                                                                        <i class = "lnr lnr-heart-pulse like" data-id = "'.$row2['id'].'" data-table = "'.$table.'"></i>
                                                                    </a>';
                                                    }
                                                }
                                                $output2 .= '<a href = "description_article.php?article='.$table.'&id='.$row2['id'].'" onclick = updateVue(`'.$row2['id'].'`,`'.$table.'`);>
                                                                <i class = "lnr lnr-picture"></i>
                                                            </a>
                                            </div>
                                        </div>
                                        <a href = "#">
                                            <h4>'.$row2['titre'].'</h4>
                                        </a>
                                        <h5>$'.$row2['prix'].'</h5>
                                    </div>
                                </div>';

            }

            foreach($resultat3 as $row3){
                $table = 'article_plus';
                $output3 .= '   <div class = "col-lg-3 col-md-3 col-sm-6">
                                    <div class = "f_p_item">
                                        <div class = "f_p_img" style = "background-color:#fff;">
                                            <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row3['image1'] ).'" alt = "Image">
                                            <div class = "p_icon">';
                                                if (empty($_POST['email'])){
                                                    $output3 .= '<a href = "javascript:void(0)">
                                                                    <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                                </a>';
                                                }
                                            
                                                else{
                                                    if(getActionLikes($row3['id'],$table,$_POST['email']) == "true"){
                                                        $output3.= '<a href = "javascript: void(0)">
                                                                        <i class = "lnr lnr-heart like" data-id = "'.$row3['id'].'" data-table = "'.$table.'"></i>
                                                                    </a>';
                                                    }
                                                    else{
                                                        $output3.= '<a href = "javascript: void(0)">
                                                                        <i class = "lnr lnr-heart-pulse like" data-id = "'.$row3['id'].'" data-table = "'.$table.'"></i>
                                                                    </a>';
                                                    }
                                                }
                                                $output3 .= '<a href = "description_article.php?article='.$table.'&type='.$row3['type'].'&id='.$row3['id'].'" onclick = updateVue(`'.$row3['id'].'`,`'.$table.'`);>
                                                                <i class = "lnr lnr-picture"></i>
                                                            </a>
                                            </div>
                                        </div>
                                        <a href = "#">
                                            <h4>'.$row3['titre'].'</h4>
                                        </a>
                                        <h5>$'.$row3['prix'].'</h5>
                                    </div>
                                </div>';
            }

        foreach($resultat4 as $row4){
            $table = 'article_voitures';
            $output4 .= '   <div class = "col-lg-3 col-md-3 col-sm-6">
                                <div class = "f_p_item">
                                    <div class = "f_p_img" style = "background-color:#fff;">
                                        <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row4['image1'] ).'" alt = "Image">
                                        <div class = "p_icon">';
                                            if (empty($_POST['email'])){
                                            $output4 .= '<a href = "javascript:void(0)">
                                                            <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                        </a>';
                                            }
                                
                                            else{
                                                if(getActionLikes($row4['id'],$table,$_POST['email']) == "true"){
                                                    $output4 .= '<a href = "javascript: void(0)">
                                                                    <i class = "lnr lnr-heart like" data-id = "'.$row4['id'].'" data-table = "'.$table.'"></i>
                                                                </a>';
                                                }
                                                else{
                                                    $output4 .= '<a href = "javascript: void(0)">
                                                                    <i class = "lnr lnr-heart-pulse like" data-id = "'.$row4['id'].'" data-table = "'.$table.'"></i>
                                                                </a>';
                                                }
                                            }
                                            $output4 .= '<a href = "description_article.php?article='.$table.'&id='.$row4['id'].'" onclick = updateVue(`'.$row4['id'].'`,`'.$table.'`);>
                                                            <i class = "lnr lnr-picture"></i>
                                                        </a>
                                        </div>
                                   </div>
                                    <a href = "#">
                                        <h4>'.$row4['titre'].'</h4>
                                    </a>
                                    <h5>$'.$row4['prix'].'</h5>
                                </div>
                            </div>';  

        }
        if(($count1 == 0) && ($count2 == 0)  && ($count3 == 0) && ($count4 == 0)){
            $content .= "<div class = 'center-element text-center'>
                            <p class = 'mb-30 text-vide text-center center-element'>Pas d'annoces publiés ce mois..</p>
                        </div>";
        }
        else{
            $content .= $output1.$output2.$output3.$output4;
        }
        echo $content;
    }

    //Fonction qui retourne le time ago
    function timeago($date) {
        $timestamp = strtotime($date);	
        $strTime = array("seconde", "minute", "heure", "jour", "mois", "anné");
        $length = array("60","60","24","30","12","10");
 
        $currentTime = time();
        if($currentTime >= $timestamp) {
             $diff     = time()- $timestamp;
             for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
             $diff = $diff / $length[$i];
             }
 
             $diff = round($diff);
             return "Publié il y a" . " " . $diff . " " . $strTime[$i] . "(s)";
        }
    }   

    //Fonction qui affiche les annonces populaires
    function articlePopulaire($email){
        $connect = connexionDataBase();

        $output1 = $output2 = $output3 = $output4 = $content = '';
        $time = '';
        $curent_date = date('Y-m-d');

        $sql1 = "SELECT * FROM article_immobiliers WHERE email = '$email' AND date_publication = '$curent_date' ORDER BY nbr_vue DESC
        LIMIT 2";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
        $resultat1 = $statement1->fetchAll();
        $count1 = $statement1->rowCount();

        $sql2 = "SELECT * FROM article_materiaux WHERE email = '$email' AND date_publication = '$curent_date' ORDER BY nbr_vue DESC
        LIMIT 2";
        $statement2 = $connect->prepare($sql2);
        $statement2->execute();
        $resultat2 = $statement2->fetchAll();
        $count2 = $statement2->rowCount();

        $sql3 = "SELECT * FROM article_plus WHERE email = '$email' AND date_publication = '$curent_date' ORDER BY nbr_vue DESC
        LIMIT 2";
        $statement3 = $connect->prepare($sql3);
        $statement3->execute();
        $resultat3 = $statement3->fetchAll();
        $count3 = $statement3->rowCount();

        $sql4 = "SELECT * FROM article_voitures WHERE email = '$email' AND date_publication = '$curent_date' ORDER BY nbr_vue DESC
        LIMIT 2";
        $statement4 = $connect->prepare($sql4);
        $statement4->execute();
        $resultat4 = $statement4->fetchAll();
        $count4 = $statement4->rowCount();

        foreach($resultat1 as $row1){
            $output1 .= '<div class = "media post_item">
                            <img src = "data:image/jpeg;base64,'.base64_encode($row1['image1'] ).'" alt = "Image" class = "size-image">
                            <div class = "media-body">
                                <a href = "#">
                                    <h3>'.$row1['titre'].'</h3>
                                </a>
                                <p>'.$time = timeago($row1['time_publication']).'<br></p>
                            </div>
                        </div>
                        <div class = "br"></div>';
        }

        foreach($resultat2 as $row2){
            $output2 .= '<div class = "media post_item">
                            <img src = "data:image/jpeg;base64,'.base64_encode($row2['image1'] ).'" alt = "Image" class = "size-image">
                            <div class = "media-body">
                                <a href = "#">
                                    <h3>'.$row2['titre'].'</h3>
                                </a>
                                <p>'.$time = timeago($row2['time_publication']).'<br></p>
                            </div>
                        </div>
                        <div class = "br"></div>';
        }

        foreach($resultat3 as $row3){
            $output3 .= '<div class = "media post_item">
                            <img src = "data:image/jpeg;base64,'.base64_encode($row3['image1'] ).'" alt = "Image" class = "size-image">
                            <div class = "media-body">
                                <a href = "#">
                                    <h3>'.$row3['titre'].'</h3>
                                </a>
                                <p>'.$time = timeago($row3['time_publication']).'<br></p>
                            </div>
                        </div>
                        <div class = "br"></div>';
        }

        foreach($resultat4 as $row4){
            $output4 .= '<div class = "media post_item">
                            <img src = "data:image/jpeg;base64,'.base64_encode($row4['image1'] ).'" alt = "Image" class = "size-image">
                            <div class = "media-body">
                                <a href = "#">
                                    <h3>'.$row4['titre'].'</h3>
                                </a>
                                <p>'.$time = timeago($row4['time_publication']).'<br></p>
                            </div>
                        </div>
                        <div class = "br"></div>';
        }


        if(($count1 == 0) && ($count2 == 0) && ($count3 == 0) && ($count4 == 0)){
            $content .= "<div class = 'center-element'>
                            <p class = 'text-vide2'>Aucune annonce populaire trouvée..</p>
                            <br>
                        </div>";
        }
        else{
            $content .= $output1.$output2.$output3.$output4;
        }
        echo $content;
    }

    //Fonction qui affiche les articles
    function filterData(){
        $connect = connexionDataBase();

        $record_per_page = $_POST['tri'];
        $page = '';
        $output = '';

        if(isset($_POST['page'])){
            $page = $_POST['page'] ;
        }
        else{
            $page = 1;
        }

        $start_from = ($page - 1) * $record_per_page;
        $action = $_POST['action'];
        $table = $_POST['table'];
        $type = $_POST['type'];

        $output .= '<div class = "latest_product_inner row">';

        if(isset($action)){
            $query = "SELECT * FROM $table AS t, vendeur AS v WHERE type = '".$type."' AND t.email = v.email LIMIT $start_from, $record_per_page";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_row = $statement->rowCount();

            if($total_row > 0){
                foreach($result as $row){
                    $output .= '<div class = "col-lg-3 col-md-3 col-sm-6">
                                    <div class = "f_p_item">
                                        <div class = "f_p_img">
                                            <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" alt = "Image">
                                            <div class = "p_icon">';
                                                if (empty($_POST['email'])){
                                                    $output .= '<a href = "javascript:void(0)">
                                                                    <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                                </a>';
                                                }
                                                    
                                                else{
                                                    if(getActionLikes($row['id'],$table,$_POST['email']) == "true"){
                                                        $output .= '<a href = "javascript: void(0)">
                                                                        <i class = "lnr lnr-heart like" data-id = "'.$row['id'].'" data-table = "'.$table.'"></i>
                                                                    </a>';
                                                        }
                                                    else{
                                                        $output .= '<a href = "javascript: void(0)">
                                                                        <i class = "lnr lnr-heart-pulse like" data-id = "'.$row['id'].'" data-table = "'.$table.'"></i>
                                                                    </a>';
                                                    } 
                                                }
                                                      
                                                $output .= '<a href = "description_article.php?article='.$table.'&type='.$row['type'].'&id='.$row['id'].'" onclick = updateVue(`'.$row['id'].'`,`'.$table.'`);>
                                                                <i class = "lnr lnr-picture"></i>
                                                            </a>
                                            </div>
                                        </div>
                                        <a href = "#">
                                            <h4>'.$row['titre'].'</h4>
                                        </a>
                                        <h5>$'.$row['prix'].'</h5>
                                    </div>
                                </div>';
                }
                $output .= '</div>';

                $page_query = "SELECT * FROM $table AS t, vendeur AS v WHERE type = '".$type."' AND t.email = v.email";
                $statement = $connect->prepare($page_query);
                $statement->execute();
                $result = $statement->fetchAll();
                $total_record = $statement->rowCount();
                $total_pages = ceil($total_record / $record_per_page);

                $output .= '<div class = "row">
                                <nav class = "cat_page mx-auto" aria-label = "Page navigation example">
                                    <ul class = "pagination">';
                                        if($page == 1){
                                            $output .= '<li class = "page-item disabled">
                                                            <a class = "page-link">
                                                                <i class = "fa fa-chevron-left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>';
                                        }
                                        else{
                                            $left = $page - 1;
                                            $output .= '<li class = "page-item">
                                                            <a class = "page-link" id = '.$left.'>
                                                                <i class = "fa fa-chevron-left left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>';
                                        }
                    
                                        for($i = 1; $i <= $total_pages; $i++){
                                            if($page == $i){
                                                $output .= '<li class = "page-item active">
                                                                <a class = "page-link" id = '.$i.'>'.$i.'</a>
                                                            </li>';
                                            }
                                            else{
                                                $output .= '<li class = "page-item">
                                                                <a class = "page-link" id = '.$i.'>'.$i.'</a>
                                                            </li>';
                                            }
                                        }

                                        if($page == $total_pages){
                                            $output .= '<li class = "page-item disabled">
                                                            <a class = "page-link">
                                                                <i class = "fa fa-chevron-right" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>';
                                        }
                                        else{
                                            $right = $page + 1;
                                            $output .= '<li class = "page-item">
                                                            <a class = "page-link" id = '.$right.'>
                                                                <i class = "fa fa-chevron-right left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>';
                                        }
            }
            else{
                $output .= "<p class = 'mb-30 text-vide text-center' >Aucune annonce publié..</p>";
            }
                
            echo $output;
        }
    }

    //Fonction qui affiche les articles
    function filterData2(){  
        $connect = connexionDataBase();

        $record_per_page = $_POST['tri'];
        $page = '';
        $output = '';
        $champ = '';

        if(isset($_POST['page'])){
        $page = $_POST['page'] ;
        }

        else{
            $page = 1;
        }

        $start_from = ($page - 1) * $record_per_page;
        $action = $_POST['action'];
        $table = $_POST['table'];

        if($table == 'article_immobiliers'){
            if(isset($action)){
                $query = "SELECT * FROM $table AS t, vendeur AS v WHERE t.email = v.email";
                if(isset($_POST['type'])){
                    $type_filter = implode("','", $_POST['type']);
                    $query .= "
                    AND type IN('".$type_filter."') LIMIT $start_from, $record_per_page
                    ";
                }
                else{
                    $query .= "
                    LIMIT $start_from, $record_per_page
                    ";
                }
         
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                $total_row = $statement->rowCount();
                
                if($total_row > 0){
                    $output .= '<div class = "latest_product_inner row">';
                    foreach($result as $row){
                        $output .= '<div class = "col-lg-3 col-md-3 col-sm-6">
                                        <div class = "f_p_item">
                                            <div class = "f_p_img">
                                                <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" alt = "Image">
                                                <div class = "p_icon">';
                                                    if (empty($_POST['email'])){
                                                        $output .= '<a href = "javascript:void(0)">
                                                                        <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                                    </a>';
                                                    }
                                                
                                                    else{
                                                        if(getActionLikes($row['id'],$table,$_POST['email']) == "true"){
                                                            $output .= '<a href = "javascript: void(0)">
                                                                            <i class = "lnr lnr-heart like" data-id = "'.$row['id'].'" data-table = "'.$table.'"></i>
                                                                        </a>';
                                                        }
                                                        else{
                                                            $output .= '<a href = "javascript: void(0)">
                                                                            <i class = "lnr lnr-heart-pulse like" data-id = "'.$row['id'].'" data-table = "'.$table.'"></i>
                                                                        </a>';
                                                        }
                                                    }
                                                
                                                    $output .= '<a href = "description_article.php?article='.$table.'&id='.$row['id'].'" onclick = updateVue(`'.$row['id'].'`,`'.$table.'`);>
                                                                    <i class = "lnr lnr-picture"></i>
                                                                </a>
                                                </div>
                                            </div>
                                            <a href = "#">
                                                <h4>'.$row['titre'].'</h4>
                                            </a>
                                            <h5>$'.$row['prix'].'</h5>
                                        </div>
                                    </div>';
                    }
                    $output .= '</div>';
                    
                    $page_query = "SELECT * FROM $table AS t, vendeur AS v WHERE t.email = v.email ";
                    $statement = $connect->prepare($page_query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $total_record = $statement->rowCount();
                    $total_pages = ceil($total_record / $record_per_page);
                    
                    $output .= '<div class = "row">
                                    <nav class = "cat_page mx-auto" aria-label = "Page navigation example">
                                        <ul class = "pagination">';
                                        if($page == 1){
                                            $output .= '<li class = "page-item disabled">
                                                            <a class = "page-link">
                                                                <i class = "fa fa-chevron-left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>';
                                        }
                                        else{
                                            $left = $page - 1;
                                            $output .= '<li class = "page-item">
                                                            <a class = "page-link" id = '.$left.'>
                                                                <i class = "fa fa-chevron-left left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>';
                                        }
                                        
                                        for($i = 1; $i <= $total_pages; $i++){
                                            if($page == $i){
                                                $output .= '<li class = "page-item active">
                                                                <a class = "page-link" id = '.$i.'>'.$i.'</a>
                                                            </li>';
                                            }
                                            else{
                                                $output .= '<li class = "page-item">
                                                                <a class = "page-link" id = '.$i.'>'.$i.'</a>
                                                            </li>';
                                            }
                                        }
        
                                        if($page == $total_pages){
                                            $output .= '<li class = "page-item disabled">
                                                            <a class = "page-link">
                                                                <i class = "fa fa-chevron-right" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>';
                                        }
                                        else{
                                            $right = $page + 1;
                                            $output .= '<li class = "page-item">
                                                            <a class = "page-link" id = '.$right.'>
                                                                <i class = "fa fa-chevron-right left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>';
                                        }
                }
                else{
                    $output .= "<p class = 'mb-30 text-vide text-center'>Aucune annonce publié..</p>";
                }
                
                echo $output;
            }
        }
        else{
            if(isset($action)){
                $query = "SELECT * FROM $table AS t, vendeur AS v WHERE t.email = v.email";
                if(isset($_POST['type'])){
                    $type_filter = implode("','", $_POST['type']);
                    $query .= "
                    AND marque IN('".$type_filter."') LIMIT $start_from, $record_per_page
                    ";
                }
                else{
                    $query .= "
                    LIMIT $start_from, $record_per_page
                    ";
                }
         
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                $total_row = $statement->rowCount();
                
                if($total_row > 0){
                    $output .= '<div class = "latest_product_inner row">';
                    foreach($result as $row){
                        $output .= '<div class = "col-lg-3 col-md-3 col-sm-6">
                                        <div class = "f_p_item">
                                            <div class = "f_p_img">
                                                <img class = "img-fluid" src = "data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" alt = "Image">
                                                <div class = "p_icon">';
                                                
                                                    if (empty($_POST['email'])){
                                                        $output .= '<a href = "javascript:void(0)">
                                                                        <i class = "lnr lnr-heart" onclick = "return connecterDabord()"></i>
                                                                    </a>';
                                                    }
                                                    
                                                    else{
                                                        if(getActionLikes($row['id'],$table,$_POST['email']) == "true"){
                                                            $output .= '<a href = "javascript: void(0)">
                                                                            <i class = "lnr lnr-heart like" data-id = "'.$row['id'].'" data-table = "'.$table.'"></i>
                                                                        </a>';
                                                        }
                                                        else{
                                                            $output .= '<a href = "javascript: void(0)">
                                                                            <i class = "lnr lnr-heart-pulse like" data-id = "'.$row['id'].'" data-table = "'.$table.'"></i>
                                                                        </a>';
                                                        }
                                                        
                                                    }

                                                    $output .= '<a href = "description_article.php?article='.$table.'&id='.$row['id'].'" onclick = updateVue(`'.$row['id'].'`,`'.$table.'`);>
                                                                    <i class = "lnr lnr-picture"></i>
                                                                </a>
                                                </div>
                                            </div>
                                            <a href = "#">
                                                <h4>'.$row['titre'].'</h4>
                                            </a>
                                            <h5>$'.$row['prix'].'</h5>
                                        </div>
                                    </div>';
                    }
                    $output .= '</div>';
                    
                    $page_query = "SELECT * FROM $table AS t, vendeur AS v WHERE t.email = v.email ";
                    $statement = $connect->prepare($page_query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $total_record = $statement->rowCount();
                    $total_pages = ceil($total_record / $record_per_page);
                    
                    $output .= '<div class = "row">
                                    <nav class = "cat_page mx-auto" aria-label = "Page navigation example">
                                        <ul class = "pagination">';
                                        if($page == 1){
                                            $output .= '<li class = "page-item disabled">
                                                            <a class = "page-link">
                                                                <i class = "fa fa-chevron-left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>';
                                        }
                                        else{
                                            $left = $page - 1;
                                            $output .= '<li class = "page-item">
                                                            <a class = "page-link" id = '.$left.'>
                                                                <i class = "fa fa-chevron-left left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>';
                                        }
                                        
                                        for($i = 1; $i <= $total_pages; $i++){
                                            if($page == $i){
                                                $output .= '<li class = "page-item active">
                                                                <a class = "page-link" id = '.$i.'>'.$i.'</a>
                                                            </li>';
                                            }
                                            else{
                                                $output .= '<li class = "page-item">
                                                                <a class = "page-link" id = '.$i.'>'.$i.'</a>
                                                            </li>';
                                            }
                                        }
        
                                        if($page == $total_pages){
                                            $output .= '<li class = "page-item disabled">
                                                            <a class = "page-link">
                                                                <i class = "fa fa-chevron-right" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>';
                                        }
                                        else{
                                            $right = $page + 1;
                                            $output .= '<li class = "page-item">
                                                            <a class = "page-link" id = '.$right.'>
                                                                <i class = "fa fa-chevron-right left" aria-hidden = "true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>';
                                        }
                }
                else{
                    $output .= "<p class = 'mb-30 text-vide text-center' >Aucune annonce publié..</p>";
                }
                echo $output;
            }
        }
    }

    //Fonction qui affiche les catégroies
    function menuCategorie(){
        $output = '';
        $output .= '<ul class = "list">
                        <li>
                            <a href = "general.php">Catégorie général</a>
                        </li>
                        <li>
                            <a href = "camion.php">Camions</a>
                        </li>
                        <li>
                            <a href = "financement.php">Financements et versements</a>
                        </li>
                        <li>
                            <a href = "immobilier.php">Immobiliers</a>
                        </li>
                        <li>
                            <a href = "materiaux.php">Matériaux</a>
                        </li>
                        <li>
                            <a href = "piece_rechange.php">Piéces de réchange</a>
                        </li>
                        <li>
                            <a href = "quade.php">Quades</a>
                        </li>
                        <li>
                            <a href = "voiture.php">Voitures</a>
                        </li>
                    </ul>';
        echo $output;
    }

    //Fonction qui affiche l'image de l'article avec des animations slides
    function getImagesArticles($table,$id){
        $connect = connexionDataBase();
        $output = '';

        $sql = "SELECT * from $table AS t, vendeur AS v WHERE t.email = v.email AND id = '$id'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $output .= '<ol class = "carousel-indicators">
                            <li data-target = "#carouselExampleIndicators" data-slide-to = "0" class = "active">
							    <img src = "data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" alt = "Image">
                            </li>
                            <li data-target = "#carouselExampleIndicators" data-slide-to = "1">
                                <img src = "data:image/jpeg;base64,'.base64_encode($row['image2'] ).'" alt = "Image">
                            </li>
                            <li data-target = "#carouselExampleIndicators" data-slide-to = "2">
                                <img src = "data:image/jpeg;base64,'.base64_encode($row['image3'] ).'" alt = "Image">
                            </li>
                        </ol>
                     
                        <div class = "carousel-inner">
                            <div class = "carousel-item active">
                                <img class = "d-block w-100" src = "data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" alt = "First slide">
                            </div>
                            <div class = "carousel-item">
                                <img class = "d-block w-100" src = "data:image/jpeg;base64,'.base64_encode($row['image2'] ).'" alt = "Second slide">
                            </div>
                            <div class = "carousel-item">
                                <img class = "d-block w-100" src = "data:image/jpeg;base64,'.base64_encode($row['image3'] ).'" alt = "Third slide">
                            </div>
                        </div>';
        }
        echo $output;
    }

    //Fonction qui affiche les informations de l'article
    function getDetailArticle($table,$id){
        $connect = connexionDataBase();
        $output = '';
        $category = '';
        $marque = '';
        $marque_text = '';
        $table_avis = '';
        $table_reaction = '';
        $nbr_likes = '';

        if($table == 'article_materiaux'){
            $table_avis = 'avis_materiaux';
            $table_reaction = 'reaction_materiaux';
        }
        else if($table == 'article_immobiliers'){
            $table_avis = 'avis_immobiliers';
            $table_reaction = 'reaction_immobiliers';
        }
        else if($table == 'article_voitures'){
            $table_avis = 'avis_voitures';
            $table_reaction = 'reaction_voitures';
        }
        else if($table == 'article_plus'){
            $table_avis = 'avis_articles_plus';
            $table_reaction = 'reaction_plus';
        }

        $sql_likes = "SELECT COUNT(*) AS likes FROM $table_reaction WHERE id_article = $id AND action = 1";
        $statement4 = $connect->prepare($sql_likes);
        $statement4->execute();
        $likes = $statement4->fetchAll();

        $sql = "SELECT *, COUNT(avis) AS com FROM $table AS tab, vendeur AS v, $table_avis AS tavis WHERE tab.id = $id AND v.email = tab.email AND tab.id = tavis.id_article";
        $statement2 = $connect->prepare($sql);
        $statement2->execute();
        $result = $statement2->fetchAll();

        if($table == 'article_materiaux'){
            $category = 'Matériaux';
            $marque = 'marque';
            $marque_text = 'Marque';
        }

        else if($table == 'article_immobiliers'){
            $category = 'Immobiliers';
            $marque = 'type';
            $marque_text = 'Type';
        }

        else if($table == 'article_voitures'){
            $category = 'Voitures';
            $marque = 'marque';
            $marque_text = 'Marque';
        }

        else if($table == 'article_plus'){
            if($_GET['type'] == 'Catégorie général'){
                $category = 'Général';
                $marque = 'type';
                $marque_text = 'Type';
            }

            else if($_GET['type'] == 'Financement et Versement'){
                $category = 'Finance';
                $marque = 'type';
                $marque_text = 'Type';
            }

            else if($_GET['type'] == 'Camions'){
                $category = 'Voitures';
                $marque = 'type';
                $marque_text = 'Type';
            }
            
        }

       
        foreach($likes as $result_like){
            $nbr_likes .= $result_like['likes'];
        }
            

        foreach($result as $row){
                $output .= '<div class = "s_product_text">
                                <h3>'.$row['titre'].'</h3>
                                <h2>$'.$row['prix'].'</h2>
                                <ul class = "list">
                                    <li>
                                        <a class = "active" href = "#">
                                            <span>Catégorie</span> : '.$category.'
                                        </a>
                                    </li>
                                    <li>
                                        <a href = "#">
                                            <span>'.$marque_text.'</span> : '.$row[$marque].'
                                        </a>
                                    </li>
                                    <div class = "card_area">
                                        <a class = "icon_btn" href="#">
                                            <i class = "lnr lnr-eye"><span class = "padding_icon">'.$row['nbr_vue'].'</span></i>
                                        </a>
                                        <a class = "icon_btn" href="#">
                                            <i class = "lnr lnr-heart"><span class = "padding_icon">'.$nbr_likes.'</span></i>
                                        </a>
                                        <a class = "icon_btn" href="#">
                                            <i class = "lnr lnr-bubble"><span class = "padding_icon">'.$row['com'].'</span></i>
                                        </a>
                                    </div>
                                </ul>
                                <p>'.$row['detail'].'</p>
                                </div>';                            
        }
        echo $output;
       
    }

    //Fonction qui ajouter une vue
    function updateVue(){
        $connect = connexionDataBase();

        $id = $_POST['id'];
        $table = $_POST['table']; 
        
        $sql = "UPDATE $table SET nbr_vue = nbr_vue + 1 WHERE id = '$id'";
        if($connect->exec($sql) == 1){
            echo "vue modifié";
        }

        else{
            echo "vue non modifié";
        }
    }

    //Fonction qui affiche le contact de la vendeur
    function getInformationsVendeurPourContacter($table, $id, $email){
        $connect = connexionDataBase();

        $output = '';

        $sql = "SELECT * FROM vendeur v, $table t  WHERE t.email = v.email AND id = '$id'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach ($result as $row){
            $output .= '<div class = "blog_right_sidebar col-lg-8">
                            <aside class = "single_sidebar_widget author_widget">';
                                if($row['photo_profil'] != NULL){
                                    $output .= '<img class = "photo-profil author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil" />';
                                }
            
                                else{
                                    $output .= '<img class = "photo-profil author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image">';
                                }
            
                                $output .= '</aside>
                            <aside class = "single_sidebar_widget post_category_widget">
                                <br>
                                <h3 class = "text-center">'.$row['nom'].'</h3>
                                <br>
                                <ul class = "list cat-list">
                                    <li>
                                        <a href = "javascript: void(0)" class = "d-flex justify-content-between">
                                            <p>Numéro</p>
                                            <p>'.$row['numero'].'</p>
                                        </a>
                                    </li>
                                </ul>';
                                if($email != $row['email']){
                                    $output .= '<div class = "input-group-icon mt-10">
                                                    <button type = "button" class = "btn submit_btn btn-center" id = "contacter" name = "Contacter" onclick = ouvrirModalContacter(`'.$email.'`,`'.$row['email'].'`)>Contacter le vendeur</button>
                                                </div>';
                                }
                                else{
                                    $output .= '<div class = "input-group-icon mt-10">
                                                    <button type = "button" class = "btn submit_btn btn-center" id = "contacter" name = "Contacter" onclick = ouvrirModalContacter(`'.$email.'`,`'.$row['email'].'`) disabled>Vous êtes le vendeur</button>
                                </div>';
                                }
                            $output.= '</aside>
                        </div>';
        }
        echo $output;
    }

    //Fonction qui affiche la description de l'article
    function getDetailDescription($table, $id){
        $connect = connexionDataBase();

        $output = '';

        $sql = "SELECT * FROM $table t  WHERE id = '$id'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $output .= $row['detail'];
        }
        echo $output;
    }

    //Fonction qui affiche les spécifications
    function getSpecifications($table,$id){
        $connect = connexionDataBase();

        $output = '';
        $category = '';
        $marque = '';
        $marque_text = '';

        if($table == 'article_materiaux'){
            $category = 'Matériaux';
            $marque = 'marque';
            $marque_text = 'Marque';
        }

        else if($table == 'article_immobiliers'){
            $category = 'Immobiliers';
            $marque = 'type';
            $marque_text = 'Type';
        }

        else if($table == 'article_voitures'){
            $category = 'Voitures';
            $marque = 'marque';
            $marque_text = 'Marque';
        }

        else if($table == 'article_plus' && $_GET['type'] == 'Financement et Versement'){
            $category = 'Finance';
            $marque = 'type';
            $marque_text = 'Type';
        }

        else if($table == 'article_plus' && $_GET['type'] == 'Catégorie général'){
            $category = 'Général';
            $marque = 'type';
            $marque_text = 'Type';
        }

        else if($table == 'article_plus'){
            $category = 'Voitures';
            $marque = 'type';
            $marque_text = 'Type';
        }

        $sql = "SELECT * FROM $table t  WHERE id = '$id'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $output .= '<tbody>
                            <tr>
							    <td>
									<h5>Référence</h5>
								</td>
								<td>
									<h5>'.$row['id'].'</h5>
								</td>
                            </tr>
                            <tr>
								<td>
									<h5>Titre</h5>
								</td>
								<td>
									<h5>'.$category.'</h5>
								</td>
                            </tr>
                            <tr>
								<td>
									<h5>'.$marque_text.'</h5>
								</td>
								<td>
									<h5>'.$row[$marque].'</h5>
								</td>
                            </tr>
                            <tr>
								<td>
									<h5>Prix</h5>
								</td>
								<td>
									<h5>$'.$row['prix'].'</h5>
								</td>
                            </tr>
                            <tr>
								<td>
									<h5>Négociable</h5>
								</td>
								<td>
									<h5>'.$row['negociable'].'</h5>
								</td>
                            </tr>
                            <tr>
								<td>
									<h5>Etat</h5>
								</td>
								<td>
									<h5>'.$row['etat'].'</h5>
								</td>
                            </tr>
                            <tr>
								<td>
									<h5>Date de publication</h5>
								</td>
								<td>
									<h5>'.date('D d F Y',strtotime($row['date_publication'])).' à '.date('H:s',strtotime($row['time_publication'])).'</h5>
								</td>
							</tr>';
        }
        echo $output;
    }

    //Fonction pour activer les commentaires
    function commentaireActiver($email){
        $connect = connexionDataBase();
        $output = '';

        $requete = "SELECT nom FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
    
        foreach($result as $row){
            $full_nom = $row['nom'];
        
            $output .= '<form class = "row contact_form" action = "javascript: void(0)" method = "POST" id = "contactForm" onsubmit = "return ajouterAvis();">
                            <div class = "col-md-12">
                                <div class = "form-group">
                                    <div id = "rateYo"></div>
                                </div>	
                            </div>
                            <div class = "col-md-12">
                                <div class = "form-group">
                                    <input type = "hidden" class = "form-control" id = "avis" name = "avis" placeholder = "Saisissez votre avis.." required>
                                </div>
                            </div>
                            <div class = "col-md-12">
                                <div class = "form-group">
                                    <input type = "text" class = "form-control" id = "nom" name = "nom" required value = "'.$row['nom'].'">
                                </div>
                            </div>
                            <div class = "col-md-12">
                                <div class = "form-group">
                                    <textarea class = "form-control" required  name = "message_avis" id = "message_avis" rows = "1" placeholder = "Si vous souhaitez, écrivez votre commentaire içi.."></textarea>
                                </div>
                            </div>
                            <div class = "col-md-12 text-right">
                                <button type = "submit" value = "submit" class = "btn submit_btn submit" id = "submit">Commenter</button>
                            </div>
                        </form>';
        }
        echo $output;
    }

    //Fonction pour desactiver les commentaires
    function commentaireDesactiver(){
        $output = '';
        $output .= '<form class = "row contact_form disabled_review" action = "javascript: void(0)" method = "POST" id = "contactForm">
                        <div class = "col-md-12">
                            <div class = "form-group">
                                <div id = "rateYo"></div>
                            </div>	
                        </div>
                        <div class = "col-md-12">
                            <div class = "form-group">
                                <input type = "hidden" class = "form-control" id = "avis" name = "avis" placeholder = "Saisissez votre avis.." required>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class = "form-group">
                                <input type = "text" class = "form-control" id = "nom" name = "nom" required Placeholder = "Saisissez votre nom..">
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class = "form-group">
                                <textarea class = "form-control" name = "message_avis" id = "message_avis" rows = "1"placeholder = "Si vous souhaitez, écrivez votre commentaire içi.." requires></textarea>
                            </div>
                        </div>
                        <div class = "col-md-12 text-right">
                            <button type = "submit" value = "submit" class = "btn submit_btn submit" id = "submit">Commenter</button>
                        </div>
                    </form>';
        echo $output;
    }

    //Fonction pour ajouter un avis
    function ajouterAvis(){
        $connect = connexionDataBase();

        $output = '';
        $table_avis = '';

        $nom = $_POST['nom'];
        $message = $_POST['message'];
        $nbr_avis = $_POST['avis'];
        $email = $_POST['email'];
        $id_article = $_POST['id'];
        $table = $_POST['table'];
        $curent_date = date('Y-m-d');
        $curent_time = date("H:i:s"); 

        if($table == 'article_materiaux'){
            $table_avis = 'avis_materiaux';
        }
        else if($table == 'article_immobiliers'){
            $table_avis = 'avis_immobiliers';
        }
        else if($table == 'article_voitures'){
            $table_avis = 'avis_voitures';
        }
        else if($table == 'article_plus'){
            $table_avis = 'avis_articles_plus';
        }

        $sql = "INSERT INTO $table_avis(id_article, nbr_avis, nom, email, avis, date_avis, time_avis)
                VALUES ('$id_article', '$nbr_avis', '$nom', '$email', '$message', '$curent_date', '$curent_time')";

        if($connect->exec($sql) == 1){
            $output .=  '<div class = "alert alert-info alert-dismissible fade show">
                            <h3 class = "alert-heading"><i class = "fa fa-comment"></i> commentaire ajouté </h3>
                            <p>Votre commentaire a été ajouté avec succés. Si vous souhaitez acheter ce produit,vouz devez contacter le vendeur.</p>
                            <hr>
                            <p class = "mb-0">Noter bien que votre commentaire aide les autre client a évalué le produit.</p>
                        </div>';
        }

        else{
            $output .=  '<div class = "alert alert-warning alert-dismissible fade show">
                            <h3 class = "alert-heading"><i class = "fa fa-warning"></i>Commentaire non ajouté</h3>
                            <p>Nous avons trouvés des erreur concernant votre commentaire. Actualiser cette page et ressayer une autre fois.</p>
                            <hr>
                            <p class = "mb-0">Noter bien que votre commentaire aide les autre client a évalué le produit.</p>
                        </div>';
        }
        echo $output;
    }

    //Fonction pour calculer le nombre des avis
    function nombreAvis($table,$id){
        $output = '';

        $connect = connexionDataBase();

        $table_avis = '';

        if($table == 'article_materiaux'){
            $table_avis = 'avis_materiaux';
        }
        else if($table == 'article_immobiliers'){
            $table_avis = 'avis_immobiliers';
        }
        else if($table == 'article_voitures'){
            $table_avis = 'avis_voitures';
        }
        else if($table == 'article_plus'){
            $table_avis = 'avis_articles_plus';
        }

        $sql = "SELECT COUNT(*) AS nbr, AVG(nbr_avis) AS moy FROM $table_avis WHERE id_article = '$id'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $moyenne = number_format((float)$row['moy'], 1, '.', '');
            $output .= '<h5>Globale</h5>
                        <h4>'.$moyenne.'</h4>
                        <h6>('.$row['nbr'].' avis)</h6>';
        }
        echo $output;
    }

    //Fonction pour afficher les nombres des etoiles
    function getNbrStarParTable($table,$id){
        $output = '';
        $table_avis = '';

        if($table == 'article_materiaux'){
            $table_avis = 'avis_materiaux';
        }
        else if($table == 'article_immobiliers'){
            $table_avis = 'avis_immobiliers';
        }
        else if($table == 'article_voitures'){
            $table_avis = 'avis_voitures';
        }
        else if($table == 'article_plus'){
            $table_avis = 'avis_articles_plus';
        }

        $connect = connexionDataBase();
        $sql5 = "SELECT COUNT(nbr_avis) AS nbr5 FROM $table_avis WHERE id_article = '$id' AND nbr_avis = 5";
        $statement5 = $connect->prepare($sql5);
        $statement5->execute();
        $result5 = $statement5->fetchAll();

        $sql4 = "SELECT COUNT(nbr_avis) AS nbr4 FROM $table_avis  WHERE id_article = '$id' AND nbr_avis = 4";
        $statement4 = $connect->prepare($sql4);
        $statement4->execute();
        $result4 = $statement4->fetchAll();

        $sql3 = "SELECT COUNT(nbr_avis) AS nbr3 FROM $table_avis  WHERE id_article = '$id' AND nbr_avis = 3";
        $statement3 = $connect->prepare($sql3);
        $statement3->execute();
        $result3 = $statement3->fetchAll();

        $sql2 = "SELECT COUNT(nbr_avis) AS nbr2 FROM $table_avis  WHERE id_article = '$id' AND nbr_avis = 2";
        $statement2 = $connect->prepare($sql2);
        $statement2->execute();
        $result2 = $statement2->fetchAll();

        $sql1 = "SELECT COUNT(nbr_avis) AS nbr1 FROM $table_avis  WHERE id_article = '$id' AND nbr_avis = 1";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();
        
        if($statement5->rowCount() == 0){
            $output .= '<li>
                            <a href = "#">5 Star
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>  0
                            </a>
                        </li>';
        }
        else {
            foreach($result5 as $row5){
                $output .= '<li>
                                <a href = "#">5 Star
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i> '.$row5['nbr5'].' 
                                </a>
                            </li> ';
            }
        }

        if($statement4->rowCount() == 0){
            $output .= '<li>
                            <a href = "#">4 Star
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star-o"></i>  0
                            </a>
                        </li>';
        }
        else {
            foreach($result4 as $row4){
                $output .= '<li>
                                <a href = "#">4 Star
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star-o"></i> '.$row4['nbr4'].' 
                                </a>
                            </li> ';
            }
        }

        if($statement3->rowCount() == 0){
            $output .= '<li>
                            <a href = "#">3 Star
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star-o"></i>
                                <i class = "fa fa-star-o"></i>  0
                            </a>
                        </li>';
        }
        else {
            foreach($result3 as $row3){
                $output .= '<li>
                                <a href = "#">3 Star
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star-o"></i>
                                    <i class = "fa fa-star-o"></i> '.$row3['nbr3'].' 
                                </a>
                            </li> ';
            }
        }

        if($statement2->rowCount() == 0){
            $output .= '<li>
                            <a href = "#">2 Star
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star-o"></i>
                                <i class = "fa fa-star-o"></i>
                                <i class = "fa fa-star-o"></i>  0
                            </a>
                        </li>';
        }
        else {
            foreach($result2 as $row2){
                $output .= '<li>
                                <a href = "#">2 Star
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star-o"></i>
                                    <i class = "fa fa-star-o"></i>
                                    <i class = "fa fa-star-o"></i> '.$row2['nbr2'].' 
                                </a>
                            </li> ';
            }
        }

        if($statement1->rowCount() == 0){
            $output .= '<li>
                            <a href = "#">1 Star
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star-o"></i>
                                <i class = "fa fa-star-o"></i>
                                <i class = "fa fa-star-o"></i>
                                <i class = "fa fa-star-o"></i>  0
                            </a>
                        </li>';
        }
        else {
            foreach($result1 as $row1){
                $output .= '<li>
                                <a href = "#">1 Star
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star-o"></i>
                                    <i class = "fa fa-star-o"></i>
                                    <i class = "fa fa-star-o"></i>
                                    <i class = "fa fa-star-o"></i> '.$row1['nbr1'].' 
                                </a>
                            </li> ';
            }
        }
        echo($output);
    }

    //Fonction pour afficher les commentaires
    function getComment($id,$table){
        $table_avis = '';
        $output = '';

        if($table == 'article_materiaux'){
            $table_avis = 'avis_materiaux';
        }
        else if($table == 'article_immobiliers'){
            $table_avis = 'avis_immobiliers';
        }
        else if($table == 'article_voitures'){
            $table_avis = 'avis_voitures';
        }
        else if($table == 'article_plus'){
            $table_avis = 'avis_articles_plus';
        }

        $connect = connexionDataBase();
        $requete = "SELECT * FROM $table_avis AS ta, vendeur AS ve WHERE id_article = '$id' AND ta.email = ve.email LIMIT 2";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
        $numero = $statement->rowCount();

        if($numero > 0){
            $output .= '<table id = "review_item">';
            foreach($result as $row) {
                $output .= '<div class = "review_item">
                                <div class = "media">
                                    <div class = "d-flex">';
                                        if($row['photo_profil'] != NULL){
                                            $output .= '<img class = "logo-image-review author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil" />';
                                        }
                                        else{
                                            $output .= '<img class = "logo-image-review author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image">';
                                        }
                                    $output .= '</div>
                                    <div class = "media-body">
                                        <h4>'.$row['nom'].'</h4>
                                        <h5 class = "date">'.date('D d F Y',strtotime($row['date_avis'])).' à '.date('H:i',strtotime($row['time_avis'])).'</h5>';
                                        if(($row['nbr_avis']) == 0){
                                            $output .= '<i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 1){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 2){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 3){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 4){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 5){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>';
                                        }
                                    $output .= '</div>
                                </div>
                                <p>'.$row['avis'].'</p>
                            </div>';
                            $id_comment = $row['id'];
            }
            $output .= '<tr id = "remove_row"> 
                            <td><a class = "tp_btn" href = "javascript: void(0) "name = "btn_more" id = "btn_more" data-cid = "'.$id_comment.'">Autres commentaires..</a></td>
                        </tr>';
        }
        $output .= '</table>';

        echo $output;
    }

    //Fonction qui affiche plus de commentaires
    function loadMoreComment(){
        $id = $_POST['id'];
        $id_comment = '';
        $table = $_POST['article'];
        $table_avis = '';
        $output = '';

        if($table == 'article_materiaux'){
            $table_avis = 'avis_materiaux';
        }
        else if($table == 'article_immobiliers'){
            $table_avis = 'avis_immobiliers';
        }
        else if($table == 'article_voitures'){
            $table_avis = 'avis_voitures';
        }
        else if($table == 'article_plus'){
            $table_avis = 'avis_articles_plus';
        }

        $connect = connexionDataBase();
        $requete = "SELECT * FROM $table_avis AS ta, vendeur AS ve WHERE id_article = '$id' AND ta.email = ve.email AND id > ".$_POST['last_comment_id']." LIMIT 2";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
        $numero = $statement->rowCount();

        if($numero > 0){
            $output .= '<table id = "review_item">';
            foreach($result as $row) {
                $output .= '<div class = "review_item">
                                <div class = "media">
                                    <div class = "d-flex">';
                                        if($row['photo_profil'] != NULL){
                                            $output .= '<img class = "logo-image-review author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil" />';
                                        }
                                        else{
                                            $output1 .= '<img class = "logo-image-review author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image">';
                                        }
                                    $output .= '</div>
                                    <div class = "media-body">
                                        <h4>'.$row['nom'].'</h4>
                                        <h5 class = "date">'.date('D d F Y',strtotime($row['date_avis'])).' à '.date('H:i',strtotime($row['time_avis'])).'</h5>';
                                        if(($row['nbr_avis']) == 0){
                                            $output .= '<i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 1){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 2){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 3){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 4){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star-o"></i>';
                                        }
                                        else if(($row['nbr_avis']) == 5){
                                            $output .= '<i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>
                                                        <i class = "fa fa-star"></i>';
                                        }
                                    $output .= '</div>
                                </div>
                                <p>'.$row['avis'].'</p>
                            </div>';
                            $id_comment = $row['id'];
            }
            $output .= '<tr id = "remove_row"><td><a class = "tp_btn" href = "javascript: void(0) " name = "btn_more" id = "btn_more" data-cid = "'.$id_comment.'">Autres commentaires..</a></td>
                        </tr>
                        </table>';
        }
        echo $output;
    }
   
    //Fonction pour creer une liste de favoris
    function creerListeFavoris(){
        $output = '';
        $email_notif = $_POST['email_notif'];
        $choix1 = $_POST['choix1'];
        $choix2 = $_POST['choix2'];
        $choix3 = $_POST['choix3'];

        $connect = connexionDataBase();

        $sql = "INSERT INTO favoris_article(email_notif,email, choix1, choix2, choix3)
            VALUES ('$email_notif', '$email_notif', '$choix1', '$choix2', '$choix3')";

        if($connect->exec($sql) == 1){
            $output .= 'success';
        }

        else{
            $output .= 'error';
        }
        echo $output;
    }

    //Fonction pour afficher la liste des favoris
    function getListeFavoris($email){
        $output = '';
        $connect = connexionDataBase();

        $requete = "SELECT * FROM favoris_article WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
        $nbr = $statement->rowCount();

        if($nbr == 0){
            $output .= "<p class = 'mb-30 text-vide text-center' >Votre liste de favoris est vide..</p>";
        }
        else{
            foreach($result as $row){
                $output.= '<form class = "row contact_form" action = "javascript: void(0)" method = "POST" onsubmit = "return updateListeFavoris();">
                                <input type = "hidden" name = "email" id = "email" value = "'.$email.'" required>
                                <div class = "col-md-8 form-group p_star">
                                    <select class = "country_select" name = "choix1" id = "choix1">
                                        <option selected disabled>'.$row['choix1'].'</option>
                                        <option id = "Camions" value = "Camions">Camions</option>
                                        <option id = "Catégorie général" value = "Catégorie général">Catégorie général</option>
                                        <option id = "Financement et Versement" value = "Financement et Versement">Financement et Versement</option>
                                        <option id = "Immobiliers" value = "Immobiliers">Immobiliers</option>
                                        <option id = "Matériaux" value = "Matériaux">Matériaux</option>
                                        <option id = "Piéces de réchange" value = "Piéces de réchange">Piéces de réchange</option>
                                        <option id = "Quades" value = "Quades">Quades</option>
                                        <option id = "Voitures" value = "Voitures">Voitures</option>
                                    </select>
                                </div>
                                <div class = "col-md-8 form-group p_star">
                                    <select class = "country_select" name = "choix2" id = "choix2">
                                        <option selected disabled>'.$row['choix2'].'</option>
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
                                    <select class = "country_select" name = "choix3" id = "choix3">
                                        <option selected disabled>'.$row['choix3'].'</option>
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
                                    <button type = "submit" class = "btn submit_btn" id = "update" name = "update" >Modifier la liste des favoris</button>
                                </div>
                            </form>
                            <div id = "alert_message" class = "alert_message">

                          </div>';
            }
        }
        echo $output;
    }

    //Fonction pour modifier la liste de favoris
    function updateListeFavoris(){
        $output = '';
        $email = $_POST['email'];
        $choix1 = $_POST['choix1'];
        $choix2 = $_POST['choix2'];
        $choix3 = $_POST['choix3'];

        $connect = connexionDataBase();
        $sql = "UPDATE favoris_article SET choix1 = '$choix1', choix2 = '$choix2', choix3 = '$choix3' WHERE email = '$email'";
        if($connect->exec($sql) == 1){
            $output .=  "modifie";
        }

        else{
            $output .=  "<div class = 'alert alert-danger alert-dismissible fade show'>
                            <p class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> La liste favoris non modifié</p>
                            <p>Nous avons trouvés des erreur concernant votre demande. Actualiser cette page et ressayer une autre fois.</p>
                            <hr>
                            <p class = 'mb-0'>Noter bien que vous pouvez modifier votre liste de favoris à tout moment.</p>
                        </div>";
        }
        echo $output;
    }

    //Fonction pour desabonner de service liste favoris
    function desabonnerListe(){
        $email = $_POST['email'];
        $output = '';

        $connect = connexionDataBase();
        $requete = "SELECT * FROM favoris_article WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $nbr = $statement->rowCount();

        if($nbr > 0){
            $sql = "DELETE FROM favoris_article WHERE email = '$email'";
            if($connect->exec($sql) == 1){
                $output .=  "<div class = 'alert alert-warning alert-dismissible fade show'>
                                <p class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> Vous êtes désabonné</p>
                                <p>Vous êtes désabonné de cette service pour l'instant.</p>
                                <hr>
                                <p class = 'mb-0'>Noter bien que vous pouvez créer une autre liste de favoris à tout moment.</p>
                            </div>";
            }
    
            else{
                $output .=  "<div class = 'alert alert-danger alert-dismissible fade show'>
                                <p class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> Vous êtes encore abonné</p>
                                <p>Nous avons trouvés des erreur concernant votre demande. Actualiser cette page et ressayer une autre fois.</p>
                                <hr>
                                <p class = 'mb-0'>Noter bien que vous pouvez utiliser ce service à tout moment.</p>
                            </div>";
            }
        }

        else{
            $output .=  "<div class = 'alert alert-danger alert-dismissible fade show'>
            <p class = 'alert-heading title-alert'><i class = 'fa fa-warning'></i> La liste est vide</p>
            <p>Nous avons trouvés des erreur concernant votre demande. Votre liste des articles favoris est vide.</p>
            <hr>
            <p class = 'mb-0'>Noter bien que vous pouvez utiliser ce service à tout moment.</p>
        </div>";
        }
        echo $output;
    }

    //Fonction pour retourné l'image et le nom du compte
    function getImageNomCompte(){
        $output = '';
        $email = $_GET['email'];

        $connect = connexionDataBase();
        $requete = "SELECT * FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $output = '<h3 class = "text-sweet-alert">Récupération du compte</h3>';
                        if($row['photo_profil'] != NULL){
                            $output .= '<img class = "image_forget" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil"/>';
                        }
                        else{
                            $output .= '<img class = "image_forget" src = "img/logo/user_inconue.png" alt = "Image"/>';
                        }
                        $output .= '<b class = "text-center text-bleu title-alert">'.$row['nom'].'</b>';
        }
        echo $output;
    }

    //Fonction pour les réactions
    function reaction(){
        $connect = connexionDataBase();

        $email = $_POST['email'];
        $id = $_POST['id'];
        $table = $_POST['table'];
        $curent_date = date('Y-m-d');
        $curent_time = date("H:i:s"); 
        
        $table_reaction = '';

        if($table == 'article_materiaux'){
            $table_reaction = 'reaction_materiaux';
        }

        else if($table == 'article_immobiliers'){
            $table_reaction = 'reaction_immobiliers';
        }

        else if($table == 'article_voitures'){
            $table_reaction = 'reaction_voitures';
        }

        else if($table == 'article_plus'){
            $table_reaction = 'reaction_plus';
        }
        
        $sql_like = "SELECT * FROM  $table_reaction WHERE id_article = '$id' AND email = '$email' AND action = 1";
        $statement_like = $connect->prepare($sql_like);
        $statement_like->execute();
        $count_like = $statement_like->rowCount();
        
        $nom = getNom($email);

        if($count_like == 0){
            $requete_like = "INSERT INTO $table_reaction (id_article, email,nom, action, curent_time, curent_date)VALUES('$id', '$email', '$nom', 1, '$curent_time', '$curent_date')";
            $connect->exec($requete_like);
        }
    }

    //Fonction qui retourne si un article est aimé ou non
    function getActionLikes($id,$table,$email){
        $connect = connexionDataBase();
        $table_reaction = '';
        $test = "";

        if($table == 'article_materiaux'){
            $table_reaction = 'reaction_materiaux';
        }

        else if($table == 'article_immobiliers'){
            $table_reaction = 'reaction_immobiliers';
        }

        else if($table == 'article_voitures'){
            $table_reaction = 'reaction_voitures';
        }

        else if($table == 'article_plus'){
            $table_reaction = 'reaction_plus';
        }

        $sql = "SELECT * FROM  $table_reaction WHERE id_article = $id AND email = '$email' AND action = 1";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $count = $statement->rowCount();

        if($count > 0){
            $test = "false";
        }
        
        else{
           $test = "true";
        }
        return $test;
    }  

    //Fonction pour returner la photo de profil
    function getPhotoVendeur($email){
        $output = '';

        $connect = connexionDataBase();
        $sql = "SELECT photo_profil, genre from vendeur WHERE email = '$email'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row){
            if($row['photo_profil'] != NULL){
                $output .= '<img class = "logo-image-review author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil" />';
            }
            else{
                $output .= '<img class = "logo-image-review author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image">';
            }
        }
        return $output;
    }

    //Fonction pour returner la photo de profil(2)
    function getPhotoVendeur2($email){
        $output = '';

        $connect = connexionDataBase();
        $sql = "SELECT photo_profil, genre from vendeur WHERE email = '$email'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row){
            if($row['photo_profil'] != NULL){
                $output .= '<img class = "photo-profil-2 author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil" /><span id = "stat"></span>';
            }
            else{
                $output .= '<img class = "photo-profil-2 author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image"><span id = "stat"></span>';
            }
        }
        return $output;
    }

    //Fonction pour afficher le historique des réaction
    function getHistoriqueReaction($email){
        $output1 = $output2 = $output3 = $output4 = $content = $nom = $info = $sexe = '';
        $nom_vendeur1 = $nom_vendeur2 = $nom_vendeur3 = $nom_vendeur4 = '';
       
        $connect = connexionDataBase();
        

        $nomProfil = getNom($email);
        $info = getInformationProfil($email);
        $genre = $info['genre'];

        if($genre == "Homme"){
            $sexe = "son";
        }
        else{
            $sexe = "sa";
        }
        $sql1 = "SELECT am.email AS email_vendeur,rm.* from article_materiaux AS am, reaction_materiaux AS rm
        WHERE am.id = id_article AND rm.email = '$email' AND am.id = rm.id_article ORDER BY curent_date, curent_time DESC";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();
        $count1 = $statement1->rowCount();

        $output1 .= '<div class = "check_title">
                        <h2>Les réactions des matériaux</h2>
                    </div>
                    <br>';
        $output2 .= '<div class = "check_title">
                        <h2>Les réactions des immobiliers</h2>
                    </div>
                    <br>';
        $output4 .= '<div class = "check_title">
            <h2>Les réactions des voitures</h2>
        </div>
        <br>';
        $output3 .= '<div class = "check_title">
                        <h2>Autres réactions</h2>
                    </div>
                    <br>';

        foreach($result1 as $row1){
            if($email == $row1['email_vendeur']){
                $output1 .= '<span class = "styling_annonce">'.$nomProfil.' a réagi à '.$sexe.' <a href = "description_article.php?article=article_materiaux&id='.$row1['id_article'].'" onclick = updateVue(`'.$row1['id_article'].'`,"article_materiaux")>annonce</a>.</span>
                            <p class = "date-text">'.date('D d F Y',strtotime($row1['curent_date'])).' à '.date('H:s',strtotime($row1['curent_time'])).'</p><hr>';
            }
            else{
                $nom_vendeur1 = getNom($row1['email_vendeur']);
                $output1 .= getPhotoVendeur($row1['email_vendeur']).'&nbsp;<span class = "styling_annonce">' .$nomProfil.' a réagi à une <a href = "description_article.php?article=article_materiaux&id='.$row1['id_article'].'" onclick = updateVue(`'.$row1['id_article'].'`,"article_materiaux")>annonce</a>.</span>
                <p class = "date-text">'.date('D d F Y',strtotime($row1['curent_date'])).' à '.date('H:s',strtotime($row1['curent_time'])).'</p><hr>';
            }
        }

        $sql2 = "SELECT ai.email AS email_vendeur,ri.* from article_immobiliers AS ai, reaction_immobiliers AS ri
        WHERE ai.id = id_article AND ri.email = '$email' AND ai.id = ri.id_article  ORDER BY curent_date, curent_time DESC";
        $statement2 = $connect->prepare($sql2);
        $statement2->execute();
        $result2 = $statement2->fetchAll();
        $count2 = $statement2->rowCount();

        foreach($result2 as $row2){
            if($email == $row2['email_vendeur']){
                $output2 .= '<span class = "styling_annonce">'.$nomProfil.' a réagi à '.$sexe.' <a href = "description_article.php?article=article_immobiliers&id='.$row2['id_article'].'" onclick = updateVue(`'.$row2['id_article'].'`,"article_immobiliers")>annonce</a>.</span>
                <p class = "date-text">'.date('D d F Y',strtotime($row2['curent_date'])).' à '.date('H:s',strtotime($row2['curent_time'])).'</p><hr>';
            }
            else{
                $nom_vendeur2 = getNom($row2['email_vendeur']);
                $output2 .= getPhotoVendeur($row2['email_vendeur']).'&nbsp;<span class = "styling_annonce">' .$nomProfil.' a réagi à une <a href = "description_article.php?article=article_immobiliers&id='.$row2['id_article'].'" onclick = updateVue(`'.$row2['id_article'].'`,"article_immobiliers")>annonce</a>.</span>
                <p class = "date-text">'.date('D d F Y',strtotime($row2['curent_date'])).' à '.date('H:s',strtotime($row2['curent_time'])).'</p><hr>';
            }
        }

        $sql3 = "SELECT ap.email AS email_vendeur,rp.*,ap.type from article_plus AS ap, reaction_plus AS rp
        WHERE ap.id = id_article AND rp.email = '$email' AND ap.id = rp.id_article ORDER BY curent_date, curent_time DESC";
        $statement3 = $connect->prepare($sql3);
        $statement3->execute();
        $result3 = $statement3->fetchAll();
        $count3 = $statement3->rowCount();

        foreach($result3 as $row3){
            if($email == $row3['email_vendeur']){
                $output3 .= '<span class = "styling_annonce">'.$nomProfil.' a réagi à '.$sexe.' <a href = "description_article.php?article=article_plus&type='.$row3['type'].'&id='.$row3['id_article'].'" onclick = updateVue(`'.$row3['id_article'].'`,"article_plus")>annonce</a>.</span>
                <p class = "date-text">'.date('D d F Y',strtotime($row3['curent_date'])).' à '.date('H:s',strtotime($row3['curent_time'])).'</p><hr>';
            }
            else{
                $nom_vendeur3 = getNom($row3['email_vendeur']);
                $output3 .= getPhotoVendeur($row3['email_vendeur']).'&nbsp;<span class = "styling_annonce">' .$nomProfil.' a réagi à une <a href = "description_article.php?article=article_plus&type='.$row3['type'].'&id='.$row3['id_article'].'" onclick = updateVue(`'.$row3['id_article'].'`,"article_plus")>annonce</a>.</span>
                <p class = "date-text">'.date('D d F Y',strtotime($row3['curent_date'])).' à '.date('H:s',strtotime($row3['curent_time'])).'</p><hr>';
            }
        }

        $sql4 = "SELECT av.email AS email_vendeur,rv.* from article_voitures AS av, reaction_voitures AS rv
        WHERE av.id = id_article AND rv.email = '$email' AND av.id = rv.id_article ORDER BY curent_date, curent_time DESC";
        $statement4 = $connect->prepare($sql4);
        $statement4->execute();
        $result4 = $statement4->fetchAll();
        $count4 = $statement4->rowCount();

        foreach($result4 as $row4){
            if($email == $row4['email_vendeur']){
                $output4 .= '<span class = "styling_annonce">'.$nomProfil.' a réagi à '.$sexe.' <a href = "description_article.php?article=article_voitures&id='.$row4['id_article'].'" onclick = updateVue(`'.$row4['id_article'].'`,"article_voitures")>annonce</a>.</span>
                <p class = "date-text">'.date('D d F Y',strtotime($row4['curent_date'])).' à '.date('H:s',strtotime($row4['curent_time'])).'</p><hr>';
            }
            else{
                $nom_vendeur4 = getNom($row4['email_vendeur']);
                $output4 .= getPhotoVendeur($row1['email_vendeur']).'&nbsp;<span class = "styling_annonce">' .$nomProfil.' a réagi à une <a href = "description_article.php?article=article_voitures&id='.$row4['id_article'].'" onclick = updateVue(`'.$row4['id_article'].'`,"article_voitures")>annonce</a>.</span>
                <p class = "date-text">'.date('D d F Y',strtotime($row4['curent_date'])).' à '.date('H:s',strtotime($row4['curent_time'])).'</p><hr>';
            }
        }
        if(($count1 == 0) && ($count2 == 0)  && ($count3 == 0) && ($count4 == 0)){
            $content .= "<div class = 'center-element'>
                            <p class = 'mb-30 text-vide'>Vous n'avez pas réagi encore des annonces..</p>
                        </div>";
        }
        else{
            $content .= $output1.$output2.$output4.$output3;
        }
        echo $content;
    }

    //Fonction pour supprimer le journal d'authentification
    function deleteJournalAuthentification(){
        $email = $_POST['email'];

        $connect = connexionDataBase();
        $sql = "DELETE FROM journal WHERE email = '".$email."'";
        
        if($connect->exec($sql) > 0){
            echo "delete";
        }
        else{
            echo "error";
        }
    }

    //Fonction pour afficher les message du chat
    function getMessageUser($to,$from){
        $output = $ville = $nom = $numero = '';
        $connect = connexionDataBase();

        $sql_info = getInformationProfil($to);
        $nom = $sql_info['nom'];
        $gouvernorat = $sql_info['gouvernorat'];
        $ville = $sql_info['ville'];
        $photo = getPhotoVendeur($to);
        $photo2 = getPhotoVendeur($from);

        $sql = "SELECT * FROM discussion WHERE from_user = '$from' AND to_user = '$to'
        OR from_user = '$to' AND to_user = '$from'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $nbr = $statement->rowCount();

        if($nbr > 0){
            foreach($result as $row){
                if($from == $row['from_user']){
                    $output.= ' <div style = "text-align:left;">
                                    <p class = "small_date time_left">
                                        '.date('H:i',strtotime($row['time_message'])).'
                                    </p>
                                    '.$photo2.'
                                    <p class = "text-to">
                                        '.$row['message'].'
                                    </p>
                                    <p class = "small_date">
                                    '.date('D d F Y',strtotime($row['date_message'])).'
                                    </p>
                                </div>';
                }
                else{
                    $output.= ' <div style = "text-align:right;">
                                    <p class = "small_date time_right">
                                    '.date('H:i',strtotime($row['time_message'])).'
                                    </p>
                                    <p class = "text-from">
                                        '.$row['message'].'
                                    </p>
                                    '.$photo.'
                                    <p class = "small_date">
                                        '.date('D d F Y',strtotime($row['date_message'])).'
                                    </p>
                                </div>';
                }
            }
        }
        else{
            $output .= '<h4 class = "center-text center-element">'.$gouvernorat.'</h4>
            <p class = "text-center">Habite à '.$ville.'</p>';
        }        
       echo $output;
    }

    //Fonction pour envoyer des messages
    function sendMessage(){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $message = htmlentities(addslashes($_POST['message']));;

        $curent_date = date('Y-m-d');
        $curent_time = date("H:i:s");

        $connect = connexionDataBase();
        $sql = "INSERT INTO discussion(from_user, to_user, message, date_message, time_message)
                VALUES ('$from', '$to', '$message', '$curent_date', '$curent_time')";

        if($connect->exec($sql) == 1){
            echo 'envoiye';
        }

        else{
            echo 'error';
        }
    }

    //Fonction pour afficher des messages instantanéments
    function messageInstantane(){
        $from = $_POST['from'];
        $to = $_POST['to'];

        $output = '';
        $photo = getPhotoVendeur($to);
        $photo2 = getPhotoVendeur($from);
        $sql_info = getInformationProfil($to);
        $ville = $sql_info['ville'];
        $gouvernorat = $sql_info['gouvernorat'];

        $connect = connexionDataBase();
        $sql = "SELECT * FROM discussion WHERE from_user = '$from' AND to_user = '$to'
        OR from_user = '$to' AND to_user = '$from'";

        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $nbr = $statement->rowCount();

        if($nbr >0){
            foreach($result as $row){
                if($from == $row['from_user']){
                    echo ' <div style = "text-align:left;">
                                    <p class = "small_date time_left">
                                        '.date('H:i',strtotime($row['time_message'])).'
                                    </p>
                                    '.$photo2.'
                                    <p class = "text-to">
                                        '.$row['message'].'
                                    </p>
                                    <p class = "small_date">
                                    '.date('D d F Y',strtotime($row['date_message'])).'
                                    </p>
                                </div>';
                }
                else{
                    echo ' <div style = "text-align:right;">
                                    <p class = "small_date time_right">
                                    '.date('H:i',strtotime($row['time_message'])).'
                                    </p>
                                    <p class = "text-from">
                                        '.$row['message'].'
                                    </p>
                                    '.$photo.'
                                    <p class = "small_date">
                                        '.date('D d F Y',strtotime($row['date_message'])).'
                                    </p>
                                </div>';
                }
                
            }
        }
        else{
            echo '<h4 class = "center-text center-element">'.$gouvernorat.'</h4>
            <p class = "text-center">Habite à '.$ville.'</p>';
        }
        
    }
    
    //Fonction pour calculer le nombre des message
    function getNbrMessage($email){
        $connect = connexionDataBase();
        $sql = "SELECT COUNT(DISTINCT from_user) AS nbr FROM discussion WHERE etat = 'pas vue' AND from_user != '$email' AND to_user = '$email' ";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $nbr = $statement->rowCount();
        $result = $statement->fetchAll();

        if($nbr == 0){
            return '0';
        }
        else{
            foreach($result as $row){
                return '<b>'.$row['nbr'].'</b>';
            }
        }        
    }

    //Fonction pour calculer le nombre des notifications
    function getNbrNotification($email){
        $connect = connexionDataBase();
        $sql = "SELECT COUNT(email) AS nbr FROM notification WHERE email = '$email' AND statut = 'pas vue' ";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $nbr = $statement->rowCount();
        $result = $statement->fetchAll();

        if($nbr == 0){
            return '<b>0</b>';
        }
        else{
            foreach($result as $row){
                return '<b>'.$row['nbr'].'</b>';
            }
        }        
    }

    //Fonction pour lire mes messages
    function getMesMessagesaLire(){
        $output = '';
        $text = '';
        $class = '';

        $email = $_POST['email'];
        $connect = connexionDataBase();
        $sql = "SELECT * FROM discussion AS di, vendeur AS ve WHERE id IN ( SELECT max(id) from discussion GROUP BY from_user)
        AND di.to_user = '$email' AND di.from_user != '$email' AND di.from_user = ve.email ORDER BY date_message,time_message DESC";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $nbr = $statement->rowCount();
        $result = $statement->fetchAll();      
    
        if($nbr > 0){
            foreach($result as $row){
                if($row['etat'] == "vue"){
                    $text = '<p class = "vue">'.$row['nom'].' vous a envoyé un nouveau message.</p>';
                    $class = '';
                }
                else{
                    $text = '<p class = "pas_vue">'.$row['nom'].' vous a envoyé un nouveau message.</p>';
                    $class = 'style = "font-weight:bold"';
                }
                $output .= '<tr>
                                <td>';
                                    if($row['photo_profil'] != NULL){
                                        $output .= '<img class = "logo-image-review author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Photo de profil" style = "margin-right:10px;" /> ';
                                    }
                                    else{
                                        $output .= '<img class = "logo-image-review author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image" style = "margin-right:10px;" />';
                                    }
                                    $output .= '<span class = "text-black">'.$row['nom'].
                                    '</span><a href = "espace_echange.php?email='.$email.'&to='.$row['from_user'].'" onclick = vueMessage(`'.$email.'`,`'.$row['from_user'].'`);>'.$text.'</a>
                                </td>
                                <td><span '.$class.'>'.date('D d F Y',strtotime($row['date_message'])).' à '.date('H:i',strtotime($row['time_message'])).'</span></td>
                            </tr>';
                            
            }
        }
        else{
            $output .= '<tr>
                            <td><p class = "text-center text-vide">Pas de nouveaux messages..</p></td>
                        </tr>';
        }
        echo $output;
    }

    //Fonction pour update les vues des messages
    function vueMessages(){
        $from = $_POST['from'];
        $to = $_POST['to'];

        $connect = connexionDataBase();
        $sql = "UPDATE discussion SET etat = 'vue' WHERE from_user = '$from' AND to_user = '$to'";
        $connect->exec($sql);
    }

    //Fonction pour afficher un article précis
    function getArticlePrecis($email,$table){
        $connect = connexionDataBase();
        $sql = "SELECT * FROM $table WHERE email = '$email' ORDER BY id DESC LIMIT 1";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $type_marque = '';
        foreach($result as $tab){
            $tableau['id'] = $tab['id'];
            $tableau['titre'] = $tab['titre'];
            if(($table == "article_voitures") || ($table == "article_materiaux")){
                $tableau['type_marque'] = $tab['marque'];
            }
            else{
                $tableau['type_marque'] = $tab['type'];
            }
            $tableau['prix'] = $tab['prix'];
            $tableau['detail'] = $tab['detail'];
            $tableau['negociable'] = $tab['negociable'];
            $tableau['etat'] = $tab['etat'];
            $tableau['date'] = date('D d F Y',strtotime($tab['date_publication']));
            $tableau['time'] = date('H:i',strtotime($tab['time_publication']));
        }
        return $tableau;
    }

    //Fonction du différence de temps
    function differenceTime($email){
        $connect = connexionDataBase();
        $sql = "SELECT last_login FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $time_ago = strtotime( $row['last_login']);
            $currentTime = time();
            $time_difference = $currentTime - $time_ago;
            $seconds = $time_difference;
            $minutes = round($seconds/60);
            $hours = round($seconds/3600);
            $days = round($seconds/86400);
            $weeks = round($seconds/604800);
            $months = round($seconds/2629440);
            $years = round($seconds/31553280);
            if($seconds <= 60) {  
                return "En ligne il y a quelques secondes";  
            }  
            else if($minutes <= 60){  
                if($minutes == 1){  
                    return "En ligne il y a une minute";  
                }  
                else{  
                    return "En ligne il y a $minutes minutes";  
                }  
            }  
            else if($hours <= 24){  
                if($hours == 1){  
                    return "En ligne il ya une heure";  
                }  
                else{  
                    return "En ligne il y a $hours heures";  
                }  
            }  
            else if($days <= 7){  
                if($days == 1){  
                    return "En ligne hier";  
                }  
                else{  
                    return "En ligne il y a $days jours";  
                }  
            }  
            else if($weeks <= 4.3){ //4.3 == 52/12  
                if($weeks == 1){  
                    return "En ligne il y a une semaine";  
                }  
                else{  
                    return "En ligne il y a $weeks semaines";  
                }  
            }  
            else if($months <= 12){  
                if($months == 1){  
                    return "En ligne il y a un mois";  
                }  
                else{  
                    return "En ligne il y a $months mois";  
                }  
            }  
            else{  
                if($years == 1){  
                    return "En ligne il y a un an";  
                }  
                else{  
                    return "En ligne il y a $years ans";  
                }  
            }
        }
    }


    //Fonction pour afficher est ce que l'utilisateur est en ligne ou non
    function getStatutUser(){
        $output = '';
        $email = $_POST['email'];
        $statut = '';
        $hors = differenceTime($email);
        
        $connect = connexionDataBase();
        $sql = "SELECT * FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        $currentTimeStamp = strtotime(date("Y-m-d H:i:s") . '-10 second');
        $currentTime = date("Y-m-d H:i:s",$currentTimeStamp);

        foreach($result as $row){
            if($row['last_login'] > $currentTime){
                $statut = 'En ligne';
                $output .= '<p class = "style-statut">'.$statut.'.</p>';
                            
                                          
            }
            else{
                $output .= '<p class = "style-statut">'.$hors.'.</p>';
            }
        }
        echo $output;
    }

    //Fonction pour afficher est ce que l'utilisateur est en ligne ou non
    function getStatutUserAvecPoint(){  
        $src = '';   
        $email = $_POST['email'];       
        $connect = connexionDataBase();
        $sql = "SELECT * FROM vendeur WHERE email = '$email'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        $currentTimeStamp = strtotime(date("Y-m-d H:i:s") . '-10 second');
        $currentTime = date("Y-m-d H:i:s",$currentTimeStamp);

        foreach($result as $row){
            if($row['last_login'] > $currentTime){
                $src .= 'img/logo/green_icon.png';                 
            }
            else{
                $src .= 'img/logo/gray_icon.jpg'; 
            }
        }
        echo $src;
    }

    //Fonction pour modifier les statuts des utilisateurs
    function updateStatutUser(){
        $email = $_POST['email'];
        $connect = connexionDataBase();
        $sql = "UPDATE vendeur SET last_login = now() WHERE email = '$email'";
        $connect->exec($sql);
    }

    //Fonction pour insérer les notifications
    function insertNotification($titre,$article,$prix,$negociable,$email,$curent_date,$curent_time){
        $message = '';
        $email_notif = '';
        $neg = '';
        $vendeur = '';
        $table = '';
        $im = $vo = $pl = $ma = 0;
        $curent_date = date('Y-m-d H:i:s');

        if($negociable == 'Oui'){
            $neg .= 'est négociable';
        }   
        else if($negociable == 'Non'){ 
            $neg .= "non négociable";
        } 

        if($article == 'Voitures'){
            $table .= 'article_voitures';
        }
        else  if($article == 'Matériaux'){
            $table .= 'article_materiaux';
        }
        else  if($article == 'Immobiliers'){
            $table .= 'article_immobiliers';
        }
        else{
            $table .= 'article_plus';
        }
        $message .= 'Un nouvel article nommé <b>'.$titre.'</b> de catégorie : '.$article.' a été publié le '.date('D d F Y',strtotime($curent_date)).' à '.date('H:i',strtotime($curent_time)).'. Cette article ' .$neg. '. Le prix annoncé par le vendeur est $' .$prix. '.';
        
        $connect = connexionDataBase();        
        $sql = "SELECT * FROM favoris_article WHERE email != '$email'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row){
            $email_notif = $row['email_notif'];
            if(($article == $row['choix1']) || ($article == $row['choix2']) || ($article == $row['choix3'])){
                $requete = "INSERT INTO notification(email,vendeur,article,marque,message,date_publication) VALUES('$email_notif', '$email', '$table', '$article', '$message', '$curent_date')";
                $connect->exec($requete);              
            }
        }
    }

    //Fonction pour afficher la liste des notifications
    function showListeNotification($email){
        $output = '';
        $type = '';
        $class = '';
        $table = '';
    
        $connect = connexionDataBase();
        $sql = "SELECT * FROM notification WHERE email = '$email' ORDER BY date_publication ASC LIMIT 1";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $count = $statement->rowCount();
        $result = $statement->fetchAll();

        $output .= '<table id = "notif_item">';
        if($count > 0){
            foreach($result as $row){
                $table = $row['article'];
                if($row['statut'] == 'pas vue'){
                    $output .= '<div class = "col-md-9" style = "background-color: rgb(241, 245, 247);">
                                    <div class = "blog_post">
                                        <div class = "blog_details">
                                            <a href = "javascript:void(0)">
                                                <h2>'.getPhotoVendeur($row['vendeur']).' <a class = "text-black" href = "informations.php?email='.$row['vendeur'].'">Nouvel article : '.$row['marque'].'</a> </h2>
                                            </a>
                                            <p>'.$row['message'].'</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>';
                }
                else{
                    $output .= '<div class = "col-md-9">
                                    <div class = "blog_post">
                                        <div class = "blog_details">
                                            <a href = "javascript:void(0)">
                                            <h2>'.getPhotoVendeur($row['vendeur']).' <a class = "text-black" href = "informations.php?email='.$row['vendeur'].'">Nouvel article : '.$row['marque'].'</a> </h2>
                                            </a>
                                            <p>'.$row['message'].'</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>';
                }       
                $id = $row['id'];  
            }
            $output .= '<tr id = "remove_row"> 
                            <td><a class = "white_bg_btn" href = "javascript: void(0) "name = "more_notif" id = "more_notif" data-nid = "'.$id.'">Afficher plus..</a></td>
                        </tr>';
        }
        else{
            $output .= '<p class = "text-vide text-center">Pas de nouvelles notifications..</p>';
        }
        $output .= '</table>';
        echo $output;  
    }

    //Fonction pour modifier les vues des notifications
    function updateVueNotification(){
        $email = $_POST['email'];
        $connect = connexionDataBase();
        $sql = "UPDATE notification SET statut = 'vue' WHERE email = '$email'";
        $connect->exec($sql);
    }
    
    //Fonction pour vider les notifications
    function viderNotifications(){
        $email = $_POST['email'];
        $connect = connexionDataBase();
        $sql = "DELETE FROM notification WHERE email = '$email'";
        if($connect->exec($sql) > 0){
            echo "delete";
        }
        else{
            echo "error";
        }
    }

    //Fonction pour les informations de vendeur
    function informationsVendeurApresNotification($to,$from){
        $output = '';

        $connect = connexionDataBase();    
        $sql = "SELECT * FROM vendeur WHERE email = '$to'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach ($result as $row){
            $output .= '<div id = "team">
                            <div class = "container my-3 py-5 text-center">
                                <div class = "row">
                                    <div class = "col-lg-9 col-md-6">
                                        <div class = "card">
                                            <div class = "card-body">';
                                                if($row['photo_profil'] != NULL){
                                                    $output .= '<img class = "photo-profil author_img rounded-circle" src = "data:image/jpeg;base64,'.base64_encode($row['photo_profil'] ).'" alt = "Image"></img><span id = "stat"></span>';
                                                }
                                                else{
                                                    $output .= '<img class = "photo-profil author_img rounded-circle" src = "img/logo/user_inconue.png" alt = "Image"></img><span id = "stat"></span>';
                                                }
                                    $output .= '<h3>'.$row['nom'].'</h3>
                                                <h5>'.$row['email'].'</h5>
                                                <p>'.$row['numero'].'</p>
                                                <div class = "cupon_area btn-center">
                                                    <a class = "white_bg_btn btn-informations" href = "espace_echange.php?email='.$from.'&to='.$to.'">Discuter avec '.$row['nom'].'</a>
                                                </div>
                                                <div class = "d-flex flex-row justify-content-center position_bottom">
                                                    <div class = "p-4">
                                                        <a href = "'.$row['facebook'].'"><i class = "fa fa-facebook"></i></a>
                                                    </div>
                                                    <div class = "p-4">
                                                        <a href = "'.$row['instagram'].'"><i class = "fa fa-instagram"></i></a>
                                                    </div>
                                                    <div class = "p-4">
                                                        <a href = "'.$row['twitter'].'"><i class = "fa fa-twitter"></i></a>
                                                    </div>
                                                    <div class = "p-4">
                                                        <a href = "'.$row['google'].'"><i class = "fa fa-google"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> ';                  
        }
        echo $output;
    }

    function afficherAutreNotifications(){
        $output = '';
        $id = '';
        $email = $_POST['email'];

        $connect = connexionDataBase();
        $requete = "SELECT * FROM notification WHERE email = '$email' AND id > ".$_POST['last']." LIMIT 1";
        $statement = $connect->prepare($requete);
        $statement->execute();
        $result = $statement->fetchAll();
        $nbr = $statement->rowCount();

        $output .= '<table id = "notif_item">';
        if($nbr > 0){
            foreach($result as $row){
                $table = $row['article'];
                if($row['statut'] == 'pas vue'){
                    $output .= '<div class = "col-md-9" style = "background-color: rgb(241, 245, 247);">
                                    <div class = "blog_post">
                                        <div class = "blog_details">
                                            <a href = "javascript:void(0)">
                                                <h2>'.getPhotoVendeur($row['vendeur']).' <a class = "text-black" href = "informations.php?email='.$row['vendeur'].'">Nouvel article : '.$row['marque'].'</a> </h2>
                                            </a>
                                            <p>'.$row['message'].'</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>';
                }
                else{
                    $output .= '<div class = "col-md-9">
                                    <div class = "blog_post">
                                        <div class = "blog_details">
                                            <a href = "javascript:void(0)">
                                            <h2>'.getPhotoVendeur($row['vendeur']).' <a class = "text-black" href = "informations.php?email='.$row['vendeur'].'">Nouvel article : '.$row['marque'].'</a> </h2>
                                            </a>
                                            <p>'.$row['message'].'</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>';
                }       
                $id = $row['id'];  
            }
            $output .= '<tr id = "remove_row">
                            <td><a class = "white_bg_btn" href = "javascript: void(0) " name = "more_notif" id = "more_notif" data-nid = "'.$id.'">Afficher plus..</a></td>
                        </tr>
                        </table>';
        }
        else{
            $output .= "<p class = 'text-vide text-center'>Pas d'autres notifications..</p>";
        }
        echo $output;
    }
?>
