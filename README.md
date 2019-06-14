Un blog qui me sert de base pour travailler mes cours html5 / css / php / php objet / js ...
et que j'incrémente de fonctionnalités au fur et à mesure que j'avance dans ceux-ci.

Fonctionnalités actuelles :

- Inscription / Connexion / Déconnexion
- Possibilité de laisser un commentaire sur les billets en étant inscrit 
- Possibilité de définir un avatar sur son profil
- Pagination

Pour fonctionner, nécessite d'importer le fichier SQL/test.sql dans une base de données (nommée "test" par défaut)

Vous pouvez modifier les paramètres de connexion dans la ligne 
-----> "db_session = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));"
située dans le fichier connexion_bdd.php situé à la racine du projet.