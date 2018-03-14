<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerFlux.php';

header('Content-Type: text/html; charset=utf-8');


$controller = new ControllerFlux();
$articlesController = new ControllerArticles();

    //GET
    if(isset($_GET['data']))
    {
        if($_GET['data']=="flux_list")
        {
            header('Content-Type: application/json');
            echo json_encode($controller->getAllFlux());
        }
        else if($_GET['data']=="flux_list_actif")
        {
            header('Content-Type: application/json');
            echo json_encode($controller->getAllActifFlux());
        }
        else if($_GET['data']=="flux" AND isset($_GET['flux']))
        {
            $flux = $controller->getFluxByURI($_GET['flux']);
            $flux_uri = $_GET["flux"];
            $articles = $articlesController->getArticlesFromFlux($flux);

            /* POUR CHAQUE ARTICLE : url -> article */

            include($_SERVER['DOCUMENT_ROOT']. '/seminaire/articlesView.php');
        }
    }
    
    //POST
    else if(isset($_POST['flux']) && isset($_POST['action']))
    {
        if($_POST['action']=='delete')
        {
            $controller->removeFluxForUser($_POST['flux']);
        }
        else if($_POST['action']=='add')
        {
            $flux = $controller->addFluxForUser($_POST['flux']);

            if($flux != null)
            {
                $articles=$articlesController->getArticlesFromFlux($flux);

                /* POUR CHAQUE ARTICLE : url -> article */

                $flux_uri = $_POST["flux"];
                include($_SERVER['DOCUMENT_ROOT']. '/seminaire/fluxFullView.php');
            }
            else{
                header(':', true, 404);
                header('X-PHP-Response-Code: 404', true, 404);
            }
           
        }
}
?>