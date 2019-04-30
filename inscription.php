<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Page d'inscription</title>
</head>

<body>
  <div class="container">
    <section>
      <class="row">
        <form action="inscription_post.php" method="post" class="form-mise-en-page col-lg-6 form-horizontal">
          <p>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" class="form-control"/>
            <label for="mail">Email :</label>
            <input type="text" name="mail" id="mail" class="form-control"/>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control"/>
            <label for="password_check">Répétez le mot de passe :</label>
            <input type="password" name="password_check" id="password_check" class="form-control"/>
            <br/>
            <input type="submit" class="form-control"/>
          </p>
        </form>
      </class>
    </section>
  </div>
  <?php require('html_parts/charger_CDN_bootstrap.html'); ?>
</body>
