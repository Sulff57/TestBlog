<?php
function afficher_billets($req)
{
?><article class="row"><?php
  while ($billet = $req->fetch()) {
    $contenu_news = htmlspecialchars($billet['contenu']);
    $id_news = htmlspecialchars($billet['id']);
    $titre_billet = htmlspecialchars($billet['titre']);?>

    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <img class="illustrations_articles rounded" alt="Illustration article" src="uploads/articles/illustrations/<?php echo $id_news; ?>.jpg" />
        </div>
        <div class="news col-md-12">
            <?php
            // echo "<i> le " . htmlspecialchars($billet['date_jour'])
            // . ' à ' . htmlspecialchars($billet['date_heure'])
            // . "</i><br />"; ?>
          <p id="paragraphe_article" class="col-lg-12 overflow-hidden" onclick="document.location='commentaires.php?id_news=<?php echo $id_news;?>'">
            <?php
              echo '<b class="titres_billets">' . $titre_billet . '</a></b><br />';
              echo '<span id="contenu_article" >' . (substr($contenu_news, 0, 800) . "..." . "<br />") . '</span>';
            ?>
          </p>
        </div>
      </div>
    </div>
    <?php
  }
  ?></article><?php
}
?>
