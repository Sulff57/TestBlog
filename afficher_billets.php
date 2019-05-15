<?php
require('compter_nb_commentaires_billet.php');
function afficher_billets($req)
{
?><article class="row"><?php
  while ($billet = $req->fetch()) {
    $contenu_news = htmlspecialchars($billet['contenu']);
    $id_news = htmlspecialchars($billet['id']);
    $titre_billet = htmlspecialchars($billet['titre']);?>

    <div class="col-md-6" onclick="document.location='commentaires.php?id_news=<?php echo $id_news;?>'">
      <div class="row">
        <div class="col-md-12" id="col_container">
          <div id="container_article" class="overflow-hidden">
            <img class="illustrations_articles" alt="Illustration article" src="uploads/articles/illustrations/<?php echo $id_news; ?>.jpg" />
            <div class="col-md-12" id="div_titres_billets"><?php
              echo '<p id="ligne_titre_billet" class="overflow-hidden">';
              echo '<span id="titre_article"><b>' . $titre_billet . '</b></span>';
              echo '</p>';?>
            </div>
            <div class="news col-md-12" id="div_contenu_article">
                <?php
                // echo "<i> le " . htmlspecialchars($billet['date_jour'])
                // . ' à ' . htmlspecialchars($billet['date_heure'])
                // . "</i><br />"; ?>
              <p id="paragraphe_article" >
                <?php
                  echo '<span id="contenu_article" >' . (substr($contenu_news, 0, 150) . "..." . "<br />") . '</span>';
                ?>
              </p>
            </div>
            <span id="articles_icones" class="col-lg-12">
              <i class="fas fa-clock">
              </i>
              <span id="date_heure_billet"><?php
              echo "Le " . htmlspecialchars($billet['date_jour'])
             . ' à ' . htmlspecialchars($billet['date_heure'])?>
              </span>
              <span id="nombre_commentaires_billet" class="float-right">
                <i class="fas fa-comments">
                </i>
                <?php
                echo compterNbCommentairesBillet($id_news);?>
              </span>


            </span>

          </div>
        </div>

      </div>
    </div>
    <?php
  }
  ?></article><?php
}
?>
