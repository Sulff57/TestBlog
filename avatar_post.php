<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <title>Enregistrement d'un avatar</title>
</head><?php

// Connexion à la BDD et vérification de la validité session courante
require('connexion_bdd.php');
require('verif_session.php');
require('fonctions/adapt_img_avatar.php');

// Traitement du fichier envoyé

// Vérification de la présence du fichier et de l'absence d'erreur
if (isset($_FILES['fichier_avatar']) AND $_FILES['fichier_avatar']['error'] == 0)
{
  // Vérification que le poids du fichier n'excède pas la limite autorisée
  if ($_FILES['fichier_avatar']['size'] <= 10000000)
  {
    // On crée un tableau d'informations systèmes sur le fichier à partir de son chemin d'accès
    $infosFichier = pathinfo($_FILES['fichier_avatar']['name']);
    // On extrait de ce tableau son extension
    $extensionFichier = $infosFichier['extension'];
    // On définit les extensions autorisées
    $extensionsAutorisees = array('jpg', 'jpeg', 'gif', 'png');
    // Si celle du fichier en fait partie, on "valide" celui-ci et on l'enregistre
    if (in_array($extensionFichier, $extensionsAutorisees))
    { // mémo : basename($_FILES['fichier_avatar']['name'] = chemin d'accès local complet
      $destinationAvatarOriginal = ('uploads/avatars/' . $_SESSION['id'] . '_original_size.' . $extensionFichier);
      move_uploaded_file($_FILES['fichier_avatar']['tmp_name'], $destinationAvatarOriginal);
      adapt_img_avatar($destinationAvatarOriginal, 200, $extensionFichier);
      echo "L'envoi a bien été effectué.";
      header('Refresh: 3; profil.php');
    }
  }
}
