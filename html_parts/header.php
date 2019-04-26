<div id="menu_principal">
  <div id="lien_git_blog"><a href="https://github.com/Sulfz/TestBlog">SOURCE GIT</a></div>
  <h1><a href="index.php">BLOG</a></h1>
  <nav>
    <li><?php
      if (verif_session()) {
        echo '<a href="profil.php">'. verif_session() . '</a>';
      }
      else {
        echo '<a href="connexion.php">Connexion</a>';
      }?>
    </li><?php
    // Partie qui s'affiche après le premier lien : déconnexion si connecté
    // ou inscription si non connecté.
    if (verif_session()) {
      echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
    }
    else {
      echo '<li><a href="inscription.php">Inscription</a></li>';
    }?>
  </nav>
</div>
