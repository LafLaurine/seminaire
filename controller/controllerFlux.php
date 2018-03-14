<?php 

require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/model/flux.class.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/model/connexion.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerArticles.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerFlux{
  
    private $_articlesController;

    public function __construct() {

        $this->_articlesController=new ControllerArticles();
    }

    public function addDefaultFlux()
    {
        $list = $this->getDefaultFlux();
        $db = connectBd();

        for($i=0;$i<6;$i++)
        {
            $req = $db->prepare("INSERT INTO flux_user SELECT :id_flux,:id_user");
            $req->bindParam("id_flux",$list[$i]->id);
            $req->bindParam("id_user",$_SESSION["id_user"]);
            $req->execute();
        }
    }

    public function getDefaultFlux()
    {
        $list = array();
        $db = connectBd();
        $req = $db->prepare("SELECT * FROM flux LIMIT 6");
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $flux = new Flux($data['id_flux'],$data['titre'],$data['url'],$data['type'],$data['uri']);
            array_push($list,$flux);
        }

        return $list;
    }

    public function getAllFlux()
    {
        $list = array();
        $db = connectBd();
        $req = $db->prepare("SELECT flux.*,categorie.* FROM flux JOIN cat_flux ON cat_flux.id_flux=flux.id_flux JOIN categorie ON categorie.id_cat=cat_flux.id_cat");
        $req->execute();
        
        while($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
                $flux = new Flux($data['id_flux'],$data['titre'],$data['url'],$data['type'],$data['uri']);
                $list[$data['uri']]=$flux;
                //array_push($list,$flux);

                $flux->langue=$data['langue'];
                $flux->category=new Categorie($data['id_cat'],$data['nom_cat']);

                if (in_array($data['uri'],$this->getAllActifFluxURI()))
                {   
                    $flux->actif=true;
                }
        }

        return $list;
    }

    public function getAllActifFlux()
    {
        $list = array();
        $db = connectBd();
        $req = $db->prepare("SELECT flux.*,categorie.* FROM flux_user JOIN flux ON flux.id_flux=flux_user.id_flux JOIN cat_flux ON cat_flux.id_flux=flux.id_flux JOIN categorie ON categorie.id_cat=cat_flux.id_cat WHERE id_user=:id");
        $req->bindParam("id",$_SESSION["id_user"]);
        $req->execute();
       
        while($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
                $flux = new Flux($data['id_flux'],$data['titre'],$data['url'],$data['type'],$data['uri']);
                $list[$data['uri']]=$flux;

              
                //array_push($list,$flux);
                
                $flux->langue=$data['langue'];
                $flux->category=new Categorie($data['id_cat'],$data['nom_cat']);
                $flux->actif=true;
        }

        return $list;
    }

    public function getAllActifFluxURI()
    {
        $list = array();
        $db = connectBd();
        $req = $db->prepare("SELECT uri FROM flux_user JOIN flux ON flux.id_flux=flux_user.id_flux WHERE id_user=:id");
        $req->bindParam("id",$_SESSION["id_user"]);
        $req->execute();
        
        while($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
                array_push($list,$data['uri']);
        }

        return $list;
    }

    public function getFluxByURI($uri)
    {
        $db = connectBd();
        $req = $db->prepare("SELECT DISTINCT * FROM flux WHERE uri=:uri");
        $req->bindParam("uri",$uri);
        $req->execute();

        $flux = null;

        if($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $flux = new Flux($data['id_flux'],$data['titre'],$data['url'],$data['type'],$data['uri']);
            
                /*$flux->langue=$data['langue'];
                $flux->cat=new Categorie($data['id_cat'],$data['cat']);*/
        }

        return $flux;
    }

    public function addFluxForUser($uri)
    {
        $list = $this->getAllActifFlux();

        if(count($list)>=6)
        {
            return null;
        }

        $flux = $this->getFluxByURI($uri);
        //print_r($flux);

        if(!is_null($flux))
        {
            $db = connectBd();
            $req = $db->prepare("INSERT INTO flux_user SELECT :id_flux,:id_user");
            $req->bindParam("id_flux",$flux->id);
            $req->bindParam("id_user",$_SESSION["id_user"]);
            $req->execute();

            return $flux;
        }
        
        return null;
    }

    public function removeFluxForUser($uri)
    {
        $flux = $this->getFluxByURI($uri);
        $list = $this->getAllActifFlux();

        if(!is_null($flux) && count($list)>1)
        {
            $db = connectBd();
            $req = $db->prepare("DELETE FROM flux_user WHERE id_flux=:id_flux AND id_user=:id_user");
            $req->bindParam("id_flux",$flux->id);
            $req->bindParam("id_user",$_SESSION["id_user"]);
            $req->execute();
        }
    }

    public function getMotclef(){
        $db = connectBd();
        $list = array();
        $req= $db->prepare("SELECT mot_clef FROM mot_clef GROUP BY mot_clef ORDER BY COUNT(*) DESC LIMIT 10");
        $req->execute();
        while($keyword = $req->fetch(PDO::FETCH_ASSOC))
        {
        $data = $keyword['mot_clef'];
        array_push($list,$data);
        }
  
        return $list;
      }
  
      public function getFavoriteArticle(){
        $db = connectBd();
        $list = array();
        $req= $db->prepare("SELECT titre FROM article INNER JOIN favori ON article.id_article = favori.id_article GROUP BY favori.id_article ORDER BY COUNT(favori.id_article) DESC LIMIT 10");
        $req->execute();
        while($favArticle = $req->fetch(PDO::FETCH_ASSOC))
        {
        $data = $favArticle['titre'];
        array_push($list,$data);
        }
  
        return $list;
      }
  
  }
   


?>