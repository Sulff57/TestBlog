<?php

session_start();

// Suppression des variables de la session et de la session elle même

$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique

setcookie('id', '');
setcookie('hashMdp', '');

header('Location: index.php');
?>
