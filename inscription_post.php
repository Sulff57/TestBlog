<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<?php

require('connexion_bdd.php');
require('mail_verif.php');

// récupération des données POST
try {
  if ( ($_POST['pseudo']) && ($_POST['mail']) && ($_POST['password']) && ($_POST['password_check']) )
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $password_check = htmlspecialchars($_POST['password_check']);
  }
  else {
    throw new Exception('Erreur lors de la récupération des données du formulaire de la page précédente.');
  }
} catch (Exception $e) {
  exit($e->getMessage());
}

// Vérification de la validité des informations

if ( !((verifierMail($mail)) && ($password == $password_check)) )
{
  exit("Informations invalides.");
}

$passwordHache = password_hash($password, PASSWORD_DEFAULT);

// Requête pour envoyer les infos dans la BDD
try {
  $req = $db_session->prepare('INSERT INTO membres(pseudo, mail, password) VALUES(:pseudo, :mail, :password)');
  $req->execute(array(
    'pseudo' => $pseudo,
    'mail' => $mail,
    'password' => $passwordHache));
} catch (Exception $e) {
  exit('Erreur d\'exécution de la requête SQL. <br/>
  Message :<br/>' .
  $e->getMessage());
}

header('Location: index.php');

?>
