<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerFlux.php';

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

require_once "lang/lang.php";

?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Mews</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
  <link rel="icon" type="image/png" href="img/logo/fav.ico"/>
  <style>
    .social-footer{
      float: left;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="navbar-fixed">
    <nav class="white">
      <div class="nav-wrapper">
        <a id="logo-container" href="" class="brand-logo"><img src="img/logo/logo.png" width="190px" height="auto" /></a>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <?php if(isset($_SESSION['email'])):?>
            <li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
            <li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
            <li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
            <li><a href="./page.php"><?php echo _FIL; ?></a></li>
            <li><a href="./favori.php"><?php echo _FAV; ?></a></li>
            <li><a class="deco" href="./model/logout.php"><?php echo _DECONNEXION; ?></a></li>
          </ul>
        <?php else: ?>
          <li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
          <li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
          <li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
          <li><a class="modal-trigger" href="#modalInscription"><?php echo _INSCRIPTION; ?></a></li>
          <li><a class="modal-trigger" href="#modalConnexion"><?php echo _CONNEXION; ?></a></li>
        </ul>



        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    <?php endif; ?>
  </nav>
</div>

<?php if(isset($_SESSION['email'])):?>

<ul id="nav-mobile" class="side-nav">
  <li><a href="./page.php"><?php echo _FIL; ?></a></li>
  <li><a href="./favori.php"><?php echo _FAV; ?></a></li>
  <li><a href="./model/logout.php"><?php echo _DECONNEXION; ?></a></li>
  <li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
  <li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
  <li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
</ul>
<?php else: ?>

<ul id="nav-mobile" class="side-nav">
  <li><a href="#modalInscription"><?php echo _INSCRIPTION; ?></a></li>
  <li><a href="#modalConnexion"><?php echo _CONNEXION; ?></a></li>
  <li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
  <li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
  <li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
</ul>
<?php endif; ?>

    <!-- ERROR MESSAGES -->
    <?php if(isset($_SESSION['flash'])):?>
    <?php foreach ($_SESSION['flash'] as $type => $message):
      unset($_SESSION['flash']);?>
      <div class="alert alert-<?= $type; ?>">
        <?= $message; ?>
      </div>

    <?php endforeach; ?>
  <?php endif; ?>

    <?php if(isset($_SESSION['flash'])):?>
      <?php foreach($_SESSION['flash'] as $type => $message): ?>
        <div class="container">
          <div class="row">
            <div class="alert alert-<?= $type; ?>">
              <?= $message; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
   <?php endif; ?>


  <div class="container">
    <div class="row">
      <div class="col s12">
       <h4 class="left"><?php echo _PRESENTATION; ?></h1>
     </div>
   </div>
   <div class="row">
      <div class="col s12">
       <p><?php echo _TEXTEPRESENTATION; ?></p>
     </div>
   </div>
    </div>

   <!--   Icon Section   -->
   <div class="container" >
   <div class="row">
     <div class="col s12 m4">
       <div class="icon-block">
         <h2 class="center blue-text"><i class="material-icons">autorenew</i></h2>
         <h5 class="center"><?php echo _DESCRIPTIONUN; ?></h5>
         <p class="light"><?php echo _TEXTEDESCRIPTIONUN; ?></p>
       </div>
     </div>

     <div class="col s12 m4">
       <div class="icon-block">
         <h2 class="center blue-text"><i class="material-icons">favorite</i></h2>
         <h5 class="center"><?php echo _DESCRIPTIONDEUX; ?></h5>

         <p class="light"><?php echo _TEXTEDESCRIPTIONDEUX; ?></p>
       </div>
     </div>

     <div class="col s12 m4">
       <div class="icon-block">
         <h2 class="center blue-text"><i class="material-icons">fiber_new</i></h2>
         <h5 class="center"><?php echo _DESCRIPTIONTROIS; ?></h5>

         <p class="light"><?php echo _TEXTEDESCRIPTIONTROIS; ?></p>
       </div>
     </div>
   </div>

 </div>
</div>


<!--  VIDEO -->
<div class="container">
		<div class="row" style="text-align:center;">
    <video class="responsive-video" controls>
    <source src="./src/video.mp4" type="video/mp4">
    </video>
		</div>
		<div class="row">
			<p><?php echo _LEGENDVIDEO; ?></p>
		</div>
	</div>


<!-- REVUE DE PRESSE -->
<div class="container">
<div class="row">
  <div class="col s12">
   <h3><?php echo _REVUE; ?></h3>
   <p style="font-size:13pt;"><?php echo _TEXTEREVUE; ?></p>
<a class="btn waves-effect waves-light blue" type="submit" name="action" target="_blank" href="./src/revue.pdf"><?php echo _LIRESUITE; ?>
<i class="material-icons right">send</i>
</a>
 </div>
</div>
</div>


  <div class="container">
    <div class="row">
      <div class="col s12">
      <h3><?php echo _ANNEXE; ?></h3>
      <h5><?php echo _BOOFOFSPEC; ?></h5>
      <a class="btn-floating btn-large waves-effect waves-light blue" href="./src/cdcf.pdf" target="_blank"><i class="material-icons">attach_file</i></a>
      </div>
    </div>
  </div>

    <div class="container">
    <div class="row">
      <div class="col s12">
      <h5><?php echo _CHARTE; ?></h5>
      <a class="btn-floating btn-large waves-effect waves-light blue" href="./src/charte.pdf" target="_blank"><i class="material-icons">attach_file</i></a>
      </div>
    </div>
  </div>


<!--  FOOTER -->
</div>
  <footer class="page-footer blue darken-2">
    <div class="container">
      <div class="row">

        <div class="col l6 s12">
            <h5 class="white-text"><?php echo _SOCIAL; ?></h5>
            <ul>
                <li class="social-footer"><a href="https://www.facebook.com/MewsTeam/?hc_ref=ARROciI1DEdfsZ-LjIlr1VHrxj88BLI1plRKAXzn3IHOMF7-i7O5fSXCtJfS3s5V1vc&fref=nf" target="_blank"><i style='color:white;' class="socialfoot fa fa-facebook-square fa-3x" aria-hidden="true"></i></a></li>
                <li class="social-footer"><a href="https://twitter.com/wearemews?lang=fr" target="_blank"> <i style='color:white;' class="socialfoot fa fa-twitter-square fa-3x" aria-hidden="true"></i></a></li>
                <li class="social-footer"><a href="https://www.linkedin.com/in/mews-team-9b240115b/" target="_blank"> <i style='color:white;' class="socialfoot fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a></li>
              </ul>
          </div>
        <div class="col l3 s12 right">
          <h5 class="white-text"><?php echo _LINK; ?></h5>
          <ul>
            <li><a class="white-text" href="pages/apropos.php"><?php echo _ABOUT; ?></a></li>
            <li><a class="white-text" href="pages/FAQ.php"><?php echo _FAQ; ?></a></li>
            <li><a class="white-text" href="pages/mentionslegales.php"><?php echo _MENTION; ?></a></li>
            <li><a class="white-text" href="pages/conditions.php"><?php echo _USE; ?></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">

      </div>
    </div>
  </footer>




 <!-- MODAL INSCRIPTION-->
 <div id="modalInscription" class="modal">
 <div class="modal-content">
   <h4><?php echo _INSCRIPTION; ?></h4>
   <div class="row">
    <form class="col s12" action="./model/traitementRegister.php" method="POST">
  <div class="row">
   <div class="input-field col s6">
            <label for=""><?php echo _PRENOM; ?></label>
            <input type="text" name="firstname"/>
            </div>
   <div class="input-field col s6">
              <label for=""><?php echo _NOM; ?></label>
              <input type="text" name="lastname"/>
          </div>
       </div>
       <div class="row">
   <div class="input-field col s6">
     <label for=""><?php echo _DATENAISSANCE; ?></label>
       <input type="text" class="datepicker" name="anniversary">
     </div>
   </div>
          <div class="row">
              <label for=""><?php echo _SEXE; ?></label>
       <p>
         <input name="sexe" type="radio" id="test1" checked/>
         <label for="test1"><?php echo _FEMME; ?></label>
       </p>
       <p>
         <input name="sexe" type="radio" id="test2" />
         <label for="test2"><?php echo _HOMME; ?></label>
       </p>
          </div>
          <div class="row">
     <div class="input-field col s6">
               <label for=""><?php echo _MAIL; ?></label>
       <input type="text" name="email"/>
             </div>
             <div class="input-field col s6">
               <label for=""><?php echo _CMAIL; ?></label>
               <input type="text" name="email_confirm"/>
     </div>
             </div>
             <div class="row">
       <div class="input-field col s6">
         <label for=""><?php echo _MDP; ?></label>
         <input type="password" name="password"/>
       </div>
       <div class="input-field col s6">
         <label for=""><?php echo _CMDP; ?></label>
         <input type="password" name="password_confirm" />
       </div>
       </div>
           </div>
       </div>
      <div class="modal-footer">
         <button type="submit" class="btn waves-effect waves-light" name="submit"><?php echo _CINSCRIPTION; ?></button>
            </div>
         </form>



</div>

<?php

//gère la requête GET lorsque l'utilisateur entre un mauvais pseudo/mail

if(@$_GET['action'] == 'wrongMDP' ) {
echo "<h2 style=\"color:#3080D0; text-align:center;\"> Les mots de passe ne correspondent pas </h2>";
}

if(@$_GET['action'] == 'register' ) {
echo "<h2 style=\"color:#3080D0; text-align:center;\"> Compte enregistré </h2>";
}

?>

<!-- MODAL CONNEXION-->
<div id="modalConnexion" class="modal">
 <div class="modal-content">
   <h4><?php echo _CONNEXION; ?></h4>
   <div class="row">
    <form class="col s12" action="./model/traitementLogin.php" method="POST">
  <div class="row">
   <div class="input-field col s12">
             <label for=""><?php echo _MAIL; ?></label>
     <input type="text" name="email" />
            </div>
       </div>
       <div class="row">
   <div class="input-field col s12">
         <label for=""><?php echo _MDP; ?> <a href="remember.php"><?php echo _FMDP; ?></a></label>
     <input type="password" name="password" />
     </div>
           </div>
       </div>
      <div class="modal-footer">
         <button type="submit" class="btn waves-effect waves-light" name="connexion"><?php echo _CCONEXION; ?></button>
         </div>
      </form>
      </div>


      <?php
      if(@$_GET['action'] == 'connected' ) {
       //here we'll be put things when user is connected (newsfeed)

       echo "<h3>Connecté</h3>";
       header("Location: ../index.php?action=yay");
      }

       if(@$_GET['action'] == 'user' ) {
         echo "<h2 style=\"color:#3080D0; text-align:center;\"> Utilisateur non inscrit </h2>";
        }

        if(@$_GET['action'] == 'empty' ) {
         echo "<h2 style=\"color:#3080D0; text-align:center;\"> Champs vides </h2>";
        }?>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script>
 $(document).ready(function(){
 // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
 $('.modal').modal();
});
</script>
<script>
 $('.datepicker').pickadate({
 selectMonths: true, // Creates a dropdown to control month
 selectYears: 100, // Creates a dropdown of 15 years to control year,
 today: 'Today',
 clear: 'Clear',
 close: 'Ok',
 closeOnSelect: false // Close upon selecting a date,
});
</script>
</body>
</html>

