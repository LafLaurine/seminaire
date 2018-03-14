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

<p style="text-align:center">Qu’est ce que Mews ?</p>

<p style="text-align:justify">Mews est une plateforme d’information créée en 2018.  Elle regroupe un grand nombre d’articles sur tous les sujets d’actualité. Avec Mews, vous êtes au centre de l’information. C’est vous qui choisissez les articles que vous voulez lire. Ainsi, votre fil d’actualité et constamment mis à jour en fonction de vos préférences. 
</p>

<p style="text-align:center">Comment me connecter sur Mews ?</p>

<p style="text-align:justify">Vous possédez déjà un compte Mews
    Si vous possédez déjà un compte sur Mews, il vous suffit de cliquer sur le bouton “Me connecter” en haut à droite. Vous devez ensuite entrer votre identifiant et votre mot de passe dans les champs prévus à cet effet.
Vous ne possédez pas de compte Mews
    Si vous ne possédez pas de compte sur Mews, il vous suffit de cliquer sur le bouton “M’inscrire”. Plusieurs informations vous seront ensuite demandées telles que votre nom, prénom, adresse mail et mot de passe. Un mail vous sera envoyé pour confirmer la création de votre compte.
</p>


<p style="text-align:center">Comment modifier mon fil d’actualités ?</p>

<p style="text-align:justify">
    Afin de modifier votre fil d'actualité, vous êtes invité à cliquer sur l'engrenage. Au clique de celui-ci, vous pourrez activer ou désactiver un flux en cliquant sur le bouton situé à droite du nom du flux.
    Il y est aussi indiqué de quel catégorie et de quelle langue est issu un flux.
</p>

<p style="text-align:center">Je ne me souviens plus de mes identifiants, me permettant de me connecter</p>

<p style="text-align:justify">
Si vous ne vous souvenez plus de vos identifiants,  il vous sera demandé d'inscrire votre adresse mail avec laquelle vous vous êtes inscrits. Puis un mail de : wearemews@hotmail.com vous sera envoyé, afin de vous rappeler votre mot de passe. 
</p>

<p style="text-align:center">Vous avez constaté un fonctionnement anormal ?</p>

<p style="text-align:justify">
Malgré les mises à jour constantes du site, il est possible qu’un petit dysfonctionnement intervienne. Si vous constatez le moindre problème ou dysfonctionnement, n’hésitez pas à nous le signaler à l’adresse suivante : wearemews@hotmail.com. Tous vos retours et signalements nous seront très utiles afin d’améliorer nos services.
</p>

<p style="text-align:center">Vous avez constaté un fonctionnement anormal ?</p>

<p style="text-align:justify">
Malgré les mises à jour constantes du site, il est possible qu’un petit dysfonctionnement intervienne. Si vous constatez le moindre problème ou dysfonctionnement, n’hésitez pas à nous le signaler à l’adresse suivante : wearemews@hotmail.com. Tous vos retours et signalements nous seront très utiles afin d’améliorer nos services.
</p>

<p style="text-align:center">Je souhaite supprimer mon compte</p>

<p style="text-align:justify">
Si vous souhaitez supprimer définitivement votre compte, vous devez envoyer un mail à l’adresse suivante : wearemews@hotmail.com. Une confirmation vous sera envoyée presque immédiatement sur l'adresse email reliée à votre compte.</p>

</body>
</html>