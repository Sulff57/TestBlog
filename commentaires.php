<?php session_start();
require('verif_session.php');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="css/commentaires.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Commentaires du billet</title>
</head>

<?php
  require('connexion_bdd.php');
  require('afficher_billet_seul.php');
?>
<body>
  <div class="container">
    <?php include('html_parts/header.php');

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
afficher_billet_seul($req);?>
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
$rows = $req2->fetchAll();
// On indique le nombre de commentaires qu'on obtient à partir du nombre de champs
// retournés

    ?><h5 id="bandeau_commentaires"><span class="align-middle" id="contenu_bandeau"><i class="far fa-comments"></i><?php echo ' ' . count($rows); ?> commentaires</span></h5><?php


if (count($rows) == 0) // !!! A MODIFIER : SI PAS DE COMMENTAIRES EXISTANTS PROVOQUE UNE FAUSSE ERREUR
{
  echo("Erreur: numéro de billet invalide.");
}
else
{
  ?><aside class="commentaires"><?php
  foreach ($rows as $row)
  {
    ?><div class="row mx-2"><?php
        if (file_exists('uploads/avatars/' . $row['id_auteur'] . '.png'))
        {
          // echo '<b class="col-lg-1">' . htmlspecialchars($row['pseudo']) .
          echo '<div class="col-lg-1" id="avatar"><img class="avatar_pseudo" src="uploads/avatars/' . $row['id_auteur'] . '.png"></div>';
          echo '<div class="row" id="texte_apres_avatar">';
          echo '<div class="col-lg-12" id="bandeau_pseudo">';
          echo '<span class="pseudo_commentaire font-weight-bold">';
          echo $row['pseudo'];
          echo '</span>';
          echo '<span class="date_commentaire">';
          echo ' - le ' . $row['date_jour'] . ' à ' . $row['date_heure'];
          echo '</span>';
          echo '</div>';
          // . "<br />";
        }
        else
        {
          // echo '<b class="col-lg-1">' . htmlspecialchars($row['pseudo']) .
          // '<img class="avatar_pseudo" src="uploads/avatars/no_avatar.jpeg"></b>le ' . $row['date_jour']
          // . ' à ' . $row['date_heure']
          // . "<br />";
        }
          echo '<div class="col-lg-12 commentaire_contenu">' . htmlspecialchars($row['commentaire']) . '</div>';
          echo '</div>';
          ?>
      </div>
    <?php
  }
  ?></aside><?php
}?>

<!-- On fait passer l'id du billet en paramètre caché pour
pouvoir y insérer le commentaire également renvoyé dans celui-ci-->
<?php
  if (!verif_session()){
    ?><form id="form_poster_commentaire" action="commentaires_post.php" method="post">
      <div class="row mx-2" id="div_commentaire_no_login">
        <div class="col-lg-1" id="no_avatar_no_login">
          <img src="uploads/avatars/no_avatar.jpeg" id="no_avatar_img" alt="pas d'avatar"/>
        </div>
        <div class="col-lg-10">
          <div class="row">
            <label class="col-lg-12" id="label_no_login">Votre commentaire :</label>
            <textarea class="col-lg-12" name="commentaire" id="commentaire_no_login" rows="2" disabled>Pour poster un commentaire, vous devez vous identifier.</textarea>
          </div>
        </div>
      </div>



      <input type="submit" value="Connexion">
    </form><?php
  }
  else{
    ?>      <input type="hidden" id="id_news" name="id_news" value="<?php echo $id_news; ?>"><?php
  }?>
  </div>

    <?php require('html_parts/charger_CDN_bootstrap.html');?>
</body>
</html>
