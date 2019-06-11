<?php

// Fonction qui adapte l'illustration au format 1:3.6

function adapt_illustration($cheminAcces, $id, $extension)
{

  // On récupère l'extension du fichier pour utiliser les fonctions adaptées à celle-ci

  if ( ($extension == 'jpeg') || ($extension == 'jpg') )
  {
    $source = imagecreatefromjpeg($cheminAcces);
  }
  elseif ( $extension == ('png') )
  {
    $source = imagecreatefrompng($cheminAcces);
  }
  elseif ( $extension = ('gif') )
  {
    $source = imagecreatefromgif($cheminAcces);
  }

  $largeurSource = imagesx($source);
  $hauteurSource = imagesy($source);

  // On récupère la taille du côté le plus long
  $size = max($largeurSource, $hauteurSource);

  $nouvelleHauteur = ($largeurSource / 3.60);

  // On crée l'objet image qui va accueillir l'illustration
  $destination = imagecreatetruecolor($largeurSource, $nouvelleHauteur);

  // On coupe au centre
  $moitieNouvelleHauteur = ($nouvelleHauteur / 2);
  $milieuSourceY = ($hauteurSource / 2);
  $hautZoneRognee = ($milieuSourceY - $moitieNouvelleHauteur);

  $zoneRognee = ['x' => 0, 'y' => $hautZoneRognee, 'width' => $largeurSource, 'height' => $nouvelleHauteur];

  // On rogne l'image avec les paramètres du tableau créé
  $imageRognee = imagecrop($source, $zoneRognee);

  // On redimensionne l'image aux dimensions souhaitées sans avoir à se soucier des proportions
  // car l'image a été rognée avant
  imagecopyresampled($destination, $imageRognee, 0, 0, 0, 0, $largeurSource, $nouvelleHauteur, $largeurSource, $hauteurSource);
  imagepng($imageRognee, '../uploads/articles/illustrations/' . $id . '.jpg');
}
?>
