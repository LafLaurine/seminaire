<?php foreach($articles as $article): ?>

<div>
<h2 class="header"> <?php echo $article->titre?></h2>

    <div class="card horizontal">
      <div class="card-image">
        <img src="<?php echo $article->urlToImage?>">
      </div>
      <div class="card-stacked">
        <div class="card-content">
       
          <p>  <?php echo $article->description?></p>

      <?php if(!$article->fav) :?>
        <a class="waves-effect waves-light btn modal-trigger fav" href="#modal2" onclick="modalFav(<?php echo "&#39".$article->uniq."&#39;"?>)">Favori</a>
        <?php else: ?>
          <a class="waves-effect grey darken-3 btn fav">Déjà en favori</a>
      <?php endif;?>

        <div class="card-action">
          <a href="<?php echo $article->url?>"><?php echo $article->url?></a>
          <p>  <?php echo $article->author?></p>
        </div>
      </div>
    </div>
  </div>
    
<?php endforeach; ?>