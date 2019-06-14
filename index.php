<?php session_start(); ?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex" />
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="css/accueil.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <title>Affichage des billets</title>
  </head>

  <body>
    <div class="container"><?php

      $nbBilletsAffiches = 6;
      require('connexion_bdd.php');
      require('afficher_billets.php');
      require('verif_session.php');

      include('html_parts/header.php');

      if (!empty($_GET['page']))
      {
        $pageAffichee = $_GET['page'];
      }
      else
      {
        $pageAffichee = 1;
      }


      // Comptage nombre billets
      try {
        $nombreBillets = $db_session->query(
          '
          SELECT COUNT(*) AS nb_billets FROM billets
          '
        );
        if (!$nombreBillets) {
          throw new Exception('La requête est nulle.');
        }
      } catch (Exception $e) {
        exit('Erreur d\'exécution de la requête SQL. <br/>
        Message :<br/>' .
        $e->getMessage());
      }

      // Calcul du nombre de pages nécessaires pour afficher <x> billets par page
      $nombreBillets = $nombreBillets->fetch();
      $nombreBillets = $nombreBillets['nb_billets'];

      // calcul du nombre de pages pouvant afficher les <x> billets souhaités
      $nbPagesCompletes = intval($nombreBillets / $nbBilletsAffiches);
      // s'il reste des billets à afficher, on ajoute une page
      $ajouterPage = boolval($nombreBillets % $nbBilletsAffiches);

      $nombrePages = $nbPagesCompletes + $ajouterPage;

      // Calcul de l'intervalle minimum des billets à afficher
      $minInterval = ($nbBilletsAffiches * ($pageAffichee - 1));

      // Affiche tous les billets sur la page
      try {
        $req = $db_session->prepare('
        SELECT id, titre, contenu,
        DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_jour,
        DATE_FORMAT(date_creation, "%H:%i") AS date_heure
        FROM billets
        LIMIT :minInterval, :nbBilletsAffiches;
        '
        );
        $req->bindValue(':minInterval', $minInterval, PDO::PARAM_INT);
        $req->bindValue(':nbBilletsAffiches', $nbBilletsAffiches, PDO::PARAM_INT);
        $req->execute();

        if (!$req) {
          throw new Exception('La requête est nulle.');
        }
      } catch (Exception $e) {
        exit('Erreur d\'exécution de la requête SQL. <br/>
        Message :<br/>' .
        $e->getMessage());
      }

      ?>
      <section><?php
      afficher_billets($req);
      ?></section>

      <nav id="nav_pagination">
        <ul class="pagination pagination-lg justify-content-center"><?php
          // Bouton précédent, actif ou non selon la page
          if ($pageAffichee == 1) {
            echo '<li class="page-item disabled">';
            echo '<a class="page-link" href="#" tabindex="-1">Précédent</a>';
            echo '</li>';
            echo '<li class="page-item active">';
            echo '<a class="page-link" href="#">1<span class="sr-only">(page actuelle)</span></a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=2">2</a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=3">3</a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=' . ($pageAffichee + 1) . '">Suivant</a>';
            echo '</li>';
          }
          elseif ($pageAffichee == 2) {
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=1">Précédent</a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=1">1</a>';
            echo '</li>';
            echo '<li class="page-item active">';
            echo '<a class="page-link" href="#">2<span class="sr-only">(page actuelle)</span></a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=3">3</a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=' . ($pageAffichee + 1) . '">Suivant</a>';
            echo '</li>';
            }
          elseif ($pageAffichee == 3) {
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=1">Précédent</a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=1">1</a>';
            echo '</li>';
            echo '<li class="page-item">';
            echo '<a class="page-link" href="index.php?page=2">2</a>';
            echo '</li>';
            echo '<li class="page-item active">';
            echo '<a class="page-link" href="#">3<span class="sr-only">(page actuelle)</span></a>';
            echo '</li>';
            echo '<li class="page-item disabled">';
            echo '<a class="page-link" href="#" tabindex="-1">Suivant</a>';
            echo '</li>';
          }?>
        </ul>



    </div>
  <?php require('html_parts/charger_CDN_bootstrap.html');?>
    <?php include("../guests_management.php"); ?>
  </body>
