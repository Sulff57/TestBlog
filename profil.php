<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/profil.css">
    <title>Modifier son profil</title>
</head>
<?php
require('connexion_bdd.php');
require('verif_session.php');
require('fonctions/avatar_existe.php');
?>
<header><?php require('html_parts/header.php'); ?></header>
<section>
  <div id="mon_profil">
    <div id="mon_avatar"><?php
      // On affiche l'avatar du membre s'il en a un, sinon une image par défaut
    ?></div><?php
    // On affiche la possibilité de définir et envoyer son avatar si une session est ouverte et valide
    if (verif_session())
    {
      if (avatar_existe())
      {
        echo '<img src="uploads/avatars/' . $_SESSION['id'] . '.jpg">';
      }
      else
      {
        echo '<img src="uploads/avatars/no_avatar.jpeg">';
      }
      echo '<form action="avatar_post.php" method="post" enctype="multipart/form-data">
        <p><h3>Définir votre avatar</h2></p>
        <input type="file" name="fichier_avatar" /><br />
        <input type="submit" value="Envoi" />
      </form>';
    }
    else
    {
      echo 'Erreur : vous n\'êtes pas connecté. Vous allez être redirigé vers la page de connexion.';
      header('Refresh: 5; connexion.php');
    }?>
  </div>
</section>
