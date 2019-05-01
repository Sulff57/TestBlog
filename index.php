<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Affichage des billets</title>
</head>

<body>
  <div class="container"><?php

    $nbBilletsAffiches = 6;
    require('connexion_bdd.php');
    require('afficher_billets.php');
    require('verif_session.php');
    ?>

    <header class="row">
      <div class="col-lg-12">
        <?php include('html_parts/header.php');?>
      </div>
    </header>

    <?php

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
      DATE_FORMAT(date_creation, "%Hh%imin%ss") AS date_heure
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
    ?></section><?php

    for ($x = 0; $x<=$nombrePages; $x++)
    {
      echo('<a href="index.php?page=' . $x . '">' . $x . '</a>');
    }
    ?>
  </div>
<?php require('html_parts/charger_CDN_bootstrap.html');?>
</body>
