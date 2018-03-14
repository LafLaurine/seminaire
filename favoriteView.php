  <div class="container">
		<div class="row">
      <?php
      try{

      $db = connectBd();
        $req = $db->prepare("SELECT *,article.url as 'ArticleUrl' FROM favori JOIN article ON article.id_article=favori.id_article JOIN flux ON flux.id_flux=article.id_flux WHERE id_user=:id_user");
        $req->bindParam("id_user",$_SESSION["id_user"]);
        $req->execute();
        // var_dump($article = $req->fetchAll(PDO::FETCH_ASSOC));
        $article = $req->fetch(PDO::FETCH_ASSOC);

          if($article== null){
            ?>
              <div class="container">
                <div class="row">
                  <div class="col s12">
                    <h1>Vous n'avez pas encore d'article dans vos favoris</h1>
                    <a href="page.php">Retour vers le fil d'actualités</a>
                  </div>

                </div>
              </div>


            <?php

          }else{
              while( $article = $req->fetch(PDO::FETCH_ASSOC))
              {
                $image = ($article['urlToImage']);
                $a = $article['titre'];
                $description = $article['description'];
                $url = $article['ArticleUrl'];


    ?>
        <div class="col s12 m7">
            <h3 class="header"><?php echo $a; ?></h3>
            <div class="card horizontal">
              <?php if($image!=null): ?>
              <div class="card-image">
                <img src="https://lorempixel.com/100/190/nature/6">
              </div>
            <?php endif; ?>
              <div class="card-stacked">
                <div class="card-content">
                  <p><?php echo $description; ?></p>
                </div>
                <div class="card-action">
                  <a href="<?php echo $url; ?>">Lien vers l'article</a>
                </div>
              </div>
            </div>
          </div>


    <?php

      }
    }

        }
    catch (Exception $e)
    {
      $e->getMessage();
      echo $e;
  }

  ?>




      </div>
    </div>
