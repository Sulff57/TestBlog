<header>
  <nav class="navbar navbar-expand-sm fixed-top" id="top_menu_banniere">
    <ul class="navbar-nav" id="zone_navigation">
      <li class="nav-item">
        <a class="navbar-brand" href="../index.php"><img src="../images/logos/logo_TestBlog.png"/></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://www.bvalo.fr/cv">CV</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://github.com/Sulfz/TestBlog">Git</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto" id="zone_login">
      <li class="nav-item ml-auto"><?php
        if (verif_session()) {
          echo '<a class="nav-link" href="../profil.php">'. verif_session() . '</a>';
          echo '</li>';
          echo '<li>';
          echo '<a class="nav-link" href="../deconnexion.php"><i class="fas fa-sign-out-alt" id="icone_logout"></i></a>';
          echo '</li>';
        }
        else {
          echo '<li>';
          echo '<a class="nav-link" href="../connexion.php"><i class="fas fa-user" id="icone_login"></i>Connexion / Inscription</a>';
          echo '</li>';
        }
      ?></span>
    </ul>
</header>
