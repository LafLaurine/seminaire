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
  .social-footer{
    float: left;
    margin-left: 10px;
  }
  .articles_list{
    width: 700px;
  }
  .column{
    z-index: 0;
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
           <h4 class="left"><?php echo _FILOF; print_r($_SESSION['firstname']); ?></h1>
         </div>

      </div>

      <a class="waves-effect waves-light btn teal lighten-2 modal-trigger" href="#modal1"><img src="./img/engrenage.png" id="engrenage"/></a>

      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
        <h4><?php echo _PARAM; ?></h4>
        <div class="listeFlux">
          <div class="head"><h2 class="flux"><?php echo _LISTFLUX; ?> <span id="compteur_flux"><span id="compteur_flux"><?php echo count($flux_list)?></span> / <span id="limite_flux">6</span></span></h2></div>
            <ul>
              <li>gnheal

              <input type="checkbox">
              <div class="Switch Round">
                <div class="Toggle"></div>

              </div>

              </li>

            </ul>
          </div>

        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat"><?php echo _MERCI; ?></a>
        </div>
      </div>

            <!-- Modal Structure -->
            <div id="modal2" class="modal">
        <div class="modal-content">
          <h4><?php echo _KWORD; ?></h4>
          <form>
          <label for="keywords"><?php echo _SKWORD; ?></label>
          <input type="text" name="keywords" id="keywords"/>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="validateFavori"><?php echo _VALIDATE; ?></a>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m8 l8">
      <div class="flux_list">
        <div id="sort1" data-sortable=".column" class="ui stackable three column grid relative">
          <?php
          $flux_list = (new ControllerFlux())->getAllActifFlux();
          $i=0;
              foreach($flux_list as $flux)
              {
                    $j = $i+1;
                  echo "<div class='column flux' data-position={$i} data-id='{$j}'>";
                  include($_SERVER['DOCUMENT_ROOT']. '/seminaire/defaultFluxView.php');
                  $i++;
                  echo "</div>";
              }



          ?>

          </div>


      </div>
      </div>
        <div class="col hide-on-small-only m3 l3" style="float:right;">
            <div class="toc-wrapper pinned" style="top: 100px;">
              <div class="buysellads hide-on-small-only">
              <h6><?php echo _KWORD; ?></h6>
              </div>
              <div style="height: 1px;">
                <ul class="section table-of-contents">
                  <?php $keywords = (new ControllerFlux())->getMotclef();
                 foreach ($keywords as $keyword): ?>
                  <li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/seminaire/keywords.php?keyword='.$keyword['mot_clef']?>" class="active"><?php echo $keyword['mot_clef']?> (<?php echo $keyword['nb']; ?>)</a></li>
              <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col hide-on-small-only m2 l3" style="float:right;">
            <div class="toc-wrapper pinned" style="top: 100px;">
              <div class="buysellads hide-on-small-only">
              <h6><?php echo _TREND; ?></h6>
              </div>
              <div style="height: 1px;">
                <ul class="section table-of-contents">
                  <?php $articles = (new ControllerFlux())->getFavoriteArticle();
                 foreach ($articles as $article): ?>
                  <li><a href="<?php echo $article['url']?>" class="active" target="_blank"><?php echo $article['titre']; ?></a></li>
              <?php endforeach; ?>
                </ul>
              </div>
            </div>
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
