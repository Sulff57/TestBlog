<?php

// Ce script en le lançant au début de chaque page permet :
// 1) de vérifier en temps réel la correspondance du mot de passe
// Dès que le mot de passe change aucune action n'est possible même si
// une session est en cours
// 2) de recréer une session à partir des cookies (si identifiants valides)
// en rechargeant les valeurs de la variable $_SESSION[]


require('connexion_bdd.php');

// Retourne FALSE si session invalide, ou le pseudo si session valide.
function verif_session()
{
  global $db_session;
  // on initialise la variable $reponse qui sera renvoyée
  // elle restera à 0 si les identifiants n'existent pas ou sont invalides
  // ou passera à 1 dans le cas contraire
  $reponse = 0;

  // On verifie si des identifiants de session existent
  // dans les données $_SESSION et les cookies
  if (isset($_COOKIE['id']) && isset($_COOKIE['hashMdp']) )
  {
    $id = $_COOKIE['id'];
    $hashMdp = $_COOKIE['hashMdp'];
  }
  else if (isset($_SESSION['id']) && isset($_SESSION['hashMdp']) )
  {
    $id = $_SESSION['id'];
    $hashMdp = $_SESSION['hashMdp'];
  }

  // Si on a pu récupérer des identifiants
  // On vérifie que ceux-ci sont toujours valides
  if ( isset($id) && isset($hashMdp) )
  {
    try {
      $req = $db_session->prepare('
      SELECT id, pseudo, password
      FROM membres
      WHERE id = ?
      '
      );
      $req->execute(array($id));
    } catch (Exception $e) {
      exit('Erreur d\'exécution de la requête SQL. <br/>
      Message :<br/>' .
      $e->getMessage());
    }

    $resultat = $req->fetch();

    $mdpVerif = ($hashMdp == $resultat['password']);
    if ($mdpVerif)
    {
      $reponse = $resultat['pseudo'];
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['pseudo'] = $resultat['pseudo'];
      $_SESSION['hashMdp'] = $resultat['password'];
    }
  }
  return $reponse;
}

?>
