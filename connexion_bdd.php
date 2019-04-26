<?php
// Réglage du fuseau horaire
date_default_timezone_set('Europe/Paris');

// Gestion des erreurs afin d'éviter l'affichage des informations sensibles
try {
  if (extension_loaded('pdo')) {
    $db_session = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  else {
    throw new Exception('Merci d\'installer et/ou activer l\'extension "pdo_mysql"
    avant de lancer ce script.');
  }
} catch (PDOException $e) {
  exit('Erreur de connexion à la base de données. <br/>
  Message :<br/>' .
  $e->getMessage());
  exit();
}
?>
