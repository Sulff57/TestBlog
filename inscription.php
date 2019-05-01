<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/inscription.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Page d'inscription</title>
</head>

<body>
  <div class="container">
    <section>
        <form action="inscription_post.php" method="post" class="form-mise-en-page form-horizontal" id="inscription" autocomplete="on">
          <div class="form-group">
            <legend>Création de votre compte</legend>
          </div>
          <div class="form-group">
            <label class="sr-only" for="pseudo">Pseudonyme</label>
            <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudonyme"/>
          </div>
          <div class="form-group">
            <label class="sr-only" for="mail">Votre email</label>
            <input type="text" name="mail" id="mail" class="form-control" placeholder="Votre email" autocomplete="off"/>
          </div>
          <div class="form-group">
            <label class="sr-only" for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" autocomplete="new-password"/>
          </div>
          <div class="form-group">
            <label class="sr-only" for="password_check">Confirmez votre mot de passe</label>
            <input type="password" name="password_check" id="password_check" class="form-control" placeholder="Confirmez votre mot de passe" autocomplete="off"/>
          </div>
          <div class="form-group">
            <button type="submit" class="button-connexion btn float-right" id="bouton_inscription">continuer</button>
          </div>
        </form>
      </class>
    </section>
  </div>
  <?php require('html_parts/charger_CDN_bootstrap.html'); ?>
</body>
