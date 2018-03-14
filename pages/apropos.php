<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerFlux.php';

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Mews</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><img src="../img/logo/logo.png" width="190px" height="auto" /></a>
      <ul class="right hide-on-med-and-down">
        <?php if(isset($_SESSION['email'])):?>
        <li><a class="deco" href="../model/logout.php">Déconnexion</a></li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
        		<li><a href="../model/logout.php">Déconnexion</a></li>
            <?php else: ?>
   <li><a class="modal-trigger" href="#modalInscription">Inscription</a></li>
        <li><a class="modal-trigger" href="#modalConnexion">Connexion</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
		<li><a href="#modalInscription">Inscription</a></li>
        <li><a href="#modalConnexion">Connexion</a></li>
      </ul>

      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
      <?php endif; ?>
</nav>

<p style="text-align:center">A propos:</p>

<p style="text-align:justify">Créée en 2018, Mews est une plateforme spécialisée dans l’information. Tous les jours, nous choisissons les meilleures informations sur tous les sujets d’actualités : sports, business, science, people et plus encore ! 

Il est temps de révolutionner le monde de l’information, avec Mews, c’est vous qui choisissez vos sources et vos sujets.

Sur Mews, vous êtes au centre de l’information ! 
</p>

<p style="text-align:center">Qui sommes-nous ?</p>

<p style="text-align:justify">Mews a été développé par l’équipe internationale MTeam. 9 jeunes passionnées par le web et l’actualités. Infographistes, Développeurs web et Communicants travaillent ensemble afin de vous offrir un service de qualité. 
Dynamisme, créativité et qualité sont au coeur de notre projet ! 
</p>

</body>
</html>