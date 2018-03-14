<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/model/flux.class.php';
class Article
{
    public $titre;
    public $author;
    public $description;
    public $url;
    public $urlToImage;
    public $date;
    public $uniq;
    public $fav;
    public $id_flux;

    public function __construct($titre, $desc,$url) {
        $this->titre = $titre;
        $this->description = $desc;
        $this->url = $url;
    }
}

?>
