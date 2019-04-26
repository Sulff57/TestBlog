<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <title>Connexion membre</title>
</head>

<form action="connexion_post.php" method="post">
  <p>
    <label for="pseudo">Pseudo :</label><br/>
    <input type="text" name="pseudo" id="pseudo" /><br/>
    <label for="password">Mot de passe :</label><br/>
    <input type="password" name="password" id="password" /><br/>
    <label for="stay_connected">Rester connecté ?</label><br/>
    <input type="checkbox" name="stay_connected" id="stay_connected" /><br/>
    <input type="submit"/>
  </p>
</form>
