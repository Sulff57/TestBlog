<?php

function afficher_billets($req)
{
  while ($billet = $req->fetch()) {?>
    <article>
      <div class="news">
        <h3>
          <?php echo htmlspecialchars($billet['titre'])
          . " le " . htmlspecialchars($billet['date_jour'])
          . ' à ' . htmlspecialchars($billet['date_heure'])
          . "<br />"; ?>
        </h3>
        <p>
          <?php
            $id_news = htmlspecialchars($billet['id']);
            echo htmlspecialchars($billet['contenu']) . "<br />";
            echo '<a href="commentaires.php?id_news=' . $id_news . ' ">Commentaires</a>';
          ?>
        </p>
      </div>
    </article>
    <?php
  }
}
?>
