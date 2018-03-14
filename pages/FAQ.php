<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerFlux.php';

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "fr";
  require_once "../lang/fr.inc";
}


if(isset($_GET['lang']) && $_GET['lang'] == "fr"){
  $_SESSION['lang'] = "fr";
  require_once "../lang/fr.inc";
}else if(isset($_GET['lang']) && $_GET['lang'] == "en"){
  $_SESSION['lang'] = "en";
  require_once "../lang/en.inc";
}else if(isset($_GET['lang']) && $_GET['lang'] == "bg"){
    $_SESSION['lang'] = "bg";
    require_once "../lang/bg.inc";
}

if(!isset($_GET['lang'])){
if(isset($_SESSION['lang']) && $_SESSION['lang']=='fr'){
  require_once "../lang/fr.inc";
  }

if(isset($_SESSION['lang']) && $_SESSION['lang']=='en'){
  require_once "../lang/en.inc";
}

if(isset($_SESSION['lang']) && $_SESSION['lang']=='bg'){
  require_once "../lang/bg.inc";
}

}

?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Mews</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
  <style>
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
  </style>
</head>
<body>
  <div class="navbar-fixed">
    <nav class="white">
      <div class="nav-wrapper">
        <a id="logo-container" href="" class="brand-logo"><img src="../img/logo/logo.png" width="190px" height="auto" /></a>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <?php if(isset($_SESSION['email'])):?>
            <li><a href="?lang=fr"><img width="35px" src="../img/flag/fr.png"></a></li>
            <li><a href="?lang=en"><img width="38px" src="../img/flag/en.png"></a></li>
            <li><a href="?lang=bg"><img width="40px" src="../img/flag/bg.png"></a></li>
            <li><a href="../page.php"><?php echo _FIL; ?></a></li>
            <li><a href="../favori.php"><?php echo _FAV; ?></a></li>
            <li><a class="deco" href="../model/logout.php"><?php echo _DECONNEXION; ?></a></li>
          </ul>
        <?php else: ?>
          <li><a href="?lang=fr"><img width="35px" src="../img/flag/fr.png"></a></li>
          <li><a href="?lang=en"><img width="38px" src="../img/flag/en.png"></a></li>
          <li><a href="?lang=bg"><img width="40px" src="../img/flag/bg.png"></a></li>

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
</ul>
<?php else: ?>

<ul id="nav-mobile" class="side-nav">
  <li><a href="#modalInscription"><?php echo _INSCRIPTION; ?></a></li>
  <li><a href="#modalConnexion"><?php echo _CONNEXION; ?></a></li>
</ul>
<?php endif; ?>


<main>
<div class="container">
  <div class="row">
    <div class="col s12">
<p class="center-align"><?php echo _QMEWS; ?></p>

<?php echo _TEXTFAQ; ?></div>
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
    <li><a class="white-text" href="apropos.php"><?php echo _ABOUT; ?></a></li>
    <li><a class="white-text" href="FAQ.php"><?php echo _FAQ; ?></a></li>
    <li><a class="white-text" href="mentionslegales.php"><?php echo _MENTION; ?></a></li>
    <li><a class="white-text" href="conditions.php"><?php echo _USE; ?></a></li>
  </ul>
</div>
</div>
</div>
<div class="footer-copyright">
<div class="container">

</div>
</div>
</footer>
</body>
</html>
