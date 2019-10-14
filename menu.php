<div class="blocHeader">
  <div class="bloc2">
    <h1> Simplon ENT </h1>
    <h2> Administrator management</h2>
  </div>
  <?php if($_SESSION['function'] == "administration"){ ?>
  <nav class="bloc3">
    <form class="inscription" action="inscription.php" method="post">
        <input type="submit" value="Inscription">
    </form>
    <form class="utilisateur" action="utilisateur.php" method="post">
        <input type="submit" value="Utilisateur">
    </form>
    <form class="kid" action="kid.php" method="post">
        <input type="submit" value="Kid">
    </form>
    <form class="bibliotheque" action="biblio/index.php" method="post">
        <input type="submit" value="bibliothèque">
    </form>
    <form class="cantine" action="cantine/index-admin.php" method="post">
      <input type="submit" value="Gestion cantine">
    </form>
  <?php }?>
  <?php if($_SESSION['function'] == "parent"){ ?>
    <form class="cantine" action="cantine/index.php" method="post">
      <input type="submit" value="Cantine">
    </form>
  <?php } ?>
  <?php if($_SESSION['function'] == "professeur"){ ?>
    <form class="bibliotheque" action="biblio/index.php" method="post">
        <input type="submit" value="bibliothèque">
    </form>
  <?php } ?>
  <form class="deconnexion" action="deconnexion.php" method="post">
    <input type="submit" value="Deconnexion">
  </form>

</nav><br>
