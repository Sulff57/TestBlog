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

<body>

  <div class="container"><?php

    require('../connexion_bdd.php');
    require('../verif_session.php');
    include('header_lvl.php');?>


      <div id="envoyer_billet" class="row">

        <h1 class="col-lg-12">Ajouter un nouveau billet</h1>

        <form class="col-lg-12" action="ajouter_post.php" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Titre" name="titre_billet" required>
            <div class="invalid-feedback">Veuillez saisir un titre valide</div>
          </div>

          <div class="form-group">
            <textarea class="form-control" rows="20" placeholder="Contenu de votre billet" name="contenu_billet" required></textarea>
            <div class="invalid-feedback">Veuillez saisir un texte valide</div>
          </div>

          <div class="form-group">
            <input type="url" class="form-control" placeholder="Source" name="source_billet" required>
            <div class="invalid-feedback">Veuillez saisir un lien valide</div>
          </div>

          <div class="custom-file form-group">
            <input type="file" class="custom-file-input" name="illustration_billet" required>
            <label class="custom-file-label">Choisir un fichier</label>
            <div class="invalid-feedback">Veuillez sélectionner un fichier valide</div>
          </div>

          <button type="submit" class="btn btn-outline-secondary">Envoyer</button>

        </form>



      </div>
    </header>
  </div>

  <footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    // Permet l'affichage du nom de fichier sélectionné
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
  </script>
  </footer>
</body>
