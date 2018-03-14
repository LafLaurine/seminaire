<?php

require_once('controller/controllerArticles.php');

$articlesController = new ControllerArticles();

    //POST
    if(isset($_POST['article']) && isset($_POST['keywords']))
    {
        $articlesController->archiverArticle($_POST['article'],$_POST['keywords']);
    }

?>
