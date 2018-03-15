<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerFlux.php';


if (!isset($_SESSION['email'])) {

         echo "<script type=\"text/javascript\">
         alert(\"Utilisateur non connecté\");
         location=\"./index.php\";
         </script>";
 }

 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once "lang/lang.php";

$flux_list = (new ControllerFlux())->getAllActifFlux();

?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Mews</title>
<style>
.table-of-contents a.active {
  border-left: 2px solid #1976D2!important;
}
nav .nav-wrapper img{
  margin-left: 10px;
  margin-top: 3px;
}
body {
display: flex;
min-height: 100vh;
flex-direction: column;
}

main {
flex: 1 0 auto;
}
</style>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
  <script src="./js/affichageArticles.js"></script>
  <link rel="icon" type="image/png" href="img/logo/fav.ico"/>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
  <style>
  .table-of-contents a.active {
    border-left: 2px solid #1976D2!important;
  }
  nav .nav-wrapper img{
    margin-left: 10px;
    margin-top: 3px;
  }
  .social-footer{
    float: left;
    margin-left: 10px;
  }
  body {
display: flex;
min-height: 100vh;
flex-direction: column;
}

main {
flex: 1 0 auto;
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
          <li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
          <li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
          <li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
          <li><a class="page" href="./index.php"><i class="material-icons" style="color:black;">home</i></a></li>
          <li><a class="page" href="./favori.php"><?php echo _FAV; ?></a></li>
          <li><a class="deco" href="./model/logout.php"><?php echo _DECONNEXION; ?></a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul id="nav-mobile" class="side-nav">
    <li><a class="page" href="./index.php"><i class="material-icons" style="color:black;">home</i></a></li>
    <li><a class="page" href="./favori.php"><?php echo _FAV; ?></a></li>
      <li><a href="./model/logout.php"><?php echo _DECONNEXION; ?></a></li>
      <li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
      <li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
      <li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
  </ul>

	  <!--   Présention   -->

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

        <main>

        <div class="container" style="margin-top: 20px;">
        <div class="row">
          <div class="col s12 m9">
          <?php
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerFlux.php';

 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>


<?php if(isset($_GET['keyword'])) : ?>

    <?php $fluxController = new ControllerFlux(); ?>

    <?php $articles = $fluxController->getFavoriteArticleByKeyword($_GET['keyword']);
                    foreach ($articles as $article): ?>
                    <li><a href="<?php echo $article['url']?>" class="active"><?php echo $article['titre']; ?></a></li>
                <?php endforeach; ?>
<?php else : ?>
<?php header ("Location : ./page.php");?>
<?php endif; ?>
         </div>

      </div>
    </div>
       </main>

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
          <h5 class="white-text"><?php echo _SOCIAL; ?></h5>
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

  <!--  Scripts-->

  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/sortable.js"></script>

	<script>
	  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '4%', // Starting top style attribute
      endingTop: '10%', // Ending top style attribute
    }
  );

  $(".button-collapse").sideNav();
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
  <script>
    sortable = new Sortable(document.querySelector('#sort1'));
    sortable.success = function(results){
        console.log(results);
    }
</script>
  </body>
</html>
