<?php 
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/model/article.class.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerArticles{
  
public function archiverArticle($uniq,$keywords)
{
    if(isset($_SESSION['articles'][$uniq]))
    {
        $article =$_SESSION['articles'][$uniq];
        $db = connectBd();

        $req = $db->prepare("SELECT * FROM article WHERE url=:url");
        $req->bindParam(":url",$article->url);
        $req->execute();
        
        $id = null;

        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        

        if(!$fetch)
        {
            $req = $db->prepare("INSERT INTO article VALUES (NULL,:id_flux,:titre,:urlToImage,:url,:desc,:author)");
            $req->bindValue("id_flux",$article->id_flux);
            $req->bindValue("titre",$article->titre);
            $req->bindValue("urlToImage",$article->urlToImage);
            $req->bindValue("url",$article->url);
            $req->bindValue("desc",$article->description);
            $req->bindValue("author",$article->author);
            $req->execute();

            $id=$db->lastInsertId();
        }
        else
        {
            $id=$fetch['id_article'];
        }

        $req2 = $db->prepare("INSERT INTO favori SELECT NULL,:id_article,:id_user");
        $req2->bindParam("id_article",$id);
        $req2->bindParam("id_user",$_SESSION['id_user']);
        $req2->execute();

        $id_fav=$db->lastInsertId();
        
        foreach($keywords as $keyword)
        {
            if(len(trim($keyword))>=1)
            {
                $id_keyword = null;

                $req = $db->prepare("SELECT * FROM mot_clef WHERE id_mot_clef=:keyword");
                $req->bindParam(":keyword",$keyword);
                $req->execute();

                $fetch = $req->fetch(PDO::FETCH_ASSOC);

                if(!$fetch)
                {
                    $req2 = $db->prepare("INSERT INTO mot_clef(mot_clef) VALUES (?)");
                    $req2->bindParam(1, $keyword);
                    $req2->execute();

                    $id_keyword=$db->lastInsertId();
                }
                else
                {
                    $id_keyword=$fetch['id_mot_clef'];
                }
                
                $req3= $db->prepare("INSERT INTO fav_mot_clef(id_favori,id_mot_clef) VALUES (?,?)");
                $req3->bindParam(1,$id_fav);
                $req3->bindParam(2, $id_keyword);
                $req3->execute();
            }
        }
    }
}

public function isArticleFav($url)
{
    $db = connectBd();
    $req = $db->prepare("SELECT * FROM favori JOIN article ON favori.id_article=article.id_article WHERE url=:url AND id_user=:id_user");
    $req->bindParam(":url",$url);
    $req->bindParam("id_user",$_SESSION['id_user']);
    $req->execute();

    $fetch = $req->fetch(PDO::FETCH_ASSOC);

    if($fetch)
    {
        return true;
    }

    return false;
}

  public function getArticlesFromFlux($flux)
  {
      $articles = array();

      if ($flux->type=="json")
      {
          $url = $flux->url;
          $var = file_get_contents($url); // contenu dans variable
          $result = json_decode($var, true); // décoder le JSON en Array     
          
          foreach ($result["articles"] as $articleNode)
          {
              $article = new Article($articleNode["title"],$articleNode["description"],$articleNode["url"]);
              $article->id_flux=$flux->id;  
              $article->author = $articleNode["author"];
              $article->urlToImage = $articleNode["urlToImage"];

              array_push($articles,$article);
              $uniq = $flux->uri."-".uniqid();

              $_SESSION["articles"][$uniq]=$article;
              $article->uniq = $uniq;
              $article->fav = $this->isArticleFav($article->url);
          }
      }
      else
      {
          $url = $flux->url;
          $xml = simpleXML_load_file($url,"SimpleXMLElement",LIBXML_NOCDATA);
      
           //Articles
      
           foreach($xml->channel->item as $valeur)
           {
              $article = new Article(
                (string)  $valeur->title,
                (string) $valeur->description,
                (string) $valeur->link
                );
                $article->id_flux=$flux->id;  
              $article->urlToImage = (string) $valeur->image->url;

              array_push($articles,$article);

                $uniq = $flux->uri."-".uniqid();

              $_SESSION["articles"][$uniq]=$article;
              $article->uniq = $uniq;
              $article->fav = $this->isArticleFav($article->url);
           }  
      }

      return $articles;
  }
}


?>