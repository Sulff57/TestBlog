<?php

// Fonction qui produit une image à la taille souhaitée et au format 1:1 ("carré")
// Pour cela on rogne de chaque côté le plus long l'excédent
// Puis on redimensionne l'image
function adapt_img_avatar($cheminAcces, $dimensionsSouhaitees, $extension)
{
  // On crée l'objet image qui va accueillir notre avatar au format 1:1
  $destination = imagecreatetruecolor($dimensionsSouhaitees, $dimensionsSouhaitees);

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

  // On récupère la taille du côté le moins long
  $size = min($largeurSource, $hauteurSource);

  // On récupère la taille de l'excédent du côté le plus long
  // Puis on la divise par 2 pour enlever une moitié de chaque côté
  if ($hauteurSource > $largeurSource)
  {
    $excedent = (($hauteurSource - $largeurSource) / 2);
    // la hauteur étant trop grande,
    // on commence à couper l'image à partir du haut + la moitié de l'excédent jusqu'au bord bas - la moitié de l'excédent
    $zoneRognee = ['x' => 0, 'y' => $excedent, 'width' => $largeurSource, 'height' => ($hauteurSource-$excedent)];
  }
  elseif ($hauteurSource < $largeurSource)
  {
    $excedent = (($largeurSource - $hauteurSource) / 2);
    // la largeur étant trop grande,
    // on commence à couper l'image à partir de la gauche + la moitié de l'excédent jusqu'au bord droit - la moitié de l'excédent
    $zoneRognee = ['x' => $excedent, 'y' => 0, 'width' => ($largeurSource-$excedent), 'height' => $hauteurSource];
  }

  // On rogne l'image avec les paramètres du tableau créé
  $imageRognee = imagecrop($source, $zoneRognee);

  // On redimensionne l'image aux dimensions souhaitées sans avoir à se soucier des proportions
  // car l'image a été rognée avant
  imagecopyresampled($destination, $imageRognee, 0, 0, 0, 0, $dimensionsSouhaitees, $dimensionsSouhaitees, $size, $size);
  imagejpeg($destination, 'uploads/avatars/' . $_SESSION['id'] . '.' . $extension);
}
?>
