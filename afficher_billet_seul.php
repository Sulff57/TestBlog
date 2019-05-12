<?php

function afficher_billet_seul($req)
{
  // Si on est sur la page d'accueil, on tronque l'article si celui-ci
  // est trop long est on rend le titre cliquable pour se rendre sur l'article
  // et on n'affiche pas la date et l'heure de publication
?><article class="row"><?php
  while ($billet = $req->fetch()) {
    $contenu_news = htmlspecialchars($billet['contenu']);
    $id_news = htmlspecialchars($billet['id']);
    $titre_billet = htmlspecialchars($billet['titre']);?>
    <div class="col-md-12">
      <img class="illustrations_articles rounded" alt="Illustration article" src="uploads/articles/illustrations/<?php echo $id_news; ?>.jpg" />
    </div>
    <div class="news col-md-12">
      <h2>
        <?php
          echo $titre_billet;
        // echo "<i> le " . htmlspecialchars($billet['date_jour'])
        // . ' à ' . htmlspecialchars($billet['date_heure'])
        // . "</i><br />"; ?>
      </h2>
      <p class="col-lg-12">
        <?php
          echo '<a id="contenu_article" href="commentaires.php?id_news=' . $id_news . ' ">' . $contenu_news . "..." . "<br />" . '</a>';
        ?>
      </p>
      </div>

    <?php
  }
  ?></article><?php
}
?>
