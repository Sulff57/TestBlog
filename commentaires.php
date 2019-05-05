<?php session_start();
require('verif_session.php');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/commentaires.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Commentaires du billet</title>
</head>

<?php
  require('connexion_bdd.php');
  require('afficher_billets.php');
?>
<body>
  <div class="container">
    <header class="row">
      <div class="col-lg-12">
        <?php include('html_parts/header.php');?>
      </div>
    </header>
<?php

try {
  if ($_GET['id_news']) //rajouter condition pour verifier si id news existante avant d'afficher
  {
    $id_news = htmlspecialchars($_GET['id_news']);
  }
  else {
    throw new Exception('Erreur : numéro de billet invalide.');
  }
} catch (Exception $e) {
  exit($e->getMessage());
}

try {
  $req = $db_session->prepare('
  SELECT id, titre, contenu, source,
  DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_jour,
  DATE_FORMAT(date_creation, "%Hh%imin%ss") AS date_heure
  FROM billets
  WHERE id = ?'
  );
  $req->execute(array($id_news));
  if (!$req) {
    throw new Exception('La requête est nulle.');
  }
} catch (Exception $e) {
  exit('Erreur d\'exécution de la requête SQL. <br/>
  Message :<br/>' .
  $e->getMessage());
}
?><section><?php
afficher_billets($req);?>
</section><?php

try {
  $req2 = $db_session->prepare('
  SELECT c.id_auteur, c.commentaire, m.pseudo,
  DATE_FORMAT(c.date_commentaire, "%d/%m/%Y") AS date_jour,
  DATE_FORMAT(c.date_commentaire, "%Hh%imin%ss") AS date_heure
  FROM commentaires c
  INNER JOIN membres m
  ON c.id_auteur = m.id
  WHERE c.id_billet = ?'
  );
  $req2->execute(array($id_news));
  if (!$req2) {
    throw new Exception('La requête est nulle.');
  }

} catch (Exception $e) {
  exit('Erreur d\'exécution de la requête SQL. <br/>
  Message :<br/>' .
  $e->getMessage());
}

    ?><h2>Commentaires</h2><?php

$rows = $req2->fetchAll();
if (count($rows) == 0) // !!! A MODIFIER : SI PAS DE COMMENTAIRES EXISTANTS PROVOQUE UNE FAUSSE ERREUR !!!
{
  echo("Erreur: numéro de billet invalide.");
}
else
{
  ?><aside class="commentaires row"><?php
  foreach ($rows as $row)
  {
    ?><div class="col-lg-12">
        <p class="row"><?php
        if (file_exists('uploads/avatars' . $row['id_auteur'] . '.png'))
        {
          echo '<b class="col-lg-1">' . htmlspecialchars($row['pseudo']) .
          '<img class="avatar_pseudo" src="uploads/avatars/' . $row['id_auteur'] . '.png"></b> le ' . $row['date_jour']
          . ' à ' . $row['date_heure']
          . "<br />";
        }
        else
        {
          echo '<b class="col-lg-1">' . htmlspecialchars($row['pseudo']) .
          '<img class="avatar_pseudo" src="uploads/avatars/no_avatar.jpeg"></b> le ' . $row['date_jour']
          . ' à ' . $row['date_heure']
          . "<br />";
        }
          echo htmlspecialchars($row['commentaire']) . "\n\n\n\n";
          ?>
        </p>
      </div>
    <?php
  }
  ?></aside><?php
}
?>

<!-- On fait passer l'id du billet en paramètre caché pour
pouvoir y insérer le commentaire également renvoyé dans celui-ci-->
    <form action="commentaires_post.php" method="post">
      <p>
        <label for="commentaire">Votre commentaire :</label></br>
        <textarea name="commentaire" id="commentaire" rows="5" cols="50" <?php
          // Si session invalide, on grize la zone de commentaires et on affiche le message correspondant à l'intérieur.
          if (!verif_session()) { echo "disabled>Pour poster un commentaire, vous devez vous identifier."; }
          // Sinon, on referme simplement la balise <textarea>
          else { echo ">"; }
        ?></textarea><br />
        <input type="hidden" id="id_news" name="id_news" value="<?php echo $id_news; ?>">
        <input type="submit" value="Envoyer" <?php
          // Si session invalide, on désactive le bouton de soumission de formulaire.
          if (!verif_session()) { echo "disabled"; } ?>/>
      </p>
    </form>
  </div>
</body>
</html>
