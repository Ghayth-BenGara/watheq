//Fonction pour valider l'adresse email
function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

//Fonction pour valider le numéro mobile
function validateNumber(number){
  if (number.length != 8){
    return false;
  }
  else{
    return true;
  }
}

//Fonction pour récupérer des champs
function formulaireContact(){
  var test = validateEmail(document.getElementById("email_contact").value);  
  if(test == true){
    var to = document.getElementById("email_contact").value;
    var from = "miniprojet.groupec@gmail.com";
    var nom = document.getElementById("nom").value;
    var sujet = document.getElementById("sujet").value;
    var message = document.getElementById("message").value;
  chargement().then(envoieEmail(from,to,nom,sujet,message));
  }
  else{
    alertEmailNonValide();
  }
  
    return false;
}

//Fonction pour afficher e-mail non valide
function alertEmailNonValide(){
  swal({
    type: "error",
    title:"Oups !",
    html:"<p> Désolé : votre adresse e-mail doit être sous la forme : <br><br>" +
    "<b>adresse@domaine.com</b>.</p>",
    width: "450px",
    padding: "2em",
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: "animated fadeInDown faster",
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour afficher numéro non valide
function alerteNumeroNonValide(){
  swal({
    type: "error",
    title:"Oups !",
    html:"<p> Désolé : votre numéro mobile doit être composer de 8 chiffres..</p>",
    width: "450px",
    padding: "2em",
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: "animated fadeInDown faster",
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour le chargement
async function chargement(){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    width:"300px",
    onOpen: () => {
      swal.showLoading();
    }
  })
}

//Foncion qui envoi e-mail
async function envoieEmail(from,to,nom,sujet,message){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      from:from,
      to:to,
      nom:nom,
      sujet:sujet,
      message:message,
      actionEnvoieEmailContact:"update"
    },
    success:function(data){
     if(data.trim() === "envoye"){
        confirmEnvoi(nom);
      }
      else{
        refuseEnvoi();
      }
    }
  });
}

//Fonction pour afficher une erreur d'envoi e-mail
function refuseEnvoi(){
  swal({
    type: "error",
    title:"Oups !",
    html:"<p> Désolé : votre message n'a pas pu être envoyé pour le moment.. </p>",
    width: "450px",
    padding: "2em",
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: "animated fadeInDown faster",
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

////Fonction pour afficher une réussite d'envoi e-mail
function confirmEnvoi(nom){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Message envoyé</h3>"+
          "<br>"+
          "<p>Très bien <b>"+nom+"</b>, votre message a été envoyé avec succés. Nous vous répondrons dans les 24 heures prochains..</p>",
    width: '450px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"Je comprends",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    if(result){
      setInterval(function(){
         ouvrirLien('contact.php');
        }, 1000);
    }
  })
}

//Fonction pour rédirection vers un lien
function ouvrirLien(lien){
  window.location = lien;
}

//Fonction pour afficher les mots de passe
function showHidePassword(){
  var input = document.getElementById("password");

  if (input.type === "password") {
    input.type = "text";
    document.getElementById("eye").className = "fa fa-eye-slash";
  }
  else {
    input.type = "password";
    document.getElementById("eye").className = "fa fa-eye";
  }
}

//Fonction pour afficher les mots de passe de creer un compte
function showHidePasswordCreerCompte(){
  var input = document.getElementById("password");
  var input2 = document.getElementById("repter_password");

  if (input.type === "password") {
    input.type = "text";
    input2.type = "text";
    document.getElementById("eye").className = "fa fa-eye-slash";
  }
  else {
    input.type = "password";
    input2.type = "password";
    document.getElementById("eye").className = "fa fa-eye";
  }
}

//Fonction pour afficher deux mots de passes aprés la récupération
function showHidePasswordForgert(){
  var input = document.getElementById("password");
  var input2 = document.getElementById("repeter_password");

  if (input.type === "password" && input2.type === "password") {
    input.type = "text";
    input2.type = "text";
    document.getElementById("eye-forget").className = "fa fa-eye-slash";
  }
  else {
    input.type = "password";
    input2.type = "password";
    document.getElementById("eye-forget").className = "fa fa-eye";
  }
}

//Fonction pour ouvrir le clique sur le bouton
function enableBouton(){
  var condition = document.getElementById("condition");
  var button = document.getElementById("creer");
  
  if(condition.checked){
    button.disabled = false;
  }
  else {
    button.disabled = true;
  }
}

//Fonction pour changer les villes
function choisirVille(){
  var ville = document.getElementById("ville");
  var gouvernorat = document.getElementById("gouvernorat");

  if(gouvernorat.selectedIndex == 1){
    ville.innerHTML = null;
    creerOption("أبها",ville);
    creerOption("بيشة",ville);
    creerOption("بارق",ville);
    creerOption("بالقرن",ville);
    creerOption("النامص",ville);
    creerOption("المجاردة",ville);
    creerOption("البرك",ville);
    creerOption("خميس مشيط",ville);
    creerOption("محايل",ville);
    creerOption("أحد رفيدة",ville);
    creerOption("رجال الماع",ville);
    creerOption("ظهران الجنوب",ville);
    creerOption("سراة عبيدة",ville);
    creerOption("تثليث",ville);
    creerOption("تنومة",ville);  
  }
  else if(gouvernorat.selectedIndex == 2){
    ville.innerHTML = null;
    creerOption("بقيق",ville);
    creerOption("الدمام",ville);
    creerOption("الخبر",ville);
    creerOption("الظهران",ville);
    creerOption("الأحساء",ville);
    creerOption("الخفجي",ville);
    creerOption("الجبيل",ville);
    creerOption("القطيف",ville);
    creerOption("النعيرية",ville);
    creerOption("حفر الباطن",ville);
    creerOption("قرية العليا",ville);
    creerOption("رأس تنورة",ville);
    
  }
  else if(gouvernorat.selectedIndex == 3){
    ville.innerHTML = null;
    creerOption("بقعاء",ville);
    creerOption("الغزالة",ville);
    creerOption("الشنان",ville);
    creerOption("الحائط",ville);
    creerOption("الروضة",ville);
    creerOption("الخطة",ville);
    creerOption("حائل",ville);
    creerOption("جبة",ville);
    creerOption("موقق",ville);
    creerOption("سميراء",ville);
    creerOption("تربة",ville);
  }
  else if(gouvernorat.selectedIndex == 4){
    ville.innerHTML = null;
    creerOption("الجوف",ville);
    creerOption("القريات",ville);
    creerOption("سكاكا",ville);
  }
  else if(gouvernorat.selectedIndex == 5){
    ville.innerHTML = null;
    creerOption("أبو عريش",ville);
    creerOption("أحد المسارحة",ville);
    creerOption("بيش",ville);
    creerOption("ضمد",ville);
    creerOption("العيدابي",ville);
    creerOption("الداير",ville);
    creerOption("العارضة",ville);
    creerOption("الريث",ville);
    creerOption("فرسان",ville);
    creerOption("فيفاء",ville);
    creerOption("جزان",ville);
    creerOption("صبيا",ville);
    creerOption("صامطة",ville);
  }
  else if(gouvernorat.selectedIndex == 6){
    ville.innerHTML = null;
    creerOption("أضم",ville);
    creerOption("الخرمة",ville);
    creerOption("الطائف",ville);
    creerOption("القنفذة",ville);
    creerOption("اللليث",ville);
    creerOption("الكامل",ville);
    creerOption("جدة",ville);
    creerOption("خليص",ville);
    creerOption("مكة",ville);
    creerOption("رابغ",ville);
    creerOption("رنية",ville);
  }
  else if(gouvernorat.selectedIndex == 7){
    ville.innerHTML = null;
    creerOption("شرورة",ville);
    creerOption("حبونة",ville);
    creerOption("نجران",ville);
  }
  else if(gouvernorat.selectedIndex == 8){
    ville.innerHTML = null;
    creerOption("عنيزة",ville);
    creerOption("بريدة",ville);
    creerOption("الرس",ville);
    creerOption("البكيرية",ville);
    creerOption("البدائع",ville);
    creerOption("المذنب",ville);
    creerOption("الشماسية",ville);
    creerOption("رياض الخبراء",ville);
    
  }
  else if(gouvernorat.selectedIndex == 9){
    ville.innerHTML = null;
    creerOption("أملج",ville);
    creerOption("ضباء",ville);
    creerOption("البدع",ville);
    creerOption("حقل",ville);
    creerOption("تبوك",ville);
    creerOption("تيماء",ville);
  }
  else if(gouvernorat.selectedIndex == 10){
    ville.innerHTML = null;
    creerOption("بلجرشي",ville);
    creerOption("الباحة",ville);
    creerOption("المخواة",ville);
    creerOption("المندق",ville);
    
  }
  else if(gouvernorat.selectedIndex == 11){
    ville.innerHTML = null;
    creerOption("عرعار",ville);
    creerOption("رفحاء",ville);
    creerOption("طريف",ville);
    
  }
  else if(gouvernorat.selectedIndex == 12){
    ville.innerHTML = null;
    creerOption("بدر",ville);
    creerOption("المدينة",ville);
    creerOption("العلا",ville);
    creerOption("الحناكية",ville);
    creerOption("مهد الذهب",ville);
    creerOption("ينبو",ville);
  }
  else if(gouvernorat.selectedIndex == 13){
    ville.innerHTML = null;
    creerOption("عفيف",ville);
    creerOption("أشيقر",ville);
    creerOption("شقراء",ville);
    creerOption("ضرماء",ville);
    creerOption("الدوادمي",ville);
    creerOption("الخرج",ville);
    creerOption("المجمعة",ville);
    creerOption("الرياض",ville);
    creerOption("الزلفى",ville);
    creerOption("الغاط",ville);
    creerOption("الحريق",ville);
    creerOption("الحريملاء",ville);
    creerOption("المزاحمية",ville);
    creerOption("السليل",ville);
    creerOption("الأفلاج",ville);
    creerOption("القويقعة",ville);
    creerOption("الدرعية",ville);
    creerOption("حوطة بني تميم",ville);
    creerOption("مرات",ville);
    creerOption("رماح",ville);
    creerOption("ثادق",ville);
    creerOption("وادي الدواسر",ville);
  }
}

//Fonction pour créé une option avec des paramétres
function creerOption(nom,ville){
  var a = document.createElement('option');
  a.text = nom;
  a.setAttribute('id',nom);
  a.setAttribute('value',nom);
  ville.add(a);
  $(ville).niceSelect('update');
}

//Fonction pour récupérer les champs de créer un compte
function formulaireCreerCompte(){
    var test1 = validateEmail(document.getElementById("email_creer").value);
    var test2 = validateNumber(numero = document.getElementById("numero").value);
    if(test1 == false){
      alertEmailNonValide();
    }
    else if(test2 == false){
      alerteNumeroNonValide();
    } 
    else{
      var nom = document.getElementById("nom").value;
      var email = document.getElementById("email_creer").value;
      var numero = document.getElementById("numero").value;
      var sexe = document.getElementById("sexe").value;
      var pays = document.getElementById("pays").value;
      var gouvernorat = document.getElementById("gouvernorat").value;
      var ville = document.getElementById("ville").value;
      var password = document.getElementById("password").value;
      var repeterPassword = document.getElementById("repter_password").value;

      var test = testEgalePassword(password, repeterPassword);
      if(test == "non egale"){
        passwordNonEgale();
      }
      else{
        $.ajax({
          url:"php/fonctions.php",
          method:"POST",
          data:{
            email:email,
            actionTest:'test'
          },
          success:function(data){
            if(data.trim() == "compte existe"){
              compteExiste();
            }
            else {
              creerCompte(nom,email,numero,sexe,pays,gouvernorat,ville,password);
            }
          }
        })
      }
    }
  }

//Fonction pour tester l'égalité des mots de passe
function testEgalePassword(password, repeterPassword){
  if(password == repeterPassword){
    return "egale";
  }
  else {
    return "non egale";
  }
}

//Fonction pour afficher que les mots de passe ne sont pas égales
function passwordNonEgale(){
  swal({
    type: 'error',
    title:'Oups !',
    html:'<p>Désolé : les deux mots de passe ne sont pas identiques..</p>',
    width: '450px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour afficher que cette e-mail est associé à un autre compte
function compteExiste(){
  swal({
    type: 'error',
    title:'Oups !',
    html:'<p>Désolé : cette adresse e-mail est associé à un autre compte..</p>',
    width: 430,
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour créer un nouveau compte
function creerCompte(nom,email,numero,sexe,pays,gouvernorat,ville,password){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      nom:nom,
      email:email,
      numero:numero,
      sexe:sexe,
      pays:pays,
      gouvernorat:gouvernorat,
      ville:ville,
      password:password,
      actionCreer:'creer'
    },
    success:function(data){
      if(data.trim() == "compte non creer"){
        CompteNonCreer();
      }
      else  if(data.trim() == "compte creer"){
        ajouterJournalAuthentification(email,'Inscription');
        chargementCreerCompte(email,nom);
      }
    }
  })
}

//Fonction pour afficher que le compte n'a pas créé
function CompteNonCreer(){
  swal({
    type: 'error',
    title: 'Oups !',
    html:'<p>La création du compte est indisponible pour le moment. Ressayer plus tard..</p>',
    width: '450px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour le chargement de création du compte
function chargementCreerCompte(email,nom){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    width:"300px",
    timer:3000,
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    CompteCreer(email,nom);
  })
}

//Fonction pour afficher le compte est créer
function CompteCreer(email,nom){
  sujet = "Confirmation";  
  message = "<p>Suite à votre demande de <b>la création d'un nouveau compte</b>, nous souhaitons par le présente message, confirmer par écrit la création de votre compte."

  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Compte créé</h3>"+
          "<br>"+
          "<p>Très bien <b>"+nom+"</b>, votre nouveau compte a été créé avec succés. Si vous trouverez des problèmes conernant votre compte, contacter nous à partir de la page <a href = 'contact.php'>Contact</a>.</p>",
    width: '480px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    envoieEmailVendeur(email,sujet,message,nom).then(creerSession(email));
  })
}


//Fonction pour remplir le journal d'authentification
function ajouterJournalAuthentification(email,detail){
  var requestUrl = "http://ip-api.com/json";

  $.ajax({
    url: requestUrl,
    type: 'GET',
    success: function(json){
      $.ajax({
        url:"php/fonctions.php",
        method:"POST",
        data:{
          email:email,
          ville:json.country,
          detail:detail,
          actionJournal:'ajouter'
        }
      });
    },
    error: function(err)
    {
      $.ajax({
        url:"php/fonctions.php",
        method:"POST",
        data:{
          email:email,
          ville:"Inconnue",
          detail:detail,
          actionJournal:'ajouter'
        }
      });
    }
  });
}

//Fonction pour envoyer un e-mail de confirmation
async function envoieEmailVendeur(email,sujet,message,nom){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      email:email,
      nom:nom,
      sujet:sujet,
      message:message,
      actionMailVendeur:'envoyer'
    }
  });
}

//Fonction pour créer une session
async function creerSession(email){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
       email:email,
       actionSession:'session'
    },
    success:function(data){
      if(data.trim() == "session creer"){
        ouvrirLien("compte.php?email=" +email);
      }
    }
  })
}

//Fonction pour créer une session de test
function creerSessionTest(email){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
       email:email,
       actionSessionTest:'session'
    },
    success:function(data){
      if(data.trim() == "session creer"){
        ouvrirLien("changer_mot_de_passe.php?email=" +email);
      }
    }
  })
}

//Fonction pour récupérer les champs d'authentification
function formulaireLogin(){
  var test = validateEmail(document.getElementById('email_login').value);
  if(test == true){
    var email = document.getElementById('email_login').value;
    var password = document.getElementById('password').value;

    $.ajax({
      url:"php/fonctions.php",
      method:"POST",
      data:{
        email:email,
        actionTest:'test'
      },
      success:function(data){
        if(data.trim() == "compte non existe"){
          compteExistePas();
        }
        else {
          testCompteVendeur(email,password);
        }
      }
    })
  }
  else{
    alertEmailNonValide();
  }
}

//Fonction pour afficher que le comte n'existe pas
function compteExistePas(){
  swal({
    type: "error",
    title:'Oups !',
    html:
    '<p> Désolé : aucune compte trouvée avec cette adresse e-mail..</p>',
    width: 450,
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour tester l'uthentification de vendeur
function testCompteVendeur(email,password){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      email:email,
      password,
      actionTestVendeur:'test'
    },
    success:function(data){
      if(data.trim() == 'fause info'){
        alerteInformationsIncorrect();
      }
      else if(data.trim() == 'vrai info'){
        ajouterJournalAuthentification(email,'Connexion');
        chargementLogin(email);
      }
    }
  })
}

//Fonction pour afficher que le login ou le password sont erroné
function alerteInformationsIncorrect(){
  swal({
    type: "error",
    title:'Oups !',
    html:'<p>Désolé : aucune compte trouvée avec ces informations. Vérifier votre adresse e-mail et votre mot de passe et ressayer une autre fois..</p>',
    width: 410,
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour le chargement de connexion
function chargementLogin(email){
  swal({
    text: "Connexion en cours..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    width:"300px",
    timer:3000,
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    creerSession(email).then(ouvrirLienCompte("compte.php?email=" + email));
  })
}

//Fonction pour la confirmation de déconnexion
function logoutUtilisateur(email){
  $.confirm({
    title: 'Déconnexion',
    content: 'Vous êtes sûre de déconnecter ?',
    autoClose: 'Annuler|10000',
    buttons: {
      logoutUser: {
        text: 'Déconnexion',
        action: function () {
          ajouterJournalAuthentification(email,'Déconnexion');
          chargementDeconnexion(email);
        }
      },
      Annuler: function () {
      }
    }
  });
}

//Fonction pour le chargement de déconnexion
function chargementDeconnexion(email){
  swal({
    text: 'Déconnexion en cours..',
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:'2em',
    width:'280px',
    timer:4000,
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then(function() {
    deconnexion();
  })
}

//Fonction pour la déconnexion
function deconnexion(){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      freeSession:'freeSession'
    },
    success:function(data){
      ouvrirLien("login.php");
    }
  })
}

//Fonction pour la récupération de champ mot de passe oublié
function formulairePasswordOublie(){
  var test = validateEmail(document.getElementById("email_forget").value);
  if(test == true){
    var email = document.getElementById("email_forget").value;
    $.ajax({
      url:"php/fonctions.php",
      method:"POST",
      data:{
        email:email,
        actionTest:'test'
      },
      success:function(data){
        if(data.trim() == "compte existe"){
          genererCodeSecurite(email);
        }
        else if(data.trim() == "compte non existe"){
          compteExistePas();
        }
      }
    })
  }
  else{
    alertEmailNonValide();
  }
  return false;
}

//Fonction pour générer un code de sécurité
function genererCodeSecurite(email){
  var max = 99999;
  var min = 00000;
  var codeSecurite = Math.floor(Math.random() * max) + min;
  chargementEnvoiCodeSecurite().then(envoieCodeSecurite(email,codeSecurite));
}

//Fonction pour le chargement d'envoie de code de sécurité
async function chargementEnvoiCodeSecurite(){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:'2em',
    width:'325px',
    onOpen: () => {
      swal.showLoading();
    }
  })
}

//Fonction pour envoyer le code de sécurité
async function envoieCodeSecurite(email,codeSecurite){
  sujet = 'Code de sécurité';
  message = 'Suite à votre demande, le code de sécurité demandé est<b style = "color: #2E5EAB;"> ' + codeSecurite +'</b>.<br>Utiliser ce code pour récupérer votre compte. Noter bien que ce code est privé donc ne donner jamais ce code à aucune personne.';
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      email:email,
      message:message,
      sujet:sujet,
      actionMailVendeurCodeSecurite:'envoi'
    },
    success:function(data){
      $.ajax({
        url:'php/fonctions.php',
        method:'GET',
        data:{
          email:email,
          actionGetData:'GET'
        },
        success:function(reponse){
          ouvrirModalCodeSecurite(email,codeSecurite,reponse);
        }
      })
    }
  })
}

function ouvrirModalCodeSecurite(email,codeSecurite,data){  
  swal({
    type: 'info',
    html:'<form action = "#" method = "POST" onsubmit = "return validationEgaleCodeSecurite(`'+email+'`,`'+codeSecurite+'`)">'+
    data+
    '<p class = "margin_text">Merci de vérifier dans votre e-mail que vous avez reçu un message avec votre code. Celui-ci est composé de 6 chiffres au maximum.</p>'+
              '<div class = "input-group-icon mt-10">'+
                '<div class = "icon">'+
                  '<i class = "fa fa-lock" aria-hidden = "true"></i>'+
                '</div>'+
                '<input type = "number" id = "codeSecurite" name = "codeSecurite" class = "single-input" placeholder = "Code de sécurité" required>'+
              '</div>'+
              '<br>'+
              '<div class = "col-md-12 form-group" >'+
								'<button type = "submit" class = "btn submit_btn top-btn" id = "suivant" name = "suivant" >Suivant</button>'+
							'</div>'+
            '</div>'+
          '</form>',
    width: 490,
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    allowOutsideClick:false
  })
  bootstrapValidate('#codeSecurite','min:8:Le code de sécurité doit être de 5 chiffres au maximum..')
  bootstrapValidate('#codeSecurite','max:8:Le code de sécurité doit être de 5 chiffres au maximum..')
}

//Fonction pour tester le code de sécurité envoyé et le code de sécurité saisie
function validationEgaleCodeSecurite(email,codeSecurite){
  var code = document.getElementById("codeSecurite").value;
  if(code == codeSecurite){
    ouvrirAlerteCompteRecuperer(email);
  }
  else if(code != codeSecurite){
    alertCodeNonEgale(email,codeSecurite);
  }
}

//Fonction pour afficher inégalité de code de sécurité
function alertCodeNonEgale(email,codeSecurite){
  swal({
    type: 'error',
    title:'Oups !',
    html:'<p>Désolé : Le code de sécurité saisie est incorrect..</p>',
    width: '420px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
  .then(function() {
    $.ajax({
      url:'php/fonctions.php',
      method:'GET',
      data:{
        email:email,
        actionGetData:'GET'
      },
      success:function(reponse){
        ouvrirModalCodeSecurite(email,codeSecurite,reponse);
      }
    })
  })
}

//Fonction pour afficher le succés de récupération du compte
function ouvrirAlerteCompteRecuperer(email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Compte récupéré</h3>"+
    "<br>"+
    "<p>Trés bien ! votre compte a été récupéré avec succés. Vous devez changer votre mot de passe pour finir la procédure de récupéraion du compte.</p>",
    width: '480px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then(function() {
    creerSessionTest(email);
  })
}

//Fonction pour récupérer les champs des mots de passe
function changerPassword(){
  var password = document.getElementById("password").value;
  var repeterPassword = document.getElementById("repeter_password").value;

  const urlParams = new URLSearchParams(window.location.search);
  var email = urlParams.get('email');

  if(password == repeterPassword){
    chargementModificationPassword(email,password);
  }
  else{
    passwordNonEgale();
  }
  return false;
}

//Fonction pour le chargement de changement de mot de passe
function chargementModificationPassword(email,password){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:'2em',
    width:'325px',
    timer:'3000',
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then(function() {
    modifierPassword(email,password);
  })
}

//Fonction pour la modification de mot de passe
async function modifierPassword(email,password){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      email:email,
      password:password,
      actionUpdatePassword:'update',

    },
    success:function(data){
      freeTest(email);
    }
  })
}

//Fonction pour vider la session
function freeTest(email){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{freeSession:'free'},
    success:function(data){
      ajouterJournalAuthentification(email,'Récupération');
      passwordModifier(email);
    }
  })
}

//Fonction pour afficher le succé de changement de mot de passe
function passwordModifier(email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Mot de passe modifié</h3>"+
          "<br>"+
          "<p>Trés bien ! votre mot de passe été modifié avec succés. Si vous retrouvez des problémes d'acés à votre compte, merci de nous informer à partir de la page<a href = 'contact.php'> Contact</a>.</p>",
    width: 490,
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"Je comprends",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    allowOutsideClick:false
  })
  .then((result) => {
    creerSession(email);
  })
}

//Fonction pour choisisser les marques et les types des articles
function choisirNomMarque(){
  var article = document.getElementById("article");
  var list = document.getElementById("list");
  var etat = document.getElementById('etat');

  if(article.selectedIndex == 1){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("Liste des articles",list);
    list.selected = true;
    list.options[0].disabled = true;
    creerOption("Nouveau",etat);
    creerOption("Occasion",etat);
  }

  else if(article.selectedIndex == 2){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("Liste des articles",list);
    list.selected = true;
    list.options[0].disabled = true;
    creerOption("Etat de l'article",etat);
    etat.selected = true;
    etat.options[0].disabled = true;
  }
  else if(article.selectedIndex == 3){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("Liste des articles",list);
    list.selected = true;
    list.options[0].disabled = true;
    creerOption("Etat de l'article",etat);
    etat.selected = true;
    etat.options[0].disabled = true;
  }
  else if(article.selectedIndex == 4){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("Appartements à louer",list);
    creerOption("Appartements à vendre",list);
    creerOption("Bâtiments à louer",list);
    creerOption("Bâtiments à vendre",list);
    creerOption("Fermes à louer",list);
    creerOption("Fermes à vendre",list);
    creerOption("Maisons à louer",list);
    creerOption("Maisons à vendre",list);
    creerOption("Etat de l'article",etat);
    etat.selected = true;
    etat.options[0].disabled = true;
  }
  else if(article.selectedIndex == 5){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("APPLE",list);
    creerOption("HTC",list);
    creerOption("HUAWEI",list);
    creerOption("M8",list);
    creerOption("NOKIA",list);
    creerOption("SAMSUNG",list);
    creerOption("SONY",list);
    creerOption("TOSHIBA",list);
    creerOption("Nouveau",etat);
    creerOption("Occasion",etat);
  }
  else if(article.selectedIndex == 6){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("Liste des articles",list);
    list.selected = true;
    list.options[0].disabled = true;
    creerOption("Nouveau",etat);
    creerOption("Occasion",etat);
  }
  else if(article.selectedIndex == 7){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("Liste des articles",list);
    list.selected = true;
    list.options[0].disabled = true;
    creerOption("Nouveau",etat);
    creerOption("Occasion",etat);
  }
  else if(article.selectedIndex == 8){
    list.innerHTML = null;
    etat.innerHTML = null;
    creerOption("AUDI",list);  
    creerOption("ASTON MARTIN",list); 
    creerOption("BROTEN",list);
    creerOption("BUICK",list);
    creerOption("BENTLEY",list);
    creerOption("BMW",list);
    creerOption("CHEVROLET",list);
    creerOption("CADILAK",list); 
    creerOption("CITROEN",list);
    creerOption("CHERY",list);  
    creerOption("CHRYSLER",list);  
    creerOption("DODGE",list);
    creerOption("DAIHATSU",list);
    creerOption("FIAT",list);
    creerOption("FERRARI",list); 
    creerOption("FORD",list);
    creerOption("GMS",list);
    creerOption("HYUNDAI",list);
    creerOption("HONDA",list);
    creerOption("HUMMER",list);
    creerOption("INFINITI",list);
    creerOption("JEEP",list);
    creerOption("KIA",list);  
    creerOption("LAMBORGUINI",list);  
    creerOption("LSUZU",list);  
    creerOption("LINCOLN",list); 
    creerOption("LAND ROVER",list);
    creerOption("MERCEDES",list);
    creerOption("MAZDA",list);
    creerOption("MITSUBISHI",list); 
    creerOption("MASERATI",list);
    creerOption("MG",list);
    creerOption("NISSAN",list);
    creerOption("OPEL",list);
    creerOption("PEUGEOT",list);  
    creerOption("PORSHE",list);
    creerOption("RENAULT",list);
    creerOption("ROLLS ROYCE",list); 
    creerOption("SUBARU",list);  
    creerOption("SUZUKI",list);  
    creerOption("SKOODA",list); 
    creerOption("SAAB",list);    
    creerOption("SSANGYONG",list);  
    creerOption("TOYOTA",list);
    creerOption("VOLKSWAGEN",list);  
    creerOption("VOLVO",list);
    creerOption("ZXAUTO",list);  
    creerOption("Nouveau",etat);
    creerOption("Occasion",etat);
  }
}

//Fonction pour créé une option
function creerOption(nom,select){
  var a = document.createElement('option');
  a.text = nom;
  a.setAttribute('id',nom);
  select.add(a);
  $('select').niceSelect('update');
}

//Fonction pour afficher la région actuelle
function afficherLocalisation(){
  var requestUrl = "http://ip-api.com/json";
  var local = document.getElementById("local");

  $.ajax({
    url: requestUrl,
    type: 'GET',
    success: function(json)
    {
      local.innerHTML = json.country;
    },
    error: function(err)
    {
      local.innerHTML = "Vérifier votre connexion..";
    }
  });
}

//Fonction pour la confirmation de la suppression
function confirmationDelete(id,email,article){
  $.confirm({
      title: "Suppression",
      content: 'Vous êtes sur de supprimer cette article ?',
      autoClose: 'Annuler|10000',
      buttons: {
          logoutUser: {
              text: 'Supprimer',
              action: function () {
                  supprimerArtcile(id,email,article);
              }
          },
          Annuler: function () {
          }
      }
  });
}

//Fonction pour la suppression de l'article
function supprimerArtcile(id,email,article){
  $.ajax({
      url:"php/fonctions.php",
      method:"POST",
      data:{
        id:id,
        email:email,
        article:article,
        actionDelete:'delete'
      },
      success:function(data){
        alerteArticleSupprimer(id,email);
      }
  })
}

////Fonction pour afficher une réussite de suppression de l'article
function alerteArticleSupprimer(id,email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Article supprimée</h3>"+
          "<br>"+
          "<p>Bravo ! Vous avez supprimé un article référencé par <b>" +id+ "</b> avec succés.</p>",
    width: 480,
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    ouvrirLien("article.php?email=" + email);
  })
}


//Fonction pour la confirmation du suppression de l'article
function confirmationDelete2(id,email,article){
  $.confirm({
    title: "Suppression",
    content: 'Vous êtes sur de supprimer cette article ?',
    autoClose: 'Annuler|10000',
    buttons: {
        logoutUser: {
            text: 'Supprimer',
            action: function () {
                supprimerArtcile2(id,email,article);
            }
        },
        Annuler: function () {
        }
    }
  });
}

//Fonction pour la suppression de l'article
function supprimerArtcile2(id,email,article){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      id:id,
      email:email,
      actionDelete2:'delete'
    },
    success:function(data){
      alerteArticleSupprimer(id,email);
    }
  })
}

//Fonction pour ajouter une vue
function updateVue(id,table){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
     id:id,
     table:table,
     actionUpdateVue:'update'
    }
  })
}

//Formulaire pour remplir la liste des favoris
function formulaireNotification(){
  var test = validateEmail(document.getElementById('email').value);
  if(test == false){
    alertEmailNonValide();
  }
  else{
    var email = document.getElementById('email').value;
    $.ajax({
      url:"php/fonctions.php",
      method:"POST",
      data:{
        email:email,
        actionTest:'test'
      },
      success:function(data){
        if(data.trim() == "compte existe"){
          creerSessionNotification(email);
        }
        else{
          enregistrerVous()
        }
        
      }
    })
  }
  return false;
}

//Fonction pour afficher une erreur pour enregistrer vous
function enregistrerVous(){
  swal({
    type: 'error',
    title:'Oups !',
    html:'<p>Désolé : aucune compte trouvé avec cette adresse e-mail. Si vous voulez bénéficer de ce service, vous devez créer un nouveau compte à partir de la page <a href = "creer_compte.php">créer un nouveau compte</a>..</p>',
    width: 440,
    padding: '2em',
    showCloseButton: true,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    allowOutsideClick:false,
    cancelButtonText:"Fermer"
  })
}

//Fonction pour creer une session de notification
function creerSessionNotification(emailNotif){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
       emailNotif:emailNotif,
       actionSessionNotif:'session'
    },
    success:function(data){
      if(data.trim() == "session creer"){
        ouvrirLien("choixCategorieNotification.php");
      }
    }
  })
}

//Fonction pour récupérer les champs des catégories
function formulaireChampsNotification(){
  var email_notif = document.getElementById('email').value;
  var choix1 = document.getElementById('choix1').value;
  var choix2 = document.getElementById('choix2').value;
  var choix3 = document.getElementById('choix3').value;

  if((choix1 == choix2) ||(choix1 == choix3) || (choix2 == choix3)){
    choixEgaleIncorrect();
  }

  else if((choix1 == 'choix1') || (choix2 == 'choix2') || (choix3 == 'choix3')){
    selectionnerChoix();
  }

  else{
    swal({
      text: "Patienter s'il vous plait..",
      allowEscapeKey: false,
      allowOutsideClick: false,
      padding:"2em",
      width:"300px",
      timer:'3000',
      onOpen: () => {
        swal.showLoading();
      }
    })
    .then(function() {
      $.ajax({
        url:"php/fonctions.php",
        method:"POST",
        data:{
          email_notif:email_notif,
          choix1:choix1,
          choix2:choix2,
          choix3:choix3,
          actionAjouterListeFavoris:'add'
        },
        success:function(data){
          if(data.trim() == "success"){
            listeFavorisRemplis(email_notif);
          }
          else{
            listeFavorisRemplisNon(email_notif);
          }
        }
      })
    })
  }

}

//Fonction pour afficher que la liste des favoris est remplis
function listeFavorisRemplisNon(email_notif){
  swal({
    type: 'error',
    title: 'Oups !',
    html:"<p>Désolé : une erreur s'est produite. Votre liste de favoris est déja remplis. <br>Pour modifier cette liste, connecter-vous avec votre compte et modifier votre liste à partir de la configuration du compte..</p>",
    width: '500px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: true,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
  .then(function() {
    ouvrirLien("choixCategorieNotification.php?emailNotif="+email_notif);
  })
}

//Fonction pour afficher que la liste des favoris est remplis
function listeFavorisRemplis(email_notif){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Liste de favoris remplis</h3>"+
          "<br>"+
          "<p>Trés bien ! votre liste de favoris a été remplis avec succés. Si vous trouverez des problémes concernant cette liste contacter-nous à partir de la page <a href = 'contact.php'>contact</a>.</p>",
    width: '490px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    allowOutsideClick:false
  })
  .then((result) => {
    ouvrirLien("choixCategorieNotification.php?emailNotif="+email_notif);
  })
}

//Fonction pour afficher une erreur que les catégories sont identiques
function choixEgaleIncorrect(){
  swal({
    type: 'error',
    title: 'Oups !',
    html:"<p>Désolé : vous avez choisie des catégories identiques. Modifier vos choix et ressayer une autre fois..</p>",
    width: '500px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour dire que le choix est obligatoire
function selectionnerChoix(){
  swal({
    type: 'error',
    title: 'Oups !',
    html:"<p>Vous devez séléctionner tout les choix pour bénéficier de ce service..</p>",
    width: '475px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour modifier la liste des favoris
function updateListeFavoris(){
  var email = document.getElementById('email').value;
  var choix1 = document.getElementById('choix1').value;
  var choix2 = document.getElementById('choix2').value;
  var choix3 = document.getElementById('choix3').value;

  if((choix1 === choix2) ||(choix1 === choix3) || (choix2 === choix3)){
    choixEgaleIncorrect();
  }

  else{
    $.ajax({
      url:"php/fonctions.php",
      method:"POST",
      data:{
        email:email,
        choix1:choix1,
        choix2:choix2,
        choix3:choix3,
        actionUpdateListeFavoris:'update'
      },
      success:function(data){
        if(data == "modifie"){
          chargementModifierListeFavoris(email);
        }
        else{
          chargementNonModifierListeFavoris(data);
        }
      }
    })
  }
}

//Fonction pour le chargement de modification de la liste
function chargementModifierListeFavoris(email){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    timer:3000,
    width:"300px",
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    listeFavorisModifié(email);
  })
}

//Fonction pour le chargement de modification de la liste
function chargementNonModifierListeFavoris(data){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    timer:3000,
    width:"300px",
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    setTimeout(function(){
      $('.alert_message').html(data).hide().fadeIn('6000').delay(6000).fadeOut();
    },100);
  })
}

function listeFavorisModifié(email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Favoris modifié</h3>"+
          "<br>"+
          "<p>Trés bien ! votre liste de favoris a été modifié avec succés</a>."+
          "</p>",
    width: '460px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonText:"D'accord",
    colorConfirmButton:'#2E5EAB',
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
   ouvrirLien("modifier_liste_favoris.php?email="+email);
  })
}

//Fonction pour informer le clien qu'il doit connecté d'abord
function connecterDabord(){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Action non autorisé</h3>"+
          "<br>"+
          "<p>Chers client, les réactions sur les articles sont disponibles uniquement pour les utilisateurs qui sont déja connectés. Si vous voulez utiliser les réactions, connectez vous d'abord à partir de la <a href = 'login.php'>page d'authentification</a>."+
          "</p>",
    width: '500px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    allowOutsideClick:false,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord"
  })
}

//Fonction pour supprimer le journal
function deleteJournal(email){
  $.confirm({
    title: 'Suppression',
    content: 'Vous êtes sur de vider votre journal ?',
    autoClose: 'Annuler|10000',
    buttons: {
      logoutUser: {
        text: 'Vider',
        action: function () {
          $.ajax({
            url:"php/fonctions.php",
            method:"POST",
            data:{
              email:email,
              actionDeleteJournal:'delete'
            },
            success:function(data){
              if(data.trim() === "delete"){
                chargementSupprimerJournal(email);
              }
              else{
                journalPasSupprimer();
              }
            }
          })
        }
      },
      Annuler: function () {
      }
    }
  });
}

//Fonction pour le chargement du suppression de journal
function chargementSupprimerJournal(email){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    timer:3000,
    width:"300px",
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    journalSupprime(email);
  })
}

//Fonction pour afficher que le journal n'a pas ajouté
function journalPasSupprimer(){
  swal({
    type: 'error',
    title: 'Oups !',
    html:"<p>Désolé : Votre journal d'authentification est vide..</p>",
    width: '420px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour afficher que le journal est éffacé correctement
function journalSupprime(email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Journal supprimé</h3>"+
          "<br>"+
          "<p>Trés bien ! votre journal d'authentification a été supprimé avec succés</a>."+
          "</p>",
    width: '420px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonText:"D'accord",
    colorConfirmButton:'#2E5EAB',
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    ouvrirLien('journal_authentification.php?email='+email);
  })
}

//Fonction pour vérfier si la session est ouvert ou non
function ouvrirModalContacter(email,email_vendeur){
  if(email == ''){
    swal({
      type: "info",
      html:"<h3 class = 'text-sweet-alert'>Action non autorisé</h3>"+
            "<br>"+
            "<p>Chers client, cette fonction est disponible uniquement pour les personnes qui sont déja connectés. Si vous voulez communiquer avec les vendeurs connectez-vous tout d'abord à partir de la <a href = 'login.php'>page d'authentification</a>."+
            "</p>",
      width: '500px',
      padding: '2em',
      showCloseButton: false,
      showCancelButton: false,
      focusCancel: false,
      popup: 'animated fadeInDown faster',
      showConfirmButton: true,
      allowEscapeKey: true,
      allowEnterKey:false,
      scrollbarPadding: true,
      confirmButtonColor: '#2E5EAB',
      confirmButtonText:"D'accord",
      allowOutsideClick:false
    })
  }
  else{
    ouvrirLien('espace_echange.php?email='+email+'&to='+email_vendeur);
  }
}

//Fonction pour vu les messages
function vueMessage(to,from){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data:{
      from:from,
      to:to,
      actionVuMessage:'vu'
    },
    success:function(data){
     
    }
  })
}

//Fonction pour modifier le compte
function modifierCompte(){
  var test = validateNumber($('#numero').val());
  if(test == false){
    alerteNumeroNonValide();
  }
  else{
    var email = $('#email').val();
    var nom = $('#nom').val();
    var genre = $('#sexe').val();
    var numero = $('#numero').val();
    var pays = $('#pays').val();
    var gouvernorat = $('#gouvernorat').val();
    var ville = $('#ville').val();
    var password = $('#password').val();
    var facebook = $('#facebook').val();
    var instagram = $('#instagram').val();
    var twitter = $('#twitter').val();
    var google = $('#google').val();
    $.ajax({
      url:"php/fonctions.php",
      method:"POST",
      data:{
        nom:nom,
        email:email,
        genre:genre,
        pays:pays,
        gouvernorat:gouvernorat,
        ville:ville,
        numero:numero,
        password:password,
        facebook:facebook,
        instagram:instagram,
        twitter:twitter,
        google:google,
        actionUpdateVendeur:'update'
      },
      success:function(data){
       if(data == "modifié"){
         chargementModifieCompte(email,nom);
       }
       else{
         alerteCompteNonModifie();
       }
      }
    })
  } 
}

//Fonction pour afficher compte non modifié
function alerteCompteNonModifie(){
  swal({
    type: "error",
    title:"Oups !",
    html:"<p> Désolé : votre compte ne peut pas être modifié. Ressayer plus tard..</p>",
    width: "480px",
    padding: "2em",
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: "animated fadeInDown faster",
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour le chargement du modification du compte
function chargementModifieCompte(email,nom){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    timer:3000,
    width:"300px",
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    alertCompteModifie(email,nom);
  })
}

//Fonction pour afficher compte modifié
function alertCompteModifie(email,nom){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Compte modifié</h3>"+
          "<br>"+
          "<p>Très bien <b>"+nom+"</b>, votre compte a été modifié avec succés. Si vous trouverez des problèmes conernant votre compte, contacter nous à partir de la page <a href = 'contact.php'>contact</a>.</p>",
    width: '450px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    ouvrirLien("compte.php?email="+email);
  })
}

//Fonction pour ajouter une photo
function ajouterPhoto(){
  var email = $('#email').val();                    
  var file_data = $('#file').prop('files')[0];    

  var form_data = new FormData();
  form_data.append("file",file_data);
  form_data.append("email",email);
  form_data.append("actionAjouterPhoto",'update');

  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    dataType: 'script',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success:function(data){
      if(data == "photo ajouté"){
        chargementAjouterPhoto(email);
      }
      else{
        alertePhotoNonAjoute();
      }
    }
  })	
}

//Fonction pour afficher photo non ajouté
function alertePhotoNonAjoute(){
  swal({
    type: "error",
    title:"Oups !",
    html:"<p> Désolé : votre photo ne peut pas être ajouté. Ressayer plus tard..</p>",
    width: "480px",
    padding: "2em",
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: "animated fadeInDown faster",
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour le chargement d'ajouter une photo
function chargementAjouterPhoto(email){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    timer:3000,
    width:"300px",
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    alertePhotoAjoute(email);
  })
}

//Fonction pour afficher la photo ajouté
function alertePhotoAjoute(email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Photo ajouté</h3>"+
          "<br>"+
          "<p>Très bien, votre photo de profil a été ajouté avec succés. Si vous trouverez des problèmes conernant votre compte, contacter nous à partir de la page <a href = 'contact.php'>contact</a>.</p>",
    width: '450px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    ouvrirLien("compte.php?email="+email);
  })
}

//Fonction pour voir les notifications
function updateVueNotification(email){
  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    data: {
      email:email,
      updateNotification:'update'
    },
    success:function(data){
      ouvrirLien("notification.php");
    }
  })	
}

//Fonction pour supprimer les notifications
function deleteNotification(email){
  $.confirm({
    title: 'Suppression',
    content: 'Vous êtes sur de vider votre liste des notification ?',
    autoClose: 'Annuler|10000',
    buttons: {
      logoutUser: {
        text: 'Vider',
        action: function () {
          $.ajax({
            url:"php/fonctions.php",
            method:"POST",
            data:{
              email:email,
              actionDeleteNotification:'delete'
            },
            success:function(data){
              if(data.trim() === "delete"){
                chargementSupprimerNotification(email);
              }
              else{
                NotificationPasSupprimer();
              }
            }
          })
        }
      },
      Annuler: function () {
      }
    }
  });
}

//Fonction pour afficher que la liste des notification est vide
function NotificationPasSupprimer(){
  swal({
    type: 'error',
    title: 'Oups !',
    html:"<p>Désolé : Votre liste des notifications est vide..</p>",
    width: '420px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour le chargement du suppression de la liste des notifications
function chargementSupprimerNotification(email){
  swal({
    text: "Patienter s'il vous plait..",
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:"2em",
    timer:3000,
    width:"300px",
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then((result) => {
    notificationsSupprime(email);
  })
}

//Fonction pour afficher que la liste des notifications est vidé
function notificationsSupprime(email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Notifications supprimé</h3>"+
          "<br>"+
          "<p>Trés bien ! votre liste des notification a été supprimé avec succés</a>."+
          "</p>",
    width: '500px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonText:"D'accord",
    colorConfirmButton:'#2E5EAB',
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    ouvrirLien("notification.php");
  })
}

//Fonction pour afficher que l'email est incorrecte
function alertErreurEmail(){
  swal({
    type: 'error',
    title: 'Oups !',
    html:"<p>Impossible de traiter cette adresse e-mail..</p>",
    width: '420px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: true,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: false,
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: true,
    cancelButtonText:"Fermer",
    allowOutsideClick:false
  })
}

//Fonction pour ajouter un article
function ajouterArticle(){
  var email = $('#email').val();	
  var titre = $('#titre').val();
  var article = $('#article').val();
  var list = $('#list').val();			
  var prix = $('#prix').val();	
  var email = $('#email').val();	
  var descrption = $('#descrption').val(); 
  var negociation = $('#negociation').val(); 
  var etat = $('#etat').val(); 
  var image1 = $('#image1').prop('files')[0]; 
  var image2 = $('#image2').prop('files')[0]; 
  var image3 = $('#image3').prop('files')[0];
  
  var form = new FormData();
  form.append("email",email);
  form.append("titre",titre);
  form.append("article",article);
  form.append("list",list);
  form.append("prix",prix);
  form.append("descrption",descrption);
  form.append("negociation",negociation);  
  form.append("etat",etat);
  form.append("image1",image1);
  form.append("image2",image2);
  form.append("image3",image3);
  form.append("actionUpdateArticle","update");

  $.ajax({
    url:"php/fonctions.php",
    method:"POST",
    dataType: 'script',
    cache: false,
    contentType: false,
    processData: false,
    data: form,
    success:function(data){
      if(data == "article creer"){
        swal({
          text: "Patienter s'il vous plait..",
          allowEscapeKey: false,
          allowOutsideClick: false,
          padding:"2em",
          timer:3000,
          width:"300px",
          onOpen: () => {
            swal.showLoading();
          }
        })
        .then((result) => {
          articleAjouter(email);
        })
      }
      else{
        $('.alert_message').html('<div id = "loading2"></div>');
        setTimeout(function(){
          $('.alert_message').html(data).hide().fadeIn('9000').delay(9000).fadeOut();
        },4000);
        setInterval(function(){ouvrirLien("creer_article.php?email="+email)},14000);
      }
    }
  })
}

//Fonction pour afficher que l'article est ajouté
function articleAjouter(email){
  swal({
    type: "info",
    html:"<h3 class = 'text-sweet-alert'>Article ajouté</h3>"+
          "<br>"+
          "<p>Très bien, votre votre nouvel article a été ajouté avec succés. Si vous trouverez des problèmes conernant votre publication, contacter nous à partir de la page <a href = 'contact.php'>contact</a>.</p>",
    width: '450px',
    padding: '2em',
    showCloseButton: false,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    confirmButtonColor: '#2E5EAB',
    confirmButtonText:"D'accord",
    allowEscapeKey: true,
    allowEnterKey:false,
    scrollbarPadding: false,
    allowOutsideClick:false
  })
  .then((result) => {
    ouvrirLien("creer_article.php?email="+email);
  })
}

