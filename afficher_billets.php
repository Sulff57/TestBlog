<?php

function afficher_billets($req, $pageAccueil=0)
{
  // Si on est sur la page d'accueil, on tronque l'article si celui-ci
  // est trop long est on rend le titre cliquable pour se rendre sur l'article
  // et on n'affiche pas la date et l'heure de publication

  while ($billet = $req->fetch()) {
    $contenu_news = htmlspecialchars($billet['contenu']);
    $id_news = htmlspecialchars($billet['id']);
    if (!$pageAccueil)
    {
      $source = htmlspecialchars($billet['source']);
    }?>
    <article class="row">
      <div class="col-md-2 d-none d-md-block">
        <img class="illustrations_articles" alt="Illustration article" src="uploads/articles/illustrations/<?php echo $id_news; ?>.jpg" />
      </div>
      <div class="news col-md-10">
        <h3>
          <?php if ($pageAccueil)
          {
            $titre_billet = htmlspecialchars($billet['titre']);
            echo '<a href="commentaires.php?id_news=' . $id_news . ' ">' . $titre_billet . '</a>';
          }
          else
          {
            echo htmlspecialchars($billet['titre']);
          }
          echo "<i> le " . htmlspecialchars($billet['date_jour'])
          . ' à ' . htmlspecialchars($billet['date_heure'])
          . "</i><br />"; ?>
        </h3>
        <p class="col-lg-12">
          <?php
            if ($pageAccueil)
            {
              if (strlen($contenu_news) > 300)
              {
                echo substr($contenu_news, 0, 300) . "..." . "<br />";
              }
              else
              {
                echo $contenu_news . "<br />";
              }
            }
            else
            {
              echo htmlspecialchars($billet['contenu']) . "<br />";
            }
            if ($pageAccueil)
            {
              echo '<a href="commentaires.php?id_news=' . $id_news . ' ">Commentaires</a>';
            }
            else
            {
              echo '<a href="' . $source . '">Voir l\'article complet (source)</a>';
            }
          ?>
        </p>
      </div>
    </article>
    <?php
  }
}
?>
