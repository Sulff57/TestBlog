<?php

// Fonction qui permet de tester la présence ou non d'un avatar utilisateur
//
// Pour cela la fonction considère que le chemin d'accès de l'avatar, s'il existe,
// serait <chemin d'accès des avatars>/<id du membre>.<extensions avatar autorisées> ('jpg', 'jpeg', 'gif', 'png'...)
// et effectue donc une boucle avec la fonction file_exists
// en testant toutes les extensions possibles.

function avatar_existe()
{
  global $_SESSION;
  $fichier_trouve = 0;
  $extensionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];

  foreach ($extensionsAutorisees as $ext)
  {

    if (file_exists('uploads/avatars/' . $_SESSION['id'] . '.' . $ext))
    {
      $fichier_trouve = 1;
    }
  }

  return $fichier_trouve;
}
?>
