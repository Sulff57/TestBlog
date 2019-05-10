<header id="menu_principal" class="row align-items-center">
    <h1 class="col-md-2">
      <a href="index.php"><img src="images/logos/logo_TestBlog.png"/></a>
    </h1>
    <nav class="col-lg-3">
      <ul class="nav">
        <li class="nav-item align-self-center"><a class="nav-link" href="http://www.bvalo.fr/cv">CV</a></li>
        <li class="nav-item align-self-center"><a class="nav-link" href="https://github.com/Sulfz/TestBlog">Git</a></li>
      </ul>
    </nav>
    <section id="login" class="col-md-3 offset-md-4">
      <span id="session"><?php
        if (verif_session()) {
          echo '<a href="profil.php">'. verif_session() . '</a><a href="deconnexion.php"><i class="fas fa-sign-out-alt" id="icone_logout"></i></a>';
        }
        else {
          echo '<i class="fas fa-user" id="icone_login"></i><a href="connexion.php">Connexion / Inscription</a>';
        }
      ?></span>
    </section>
</header>
