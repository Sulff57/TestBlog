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

// récupération des données POST
try {
  if ( ($_POST['pseudo']) && ($_POST['password']) )
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
  }
  else {
    throw new Exception('Erreur lors de la récupération des données du formulaire de la page précédente.');
  }
} catch (Exception $e) {
  exit($e->getMessage());
}


// Requête pour récupérer les informations dans la BDD

try {
  $req = $db_session->prepare('
  SELECT id, pseudo, password
  FROM membres
  WHERE pseudo = ?
  '
  );
  $req->execute(array($pseudo));
} catch (Exception $e) {
  exit('Erreur d\'exécution de la requête SQL. <br/>
  Message :<br/>' .
  $e->getMessage());
}

$resultat = $req->fetch();

$mdpVerif = password_verify($password, $resultat['password']);

if ( (!$mdpVerif) || (!$resultat) ){
  echo "Mauvais identifiant ou mot de passe.";
}
else
{
  $_SESSION['id'] = $resultat['id'];
  $_SESSION['pseudo'] = $resultat['pseudo'];
  $_SESSION['hashMdp'] = $resultat['password'];
  echo "Vous êtes connecté.";
  if (isset($_POST['stay_connected']))
  {
    setcookie('id', $_SESSION['id'], time() + 7*24*3600, null, null, false, true);
    setcookie('pseudo', $_SESSION['pseudo'], time() + 7*24*3600, null, null, false, true);
    setcookie('hashMdp', $_SESSION['hashMdp'], time() + 7*24*3600, null, null, false, true);
  }
  header('Location: index.php');
}
?>
