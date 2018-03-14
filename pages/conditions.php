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

<p style="text-align:center">Conditions d'utilisation :</p>

<p style="text-align:justify">Veuillez lire attentivement les conditions générales dʼutilisation avant d'utiliser le site <a href="http://international.iut-bobigny.univ-paris13.fr/iobc2018/mews/">http://international.iut-bobigny.univ-paris13.fr/iobc2018/mews/</a> 
En accédant et utilisant le site, vous signifiez votre accord à ces conditions générales d'utilisation dans leur intégralité.</p>

<p style="text-align:justify">Le site accessible par l'url suivant :  <a href="http://international.iut-bobigny.univ-paris13.fr/iobc2018/mews/">http://international.iut-bobigny.univ-paris13.fr/iobc2018/mews/</a> est exploité dans le respect de la législation français, qui implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles 
d’être modifiées ou complétées à tout moment, les utilisateurs du site Mews sont donc invités à les consulter de manière régulière. Mews ne saurait être tenu pour responsable en aucune manière d’une mauvaise utilisation du service. Ce site est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique 
peut être toutefois décidée par Mews, qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention. Mews s’efforce de fournir sur le site des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, 
qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.</p>


<p style="text-align:justify"><strong>Précautions d'usage</strong></p><br />

<p style="text-align:justify">Il vous incombe par conséquent de prendre les précautions d'usage nécessaires pour vous assurer que ce que vous choisissez d'utiliser ne soit pas entaché d'erreurs voire d'éléments de nature destructrice tels que virus, trojans..
Ce site est proposé en langages HTML5, CSS3, JavaScript et PHP. Pour un meilleur confort d'utilisation, nous vous recommandons de recourir à des navigateurs modernes comme Safari, Firefox, Chrome.
</p>

</body>
</html>