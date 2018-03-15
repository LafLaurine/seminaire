
<?php

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "fr";
  require_once "lang/fr.inc";
}


if(isset($_GET['lang']) && $_GET['lang'] == "fr"){
  $_SESSION['lang'] = "fr";
  require_once "lang/fr.inc";
}else if(isset($_GET['lang']) && $_GET['lang'] == "en"){
  $_SESSION['lang'] = "en";
  require_once "lang/en.inc";
}else if(isset($_GET['lang']) && $_GET['lang'] == "bg"){
    $_SESSION['lang'] = "bg";
    require_once "lang/bg.inc";
}

if(!isset($_GET['lang'])){
if(isset($_SESSION['lang']) && $_SESSION['lang']=='fr'){
  require_once "lang/fr.inc";
  }

if(isset($_SESSION['lang']) && $_SESSION['lang']=='en'){
  require_once "lang/en.inc";
}

if(isset($_SESSION['lang']) && $_SESSION['lang']=='bg'){
  require_once "lang/bg.inc";
}

}
 ?>
