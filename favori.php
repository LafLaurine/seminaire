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
  <link rel="icon" type="image/png" href="img/logo/fav.ico" />
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
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
      <li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
      <li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
      <li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
      <li><a class="page" href="./index.php"><i class="material-icons" style="color:black;">home</i></a></li>
      <li><a class="page" href="./page.php"><?php echo _FIL; ?></a></li>
        <li><a href="./model/logout.php"><?php echo _DECONNEXION; ?></a></li>
      </ul>
  </div>
</nav>
</div>

<ul id="nav-mobile" class="side-nav">
<li><a class="page" href="./index.php"><i class="material-icons" style="color:black;">home</i></a></li>
<li><a class="page" href="./page.php"><?php echo _FIL; ?></a></li>
<li><a href="./model/logout.php"><?php echo _DECONNEXION; ?></a></li>
<li><a href="?lang=fr"><img width="35px" src="img/flag/fr.png"></a></li>
<li><a href="?lang=en"><img width="38px" src="img/flag/en.png"></a></li>
<li><a href="?lang=bg"><img width="40px" src="img/flag/bg.png"></a></li>
</ul>


<h2 class="center-align"><?php echo _MYFAV; ?> <i class="small material-icons">favorite</i></h2>

<?php require_once "favoriteView.php"; ?>

<div class="col hide-on-small-only m3 l2" style="float:right;">
          <div class="toc-wrapper pinned" style="top: 100px;">
            <div class="buysellads hide-on-small-only">
              <h1>TREND</h1>
            </div>
            <div style="height: 1px;">
              <ul class="section table-of-contents">
                <li><a href="#basic" class="active">Carte basique</a></li>
                <li><a href="#image" class="">Carte image</a></li>
                <li><a href="#reveal" class="">Card Reveal</a></li>
                <li><a href="#sizes" class="">Card Sizes</a></li>
                <li><a href="#panel" class="">Card Panel</a></li>
              </ul>
            </div>
          </div>
        </div>
  </div>
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
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
	  $(document).ready(function(){
     $(".button-collapse").sideNav();
});

	</script>

  </body>
</html>

