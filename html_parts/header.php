  <header>
  <div id="menu_principal" class="row">
    <div id="lien_git_blog" class="col-md-2">
      <a href="https://github.com/Sulfz/TestBlog">SOURCE GIT</a>
    </div>
    <h1 class="col-md-2">
      <a href="index.php">BLOG</a>
    </h1>
    <section id="login" class="col-md-3 offset-md-5">
      <span id="session"><?php
        if (verif_session()) {
          echo '<a href="profil.php">'. verif_session() . '</a><a href="deconnexion.php"><i class="fas fa-sign-out-alt" id="icone_logout"></i></a>';
        }
        else {
          echo '<i class="fas fa-user" id="icone_login"></i><a href="connexion.php">Connexion / Inscription</a>';
        }
      ?></span>
    </section>
  </div>
</header>
