<?php session_start(); ?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex" />
      <link rel="stylesheet" href="../style.css">
      <link rel="stylesheet" href="../css/ajouter_billet.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <title>Ajouter un billet</title>
  </head>

<body><?php

require('../verif_session.php');
require('../fonctions/adapt_illustration.php');

// On quitte la page si la session est invalide
if (!verif_session()) { exit('Veuillez d\'abord vous identifier.'); }

require('../connexion_bdd.php');

// Récupération des données POST (texte)
try {
  if ( ($_POST['contenu_billet']) && ($_POST['titre_billet']) && ($_POST['source_billet']) && ($_FILES['illustration_billet']) && ($_FILES['illustration_billet']['error'] == 0))
  {
    $contenu_billet = htmlspecialchars($_POST['contenu_billet']);
    $titre_billet = htmlspecialchars($_POST['titre_billet']);
    $source_billet = htmlspecialchars($_POST['source_billet']);

  }
  else {
    throw new Exception('Erreur lors de la récupération ou du traitement des informations du formulaire. Veuillez réessayer.');
  }
} catch (Exception $e) {
  exit($e->getMessage());
}



// Requête pour envoyer les infos dans la BDD
// Elle doit être faite avant la requête pour connaître l'ID du billet
// car l'incrémentation automatique de mysql ignore les billets effacés
// (donc on ne peut pas "deviner" l'id qui sera créé et qui servira pour le nom du fichier d'illustration)

try {
  $req = $db_session->prepare('
  INSERT INTO billets(titre, contenu, date_creation, source)
  VALUES(:titre, :contenu, NOW(), :source)
  '
  );
  $req->execute(array('titre' => $titre_billet, 'contenu' => $contenu_billet, 'source' => $source_billet));
  if (!$req) {
    throw new Exception('La requête est nulle.');
  }
} catch (Exception $e) {
  exit('Erreur d\'exécution de la requête SQL. <br/>
  Message :<br/>' .
  $e->getMessage());
}

// Requête pour connaître l'ID du billet (qui doit être le nom du fichier d'illustration *.jpg pour faire le lien)
try {
  $id_news = $db_session->query('
  SELECT MAX(id)
  FROM billets
  '
  );
  if (!$id_news) {
    throw new Exception('La requête est nulle.');
  }
} catch (Exception $e) {
  exit('Erreur d\'exécution de la requête SQL. <br/>
  Message :<br/>' .
  $e->getMessage());
}

$id_news = $id_news->fetch();
$id_news = $id_news[0];

// Traitement des données POST (fichiers) => illustration article

// Vérification que le poids du fichier n'excède pas la limite autorisée
if ($_FILES['illustration_billet']['size'] <= 10000000)
{
  // On crée un tableau d'informations systèmes sur le fichier à partir de son chemin d'accès
  $infosFichier = pathinfo($_FILES['illustration_billet']['name']);
  // On extrait de ce tableau son extension
  $extensionFichier = $infosFichier['extension'];
  // On définit les extensions autorisées
  $extensionsAutorisees = array('jpg', 'jpeg', 'gif', 'png');
  // Si celle du fichier en fait partie, on "valide" celui-ci et on l'enregistre
  if (in_array($extensionFichier, $extensionsAutorisees))
  { // mémo : basename($_FILES['fichier_avatar']['name'] = chemin d'accès local complet
    $destinationIllustrationOriginale = ('../uploads/articles/illustrations/' . $id_news . '_original_size.' . $extensionFichier);
    move_uploaded_file($_FILES['illustration_billet']['tmp_name'], $destinationIllustrationOriginale);
    adapt_illustration($destinationIllustrationOriginale, $id_news, $extensionFichier);
  }
  else
  {
    exit('Erreur lors du traitement de l\'image d\'illustration.');
  }
}




echo "L'envoi a bien été effectué.";
header('Refresh: 3; ajouter.php');
