<?php
  // Doc ip-api.com http://ip-api.com/docs/api:json

  $ip_visiteur = $_SERVER["REMOTE_ADDR"];

  // Utilisation d'une API pour récupérer des informations sur l'ip au format JSON
  $json_original = file_get_contents("http://ip-api.com/json/" . $ip_visiteur . "?fields=status,country,city,org,query");

  // Création d'un objet contenant les informations sous forme de propriétés
  $json_decode = json_decode($json_original);

  // Si la création de l'objet à fonctionné, on va pouvoir remplir le fichier
  if ($json_decode->status == "success")
  {
    // Création des variables à partir des propriétés pour simplifier l'affichage
    $pays = $json_decode->country;
    $ville = $json_decode->city;
    $org = $json_decode->org;
    $ip = $_SERVER["REMOTE_ADDR"];

    $fichier = fopen("visitors", "a");

    if ($ip != '83.199.67.89')
    {
      if ($pays == 'France')
      {
        fwrite($fichier, "IP: " . $ip . " DATE: " . date('d/m/Y') . " HEURE: " . date('h:i:s') . "\n");
        fwrite($fichier, "----> Pays : " . $pays . " - Ville : " . $ville . " - Org: " . $org . "\n\n");
        fclose($fichier);
      }
      else
      {
        fwrite($fichier, $ip . " " . date('d/m/Y') . " " . $pays . " " . $ville . "\n\n");
        fclose($fichier);
      }
    }
    else
    {
      fwrite($fichier, "MOI \n\n");
      fclose($fichier);
    }
  }

?>
