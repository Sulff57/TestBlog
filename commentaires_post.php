<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <title>Commentaires du billet</title>
</head>

<?php
require('verif_session.php');

// On quitte la page si la session est invalide
if (!verif_session()) { exit('Veuillez d\'abord vous identifier.'); }

require('connexion_bdd.php');

// récupération des données POST
try {
  if ($_POST['id_news'])
  {
    $id_news = htmlspecialchars($_POST['id_news']);
  }
  else {
    throw new Exception('Erreur : numéro de billet invalide.');
  }
} catch (Exception $e) {
  exit($e->getMessage());
}


$pseudo = htmlspecialchars(verif_session());
$com = htmlspecialchars($_POST['commentaire']);

// Requête pour envoyer les infos dans la BDD
try {
  $req = $db_session->prepare('
  INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire)
  VALUES(:id_news, :pseudo, :com, NOW())
  '
  );
  $req->execute(array('id_news' => $id_news, 'pseudo' => $pseudo, 'com' => $com));
  if (!$req) {
    throw new Exception('La requête est nulle.');
  }
} catch (Exception $e) {
  exit('Erreur d\'exécution de la requête SQL. <br/>
  Message :<br/>' .
  $e->getMessage());
}


header('Location: commentaires.php?id_news=' . $id_news);
