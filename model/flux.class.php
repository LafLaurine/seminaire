<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/model/connexion.php';

class Categorie
{
    public $id;
    public $cat_name;

    public function __construct($id,$name) {
        $this->id=$id;
        $this->cat_name=$name;
    }
}

class Flux
{
    public $titre;
    public $url;
    public $type;
    public $actif;
    public $id;
    public $uri;
    public $langue;
    public $category;

    public function __construct($id,$titre, $url, $type,$uri) {
        $this->id=$id;
        $this->titre = $titre;
        $this->url = $url;
        $this->type = $type;
        $this->actif=false;
        $this->uri=$uri;
    }
}

?>