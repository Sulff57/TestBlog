<?php

function compterNbCommentairesBillet($billetId)
{
  require('connexion_bdd.php');
  try {
    $req = $db_session->query('
    SELECT COUNT(*) as nb_commentaires
    FROM commentaires
    WHERE id_billet = ' . $billetId . '
    '
    );
    if (!$req) {
      throw new Exception('La requête est nulle.');
    }
  } catch (Exception $e) {
    exit('Erreur d\'exécution de la requête SQL. <br/>
    Message :<br/>' .
    $e->getMessage());
  }
  $nb_commentaires = $req->fetch();
  $nb_commentaires = $nb_commentaires['nb_commentaires'];
  return $nb_commentaires;
}
?>
