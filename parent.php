<?php
require_once 'connect.php';
$req = "SELECT * FROM user WHERE function='parent'";
$send=mysqli_query($link,$req);

?>
<!DOCTYPE html>
<html>
<head>
  <title>INSCRIPTION</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<body class="Admin">
  <?php require_once 'menu.php' ?>
    <nav class="bloc3">
      <form class="parent" action="parent.php" method="post">
          <input type="submit" value="Parent">
      </form>
      <form class="professeur" action="professeur.php" method="post">
          <input type="submit" value="Professeur">
      </form>
      <form class="administration" action="administration.php" method="post">
          <input type="submit" value="Administration">
      </form>
    </nav>
  <div class="bloc">
    <div class="form">
      <h1> Parent </h1><hr>
    <?php  while($result=mysqli_fetch_array($send)){ ?>
        Prénom : <?php echo $result['firstname'] ?><br>
        Nom : <?php echo $result['lastname'] ?><br>
        Email :  <?php echo $result['email'] ?><br>
        Identifiant : <?php echo $result['login'] ?><br>
        Fonction : <?php echo $result['firstname'] ?><br>
        <hr>
        <a class="modify" href="modifyUtilisateur.php">   Modifier   </a></tr>
        <a class="suppr" href="SuppUtilisateur.php">   Supprimer   </a></tr>
        <a class="addKid" href="ajoutEnfants.php">   Ajout d'enfants   </a></tr>
        <hr>
      <?php } ?>
    </div>
  </div>
</body>
</html>
