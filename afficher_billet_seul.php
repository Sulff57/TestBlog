<?php

function afficher_billet_seul($req)
{
?><article class="row"><?php
    $billet = $req->fetch();
    $contenu_news = htmlspecialchars($billet['contenu']);
    $id_news = htmlspecialchars($billet['id']);
    $titre_billet = htmlspecialchars($billet['titre']);
    ?><div class="col-md-12">
      <h2>
      <?php echo $titre_billet;?>
      </h2>
    </div>
    <div class="col-md-12">
      <img class="illustrations_articles rounded" alt="Illustration article" src="uploads/articles/illustrations/<?php echo $id_news; ?>.jpg" />
    </div>
    <div class="news col-md-12">
        <!-- echo "<i> le " . htmlspecialchars($billet['date_jour'])
        . ' à ' . htmlspecialchars($billet['date_heure'])
        . "</i><br />"; -->
      <p>
        <?php
          echo $contenu_news;
      ?></p>
    </div>
  </article><?php
}
?>
