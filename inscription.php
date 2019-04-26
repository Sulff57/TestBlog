<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <title>Page d'inscription</title>
</head>

<form action="inscription_post.php" method="post">
  <p>
    <label for="pseudo">Pseudo :</label><br/>
    <input type="text" name="pseudo" id="pseudo" /><br/>
    <label for="mail">Email :</label><br/>
    <input type="text" name="mail" id="mail" /><br/>
    <label for="password">Mot de passe :</label><br/>
    <input type="password" name="password" id="password" /><br/>
    <label for="password_check">Répétez le mot de passe :</label><br/>
    <input type="password" name="password_check" id="password_check" /><br/>
    <input type="submit"/>
  </p>
</form>
